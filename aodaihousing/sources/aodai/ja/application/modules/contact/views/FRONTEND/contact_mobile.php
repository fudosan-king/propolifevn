<div id="form_contact">
	<div class="main-title">
		<p><?php echo lang('お問い合わせフォーム'); ?></p>	
	</div>
	<div class="top-field">
		<?php if($title){ ?>
		<h4><?=$title?></h4>
		<?php }else{ ?>
		<h4><?php echo lang('WEBからの お問い合わせ'); ?></h4>
		<?php } ?>
	</div>
	<div class="form-content">
		<div class="line"></div>
		<form action="" method="POST">
			<?php if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == 'ja'){?>
			<div class="field-items">
				<fieldset>
					<label for=""><p><?php echo lang('お名前'); ?><span>*</span></p></label>
					<input type="text" id="name">
				</fieldset>
			</div>
			
			<div class="field-items">
				<fieldset>
					<label for=""><p><?php echo lang('フリガナ'); ?></p></label>
					<input type="text" id="name_hiragana">
				</fieldset>
			</div>
			<?php }else{ ?>
			<div class="field-items">
				<fieldset>
					<label for=""><p><?php echo lang('お名前'); ?><span>*</span></p></label>
					<input type="text" id="name_alphabet">
				</fieldset>
			</div>
			<?php } ?>

			<div class="field-items">
				<fieldset>
					<label for=""><p><?php echo lang('メールアドレス'); ?><span>*</span></p></label>
					<input type="text" id="email">
				</fieldset>
			</div>

			<div class="field-items">
				<fieldset>
					<label for=""><p><?php echo lang('電話番号'); ?><span>*</span></p></label>
					<input type="text" id="phone">
				</fieldset>
			</div>

			<div class="field-items">
				<fieldset>
					<label for=""><p><?php echo lang('ご住所'); ?></p></label>
					<input type="text" id="address">
				</fieldset>
			</div>

			<!-- <div class="field-items">
				<fieldset>
					<label for=""><p><?php echo lang('ご入居希望時期'); ?></p></label>
					<div class="two-fields">
						<div class="w-50">
							<p><?php echo lang('年'); ?></p>
							<input type="text" id="date_from">
						</div>
						
						<div class="w-50">
							<p><?php echo lang('月'); ?></p>
							<input type="text" id="date_to">
						</div>
					</div>
				</fieldset>
			</div> -->

			<div class="field-items">
				<fieldset>
					<label for=""><p class="last-field-custom"><?php echo lang('お問い合わせ内容、確認されたいこと'); ?><span>*</span></p></label>
					<textarea id="content"></textarea>
				</fieldset>
			</div>
		</form>
	</div>
	<a href="javascript:submit_contact();"><div class="bottom-field">  
		<div class="form-request">
			<p class="txt-error" style="display: none">Fail</p>
			<p class="txt-suces" style="display: none"><?php echo lang('Send Success'); ?></p>
		</div>
		<div class="btn-submit"><?php echo lang('お問い合わせを送信する'); ?></div>
	</div></a>
</div>

<script type="text/javascript">
function reset_form(){
	<?php if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == 'ja'){?>
	$('#name').val('');
	$('#name_hiragana').val('');
	<?php }else{ ?>
	$('#name_alphabet').val('');
	<?php } ?>
	$('#email').val('');
	$('#phone').val('');
	$('#address').val('');
	$('#date_from').val('');
	$('#date_to').val('');
	$('#content').val('');
}

function submit_contact(){
	//Reset error
	$('.form-request').css('visibility','hidden');
	$('.txt-error').hide();
	$('.txt-suces').hide();
	$('#name').removeClass('error');
	$('#name_alphabet').removeClass('error');
	$('#email').removeClass('error');
	$('#phone').removeClass('error');
	$('#content').removeClass('error');
		
	$.post('<?=PATH_URL.'contact/contact_step1?'.$_SERVER['QUERY_STRING']?>',{
		send: '<?=lang('記入内容確認へ')?>',
		<?php if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == 'ja'){?>
		name: $('#name').val(),
		name_hiragana: $('#name_hiragana').val(),
		<?php }else{ ?>
		name_alphabet: $('#name_alphabet').val(),
		<?php } ?>
		email: $('#email').val(),
		phone: $('#phone').val(),
		address: $('#address').val(),
		date_from: $('#date_from').val(),
		date_to: $('#date_to').val(),
		content: $('#content').val()
	},function(data){
		var obj = jQuery.parseJSON(data);
		var html = '';
		if(obj.error==1){
			<?php if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == 'ja'){?>
			if(obj.mes.name){
				$('#name').addClass('error');
				$('#name').focus();
				html += obj.mes.name;
			}
			<?php }else{ ?>
			if(obj.mes.name_alphabet){
				$('#name_alphabet').addClass('error');
				$('#name_alphabet').focus();
				html += obj.mes.name_alphabet;
			}
			<?php } ?>
			if(obj.mes.email){
				$('#email').addClass('error');
				$('#email').focus();
				if(html==''){
					html += obj.mes.email;
				}else{
					html += "<br/>"+obj.mes.email;
				}
			}
			if(obj.mes.phone){
				$('#phone').addClass('error');
				$('#phone').focus();
				if(html==''){
					html += obj.mes.phone;
				}else{
					html += "<br/>"+obj.mes.phone;
				}
			}
			if(obj.mes.content){
				$('#content').addClass('error');
				$('#content').focus();
				if(html==''){
					html += obj.mes.content;
				}else{
					html += "<br/>"+obj.mes.content;
				}
			}
			$('.txt-error').html(html);
			$('.form-request').css('visibility','visible');
			$('.txt-error').fadeIn(400);
		}else{
			reset_form();
			$('.form-request').css('visibility','visible');
			$('.txt-suces').fadeIn(400);
		}
	});
}
</script>