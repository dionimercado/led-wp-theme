<?php get_header() ?>

<div class="container mt-5">
  <div class="row">
      <div class="col-12">
          <div id="main-content" class="p-0">
              <div class="page-header float-left">
                  <h1><?php the_time( "F jS, Y" ); ?></h1>
              </div>
              <div class="float-right">
                <div class="addthis_sharing_toolbox"></div>
              </div>
              <div class="clearfix"></div>
              <div class="mt-4">
                <?php while( have_posts() ) : the_post(); the_content(); endwhile; ?>
              </div>
              <!-- Go to www.addthis.com/dashboard to customize your tools -->
          </div>
      </div>
  </div>
</div>


<?php get_footer() ?>
