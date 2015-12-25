<?php
require_once("../design.php");
require_once("../starmicar_manage/inc_db.php");
$db = pg_connect($dsn);
if($db == FALSE){
	$msg = $pfilename."/DB CONNECT ERROR/";
	msgmail($msg);
	header("Location:errormessage.php");
	exit();
}
else
{
	$sql = "SELECT "
	."eventnews_id,"
	."eventnews_title,"
	."eventnews_date,"
	."eventnews_status,"
	."eventnews_touroku,"
	."eventnews_naiyou,"
	."eventnews_url,"
	."propertyinfo_id,"
	."eventnews_cate,"
	."eventnews_timestamp "
	."FROM T_eventnews WHERE eventnews_status = 1 ORDER BY eventnews_id DESC";
	@$result = pg_query($db,$sql);
	if ($result == FALSE) {
		$msg = $pfilename."/SQL ERROR/".$sql;
		msgmail($msg);
		header("Location:errormessage.php");
		exit();
	}
	$rows = pg_num_rows($result);


	$HTMLTITLE ="サービス紹介｜リノベーション物件特集";
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
					<section id="sec01">
						<div class="midashi-s"><span>イベント情報</span></div>
							<p>セミナー情報、イベント情報などをご紹介いたします。[詳細]ボタンより物件詳細情報がご覧いただけます。</p>
						<div class="top-10">
<?php
	//1週間前
	$kijyun = strtotime("-1 week");
	$flag = 1;
	if($rows > 0){
		for ($j = 0;$j <$rows;$j++){
			$d_eventnews_id[$j] = pg_result($result,$j,0);
			$d_eventnews_title[$j] = pg_result($result,$j,1);
			$d_eventnews_date[$j] = pg_result($result,$j,2);
			$d_eventnews_status[$j] = pg_result($result,$j,3);
			$d_eventnews_touroku[$j] = pg_result($result,$j,4);
			$d_eventnews_naiyou[$j] = pg_result($result,$j,5);
			$d_eventnews_url[$j] = pg_result($result,$j,6);
			$d_propertyinfo_id[$j] = pg_result($result,$j,7);
			$d_eventnews_cate[$j] = pg_result($result,$j,8);
			$d_eventnews_timestamp[$j] = pg_result($result,$j,9);

			$d_eventnews_timestamp_date[$j] = substr($d_eventnews_timestamp[$j],0,10);

			$d_eventnews_timestamp[$j] = substr($d_eventnews_timestamp[$j],0,16);
			$d_eventnews_timestamp[$j] = preg_replace("/-/", "/", $d_eventnews_timestamp[$j]);


			$d_updatestr[$j] = strtotime($d_eventnews_timestamp_date[$j]);

			$d_message_count[$j] = mb_strlen($d_eventnews_naiyou[$j], 'UTF-8');
			if($d_message_count[$j] > 80){
				$d_eventnews_naiyou[$j] = mb_substr("$d_eventnews_naiyou[$j]", 0, 80, "UTF-8")."...";
			}


			$sql_file1 = "SELECT "
			."file_id,"
			."eventnews_id,"
			."file_path,"
			."file_title,"
			."file_width,"
			."file_height,"
			."file_add,"
			."file_orderby "
			."FROM T_file WHERE eventnews_id = '".$d_eventnews_id[$j]."'";
			@$result_file1 = pg_query($db,$sql_file1);
			if ($result_file1 == FALSE) {
				$msg = $pfilename."/SQL ERROR/".$sql_file1;
				msgmail($msg);
				header("Location:errormessage.php");
				exit();
			}
			$rows_file1 = pg_num_rows($result_file1);
			if($rows_file1 > 0){
				$d_file_id[$j] = pg_result($result_file1,0,0);
				$d_eventnews_id[$j] = pg_result($result_file1,0,1);
				$d_file_path[$j] = pg_result($result_file1,0,2);
				$d_file_title[$j] = pg_result($result_file1,0,3);
				$d_file_width[$j] = pg_result($result_file1,0,4);
				$d_file_height[$j] = pg_result($result_file1,0,5);
				$d_file_add[$j] = pg_result($result_file1,0,6);
				$d_file_orderby[$j] = pg_result($result_file1,0,7);

				$d_file_add[$j] = preg_replace("/-/", "/", $d_file_add[$j]);
				$d_file_add[$j] = substr($d_file_add[$j],0,16);
			}
			if($flag == 1){
?>
							<div id="event_list" class="top-10">
								<div class="col search_list_box firstlist_box">
									<section>
									<div class="event-back">
<?php
				if($d_eventnews_url[$j]){
?>
									<A HREF="<?=$d_eventnews_url[$j]?>" target="_blank">
<?php
				}
				else{
					print'<A HREF="eventview.php?eventnews_id='.urlencode($d_eventnews_id[$j]).'" target="_self">';
				}
?>
										<div class="img">
<?php
				if($d_file_path[$j]){
?>
										<img src="../photoimages/<?=$d_file_path[$j]?>" alt=""  class="list-photowaku"/>
<?php
				}
				else{
?>
										<img src="../images/nophoto.jpg" alt=""  class="list-photowaku"/>
<?php
				}
?>
										</div>
										<div>
<?php
				//登録更新日が1週間前以内
				if($d_updatestr[$j] >= $kijyun){
?>
										<span class="icon-new">NEW</span>
<?php
				}
				if($d_eventnews_cate[$j] == 1){
					print'<span class="icon-seminer">';
					print"OPENROOM";
					print'</span>';
				}
				elseif($d_eventnews_cate[$j] == 2){
					print'<span class="icon-seminer">';
					print"新着物件";
					print'</span>';
				}
				elseif($d_eventnews_cate[$j] == 3){
					print'<span class="icon-seminer">';
					print"セミナー";
					print'</span>';
				}
				elseif($d_eventnews_cate[$j] == 4){
					print'<span class="icon-seminer">';
					print"お知らせ";
					print'</span>';
				}
				elseif($d_eventnews_cate[$j] == 5){
					print'<span class="icon-seminer">';
					print"その他";
					print'</span>';
				}
?>
										</div>
										<h3 class="list-event-name"><?=$d_eventnews_title[$j]?></h3>
										<div class="list-setumei2">
											<ul>
											<li class="day"><?=$d_eventnews_date[$j]?></li>
											<li><?=$d_eventnews_naiyou[$j]?></li>
											</ul>
										</div>
										<div class="more">MORE</div>
									</a>
									</div>
									</section>
								</div>
<?php
			}
			if($flag == 2){
?>
								<div class="col search_list_box">
									<section>
									<div class="event-back">
<?php
				if($d_eventnews_url[$j]){
?>
									<A HREF="<?=$d_eventnews_url[$j]?>" target="_blank">
<?php
				}
				else{
					print'<A HREF="eventview.php?eventnews_id='.urlencode($d_eventnews_id[$j]).'" target="_self">';
				}
?>
										<div class="img">
<?php
				if($d_file_path[$j]){
?>
										<img src="../photoimages/<?=$d_file_path[$j]?>" alt=""  class="list-photowaku"/>
<?php
				}
				else{
?>
										<img src="../images/nophoto.jpg" alt=""  class="list-photowaku"/>
<?php
				}
?>
										</div>
										<div>
<?php
				//登録更新日が1週間前以内
				if($d_updatestr[$j] >= $kijyun){
?>
										<span class="icon-new">NEW</span>
<?php
				}
				if($d_eventnews_cate[$j] == 1){
					print'<span class="icon-seminer">';
					print"OPENROOM";
					print'</span>';
				}
				elseif($d_eventnews_cate[$j] == 2){
					print'<span class="icon-seminer">';
					print"新着物件";
					print'</span>';
				}
				elseif($d_eventnews_cate[$j] == 3){
					print'<span class="icon-seminer">';
					print"セミナー";
					print'</span>';
				}
				elseif($d_eventnews_cate[$j] == 4){
					print'<span class="icon-seminer">';
					print"お知らせ";
					print'</span>';
				}
				elseif($d_eventnews_cate[$j] == 5){
					print'<span class="icon-seminer">';
					print"その他";
					print'</span>';
				}
?>
										</div>
										<h3 class="list-event-name"><?=$d_eventnews_title[$j]?></h3>
										<div class="list-setumei2">
											<ul>
											<li class="day"><?=$d_eventnews_date[$j]?></li>
											<li><?=$d_eventnews_naiyou[$j]?></li>
											</ul>
										</div>
										<div class="more">MORE</div>
									</a>
									</div>
									</section>
								</div>
							</div>
<?php
			}
			if($flag == 1){
				$flag = 2;
			}
			elseif($flag == 2){
				$flag = 1;
			}
		}
	}
?>
						</div>
					</section>
				</div>
				<!--/#content-->
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


</body>
</html>
<?php
pg_close($db);
}
