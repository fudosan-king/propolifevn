<?php
require_once("../design.php");

$HTMLTITLE ="サービス紹介｜アフター保証";
$currentmenu = 460;


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
		<li class="arrow">アフター保証</li>
		</ul>
	  	</div>
	</div>
	<div id="main">
		<article>
			<div class="row">
				<div id="content" class="col third-fourth right">
					<section id="sec01">
						<div class="midashi-s"><span>アフター保証</span></div>
						<div id="info" class="row bottom-20">
							<div class="col two-third">
								<p>
								当社が販売する「リノベーションマンション」には、お客様に安心して<br>
								お住まいいただくために、アフターサービス保証を付けております。<br>
								ご購入後もサポートいたします。<br>
								</p>
								<table class="formTable">
								<tr> 
								<th>保証期間
								</th>
								<td>
								お引渡し日より起算し、各項目に関し｢アフターサービス規準書」記載の期間となります。<br>
								</td>
								</tr>
								<tr>
								<th>対象項目
								</th>
								<td>
								「アフターサービス基準書」記載の通り<br>
								</td>
								</tr>
								<tr> 
								<th>保証内容
								</th>
								<td>
								対象項目に該当することが発生した場合、無償にて補修いたします。<br>
								但し、免責事項に該当する場合は有償での補修となります。
								</td>
								</tr>
								</table>
								<div class="clear-box"></div>
							</div>
							<div class="col one-third">
								<img src="../images/afterhosyousyo.jpg" alt="アフターサービス保証"/>
							</div>
						</div>
					</section>

					<section id="sec01">
						<h5 class="subtitle">免責事項</h5>
						<div class="top-15">
	                                                <p class="bottom-5">
							以下に該当する場合は本アフターサービスの適用を除外させていただきます。<br>
							(1) 通常の用法以外の使用上の不注意、故意、過失、または管理不十分に起因するもの。<br>
							(2) 天災、電波障害、その他（結露・カビ・さびなど）の当社の責めに帰すべからざる原因により発生したもの。<br>
							(3) 引渡し後の改築等により形状変更が行われた場合、その部位・設備及び関連する部位・設備。<br>
							(4) 経年変化により生じたもので、機能上支障のないものや可動部分の摩減。<br>
							(5) 引渡し時、実用化されていた技術・工法・部資材では予見することが不可能な現象、及びこれが原因で生じた故障・不具合等。<br>
							(6) 共用部分（専用使用権のある共用部分も含む）に関わる不具合<br>
							</p>
						</div>
						<div class="clear-box"></div>
						<h5 class="subtitle">保証期間について</h5>
						<div class="top-15">
	                                                <p class="bottom-5">
							該当物件の保証期間内において対象物件をご売却されたときは、これをもって保証期間を満了といたします。<br>
							※対象となるアフターサービス部分：専有部分内部（工事の施された範囲と機器等）を対象とさせて頂きます。<br>
							</p>
						</div>
						<div class="top-20">
							<div class="chuui03">
								※売主がスター・マイカの場合に限られます。
							</div>
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
