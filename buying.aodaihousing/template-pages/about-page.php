<?php 
/* Template Name: ABOUT - Page Template */
?>
<?php 
	get_header();
	$representative = get_field('representative');
	$company_prolife = get_field('company_prolife');
?>
	<main>
  		<div class="main_templates">
      		<section class="section_about_info">
      			<div class="container">
      				<div class="row">
      					<div class="col-12">
      						<h2 class="head_title">プロポライフベトナム代表ご挨拶</h2>
      						<div class="row">
	      						<div class="col-12 col-sm-3 align-self-center">
	      							<div class="card text-center mb-3">
	      								<img src="<?php echo $representative['director_image']['url']; ?>" alt="" class="card-img-top">
	      								<div class="card-body">
	      									<p class="card-text"><?php echo $representative['title_of_grandparents']; ?></p>
	      								</div>
	      							</div>
	      							<div class="card text-center mb-3">
		      							<img src="<?php echo $representative['company_image']['url']; ?>" alt="" class="card-img-top">
		      							<div class="card-body">
			      							<p class="card-text"><?php echo $representative['company_name']; ?></p>
			      						</div>
		      						</div>
	      						</div>
	      						<div class="col-12 col-sm-9 align-self-center">
	      							<?php echo $representative['introduce']; ?>
	      						</div>
      						</div>
      					</div>
      				</div>
      			</div>
      		</section>

      		<section class="section_staff">
      			<div class="container-fluid">
      				<div class="row">
      					<div class="col-12">
      						<h2><span>スタッフ</span></h2>
      						<div class="carousel carousel_staff" data-flickity='{ "groupCells": true }'>
      							<?php foreach ($representative['staff'] as $staff) { ?>
							  	<div class="carousel-cell">
							  		<a data-fancybox="gallery" href="<?php echo $staff['url']; ?>"><img src="<?php echo $staff['sizes']['thumbnail']; ?>" alt="" class="img-fluid"></a>
							  	</div>
								<?php } ?>
							</div>
      					</div>
      				</div>
      			</div>
      		</section>

      		<section class="section_profile">
      			<div class="container">
      				<div class="row">
      					<div class="col-12">
      						<h2 class="head_title">会社概要</h2>
      						<table class="table table-striped table_profile">
      							<tr>
      								<th>会社名</th>
      								<td><?php echo $company_prolife[0]['content']; ?></td>
      							</tr>
      							<tr>
      								<th>代表者</th>
      								<td><?php echo $company_prolife[1]['content']; ?></td>
      							</tr>
      							<tr>
      								<th>住所</th>
      								<td><?php echo $company_prolife[2]['content']; ?></td>
      							</tr>
      							<tr>
      								<th>電話番号</th>
      								<td><?php echo $company_prolife[3]['content']; ?></td>
      							</tr>
      							<tr>
      								<th>資本金</th>
      								<td><?php echo $company_prolife[4]['content']; ?></td>
      							</tr>
      							<tr>
      								<th>社員数</th>
      								<td><?php echo $company_prolife[5]['content']; ?></td>
      							</tr>
      							<tr>
      								<th>加盟団体</th>
      								<td><?php echo $company_prolife[6]['content']; ?></td>
      							</tr>
      							<tr>
      								<th>運営Website</th>
      								<td>
      									<?php echo $company_prolife[7]['content']; ?>
      								</td>
      							</tr>
      							<tr>
      								<th>E-mail</th>
      								<td><?php echo $company_prolife[8]['content']; ?></td>
      							</tr>
      							<tr>
      								<th>営業時間</th>
      								<td><p><?php echo $company_prolife[9]['content']; ?></p></td>
      							</tr>
      							<tr>
      								<th>関連会社/支店</th>
      								<td>
      									<p><?php echo $company_prolife[10]['content']; ?></p>
      								</td>
      							</tr>
      						</table>
      					</div>
      				</div>
      			</div>
      		</section>

  		</div>
  	</main>
<?php get_footer();?>