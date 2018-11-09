<?php
/* Template Name: Packages */
get_header()

?>

<div class="container">
  <div class="row">
    <div class="col-12">
      <div>
        <div class="page-header text-center">
          <h1><?php _e( 'Packages' ); ?></h1>
        </div>
        <div class="row">
          <!-- <div class="col-6 col-sm-3">
            <a title="<?php echo get_the_title('16175'); ?>" class="" href="<?php echo get_the_permalink('16175') ?>"><img src="<?php echo get_template_directory_uri() ?>/scripts/timthumb.php?src=http://ledultralounge.com/wp-content/uploads/2016/11/PACKAGE.jpg&w=203&h=299&zc=0" alt="" title="" class="img-responsive" /></a>
            <a class="buy-tickets-btn" href="<?php echo get_the_permalink('16175') ?>"><?php _e( 'Buy This Package' ) ?></a>
          </div> -->
        <?php

          function my_posts_groupby($groupby) {
              global $wpdb;
              return $wpdb->postmeta . '.meta_key = "_tribe_wooticket_for_event"';
          }

          // add_filter( 'posts_groupby', 'my_posts_groupby' );

          $tickets = new WP_Query( array(
            'post_type' => 'product',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            // 'meta_query' => array(
            //   'relation'  => 'AND',
            //   array(
            //     'key' => '_EventCost',
            //     'value' => '0',
            //     'compare' => '>='
            //   ),
            //   array(
            //     'key' => '_EventEndDate',
            //     'value' => date('Y-m-d H:i:s'),
            //     'compare' => '>=',
            //     'type'    => 'DATETIME'
            //   )
            // ),
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field'    => 'slug',
                    'terms'    => 'packages',
                )
              ),
          ) );

          // remove_filter('posts_groupby', 'my_posts_groupby');

          while( $tickets->have_posts() ) : $tickets->the_post();
          $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
          ?>
          <div class="col-6 col-md-4">
            <a class="" href="<?php the_permalink() ?>#buy-tickets"><img src="<?php echo get_template_directory_uri() ?>/scripts/timthumb.php?src=<?php echo $thumb[0]; ?>&w=250&h=368&zc=0" alt="" title="" class="w-100" /></a>
            <a class="buy-tickets-btn" href="<?php the_permalink() ?>#buy-tickets"><?php _e( 'Buy This Package' ) ?></a>
          </div>
          <?php
          endwhile;
          wp_reset_postdata();
        ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer() ?>
