<?php get_header() ?>

  <div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="page-header text-center" style="margin-bottom:  0; border-bottom: 1px solid #ff7d00">
              <h1><?php _e( 'Photo Gallery' ) ?></h1>
            </div>
            <div class="recent-photos p-4">
              <div class="row">
                <?php

                $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                query_posts( array( 'post_type' => 'gallery', 'posts_per_page' => 16, 'paged' => $paged ) ) ?>
                <?php while( have_posts() ) : the_post(); ?>
                <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
                <div class="col-6 col-sm-3">
                  <a title="<?php the_title(); ?>" class="flyer" href="<?php the_permalink() ?>">
                    <div class="date">
                      <span class="day"><?php the_time( 'd' ) ?></span>
                      <span class="month"><?php the_time( 'M' ) ?></span>
                      <span class="year"><?php the_time( 'Y' ) ?></span>
                    </div>
                    <img src="<?php echo $thumb[0]; ?>&resize=300%2C300" alt="" title="" class="img-fluid" />
                  </a>
                </div>
                <?php endwhile; wp_reset_query(); ?>
              </div>
            </div>
            <div style="padding: 30px 0; text-align: center;">
              <?php wp_pagenavi() ?>
            </div>
        </div>
    </div>
  </div>

<?php get_footer() ?>
