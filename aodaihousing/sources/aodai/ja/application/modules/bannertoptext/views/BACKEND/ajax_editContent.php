<script type="text/javascript">
	function showRequest(formData, jqForm, options) {
		var form = jqForm[0];
	}
</script>

<div class="table">
	<div class="head_table"><div class="head_title_edit"><?php echo $module_name; ?></div></div>
	<div class="clearAll"></div>

	<form id="frmManagement" action="<?=PATH_URL.'admincp/'.$module.'/save/'?>" method="post" enctype="multipart/form-data">
		<input type="hidden" name="idHidden" value="<?php echo $idHidden; ?>">

		<div class="row_text_field">
			<table cellspacing="0" cellpadding="0" border="0" width="100%">
				<tr>
					<td class="left_text_field">Title JP:</td>
					<td class="right_text_field">
						<input value="<?php echo $title_desc_jp; ?>" type="text" name="titleAdmincp[jp]" />
					</td>
				</tr>
			</table>
		</div>
	    <div class="row_text_field">
			<table cellspacing="0" cellpadding="0" border="0" width="100%">
				<tr>
					<td class="left_text_field">Title VN:</td>
					<td class="right_text_field">
						<input value="<?php echo $title_desc_vn; ?>" type="text" name="titleAdmincp[vn]" />
					</td>
				</tr>
			</table>
		</div>

		<?php if ($descriptions): ?>
			<?php foreach ($descriptions as $key => $description): ?>
				<?php
					if (isset($result->$description)) {
						$input_desc_jp = vcp_printf($result->$description, 'jp');
						$input_desc_vn = vcp_printf($result->$description, 'vn');
					} else {
						$input_desc_jp = '';
						$input_desc_vn = '';
					}
					$label_desc_jp = 'Desciption ' . ucfirst($key) . ' JP';
					$label_desc_vn = 'Desciption ' . ucfirst($key) . ' VN';
				?>
			    <div class="row_text_field">
					<table cellspacing="0" cellpadding="0" border="0" width="100%">
						<tr>
							<td class="left_text_field"><?php echo $label_desc_jp; ?>:</td>
							<td class="right_text_field">
								<input value="<?php echo $input_desc_jp; ?>" type="text" name="<?php echo $description; ?>[jp]" />
							</td>
						</tr>
					</table>
				</div>
			    <div class="row_text_field">
					<table cellspacing="0" cellpadding="0" border="0" width="100%">
						<tr>
							<td class="left_text_field"><?php echo $label_desc_vn; ?>:</td>
							<td class="right_text_field">
								<input value="<?php echo $input_desc_vn; ?>" type="text" name="<?php echo $description; ?>[vn]" />
							</td>
						</tr>
					</table>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>

		<div class="row_text_field">
			<table cellspacing="0" cellpadding="0" border="0" width="100%">
				<tr>
					<td class="left_text_field">Status:</td>
					<td class="right_text_field">
						<input <?php echo $checked_status; ?> type="checkbox" class="custom_chk" name="statusAdmincp" />
					</td>
				</tr>
			</table>
		</div>
	</form>
</div>