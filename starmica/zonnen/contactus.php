<?php
if($_POST['sendconfo'] OR $_POST['sendgo']){
	if($_POST['e_name']){
		$e_name = htmlspecialchars($_POST['e_name'], ENT_QUOTES);
		//50������
		$count_id = strlen($e_name);
		if($count_id > 100){
			$e_name_msg = "��̾����50ʸ����������Ϥ��Ƥ���������";
			$errorflag = 1;
		}
	}
	else{
		$e_name_msg = "��̾���Τ����Ϥ򤪴ꤤ�������ޤ���";
		$errorflag = 1;
	}
	if($_POST['e_namekana']){
		$e_namekana = htmlspecialchars($_POST['e_namekana'], ENT_QUOTES);
		//50������
		$count_id = strlen($e_namekana);
		if($count_id > 100){
			$e_namekana_msg = "�եꥬ�ʤ�50ʸ����������Ϥ��Ƥ���������";
			$errorflag = 1;
		}
	}
	else{
		$e_namekana_msg = "�եꥬ�ʤΤ����Ϥ򤪴ꤤ�������ޤ���";
		$errorflag = 1;
	}
	if($_POST['e_mail']){
		$e_mail = htmlspecialchars($_POST['e_mail'], ENT_QUOTES);
		if( preg_match('/^[-+.\\w]+@[-a-z0-9]+(\\.[-a-z0-9]+)*\\.[a-z]{2,6}$/i', $e_mail)){
			//ʸ����
			//60ʸ������
			$count_id = strlen($e_mail);
			if($count_id > 60){
				$e_mail_msg = "�᡼�륢�ɥ쥹����Ͽ�Ǥ��ʤ��᡼�륢�ɥ쥹�Ǥ���";
				$errorflag = 1;
			}
		}
		else{
			$e_mail_msg = "�᡼�륢�ɥ쥹����Ͽ�Ǥ��ʤ��᡼�륢�ɥ쥹�Ǥ���";
			$errorflag = 1;
		}
	}
	else{
		$e_mail_msg = "�᡼�륢�ɥ쥹�Τ����Ϥ򤪴ꤤ�������ޤ���";
		$errorflag = 1;
	}
	if($_POST['e_mail2']){
		$e_mail2 = htmlspecialchars($_POST['e_mail2'], ENT_QUOTES);
		if($e_mail2 != $e_mail){
			$e_mail_msg = "�᡼�륢�ɥ쥹�����Ϥ��ְ�äƤ��ޤ���";
			$errorflag = 1;
		}
	}
	else{
		$e_mail2_msg = "�᡼�륢�ɥ쥹�Τ����Ϥ򤪴ꤤ�������ޤ���";
		$errorflag = 1;
	}
	if($_POST['e_fax']){
		$e_fax = htmlspecialchars($_POST['e_fax'], ENT_QUOTES);

			$e_fax = ereg_replace("��", "-", "$e_fax");
			$e_fax = ereg_replace("��", "-", "$e_fax");
			$e_fax = ereg_replace("��", "-", "$e_fax");

			$e_fax_check = ereg_replace("-", "", "$e_fax");
			//Ⱦ�ѿ���
			if( ereg("^[0-9]+$",$e_fax_check)){
			
			}
			else{
				$e_fax_msg = "FAX�ֹ��Ⱦ�ѿ����ȡ�-�סʥϥ��ե�ˤΤߤ����Ϥ��Ƥ���������";
				$errorflag = 1;
			}
	}
	if($_POST['e_address']){
		$e_address = htmlspecialchars($_POST['e_address'], ENT_QUOTES);
	}
	else{
		$e_address_msg = "������Τ����Ϥ򤪴ꤤ�������ޤ���";
		$errorflag = 1;
	}
	if($_POST['e_yubin']){
		$e_yubin = htmlspecialchars($_POST['e_yubin'], ENT_QUOTES);
	}
	else{
		$e_yubin_msg = "͹���ֹ�Τ����Ϥ򤪴ꤤ�������ޤ���";
		$errorflag = 1;
	}

	if($_POST['e_tel']){
		$e_tel = htmlspecialchars($_POST['e_tel'], ENT_QUOTES);

			$e_tel = ereg_replace("��", "-", "$e_tel");
			$e_tel = ereg_replace("��", "-", "$e_tel");
			$e_tel = ereg_replace("��", "-", "$e_tel");

			$e_tel_check = ereg_replace("-", "", "$e_tel");
			//Ⱦ�ѿ���
			if( ereg("^[0-9]+$",$e_tel_check)){
			
			}
			else{
				$e_tel_msg = "�����ֹ��Ⱦ�ѿ����ȡ�-�סʥϥ��ե�ˤΤߤ����Ϥ��Ƥ���������";
				$errorflag = 1;
			}
	}
	else{
		$e_tel_msg = "�����ֹ�Τ����Ϥ򤪴ꤤ�������ޤ���";
		$errorflag = 1;
	}
	if($_POST['e_soudan']){
		$e_soudan = htmlspecialchars($_POST['e_soudan'], ENT_QUOTES);
		//600������
		$count_id = strlen($e_soudan);
		if($count_id > 1200){
			$e_soudan_msg = "���������Ƥ�600ʸ����������Ϥ��Ƥ���������";
			$errorflag = 1;
		}
		$e_soudan_h = nl2br($e_soudan);
	}
	if($_POST['e_birthday']){
		$e_birthday = htmlspecialchars($_POST['e_birthday'], ENT_QUOTES);
	}
	else{
		$e_birthday_msg = "��ǯ�����Τ����Ϥ򤪴ꤤ�������ޤ���";
		$errorflag = 1;
	}
	if($_POST['e_kikkake']){
		$e_kikkake= htmlspecialchars($_POST['e_kikkake'], ENT_QUOTES);
		if($e_kikkake == 'k'){
			$e_kikkake_msg = "������ĺ������HP���Τ�ˤʤä����Τ����Ϥ򤪴ꤤ�������ޤ���";
			$errorflag = 1;
		}
	}
	else{
		$e_kikkake_msg = "������ĺ������HP���Τ�ˤʤä����Τ����Ϥ򤪴ꤤ�������ޤ���";
		$errorflag = 1;
	}
	if($_POST['e_melmaga']){
		$e_melmaga = htmlspecialchars($_POST['e_melmaga'], ENT_QUOTES);
	}
	else{
		$e_melmaga_msg = "�������򤤤��᤯�᡼��Ǥ��Ϥ��Τ����Ϥ򤪴ꤤ�������ޤ���";
		$errorflag = 1;
	}
	if($_POST['e_sagashi']){
		$e_sagashi = htmlspecialchars($_POST['e_sagashi'], ENT_QUOTES);
		if($e_sagashi == 'k'){
			$e_sagashi_msg = "ʪ�浪õ�������Τ����Ϥ򤪴ꤤ�������ޤ���";
			$errorflag = 1;
		}
	}
	else{
		$e_sagashi_msg = "ʪ�浪õ�������Τ����Ϥ򤪴ꤤ�������ޤ���";
		$errorflag = 1;
	}
	if($_POST['e_sumai']){
		$e_sumai = htmlspecialchars($_POST['e_sumai'], ENT_QUOTES);
	}
	else{
		$e_sumai_msg = "�����ޤ��Τ����Ϥ򤪴ꤤ�������ޤ���";
		$errorflag = 1;
	}
		if($_POST['e_naiyou1']){
			$e_naiyou1 = htmlspecialchars($_POST['e_naiyou1'], ENT_QUOTES);
			if($e_naiyou1 == 't'){
				$naiyouflag = 1;
			}
			else{//�������ͤ�f
				$e_naiyou1 = 'f';
			}
		}
		else{//�����å�����Ƥ��ʤ����f
				$e_naiyou1 = 'f';
		}
		if($_POST['e_naiyou2']){
			$e_naiyou2 = htmlspecialchars($_POST['e_naiyou2'], ENT_QUOTES);
			if($e_naiyou2 == 't'){
				$naiyouflag = 1;
			}
			else{//�������ͤ�f
				$e_naiyou2 = 'f';
			}
		}
		else{//�����å�����Ƥ��ʤ����f
				$e_naiyou2 = 'f';
		}
		if($_POST['e_naiyou3']){
			$e_naiyou3 = htmlspecialchars($_POST['e_naiyou3'], ENT_QUOTES);
			if($e_naiyou3 == 't'){
				$naiyouflag = 1;
			}
			else{//�������ͤ�f
				$e_naiyou3 = 'f';
			}
		}
		else{//�����å�����Ƥ��ʤ����f
				$e_naiyou3 = 'f';
		}
		if($_POST['e_naiyou4']){
			$e_naiyou4 = htmlspecialchars($_POST['e_naiyou4'], ENT_QUOTES);
			if($e_naiyou4 == 't'){
				$naiyouflag = 1;
			}
			else{//�������ͤ�f
				$e_naiyou4 = 'f';
			}
		}
		else{//�����å�����Ƥ��ʤ����f
				$e_naiyou4 = 'f';
		}
		if($_POST['e_naiyou5']){
			$e_naiyou5 = htmlspecialchars($_POST['e_naiyou5'], ENT_QUOTES);
			if($e_naiyou5 == 't'){
				$naiyouflag = 1;
			}
			else{//�������ͤ�f
				$e_naiyou5 = 'f';
			}
		}
		else{//�����å�����Ƥ��ʤ����f
				$e_naiyou5 = 'f';
		}

		if($naiyouflag != 1){
			$e_naiyou_msg = "���䤤��碌���Ƥ����Ϥ��Ƥ���������";
		}


}

if($errorflag !=1 AND $_POST['sendconfo']){
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=EUC-JP"/>
<meta name="Keywords" content="ƣ�¥��ƥ�������,��Ļ������,���ұ�,����������ܱ�,������̶�,�ޥ󥷥��,��ťޥ󥷥��,����" />
<meta name="Description" content="���ұض᤯�֥���ͥ�ϥ��ี���ȡץޥ󥷥������ʤ顢���������ޥ������쥸�ǥ󥹳������" />
<title>����ͥ�ϥ��ี���ȡ���ťޥ󥷥������ʤ�ե��󎥥���٥��ȥ��ȳ������</title>
<link rel="stylesheet" type="text/css" media="all" href="css/import.css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/smoothscroll.js"></script>
<script type="text/javascript" src="js/jquery.rollover.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/thickbox.js"></script>
</head>
<body>
<div id="header">
  <div class="clear-box">
    <h1><a href="http://www.starmica-r.co.jp/zonnen/index.html"><img src="img/base_logo.gif" alt="����ͥ�ϥ��ี���� ����ťޥ󥷥������ʤ顢���������ޥ������쥸�ǥ󥹳������" width="285" height="59" /></a></h1>
        <div class="right">
          <ul id="mini-navi">
		<li><a href="http://www.starmica-r.co.jp/zonnen/access.html#a2"><img src="img/mini-navi_1_off.gif" alt="���ϰ����" width="68" height="13" /></a></li>
		<li><a href="http://www.starmica-r.co.jp/zonnen/gaiyou.html"><img src="img/mini-navi_3_off.gif" alt="ʪ�ﳵ��" width="56" height="13" /></a></li>
		<li><a href="http://www.fan-invest.co.jp/aboutus.html" target="_blank"><img src="img/mini-navi_2_off.gif" alt="��Ҿ���" width="56" height="13" /></a></li>
          </ul>
          <div class="phone"><a href="https://www.starmica-r.co.jp/zonnen/contactus.php"><img src="img/base_btn_contact.jpg" alt="���䤤��碌����������" width="189" height="30" /></a></div>
        </div>

  </div>
  <!--/box-->
</div>
<!--/header-->
<div id="globalnavi">
  <ul>
    <li><a href="http://www.starmica-r.co.jp/zonnen/index.html"><img src="img/globalnavi_1.gif" alt="�ۡ���" width="182" height="40" /></a></li>
    <li><a href="http://www.starmica-r.co.jp/zonnen/madori.html"><img src="img/globalnavi_2.gif" alt="�ּ��" width="179" height="40" /></a></li>
    <li><a href="http://www.starmica-r.co.jp/zonnen/syuhen.html"><img src="img/globalnavi_3.gif" alt="���մĶ�" width="179" height="40" /></a></li>
    <li><a href="http://www.starmica-r.co.jp/zonnen/access.html"><img src="img/globalnavi_4.gif" alt="��������" width="181" height="40" /></a></li>
    <li><a href="http://www.starmica-r.co.jp/zonnen/gaiyou.html"><img src="img/globalnavi_5.gif" alt="ʪ�ﳵ��" width="179" height="40" /></a></li>
  </ul>
</div>
<!--/globalnavi-->
<hr />
<div id="bukken" class="page1">
  <div id="wrapper">
    <div id="title-area900">
      <h2><img src="img/toiawase_title.jpg" alt="����ͥ�ϥ��ี���� ���䤤��碌����������" width="900" height="140" /></h2>
      <div id="bread-crumb">
        <ul>
          <li><a href="http://www.starmica-r.co.jp/zonnen/index.html">�ۡ���</a></li>
          <li class="arrow">���䤤��碌����������</li>
        </ul>
      </div>
      <!--/bread-crumb-->
    </div>
    <!--/title-area-->
    <div id="container900">
      <div id="content900">
        <h3 class="main-title"><span>���䤤��碌����������</span></h3>
        <div class="sec1 bottom-20">
          <div class="indent-area">
           <p class="bottom-15 top-10">
            <b>�����Ϥ������������Ƥ򤴳�ǧ�ξ塢�����ܥ���򥯥�å����Ƥ���������</b></p>
          </div>
          <!--/indent-area-->
           <p class="bottom-20">
				<FORM method="post" action="">
					<table cellpadding="0" cellspacing="0" width="890" border="0">
					<tr> 
					<td width="340" class="tb2-b" rowspan="2">
					���䤤��碌���ơ�ʣ������ġ�<span class="style7">��</span></td>
					<td width="550" class="tb2">
<?php
	if($e_naiyou1 == 't'){
		print"ʪ���ºݤ˸��Ƥߤ���<br>";
	}
	if($e_naiyou2 == 't'){
		print"�ޤ��ϻ������ᤷ����<br>";
	}
	if($e_naiyou3 == 't'){
		print"���ײ�Υ��ɥХ������ۤ���<br>";
	}
	if($e_naiyou4 == 't'){
		print"��˾���ˤ���ʪ���Ҳ𤷤Ƥۤ���<br>";
	}
	if($e_naiyou5 == 't'){
		print"����¾";
	}
?>
					</td>
					</tr>
					<tr> 
					<td width="550" class="tb2">
					<?=$e_soudan?>
					</td>
					</tr>
					<tr> 
					<td width="340" class="tb2-b"> 
					��̾��<span class="style7">��</span></td>
					<td width="550" class="tb2">
					<?=$e_name?>
					</td>
					</tr>
					<tr> 
					<td width="340" class="tb2-b"> 
					�եꥬ��<span class="style7">��</span></td>
					<td width="550" class="tb2">
					<?=$e_namekana?>
					</td>
					</tr>
					<tr> 
					<td width="340" class="tb2-b">
					�᡼�륢�ɥ쥹<span class="style7">��</span></td>
					<td width="550" class="tb2">
					<?=$e_mail?>
					</td>
					</tr>
					<tr> 
					<td width="340" class="tb2-b">
					͹���ֹ�<span class="style7">��</span></td>
					<td width="550" class="tb2">
					<?=$e_yubin?>
					</td>
					</tr>
					<tr> 
					<td width="340" class="tb2-b">
					������<span class="style7">��</span></td>
					<td width="550" class="tb2">
					<?=$e_address?>
					</td>
					</tr>
					<tr> 
					<td width="340" class="tb2-b">
					�����ֹ�<span class="style7">��</span></td>
					<td width="550" class="tb2">
					<?=$e_tel?>
					</td>
					</tr>
					<tr> 
					<td width="340" class="tb2-b">
					FAX�ֹ�</td>
					<td width="550" class="tb2">
					<?=$e_fax?>
					</td>
					</tr>
					<tr> 
					<td width="340" class="tb2-b">
					��ǯ����<span class="style7">��</span></td>
					<td width="550" class="tb2">
					<?=$e_birthday?>
					</td>
					</tr>
					<tr> 
					<td width="340" class="tb2-b">
					���ߤΤ����ޤ�<span class="style7">��</span></td>
					<td width="550" class="tb2">
<?php
	if($e_sumai == 1){
		print"���ߥޥ󥷥��";
	}
	elseif($e_sumai == 2){
		print"���߸ͷ�";
	}
	elseif($e_sumai == 3){
		print"���ʽ�ͭ�ޥ󥷥��";
	}
	elseif($e_sumai == 4){
		print"���ʽ�ͭ�ͷ�";
	}
	elseif($e_sumai == 5){
		print"����¾";
	}
?>
					</td>
					</tr>
					<tr> 
					<td width="340" class="tb2-b">
					ʪ�浪õ������<span class="style7">��</span></td>
					<td width="550" class="tb2">
<?php
			if($e_sagashi == 1){
				print"�ɤ�ʪ�郎����Ф����˹���������";
			}
			elseif($e_sagashi == 2){
				print"��ǯ����ˤϹ���������";
			}
			elseif($e_sagashi == 3){
				print"�������ǤϤʤ�����������Ϲ���������";
			}
			elseif($e_sagashi == 4){
				print"���߽���Ǥ���Ȥ������Ѥ����㤤�ؤ�����";
			}
?>
					</td>
					</tr>
					<tr> 
					<td width="340" class="tb2-b">
					������ĺ������HP���Τ�ˤʤ�ޤ�������<span class="style7">��</span></td>
					<td width="550" class="tb2">
<?php
	if($e_kikkake == 1){
		print"YAHOO����ư��";
	}
	elseif($e_kikkake == 2){
		print"SUUMO";
	}
	elseif($e_kikkake == 3){
		print"HOME'S";
	}
	elseif($e_kikkake == 4){
		print"���åȥۡ���";
	}
	elseif($e_kikkake == 5){
		print"���������ޥ������쥸�ǥ󥹡��ۡ���ڡ���";
	}
	elseif($e_kikkake == 6){
		print"����¾���󥿡��ͥåȥ�����";
	}
	elseif($e_kikkake == 7){
		print"��ʹ�޹�����";
	}
	elseif($e_kikkake == 8){
		print"�ݥ��Ȥ���ȡ����Ƥ�������";
	}
	elseif($e_kikkake == 9){
		print"�ο͡�ͧ�����ξҲ�";
	}
	elseif($e_kikkake == 10){
		print"��Ƭ���ۥ��饷";
	}
	elseif($e_kikkake == 11){
		print"����¾";
	}
?>
					</td>
					</tr>
					<tr> 
					<td width="340" class="tb2-b">
					�������򤤤��᤯�᡼��Ǥ��Ϥ����Ƥ���ޤ���<br>�᡼����˾����ޤ�����<span class="style7">��</span></td>
					<td width="550" class="tb2">
<?php
	if($e_melmaga == 1){
		print"��˾����";
	}
	elseif($e_melmaga == 2){
		print"��˾���ʤ�";
	}
?>
					</td>
					</tr>
					</table>
<br>
					<table width="890">
					<tr> 
					<td align="center" colspan="2" class="tb2-c"> 
					�Ŀ;���μ�갷���ˤĤ���
					</td>
					</tr>
					<td align="center" colspan="2" class="tb2"> 
<center>���ҤθĿ;���μ谷���ˤĤ��Ƥ�<a href="http://www.starmica-r.co.jp/privacy.php" target="_blank"><b>������</b></a>���̥�����ɥ��ˤ�������������<br>
�嵭��<a href="http://www.starmica-r.co.jp/privacy.php" target="_blank"><b>�ظĿ;���μ�갷����</b></a>�����Ƥ�Ʊ�դ�������ϡ�����<b> [Ʊ�դ�������] </b>�Υܥ���򥯥�å����Ʋ�������</center>
					</td>
					</tr>
					<tr> 
					<td align="center" colspan="2" height="60"> 
					<input type="submit" name="sendgo" value="Ʊ�դ�������">
					</td>
					</tr>
					</table>
			</p>
					<input type="hidden" name="e_naiyou1" value="<?=$e_naiyou1?>">
					<input type="hidden" name="e_naiyou2" value="<?=$e_naiyou2?>">
					<input type="hidden" name="e_naiyou3" value="<?=$e_naiyou3?>">
					<input type="hidden" name="e_naiyou4" value="<?=$e_naiyou4?>">
					<input type="hidden" name="e_naiyou5" value="<?=$e_naiyou5?>">
					<input type="hidden" name="e_soudan" value="<?=$e_soudan?>">
					<input type="hidden" name="e_name" value="<?=$e_name?>">
					<input type="hidden" name="e_namekana" value="<?=$e_namekana?>">
					<input type="hidden" name="e_mail" value="<?=$e_mail?>">
					<input type="hidden" name="e_yubin" value="<?=$e_yubin?>">
					<input type="hidden" name="e_address" value="<?=$e_address?>">
					<input type="hidden" name="e_tel" value="<?=$e_tel?>">
					<input type="hidden" name="e_fax" value="<?=$e_fax?>">
					<input type="hidden" name="e_birthday" value="<?=$e_birthday?>">
					<input type="hidden" name="e_sumai" value="<?=$e_sumai?>">
					<input type="hidden" name="e_sagashi" value="<?=$e_sagashi?>">
					<input type="hidden" name="e_kikkake" value="<?=$e_kikkake?>">
					<input type="hidden" name="e_melmaga" value="<?=$e_melmaga?>">
				</FORM>


          </div>
          <!--/indent-area-->
        </div>
        <!--/sec1-->

<!--/
        <div class="sec2 bottom-20">

          <h4 class="sub-title2"><span></span></h4>
        <p class="bottom-15">
sec1-->


        <p id="page-top"><a href="#header"><img src="img/base_pagetop.gif" alt="���Υڡ�������Ƭ��" width="119" height="12" /></a></p>
      </div>
      <!--/content-->

    </div>
    <!--/container-->
  </div>
  <!--/wrapper-->
</div>
<!--/top-->
<hr />
<div id="footer">
  <div class="item2">
    <div class="clear-box">
    <ul>
        <li class="first"><a href="http://www.starmica-r.co.jp/zonnen/index.html">�ۡ���</a></li>
        <li><a href="http://www.starmica-r.co.jp/zonnen/access.html#a2">���ϰ����</a></li>
        <li><a href="http://www.starmica-r.co.jp/zonnen/gaiyou.html">ʪ�ﳵ��</a></li>
        <li><a href="http://www.starmica-r.co.jp/privacy.php" target="_blank">�Ŀ;����ݸ�����</a></li>
        <li><a href="https://www.starmica-r.co.jp/zonnen/contactus.php">���䤤��碌</a></li>
    </ul>
    <p class="copy">Copyright &copy;  STAR MICA Residence Co.,Ltd. All rights reserved.</p>
    </div>
    <!--clear-box-->
  </div>
  <!--item1-->

</div>
<!--/footer-->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-37551884-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>


<?php
}
elseif($errmsg !=1 AND $_POST['sendgo']){
			if($e_naiyou1 == 't'){
				$e_naiyou1_h = "ʪ���ºݤ˸��Ƥߤ���";
			}
			elseif($e_naiyou1 == 't'){
				$e_naiyou1_h = "";
			}
			if($e_naiyou2 == 't'){
				$e_naiyou2_h = "�ޤ��ϻ������ᤷ����";
			}
			elseif($e_naiyou2 == 't'){
				$e_naiyou2_h = "";
			}
			if($e_naiyou3 == 't'){
				$e_naiyou3_h = "���ײ�Υ��ɥХ������ۤ���";
			}
			elseif($e_naiyou3 == 't'){
				$e_naiyou3_h = "";
			}
			if($e_naiyou4 == 't'){
				$e_naiyou4_h = "��˾���ˤ���ʪ���Ҳ𤷤Ƥۤ���";
			}
			elseif($e_naiyou4 == 't'){
				$e_naiyou4_h = "";
			}
			if($e_naiyou5 == 't'){
				$e_naiyou5_h = "����¾";
			}
			elseif($e_naiyou5 == 't'){
				$e_naiyou5_h = "";
			}

			if($e_sumai == 1){
				$e_sumai_h = "���ߥޥ󥷥��";
			}
			elseif($e_sumai == 2){
				$e_sumai_h = "���߸ͷ�";
			}
			elseif($e_sumai == 3){
				$e_sumai_h = "���ʽ�ͭ�ޥ󥷥��";
			}
			elseif($e_sumai == 4){
				$e_sumai_h = "���ʽ�ͭ�ͷ�";
			}
			elseif($e_sumai == 5){
				$e_sumai_h = "����¾";
			}
			if($e_sagashi == 1){
				$e_sagashi_h = "�ɤ�ʪ�郎����Ф����˹���������";
			}
			elseif($e_sagashi == 2){
				$e_sagashi_h = "��ǯ����ˤϹ���������";
			}
			elseif($e_sagashi == 3){
				$e_sagashi_h = "�������ǤϤʤ�����������Ϲ���������";
			}
			elseif($e_sagashi == 4){
				$e_sagashi_h = "���߽���Ǥ���Ȥ������Ѥ����㤤�ؤ�����";
			}

			if($e_kikkake == 1){
				$e_kikkake_h = "YAHOO����ư��";
			}
			elseif($e_kikkake == 2){
				$e_kikkake_h = "SUUMO";
			}
			elseif($e_kikkake == 3){
				$e_kikkake_h = "HOME'S";
			}
			elseif($e_kikkake == 4){
				$e_kikkake_h = "���åȥۡ���";
			}
			elseif($e_kikkake == 5){
				$e_kikkake_h = "���������ޥ������쥸�ǥ󥹡��ۡ���ڡ���";
			}
			elseif($e_kikkake == 6){
				$e_kikkake_h = "����¾���󥿡��ͥåȥ�����";
			}
			elseif($e_kikkake == 7){
				$e_kikkake_h = "��ʹ�޹�����";
			}
			elseif($e_kikkake == 8){
				$e_kikkake_h = "�ݥ��Ȥ���ȡ����Ƥ�������";
			}
			elseif($e_kikkake == 9){
				$e_kikkake_h = "�Ҳ�";
			}
			elseif($e_kikkake == 10){
				$e_kikkakeu_h = "��Ƭ���ۥ��饷";
			}
			elseif($e_kikkake == 11){
				$e_kikkake_h = "����¾";
			}
			if($e_melmaga == 1){
				$e_melmaga_h = "��˾����";
			}
			elseif($e_melmaga == 2){
				$e_melmaga_h = "��˾���ʤ�";
			}

	//-----------------------------
	//����ԤؤΥ᡼��
	//-----------------------------

	$ouboto = "toiawase@starmica.co.jp";



	$oubosubject = "����ͥ�ϥ��ี���ȣȣФ�ꤪ�䤤��碌";
	$oubomessage = <<<_EOT_

�����䤤��碌������������������
��������������������������������������������������������������������
��������ϰʲ����̤�Ǥ���


������礻���ơ�ʣ������ġˡ�
$e_naiyou1_h
$e_naiyou2_h
$e_naiyou3_h
$e_naiyou4_h
$e_naiyou5_h
������¾��������
$e_soudan

����̾������$e_name

���եꥬ�ʡ���$e_namekana

���᡼�륢�ɥ쥹����$e_mail

��͹���ֹ桡��$e_yubin

�������ꡧ��$e_address

�������ֹ桧��$e_tel

��FAX�ֹ桧��$e_fax

����ǯ��������$e_birthday

�����ߤΤ����ޤ�����$e_sumai_h

��ʪ��õ��������
$e_sagashi_h

��������ĺ������HP���Τ�ˤʤ�ޤ���������
$e_kikkake_h

���᡼���ۿ���$e_melmaga_h

��������������������������������������������������������������������

_EOT_;

	$ouboadd_header = "From:toiawase@starmica.co.jp";
	$oubosubject = preg_replace("/^(\s|��)+$/", "", $oubosubject);
	$oubosubject = strip_tags($oubosubject);
	$oubosubject = stripslashes($oubosubject);
	$oubosubject = mb_convert_kana($oubosubject, "KV");

	$oubomessage = preg_replace("/^(\s|��)+$/", "", $oubomessage);
	//HTML������PHP�����������
	$oubomessage = strip_tags($oubomessage);
	//���������פ��줿ʸ�����᤹
	$oubomessage = stripslashes($oubomessage);
	//Ⱦ�ѥ������ʤ����ѥ������ʡ������դ���ʸ�����ʸ����
	$oubomessage = mb_convert_kana($oubomessage, "KV");

	mb_language("Japanese");
	mb_internal_encoding("EUC-JP");
	$oubomailresult = mb_send_mail($ouboto,$oubosubject,$oubomessage,$ouboadd_header);
	//�̥ڡ���������
	header("Location:thanks_inquiry1.html");

exit();

}
else{


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=EUC-JP"/>
<meta name="Keywords" content="�ޥ󥷥��,��ťޥ󥷥��,����" />
<meta name="Description" content="����ͥ�ϥ��ี���ȥޥ󥷥������ʤ顢���������ޥ������쥸�ǥ󥹳������" />
<title>���䤤��碌����������å���ͥ�ϥ��ี���ȥ������ȥ����ȡ���ťޥ󥷥������ʤ�ե��󎥥���٥��ȥ��ȳ������</title>
<link rel="stylesheet" type="text/css" media="all" href="css/import.css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/smoothscroll.js"></script>
<script type="text/javascript" src="js/jquery.rollover.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/thickbox.js"></script>
</head>
<body>
<div id="header">
  <div class="clear-box">
    <h1><a href="http://www.starmica-r.co.jp/zonnen/index.html"><img src="img/base_logo.gif" alt="����ͥ�ϥ��ี���� ����ťޥ󥷥������ʤ顢���������ޥ������쥸�ǥ󥹳������" width="285" height="59" /></a></h1>
        <div class="right">
          <ul id="mini-navi">
		<li><a href="http://www.starmica-r.co.jp/zonnen/access.html#a2"><img src="img/mini-navi_1_off.gif" alt="���ϰ����" width="68" height="13" /></a></li>
		<li><a href="http://www.starmica-r.co.jp/zonnen/gaiyou.html"><img src="img/mini-navi_3_off.gif" alt="ʪ�ﳵ��" width="56" height="13" /></a></li>
		<li><a href="http://www.starmica-r.co.jp/corprateprofile.php" target="_blank"><img src="img/mini-navi_2_off.gif" alt="��Ҿ���" width="56" height="13" /></a></li>
          </ul>
          <div class="phone"><a href="https://www.starmica-r.co.jp/zonnen/contactus.php"><img src="img/base_btn_contact.jpg" alt="���䤤��碌����������" width="189" height="30" /></a></div>
        </div>

  </div>
  <!--/box-->
</div>
<!--/header-->
<div id="globalnavi">
  <ul>
    <li><a href="http://www.starmica-r.co.jp/zonnen/index.html"><img src="img/globalnavi_1.gif" alt="�ۡ���" width="182" height="40" /></a></li>
    <li><a href="http://www.starmica-r.co.jp/zonnen/madori.html"><img src="img/globalnavi_2.gif" alt="�ּ��" width="179" height="40" /></a></li>
    <li><a href="http://www.starmica-r.co.jp/zonnen/syuhen.html"><img src="img/globalnavi_3.gif" alt="���մĶ�" width="179" height="40" /></a></li>
    <li><a href="http://www.starmica-r.co.jp/zonnen/access.html"><img src="img/globalnavi_4.gif" alt="��������" width="181" height="40" /></a></li>
    <li><a href="http://www.starmica-r.co.jp/zonnen/gaiyou.html"><img src="img/globalnavi_5.gif" alt="ʪ�ﳵ��" width="179" height="40" /></a></li>
  </ul>
</div>
<!--/globalnavi-->
<hr />
<div id="bukken" class="page1">
  <div id="wrapper">
    <div id="title-area900">
      <h2><img src="img/toiawase_title.jpg" alt="����ͥ�ϥ��ี���� ���䤤��碌����������" width="900" height="140" /></h2>
      <div id="bread-crumb">
        <ul>
          <li><a href="http://www.starmica-r.co.jp/zonnen/index.html">�ۡ���</a></li>
          <li class="arrow">���䤤��碌����������</li>
        </ul>
      </div>
      <!--/bread-crumb-->
    </div>
    <!--/title-area-->
    <div id="container900">
      <div id="content900">
        <h3 class="main-title"><span>���䤤��碌����������</span></h3>
        <div class="sec1 bottom-20">
          <div class="indent-area">
           <p class="bottom-15 top-10">
            <b>�������ܤ����Ϥ�������������<span class="style7">��</span>����ɬ�ܹ��ܤȤʤäƤ���ޤ���</b></p>
          </div>
          <!--/indent-area-->
           <p class="bottom-20">
				<FORM method="post" action="">
					<table cellpadding="0" cellspacing="0" width="890" border="0">
					<tr> 
					<td width="340" class="tb2-b" rowspan="2"> 
					���䤤��碌���ơ�ʣ������ġ�<span class="style7">��</span></td>
					<td width="550" class="tb2-d">
<?php
	if($e_naiyou1 == 't'){
?>
					<input type="checkbox" name="e_naiyou1" value="t" TABINDEX="1" checked>
<?php
	}
	else{
?>
					<input type="checkbox" name="e_naiyou1" value="t" TABINDEX="1">
<?php
	}
?>
					ʪ���ºݤ˸��Ƥߤ���<br>
<?php
	if($e_naiyou2 == 't'){
?>
					<input type="checkbox" name="e_naiyou2" value="t" TABINDEX="2" checked>
<?php
	}
	else{
?>
					<input type="checkbox" name="e_naiyou2" value="t" TABINDEX="2">
<?php
	}
?>
					�ޤ��ϻ������ᤷ����<br>
<?php
	if($e_naiyou3 == 't'){
?>
					<input type="checkbox" name="e_naiyou3" value="t" TABINDEX="3" checked>
<?php
	}
	else{
?>
					<input type="checkbox" name="e_naiyou3" value="t" TABINDEX="3">
<?php
	}
?>
					���ײ�Υ��ɥХ������ۤ���<br>
<?php
	if($e_naiyou4 == 't'){
?>
					<input type="checkbox" name="e_naiyou"4 value="t" TABINDEX="4" checked>
<?php
	}
	else{
?>
					<input type="checkbox" name="e_naiyou4" value="t" TABINDEX="4">
<?php
	}
?>
					��˾���ˤ���ʪ���Ҳ𤷤Ƥۤ���<br>
<?php
	if($e_naiyou5 == 't'){
?>
					<input type="checkbox" name="e_naiyou5" value="t" TABINDEX="5" checked>
<?php
	}
	else{
?>
					<input type="checkbox" name="e_naiyou5" value="t" TABINDEX="5">
<?php
	}
?>
					����¾����˾���������ޤ����顢�����ؤ�������������
					</td>
					</tr>
					<tr> 
					<td width="550" class="tb2-a">
					<TEXTAREA name="e_soudan" style="width:500px" rows="10" TABINDEX="6"><?=$e_soudan?></TEXTAREA>
					</td>
					</tr>
<?php
	if($e_naiyou_msg){
?>
					<tr>
					<td class="tb2" colspan="2" bgcolor="#FFFFFF">
					<span class="style7-left"><?=$e_naiyou_msg?></span>
			                </td>
					</tr>
<?php
	}
?>
<?php
	if($e_soudan_msg){
?>
					<tr>
					<td class="tb2" colspan="2" bgcolor="#FFFFFF">
					<span class="style7-left"><?=$e_soudan_msg?></span>
			                </td>
					</tr>
<?php
	}
?>
					<tr> 
					<td width="300" class="tb2-b"> 
					��̾��<span class="style7">��</span></td>
					<td width="550" class="tb2" bgcolor="#ffffff">
					<input type="text" name="e_name" style="width:300px" value="<?=$e_name?>" TABINDEX="7">&nbsp;����˹��衡��Ϻ
					</td>
					</tr>
<?php
	if($e_name_msg){
?>
					<tr>
					<td class="tb2" colspan="2" bgcolor="#FFFFFF">
					<span class="style7-left"><?=$e_name_msg?></span>
			                </td>
					</tr>
<?php
	}
?>
					<tr> 
					<td width="300" class="tb2-b"> 
					�եꥬ��<span class="style7">��</span></td>
					<td width="550" class="tb2" bgcolor="#ffffff">
					<input type="text" name="e_namekana" style="width:300px" value="<?=$e_namekana?>" TABINDEX="8">&nbsp;����˥ߥʥȥ���������
					</td>
					</tr>
<?php
	if($e_namekana_msg){
?>
					<tr>
					<td class="tb2" colspan="2" bgcolor="#FFFFFF">
					<span class="style7-left"><?=$e_namekana_msg?></span>
			                </td>
					</tr>
<?php
	}
?>

					<tr> 
					<td width="300"  class="tb2-b">
					�᡼�륢�ɥ쥹<span class="style7">��</span></td>
					<td width="550" class="tb2">
					<input type="text" name="e_mail" style="width:300px; ime-mode:disabled" value="<?=$e_mail?>" TABINDEX="9">&nbsp;�����info@starmica-r.co.jp
					</td>
					</tr>
<?php
	if($e_mail_msg){
?>
					<tr>
					<td class="tb2" colspan="2" bgcolor="#FFFFFF">
					<span class="style7-left"><?=$e_mail_msg?></span>
			                </td>
					</tr>
<?php
	}
?>
					<tr> 
					<td width="300"  class="tb2-b">
					�᡼�륢�ɥ쥹�ʳ�ǧ�Τ���⤦�������Ϥ��Ʋ�������<span class="style7">��</span></td>
					<td width="550" class="tb2">
					<input type="text" name="e_mail2" style="width:300px; ime-mode:disabled" value="<?=$e_mail2?>" TABINDEX="10">&nbsp;�����info@starmica-r.co.jp
					</td>
					</tr>
<?php
	if($e_mail2_msg){
?>
					<tr>
					<td class="tb2" colspan="2" bgcolor="#FFFFFF">
					<span class="style7-left"><?=$e_mail2_msg?></span>
			                </td>
					</tr>
<?php
	}
?>

					<tr> 
					<td width="300" class="tb2-b">
					͹���ֹ�<span class="style7">��</span></td>
					<td width="550" class="tb2" bgcolor="#ffffff">
					<input type="text" name="e_yubin" style="width:200px" value="<?=$e_yubin?>" TABINDEX="11">&nbsp;�����105-6028
					</td>
					</tr>
<?php
	if($e_yubin_msg){
?>
					<tr>
					<td class="tb2" colspan="2" bgcolor="#FFFFFF">
					<span class="style7-left"><?=$e_yubin_msg?></span>
			                </td>
					</tr>
<?php
	}
?>
					<tr> 
					<td width="300" class="tb2-b"> 
					������<span class="style7">��</span></td>
					<td width="550" class="tb2" bgcolor="#ffffff">
					<input type="text" name="e_address" style="width:500px" value="<?=$e_address?>" TABINDEX="12"><br>���������Թ���ץ���4-3-1���뻳�ȥ饹�ȥ��28��
					</td>
					</tr>
<?php
	if($e_address_msg){
?>
					<tr>
					<td class="tb2" colspan="2" bgcolor="#FFFFFF">
					<span class="style7-left"><?=$e_address_msg?></span>
			                </td>
					</tr>
<?php
	}
?>

					<tr> 
					<td width="300" class="tb2-b">
					�����ֹ�<span class="style7">��</span></td>
					<td width="550" class="tb2" bgcolor="#ffffff">
					<input type="text" name="e_tel" style="width:200px" value="<?=$e_tel?>" TABINDEX="13">&nbsp;�����03-5776-2688
					</td>
					</tr>
<?php
	if($e_tel_msg){
?>
					<tr>
					<td class="tb2" colspan="2" bgcolor="#FFFFFF">
					<span class="style7-left"><?=$e_tel_msg?></span>
			                </td>
					</tr>
<?php
	}
?>
					<tr> 
					<td width="300" class="tb2-b">
					FAX�ֹ�</td>
					<td width="550" class="tb2" bgcolor="#ffffff">
					<input type="text" name="e_fax" style="width:200px" value="<?=$e_fax?>" TABINDEX="14">&nbsp;�����03-1234-5678
					</td>
					</tr>
<?php
	if($e_fax_msg){
?>
					<tr>
					<td class="tb2" colspan="2" bgcolor="#FFFFFF">
					<span class="style7-left"><?=$e_fax_msg?></span>
			                </td>
					</tr>
<?php
	}
?>
					<tr> 
					<td width="300" class="tb2-b">
					��ǯ����<span class="style7">��</span></td>
					<td width="550" class="tb2" bgcolor="#ffffff">
					<input type="text" name="e_birthday" style="width:200px" value="<?=$e_birthday?>" TABINDEX="15">&nbsp;�����1980/01/01
					</td>
					</tr>
<?php
	if($e_birthday_msg){
?>
					<tr>
					<td class="tb2" colspan="2" bgcolor="#FFFFFF">
					<span class="style7-left"><?=$e_birthday_msg?></span>
			                </td>
					</tr>
<?php
	}
?>

					<tr> 
					<td width="300" class="tb2-b">
					���ߤΤ����ޤ�<span class="style7">��</span></td>
					<td width="550" class="tb2" bgcolor="#ffffff">
<?php
	if($e_sumai == 1){
?>
					<input type="radio" name="e_sumai" value="1" TABINDEX="16" checked>
<?php
	}
	else{
?>
					<input type="radio" name="e_sumai" value="1" TABINDEX="16">
<?php
	}
?>
					���ߥޥ󥷥��
<?php
	if($e_sumai == 2){
?>
					<input type="radio" name="e_sumai" value="2" TABINDEX="17" checked>
<?php
	}
	else{
?>
					<input type="radio" name="e_sumai" value="2" TABINDEX="17">
<?php
	}
?>
					���߸ͷ�
<?php
	if($e_sumai == 3){
?>
					<input type="radio" name="e_sumai" value="3" TABINDEX="18" checked>
<?php
	}
	else{
?>
					<input type="radio" name="e_sumai" value="3" TABINDEX="18">
<?php
	}
?>
					���ʽ�ͭ�ޥ󥷥��
<?php
	if($e_sumai == 4){
?>
					<input type="radio" name="e_sumai" value="4" TABINDEX="19" checked>
<?php
	}
	else{
?>
					<input type="radio" name="e_sumai" value="4" TABINDEX="19">
<?php
	}
?>
					���ʽ�ͭ�ͷ�
<?php
	if($e_sumai == 5){
?>
					<input type="radio" name="e_sumai" value="5" TABINDEX="20" checked>
<?php
	}
	else{
?>
					<input type="radio" name="e_sumai" value="5" TABINDEX="20">
<?php
	}
?>
					����¾
					</td>
					</tr>
<?php
	if($e_sumai_msg){
?>
					<tr>
					<td class="tb2" colspan="2" bgcolor="#FFFFFF">
					<span class="style7-left"><?=$e_sumai_msg?></span>
			                </td>
					</tr>
<?php
	}
?>

					<tr>
					<td width="300"  class="tb2-b">
					ʪ�浪õ������<span class="style7">��</span></td>
					<td width="550" class="tb2" bgcolor="#ffffff">
				<select name="e_sagashi" TABINDEX="16">
<?php
				print"<option value='k'>---</option>";

				if($e_sagashi == 1){
?>
				<option value ='1' selected>�ɤ�ʪ�郎����Ф����˹���������</option>
<?php
				}
				else{
?>
				<option value ='1'>�ɤ�ʪ�郎����Ф����˹���������</option>
<?php
				}
				if($e_sagashi == 2){
?>
				<option value ='2' selected>��ǯ����ˤϹ���������</option>
<?php
				}
				else{
?>
				<option value ='2'>��ǯ����ˤϹ���������</option>
<?php
				}
				if($e_sagashi == 3){
?>
				<option value ='3' selected>�������ǤϤʤ�����������Ϲ���������</option>
<?php
				}
				else{
?>
				<option value ='3'>�������ǤϤʤ�����������Ϲ���������</option>
<?php
				}
				if($e_sagashi == 4){
?>
				<option value ='4' selected>���߽���Ǥ���Ȥ������Ѥ����㤤�ؤ�����</option>
<?php
				}
				else{
?>
				<option value ='4'>���߽���Ǥ���Ȥ������Ѥ����㤤�ؤ�����</option>
<?php
				}
?>
					</td>
					</tr>
<?php
	if($e_sagashi_msg){
?>
					<tr>
					<td class="tb2" colspan="2" bgcolor="#FFFFFF">
					<span class="style7-left"><?=$e_sagashi_msg?></span>
			                </td>
					</tr>
<?php
	}
?>
					<tr> 
					<td width="300"  class="tb2-b">
					������ĺ������HP���Τ�ˤʤ�ޤ�������<span class="style7">��</span></td>
					<td width="550" class="tb2" bgcolor="#ffffff">
<span class="style5">�����󥿡��ͥå�</span><br>
<?php
	if($e_kikkake == 1){
?>
					<input type="radio" name="e_kikkake" value="1" TABINDEX="21" checked>
<?php
	}
	else{
?>
					<input type="radio" name="e_kikkake" value="1" TABINDEX="21">
<?php
	}
?>
					YAHOO����ư��&nbsp;&nbsp;
<?php
	if($e_kikkake == 2){
?>
					<input type="radio" name="e_kikkake" value="2" TABINDEX="22" checked>
<?php
	}
	else{
?>
					<input type="radio" name="e_kikkake" value="2" TABINDEX="22">
<?php
	}
?>
					SUUMO&nbsp;&nbsp;
<?php
	if($e_kikkake == 3){
?>
					<input type="radio" name="e_kikkake" value="3" TABINDEX="23" checked>
<?php
	}
	else{
?>
					<input type="radio" name="e_kikkake" value="3" TABINDEX="23">
<?php
	}
?>
					HOME'S&nbsp;&nbsp;
<?php
	if($e_kikkake == 4){
?>
					<input type="radio" name="e_kikkake" value="4" TABINDEX="24" checked>
<?php
	}
	else{
?>
					<input type="radio" name="e_kikkake" value="4" TABINDEX="24">
<?php
	}
?>
					���åȥۡ���<br>
<?php
	if($e_kikkake == 5){
?>
					<input type="radio" name="e_kikkake" value="5" TABINDEX="25" checked>
<?php
	}
	else{
?>
					<input type="radio" name="e_kikkake" value="5" TABINDEX="25">
<?php
	}
?>
					���������ޥ������쥸�ǥ󥹡��ۡ���ڡ���&nbsp;&nbsp;
<?php
	if($e_kikkake == 6){
?>
					<input type="radio" name="e_kikkake" value="6" TABINDEX="26" checked>
<?php
	}
	else{
?>
					<input type="radio" name="e_kikkake" value="6" TABINDEX="26">
<?php
	}
?>
					����¾���󥿡��ͥåȥ�����<br>
<span class="style5">�����󥿡��ͥåȰʳ�</span><br>
<?php
	if($e_kikkake == 7){
?>
					<input type="radio" name="e_kikkake" value="7" TABINDEX="27" checked>
<?php
	}
	else{
?>
					<input type="radio" name="e_kikkake" value="7" TABINDEX="27">
<?php
	}
?>
					��ʹ�޹�����&nbsp;&nbsp;
<?php
	if($e_kikkake == 8){
?>
					<input type="radio" name="e_kikkake" value="8" TABINDEX="28" checked>
<?php
	}
	else{
?>
					<input type="radio" name="e_kikkake" value="8" TABINDEX="28">
<?php
	}
?>
					�ݥ��Ȥ���ȡ����Ƥ�������&nbsp;&nbsp;
<?php
	if($e_kikkake == 9){
?>
					<input type="radio" name="e_kikkake" value="9" TABINDEX="29" checked>
<?php
	}
	else{
?>
					<input type="radio" name="e_kikkake" value="9" TABINDEX="29">
<?php
	}
?>
					�Ҳ�&nbsp;&nbsp;
<?php
	if($e_kikkake == 10){
?>
					<input type="radio" name="e_kikkake" value="10" TABINDEX="30" checked>
<?php
	}
	else{
?>
					<input type="radio" name="e_kikkake" value="10" TABINDEX="30">
<?php
	}
?>
					��Ƭ���ۥ��饷&nbsp;&nbsp;
<?php
	if($e_kikkake == 11){
?>
					<input type="radio" name="e_kikkake" value="11" TABINDEX="31" checked>
<?php
	}
	else{
?>
					<input type="radio" name="e_kikkake" value="11" TABINDEX="31">
<?php
	}
?>
					����¾
					</td>
					</tr>
<?php
	if($e_kikkake_msg){
?>
					<tr>
					<td class="tb2" colspan="2" bgcolor="#FFFFFF">
					<span class="style7-left"><?=$e_kikkake_msg?></span>
			                </td>
					</tr>
<?php
	}
?>

					<tr> 
					<td width="300"  class="tb2-b">
					�������򤤤��᤯�᡼��Ǥ��Ϥ����Ƥ���ޤ���<br>�᡼����˾����ޤ�����<span class="style7">��</span></td>
					<td width="550" class="tb2">
<?php
	if($e_melmaga == 1){
?>
					<input type="radio" name="e_melmaga" value="1" TABINDEX="32" checked>
<?php
	}
	else{
?>
					<input type="radio" name="e_melmaga" value="1" TABINDEX="32">
<?php
	}
?>
					��˾����
<?php
	if($e_melmaga == 2){
?>
					<input type="radio" name="e_melmaga" value="2" TABINDEX="33" checked>
<?php
	}
	else{
?>
					<input type="radio" name="e_melmaga" value="2" TABINDEX="33">
<?php
	}
?>
					��˾���ʤ�
					<BR>����������ǿ�����ư�������᡼��ˤƤ����ꤤ�����ޤ���
					</td>
					</tr>
<?php
	if($e_melmaga_msg){
?>
					<tr>
					<td class="tb2" colspan="2" bgcolor="#FFFFFF">
					<span class="style7-left"><?=$e_melmaga_msg?></span>
			                </td>
					</tr>
<?php
	}
?>
					</table>
<br>
					<table width="890">
					<tr> 
					<td align="center" colspan="2" class="tb2-c"> 
					�Ŀ;���μ�갷���ˤĤ���
					</td>
					</tr>
					<td align="center" colspan="2" class="tb2"> 
<center>���ҤθĿ;���μ谷���ˤĤ��Ƥ�<a href="http://www.starmica-r.co.jp/privacy.php" target="_blank"><b>������</b></a>���̥�����ɥ��ˤ�������������<br>
�嵭��<a href="http://www.starmica-r.co.jp/privacy.php" target="_blank"><b>�ظĿ;���μ�갷����</b></a>�����Ƥ�Ʊ�դ�������ϡ�����<b> [Ʊ�դ�������] </b>�Υܥ���򥯥�å����Ʋ�������</center>
					</td>
					</tr>
					<tr> 
					<td align="center" colspan="2" height="60"> 
					<input type="submit" name="sendconfo" value="Ʊ�դ�������">
					</td>
					</tr>
					</table>
				</FORM>



        </div>
        <!--/sec1-->


        <p id="page-top"><a href="#header"><img src="img/base_pagetop.gif" alt="���Υڡ�������Ƭ��" width="119" height="12" /></a></p>
      </div>
      <!--/content-->

    </div>
    <!--/container-->
  </div>
  <!--/wrapper-->
</div>
<!--/top-->
<hr />
<div id="footer">
  <div class="item2">
    <div class="clear-box">
    <ul>
        <li class="first"><a href="http://www.starmica-r.co.jp/zonnen/index.html">�ۡ���</a></li>
        <li><a href="http://www.starmica-r.co.jp/zonnen/access.html#a2">���ϰ����</a></li>
        <li><a href="http://www.starmica-r.co.jp/zonnen/gaiyou.html">ʪ�ﳵ��</a></li>
        <li><a href="http://www.starmica-r.co.jp/privacy.php" target="_blank">�Ŀ;����ݸ�����</a></li>
        <li><a href="https://www.starmica-r.co.jp/zonnen/contactus.php">���䤤��碌</a></li>
    </ul>
    <p class="copy">Copyright &copy;  STAR MICA Residence Co.,Ltd. All rights reserved.</p>
    </div>
    <!--clear-box-->
  </div>
  <!--item1-->

</div>
<!--/footer-->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-37551884-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
<?php
	exit();
}
?>
