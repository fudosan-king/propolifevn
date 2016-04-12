<div class="col-lg-9">
<h2>About</h2>
<h3>our company</h3>
<h4>弊社ホームページをご覧頂、ありがとうございます。</h4>
<p>ロータスサービス事業部では、法人設立、駐在員事務所開設手続きを行っております。
弊社には進出スキームつくりからご相談頂けます。弊社の設立サービスは、途上国でよく聞く申請後にいつまで経っても設立できないということはなく、申請前にいつ頃設立できるかの目安時期をほぼ明確にできますので、ご安心してお任せ頂けます。
また、設立申請期間中には、法務、監査、会計、税務、内装、広告、スタッフの給与や雇用、駐在される方の住居選定、ビザや労働許可証のこと等々、開業の準備についてもご相談頂けます。
各専門家ごとに相談していく際に起きる一貫性のないアドバイスは余計な時間とコストを消費してしまいます。弊サービスでは進出サポート経験豊富な弊社の担当が、専門家と社内専門人材とでチームを作りご相談から開業まで一貫性ある効率の良いバックアップを実現します。
手続きに入る前には、何をした方が良いか企業様ごとに、見えるようにスケジュール表でのご提案をさせて頂いております。
まずは無料相談フォームからかお電話でお気軽にお問い合わせ下さい。</p>
</div>
<div class="col-lg-3">
<h2>LOTUS</h2>
<h3>& SERVICES</h3>
<ul class="list">
<?php
$arg = array(
'post_type' => 'lotus',
'orderby' => 'date',
'order' => 'asc',
'posts_per_page' =>-1,
'post__not_in'=>array(37,39,40,41),
'status' => array('publish','private')
);
$the_query = new WP_Query($arg);
$dem=0;
while ( $the_query->have_posts() ) : $the_query->the_post();
$dem++;
?>
<li><a href="<?php echo get_permalink($post->ID);?>"><span class="list_num">0<?php echo $dem;?>.</span><?php the_title();?></a></li>
<?php endwhile;wp_reset_query();?>
</ul>
</div>