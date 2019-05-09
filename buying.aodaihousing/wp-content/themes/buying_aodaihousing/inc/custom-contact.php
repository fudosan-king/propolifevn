<?php

	function register_custom_menu_page() {
	    add_menu_page('custom menu title', 'Contacts', 'add_users', 'contactpage', '_custom_menu_page', 'dashicons-email-alt', 6); 
	}

	add_action('admin_menu', 'register_custom_menu_page');

	function send_smtp_email( $phpmailer ) {
		//Server settings
		$phpmailer->isSMTP();
		$phpmailer->Host       = 'smtp.gmail.com';
		$phpmailer->SMTPAuth   = true;
		$phpmailer->Port       = 465;
		$phpmailer->Username   = 'propolifevn@gmail.com';
		$phpmailer->Password   = 'qqawtigjgfesgien';
		$phpmailer->SMTPSecure = 'ssl';
		$phpmailer->FromName   = '売買サイトの反響';

	}

	add_action( 'phpmailer_init', 'send_smtp_email' );

	function contact_submit_form() {
	    /**
	     * At this point, $_GET/$_POST variable are available
	     */ 
	    
	    global $wpdb;
	    date_default_timezone_set('Asia/Ho_Chi_Minh');
	    $redirect = '/aodaihousing/finish/';
	 	$table = "wp_contacts";
		$store_arr["estates_name"] = $_POST['estates_name'];
		$store_arr["customer_name"] = $_POST['customer_name'];
		$store_arr["address"] = $_POST['address'];
		$store_arr["number_phone"] = $_POST['number_phone'];
		$store_arr["create_date"] = date('Y-m-d H:i:s');
		$store_arr["email"] = $_POST['email'];
		if($_POST['inlineCheckbox1'] and $_POST['inlineCheckbox2']){
			$store_arr["purchase"] = '投資, 実住';
		}elseif($_POST['inlineCheckbox1'] and !$_POST['inlineCheckbox2']){
			$store_arr["purchase"] = '投資';
		}elseif(!$_POST['inlineCheckbox1'] and $_POST['inlineCheckbox2']){
			$store_arr["purchase"] = '実住';
		}
		if($_POST['content']){
			$store_arr["content"] = $_POST['content'];
		}else{
			$store_arr["content"] = '';
		}
		try{
			$wpdb->insert( $table, $store_arr);
			// if($wpdb->rowCount() > 0)
			// 	return true;
			// else
			// 	return false;
		}catch(PDOException $e){
			echo "Erro ao incluir na tabela categoria ".$e->getMessage();
		}

		if (isset($_POST["action"])) {
			$to = 'info@aodaihousing.com';
			$subject = 'お客様 Buying Aodaihousing';
			$headers = array('Content-Type: text/html; charset=UTF-8');
			$body = '
				<div><label style="padding-right: 13px;">お問い合わせ物件</label> : <span>'.$store_arr['estates_name'].'</span></div>
				<div><label style="padding-right: 78px;">お名前</label> : <span>'.$store_arr['customer_name'].'</span></div>
				<div><label style="padding-right: 91px;">住所</label> : <span>'.$store_arr['address'].'</span></div>
				<div><label style="padding-right: 65px;">電話番号</label> : <span>'.$store_arr['number_phone'].'</span></div>
				<div><label style="padding-right: 69px;">Eメール</label> : <span>'.$store_arr['email'].'</span></div>
				<div><label>不動産ご購入の目的</label> : <span>'.$store_arr['purchase'].'</span></div>
				<div><label style="padding-right: 13px;">お問い合わせ内容</label> : </div>
				<div style="padding-left: 10px;"><span>'.$store_arr['content'].'</></div>
			';
			// Sent to mail
			wp_mail($to, $subject, $body, $headers);
		}

		wp_redirect($redirect);
		exit;
	}
	add_action( 'admin_post_nopriv_contact_form', 'contact_submit_form' );
	add_action( 'admin_post_contact_form', 'contact_submit_form' );

	function _custom_menu_page(){

	   	global $wpdb;
	   	//check if the starting row variable was passed in the URL or not
		if (!isset($_GET['startrow']) or !is_numeric($_GET['startrow'])) {
		  //we give the value of the starting row to 0 because nothing was found in URL
		  $startrow = 0;
		//otherwise we take the value from the URL
		} else {
		  $startrow = (int)$_GET['startrow'];
		}
		$query = "SELECT * FROM wp_contacts ORDER BY id DESC LIMIT $startrow, 10";
		$query1 = "SELECT COUNT(*) FROM wp_contacts";
		$results = $wpdb->get_results($query);
		$total_row = $wpdb->get_var($query1);
		echo'<div style="margin-top:20px;margin-bottom:10px;"><span style="font-size:20px;color:#000; padding-right:50px;">お問い合わせ</span>';
		//now this is the link..
		if ($startrow > 10 && $startrow < $total_row)
			echo '<a style="padding-right: 10px;" href="'.$_SERVER['REQUEST_URI'].'&startrow='.($startrow + 10).'">Next</a>';

		$prev = $startrow - 10;
		if ($prev >= 0)
	    	echo '<a href="'.$_SERVER['REQUEST_URI'].'?startrow='.$prev.'">Previous</a>';

	    echo'</div>';
		echo'<table class="table table-dark" border="1|0">';
		  	echo'<thead class="thead-dark">';
			    echo'<tr>';
			     	echo'<th scope="col" style="padding-right: 30px; min-width:150px;">お問い合わせ物件</th>';
			      	echo'<th scope="col" style="padding-right: 30px;
			      		min-width:150px;">お名前</th>';
			      	echo'<th scope="col" style="padding-right: 30px;
			      		min-width:150px;">住所</th>';
			      	echo'<th scope="col" style="padding-right: 30px;">電話番号</th>';
			      	echo'<th scope="col" style="padding-right: 30px;">Eメール</th>';
			      	echo'<th scope="col" style="padding-right: 30px; min-width:60px;">不動産ご購入の目的</th>';
			      	echo'<th scope="col" style="padding-right: 30px;
			      		min-width:110px;">新規作成日</th>';
			      	echo'<th scope="col" style="padding-right: 30px;">お問い合わせ内容</th>';
			    echo'</tr>';
		  	echo'</thead>';
			echo'<tbody>';
		foreach ( $results as $result ){
		 	echo'<tr>'; 
		 	    echo'<td style="padding-right: 30px;">'.$result->estates_name.'</td>';
		 	    echo'<td style="padding-right: 30px;">'.$result->customer_name.'</td>';
		 	    echo'<td style="padding-right: 30px;">'.$result->address.'</td>';
		 	    echo'<td style="padding-right: 30px;">'.$result->number_phone.'</td>';
		 	    echo'<td style="padding-right: 30px;">'.$result->email.'</td>';
		 	    echo'<td style="padding-right: 30px;">'.$result->purchase.'</td>';
		 	    echo'<td style="padding-right: 30px;">'.$result->create_date.'</td>';
		 	    echo'<td style="padding-right: 30px;"><textarea rows="3" cols="40" readonly>'.$result->content.'</textarea></td>';
		 	echo'</tr>';
		}
			echo'</tbody>';
		echo'</table>';
	}
?>