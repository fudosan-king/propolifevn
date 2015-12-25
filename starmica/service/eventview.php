<?php
require_once("../design.php");
require_once("../starmicar_manage/inc_db.php");


if($_GET['eventnews_id']){
	$eventnews_id = htmlspecialchars($_GET['eventnews_id'], ENT_QUOTES);
}
if($eventnews_id){
	//数字チェック
	$check_answer = preg_match("/^[0-9]+$/",$eventnews_id);
	if($check_answer ==0){
		header("Location:index.php");
		exit();
	}
	else{
		if($eventnews_id > 2147483647 OR $eventnews_id < 0){
			header("Location:index.php");
			exit();
		}
	}
}
else{
	header("Location:index.php");
	exit();
}
$db = pg_connect($dsn);
if($db == FALSE){
	$msg = $pfilename."/DB CONNECT ERROR/";
	msgmail($msg);
	header("Location:errormessage.php");
	exit();
}
else
{
	if($eventnews_id){
		//SQLインジェクション
		$eventnews_id = pg_escape_string($eventnews_id);
		$sql = "SELECT "
		."eventnews_id,"
		."eventnews_title,"
		."eventnews_date,"
		."eventnews_status,"
		."eventnews_touroku,"
		."eventnews_naiyou,"
		."eventnews_url,"
		."eventnews_filename,"
		."propertyinfo_id,"
		."eventnews_cate,"
		."eventnews_timestamp "
		."FROM T_eventnews WHERE eventnews_id = '".$eventnews_id."'";
		@$result = pg_query($db,$sql);
		if ($result == FALSE) {
			$msg = $pfilename."/SQL ERROR/".$sql;
			msgmail($msg);
			header("Location:errormessage.php");
			exit();
		}
		$rows = pg_num_rows($result);
		if($rows > 0){
			$eventnews_id = pg_result($result,0,0);
			$eventnews_title = pg_result($result,0,1);
			$eventnews_date = pg_result($result,0,2);
			$eventnews_status = pg_result($result,0,3);
			$eventnews_touroku = pg_result($result,0,4);
			$eventnews_naiyou = pg_result($result,0,5);
			$eventnews_url = pg_result($result,0,6);
			$eventnews_filename = pg_result($result,0,7);
			$propertyinfo_id = pg_result($result,0,8);
			$eventnews_cate = pg_result($result,0,9);
			$eventnews_timestamp = pg_result($result,0,10);

			$eventnews_timestamp = substr($eventnews_timestamp,0,16);
			$eventnews_timestamp = preg_replace("/-/", "/", $eventnews_timestamp);

			$eventnews_naiyou = nl2br($eventnews_naiyou);

			$sql_file1 = "SELECT "
			."file_id,"
			."eventnews_id,"
			."file_path,"
			."file_title,"
			."file_width,"
			."file_height,"
			."file_add,"
			."file_orderby "
			."FROM T_file WHERE eventnews_id = '".$eventnews_id."'";
			@$result_file1 = pg_query($db,$sql_file1);
			if ($result_file1 == FALSE) {
				$msg = $pfilename."/SQL ERROR/".$sql_file1;
				msgmail($msg);
				header("Location:errormessage.php");
				exit();
			}
			$rows_file1 = pg_num_rows($result_file1);
			if($rows_file1 > 0){
				$file_id = pg_result($result_file1,0,0);
				$eventnews_id = pg_result($result_file1,0,1);
				$file_path = pg_result($result_file1,0,2);
				$file_title = pg_result($result_file1,0,3);
				$file_width = pg_result($result_file1,0,4);
				$file_height = pg_result($result_file1,0,5);
				$file_add = pg_result($result_file1,0,6);
				$file_orderby = pg_result($result_file1,0,7);

				$file_add = preg_replace("/-/", "/", $file_add);
				$file_add = substr($file_add,0,16);
			}
		}
	}
pg_close($db);
}
$HTMLTITLE ="イベント情報｜サービス紹介";
$currentmenu = 480;
user_header($HTMLTITLE,$currentmenu);
?>


	<div id="pagetitle-menu4">
		<div class="row">
			<h2><img src="../images/menu4-title.png" alt="サービス紹介" /></h2>
		</div>
	</div>
	<div id="top-copy">
		<div class="row">
			<h3>プロフェッショナルだから出来る 豊富なサービスをご用意しております。</h3>
		</div>
	</div>
	<div id="bread-crumb">
		<div class="row">
		<ul>
		<li><a href="../">ホーム</a></li>
		<li class="arrow">サービス紹介</li>
		<li class="arrow">イベント情報</li>
		</ul>
	  	</div>
	</div>
	<div id="main">
		<article>
			<div class="row">
				<div id="content" class="col third-fourth right">
					<section id="search_name">
						<div class="midashi-s"><span>イベント情報 詳細</span></div>
						<div class="midashi-bukkenmei">
						<?=$eventnews_title?>
<?php
			//1週間前
			$kijyun = strtotime("-1 week");
			$eventnews_timestamp_date = substr($eventnews_timestamp,0,10);
			$updatestr[$j] = strtotime($eventnews_timestamp_date);
			//登録更新日が1週間前以内
			if($updatestr >= $kijyun){
?>
						<span class="icon-new">&nbsp;&nbsp;NEW</span>
<?php
			}
?>
						</div>
						<div class="bukken-syosai">
							<p><span class="koumoku">日　　時</span><span class="kakaku"><?=$eventnews_date?></span><span class="icon-seminer">
<?php
	if($eventnews_cate == 1){
		print"OPUNEROOM";
	}
	elseif($eventnews_cate == 2){
		print"新着物件";
	}
	elseif($eventnews_cate == 3){
		print"セミナー";
	}
	elseif($eventnews_cate == 4){
		print"お知らせ";
	}
	elseif($eventnews_cate == 5){
		print"その他";
	}
?>
							</span></p>
							<p>
							<span class="koumoku">内　　容</span>
							<?=$eventnews_naiyou?>
							</p>
						</div>
						<div class="photo-big">
<?php
	if($file_path){
?>
							<img src="../photoimages/<?=$file_path?>" class="list-photowaku"/>
<?php
	}
?>
						</div>
						<div class="top-10">
							<div class="link_button01">
								<a href="../contactus.php">お問い合わせ・資料請求</a>
							</div>
						</div>
					</section>
				</div>
				<div id="sidebar" class="col one-fourth left">
<?php
	//サイドメニュー
	user_sidearea400($currentmenu);
?>

<?php
	//サイドバナー下層ページ共通
	user_sidebanner($currentmenu);
?>
				</div>
				<!--/#sidebar-->
			</div>
			<!--/row-->
		</article>

<?php
user_footer($currentmenu);
?>
