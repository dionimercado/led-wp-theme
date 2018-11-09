<?php
/*  Template Name: RSVP */
get_header() ?>

  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="px-3 px-md-5" style="background-color: #222;">
          <div class="page-header text-center mb-5">
              <h1><?php _e('Reserve a Table'); ?></h1>
          </div>
          <div class="p-4 mb-5" style="background-color: rgba(0,0,0,0.2)">
            <?php while( have_posts() ) : the_post(); the_content(); endwhile; ?>
          </div>
          <?php echo do_shortcode('[product_category category="tables" columns="3"]') ?>
        </div>
      </div>
    </div>
  </div>

<?php get_footer() ?>
