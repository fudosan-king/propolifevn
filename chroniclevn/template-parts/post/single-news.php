
<?php get_template_part( 'template-parts/page/banner', 'sub' ); ?>

<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div class="box_left">
          <h2 class="title">ニュース</h2>
          <div class="box_newsDetail">
            <div style="margin-bottom:15px"><small><?php the_time(); ?></small></div>
            <h3><?php the_title(); ?></h3>
            <?php the_content(); ?>
          </div>

          <a href="https://chronicle.propolifevietnam.com/contact/" class="btn btn-lg btn_consultProduction" target=""><i class="fa fa-envelope" aria-hidden="true"></i> 相談する <i class="i_arrowright"></i></a>

        </div>

      </div>

      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <?php get_sidebar(); ?>
      </div>

    </div>



  </div>
</section>