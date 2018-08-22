<?php
/*
Plugin Name: Change Last Modified Date
Description: Change or prevent updating Last Modified date for each post when editing from admin panel.
Version: 1.2
Author: Zarko
Author URI: http://firescripts.net
License: GPLv3 or later
Text Domain: clm-date
Domain Path: /languages
*/

/*
 * Define textdomain for translation
 * */
function clm_language() {

	load_plugin_textdomain('clm-date', false, basename(dirname( __FILE__ )).'/languages');

}

add_action('plugins_loaded', 'clm_language');


/*
 * Include admin CSS/JS files
 *
 * @param string Current page
 *
 * @return null
 * */
function clm_adminscripts($page) {

	 wp_enqueue_style('clm-scripts', plugins_url('style.css', __FILE__));

}

add_action('admin_enqueue_scripts', 'clm_adminscripts');

/*
 * Display modification date form
 *
 * @param object Post object
 *
 * @return null
 * */
function clm_displaydate($p) {

	global $wp_locale;

	if($p->post_status == 'auto-draft') {
		return;
	}

	$datemodified = $p->post_modified;

	$jj = mysql2date('d', $datemodified, false);
	$mm = mysql2date('m', $datemodified, false);
	$aa = mysql2date('Y', $datemodified, false);
	$hh = mysql2date('H', $datemodified, false);
	$mn = mysql2date('i', $datemodified, false);

	$ss = mysql2date('s', $datemodified, false);

	$stopmodifiedupdate = get_post_meta($p->ID, '_stopmodifiedupdate', true);

	?>

	<div class="misc-pub-section curtime">
		<span id="timestampmodified"> <?php _e('Modified on:', 'clm-date'); ?> <b><?php echo date('M j, Y @ H:i', strtotime($datemodified)); ?></b></span>

		<a href="#edit_timestampmodified" class="edit-timestampmodified hide-if-no-js" role="button"><span aria-hidden="true"><?php _e('Edit', 'clm-date'); ?></span> <span class="screen-reader-text"><?php _e('Edit modification date and time', 'clm-date'); ?></span></a>

		<fieldset id="timestampmodifieddiv" class="hide-if-js">
			<legend class="screen-reader-text"><?php _e('Last modified date and time', 'clm-date'); ?></legend>
			<div class="timestamp-wrap">
				<label>
					<span class="screen-reader-text"><?php _e('Month', 'clm-date'); ?></span>
					<select id="mmm" name="mmm">
						<?php
						for ($i = 1; $i < 13; $i++) {

							$monthnum = zeroise($i, 2);
							$monthtext = $wp_locale->get_month_abbrev($wp_locale->get_month($i));

							echo '<option value="'.$monthnum.'" data-text="'.$monthtext.'" '.selected($monthnum, $mm, false).'>'.sprintf(__( '%1$s-%2$s' ), $monthnum, $monthtext).'</option>';
						}
						?>
					</select>
				</label>
				<label>
					<span class="screen-reader-text"><?php _e('Day', 'clm-date'); ?></span>
					<input type="text" id="jjm" name="jjm" value="<?php echo $jj; ?>" size="2" maxlength="2" autocomplete="off">
				</label>,

				<label>
					<span class="screen-reader-text"><?php _e('Year', 'clm-date'); ?></span>
					<input type="text" id="aam" name="aam" value="<?php echo $aa; ?>" size="4" maxlength="4" autocomplete="off">
				</label> @

				<label>
					<span class="screen-reader-text"><?php _e('Hour', 'clm-date'); ?></span>
					<input type="text" id="hhm" name="hhm" value="<?php echo $hh; ?>" size="2" maxlength="2" autocomplete="off">
				</label> :

				<label>
					<span class="screen-reader-text"><?php _e('Minute', 'clm-date'); ?></span>
					<input type="text" id="mnm" name="mnm" value="<?php echo $mn; ?>" size="2" maxlength="2" autocomplete="off">
				</label>

			</div>

			<?php

			$currentlocal = current_time('timestamp');
			$mm_current = gmdate('m', $currentlocal);
			$jj_current = gmdate('d', $currentlocal);
			$aa_current = gmdate('Y', $currentlocal);
			$hh_current = gmdate('H', $currentlocal);
			$mn_current = gmdate('i', $currentlocal);

			$vals = array(
				'mmm' => array($mm, $mm_current),
				'jjm' => array($jj, $jj_current),
				'aam' => array($aa, $aa_current),
				'hhm' => array($hh, $hh_current),
				'mnm' => array($mn, $mn_current),
			);

			foreach($vals as $key => $val) {
				echo '<input type="hidden" id="hidden_'.$key.'" name="hidden_'.$key.'" value="'.$val[0].'">';
				echo '<input type="hidden" id="cur_'.$key.'" name="cur_'.$key.'" value="'.$val[1].'">';
			}

			?>

			<input type="hidden" id="ssm" name="ssm" value="<?php echo $ss; ?>">
			<input type="hidden" id="changmodified" name="changmodified" value="0">

			<p><a href="#edit_timestampmodified" class="save-timestamp hide-if-no-js button"><?php _e('OK', 'clm-date'); ?></a> <a href="#edit_timestampmodified" class="cancel-timestamp hide-if-no-js button-cancel"><?php _e('Cancel', 'clm-date'); ?></a></p>

			<p><label><input type="checkbox" name="stopmodifiedupdate" id="stopmodifiedupdate" <?php if($stopmodifiedupdate == 1) { echo "checked"; } ?>> <?php _e("Don't update for this post", 'clm-date'); ?></label></p>

		</fieldset>

		<p class="modifiedupdatenote"><?php _e('Will be updated to current date and time', 'clm-date'); ?></p>

	</div><!-- /.misc-pub-section -->

	<script>

		jQuery(document).ready(function($) {

			$tsmdiv = $('#timestampmodifieddiv');

			function updateTextModified() {

				var dateFormat = '%1$s %2$s, %3$s @ %4$s:%5$s';
				var aam = $('#aam').val(), mmm = $('#mmm').val(), jjm = $('#jjm').val(), hhm = $('#hhm').val(), mnm = $('#mnm').val();
				var textModifiedOn = "<?php _e('Modified on:', 'clm-date'); ?>";

				$('#timestampmodified').html(
					'\n ' + textModifiedOn + ' <b>' +
					dateFormat
						.replace( '%1$s', $( 'option[value="' + mmm + '"]', '#mmm' ).attr( 'data-text' ) )
						.replace( '%2$s', parseInt( jjm, 10 ) )
						.replace( '%3$s', aam )
						.replace( '%4$s', ( '00' + hhm ).slice( -2 ) )
						.replace( '%5$s', ( '00' + mnm ).slice( -2 ) ) +
						'</b> '
				);

				return true;
			}

			/*
			 * Partially borrowed from wp-admin/js/post.js
			 */
			$tsmdiv.siblings('a.edit-timestampmodified').click( function( event ) {
				if ( $tsmdiv.is( ':hidden' ) ) {
					$tsmdiv.slideDown( 'fast', function() {
						$( 'input, select', $tsmdiv.find( '.timestamp-wrap' ) ).first().focus();
					} );
					$(this).hide();
				}
				event.preventDefault();
			});

			$tsmdiv.find('.cancel-timestamp').click( function( event ) {
				$tsmdiv.slideUp('fast').siblings('a.edit-timestampmodified').show().focus();
				$('#mmm').val($('#hidden_mmm').val());
				$('#jjm').val($('#hidden_jjm').val());
				$('#aam').val($('#hidden_aam').val());
				$('#hhm').val($('#hidden_hhm').val());
				$('#mnm').val($('#hidden_mnm').val());
				updateTextModified();
				$('.modifiedupdatenote').show();
				$('#changmodified').val('0');
				event.preventDefault();
			});

			$tsmdiv.find('.save-timestamp').click( function( event ) {
				if ( updateTextModified() ) {
					$tsmdiv.slideUp('fast');
					$tsmdiv.siblings('a.edit-timestampmodified').show().focus();
				}
				$('#changmodified').val('1');
				$('.modifiedupdatenote').hide();
				event.preventDefault();
			});

			$tsmdiv.find('#stopmodifiedupdate').on('click', function( event ) {
				if($(this).is(':checked')) {
					$('.modifiedupdatenote').hide();
				}
			});

			if($tsmdiv.find('#stopmodifiedupdate').is(':checked') == false) {
				$('.modifiedupdatenote').show();
			}


		});

	</script>

	<?php

}

add_action('post_submitbox_misc_actions', 'clm_displaydate');

/*
 * Update modification date
 *
 * @param array Slashed post data
 * @param array Raw post data
 *
 * @return array Slashed post data with modified post_modified and post_modified_gmt
 * */
function clm_updatedate($data, $postarr) {

	if($_POST['stopmodifiedupdate'] == 'on') {
		update_post_meta($postarr['ID'], '_stopmodifiedupdate', '1');
	} else {
		update_post_meta($postarr['ID'], '_stopmodifiedupdate', '0');
	}

	$stopmodifiedupdate = get_post_meta($postarr['ID'], '_stopmodifiedupdate', true);

	if(isset($_POST['changmodified']) && $_POST['changmodified'] == 1) {

		$mm = sanitize_text_field($_POST['mmm']);
		$jj = sanitize_text_field($_POST['jjm']);
		$aa = sanitize_text_field($_POST['aam']);
		$hh = sanitize_text_field($_POST['hhm']);
		$mn = sanitize_text_field($_POST['mnm']);
		$ss = sanitize_text_field($_POST['ssm']);

		$mm = (is_numeric($mm) && $mm <= 12) ? $mm : '01'; // months
		$jj = (is_numeric($jj) && $jj <= 31) ? $jj : '01'; // days
		$aa = (is_numeric($aa) && $aa >= 0) ? $aa : '2017'; // years
		$hh = (is_numeric($hh) && $hh <= 24) ? $hh : '12'; // hours
		$mn = (is_numeric($mn) && $mn <= 60) ? $mn : '00'; // minutes
		$ss = (is_numeric($ss) && $ss <= 60) ? $ss : '00'; // seconds

		$newdate = sprintf("%04d-%02d-%02d %02d:%02d:%02d", $aa, $mm, $jj, $hh, $mn, $ss);

		$data['post_modified'] = $newdate;
		$data['post_modified_gmt'] = get_gmt_from_date($newdate);

	}

	if($stopmodifiedupdate == 1) {
		$data['post_modified'] = $postarr['post_modified'];
		$data['post_modified_gmt'] = $postarr['post_modified_gmt'];
	}

	return $data;
}

add_action('wp_insert_post_data', 'clm_updatedate', 10, 2);
