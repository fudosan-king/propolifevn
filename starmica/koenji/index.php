<?php

require_once("design.php");

$HTMLTITLE ="ステラレジデンス高円寺｜リノベーションマンション、中古マンションの購入ならスター・マイカ・レジデンス株式会社";
$currentmenu = 1;


user_header_top($HTMLTITLE,$currentmenu);
?>

<hr />
<div id="top">
    <div id="top-main-area">
		<div id="main-image"></div>
    </div>
    <!--/main-area-->
<?php
user_globalnavi($currentmenu);
?>

  <div id="wrapper">
    <div id="container">
	<div class="content-info">
		<ul>
		<li><a href="plan.php"><img src="img/tokucho_3.gif" alt="" width="900" height="116" /></a></li>
		</ul>
	</div>
      <div id="content">
        <div class="sec1 bottom-20">
		<div class="news">
			<div>
		          <h4><img src="img/top-midashi.gif" alt="インフォメーション" width="161" height="21" /></h4>
			</div>
	              <dl>
	                <dt class="first"><span>2015.12.03</span></dt>
	                <dd class="first">
				<p class="bottom-10">
				 <a href="plan.php">新規販売住戸（1戸）を公開しました。<img src="img/new.gif" alt="NEW" width="32" height="11" /><br>
				ご自身で内装リフォームを行いたい方向けのプランです。 【 2LDK　73.21㎡ 】 
				</p>
	                </dd>
	                <dt><span>2015.09.09</span></dt>
	                <dd>
				<p class="bottom-10">
				<a href="plan.php"><font class="style13">新規販売住戸（2戸）を公開しました。</font><br>
				3LDK　88.09㎡</a>
				</p>
	                </dd>
	                <dt><span>2015.06.24</span></dt>
	                <dd>
				<p class="bottom-10">
				 <a href="plan.php"><font class="style13">6/27（土）、6/28（日）現地販売会開催！！</font></a>【時間】11：00～17：00<br>
				上記日程にて、『ステラレジデンス高円寺』の現地内覧会を開催いたします。<br>
				ご予約不要ですので、お気軽にお越し下さい。
				</p>
	                </dd>
	                <dt><span>2015.06.10</span></dt>
	                <dd>
				<p class="bottom-10">
				<font class="style13">新規販売住戸（2戸）を公開しました。</font><br>
				2LDK　70.85㎡ ・ 3LDK　88.09㎡
				</p>
	                </dd>
	                <dt><span>2014.12.05</span></dt>
	                <dd>
				<p class="bottom-10">
				<font class="style13">2ＬＤＫのお部屋を新規公開しました。</font><br>
				</p>
	                </dd>
	              </dl>
	        </div>
	        <!--/news-->
        </div>
        <!--/sec1-->

        <div class="sec2 bottom-20">
		<div class="content-banner">
 			<ul>
			<li><a href="http://www.shiawase.starmica-r.co.jp/works29.php" target="_blank"><img src="img/banner-shiawase.gif" alt="" width="215" height="74" /></a></li>
			<li><a href="http://www.starmica.co.jp/renopica/" target="_blank"><img src="img/banner-renopica.gif" alt="" width="215" height="74" /></a></li>
			<li><a href="http://ameblo.jp/renopica-starmica/" target="_blank"><img src="img/banner-bloge.gif" alt="" width="196" height="73" /></a></li>
 			</ul>
	        </div>
        </div>
        <!--/sec2-->

      </div>
      <!--/content-->
      <hr />
      <div id="side-area">
        <div id="banner-area">
	        <div class="nairanbox">
			<ul>
			<li>
				<a href="https://www.starmica-r.co.jp/koenji/contactus.php"><img src="img/top-side3.gif" alt="内覧希望の方はこちら" width="230" height="57" /></a>

		        </li>
			</ul>
		</div>

       </div>
        <!--/banner-area-->


      </div>
      <!--/side-area-->
    </div>
    <!--/container-->
  </div>
  <!--/wrapper-->
</div>
<!--/top-->
<hr />
<?php
user_footer();
?>
