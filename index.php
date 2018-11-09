<?php /* Template Name: Homepage */ ?>
<?php get_header() ?>

<div class="main-slider m-0">
  <?php
  if( get_post_meta(1358, 'youtube_video', true) ) :
    list($video_url, $video_id) = explode("youtu.be/", get_post_meta(1358, 'youtube_video', true));
    ?>
    <div class="embed-responsive embed-responsive-16by9">
      <iframe class="embed-responsive-item" src="//www.youtube.com/embed/<?php echo $video_id; ?>?rel=0&amp;autoplay=1&amp;hd=1"></iframe>
    </div>
  <?php else : echo do_shortcode( '[rev_slider home-slider]' ); endif; ?>
  </div>

  <section class="py-5 text-center" style=" background: #000 url(/wp-content/uploads/2015/02/crowd-40bb5c68.png) center bottom no-repeat; background-size: cover;">
    <div class="page-header pt-5 mb-5">
      <h1>Upcoming <span>Events</span></h1>
    </div>
    <div class="container">
      <div class="led-events owl-carousel owl-theme">
        <?php
        $query = new WP_Query( array(
          'post_type' => 'tribe_events',
          'showposts' => 6,
          // 'meta_query' => array(
          //   array(
          //     'key' => 'event_end_date_time',
          //     'value' => date( 'Y-m-d H:i', strtotime( "- 6 hours" ) ),
          //     'compare' => '>=',
          //     'type'  => 'DATETIME'
          //   )
          // ),
          // 'meta_key'  => 'event_date_time',
          // 'orderby' => 'meta_value',
          'order' => 'ASC'
        ) );
        while ( $query->have_posts() ) : $query->the_post();
        $flyer = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
        ?>
        <div class="item">
          <div class="led-flyer">
            <a href="<?php the_permalink(); ?>">
              <img src="<?php echo $flyer[0]; ?>&w=500&h=625&resize=500,625" />
            </a>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
</section>
<section id="resevation" class="resevation py-5">
  <div class="page-header pt-5 mb-5 position-relative text-center">
    <h1>VIP <span>Packages</span></h1>
  </div>
  <div class="container">
    <div class="led-packages owl-carousel owl-theme">
      <?php
      $tickets = new WP_Query( array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'posts_per_page' => -1,
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
      $flyer = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
      ?>
      <div class="item">
        <div class="led-vip">
          <a href="<?php the_permalink(); ?>">
            <img src="<?php echo $flyer[0]; ?>" />
          </a>
        </div>
      </div>
      <div class="item">
        <div class="led-vip">
          <a href="<?php the_permalink(); ?>">
            <img src="<?php echo $flyer[0]; ?>" />
          </a>
        </div>
      </div>
      <div class="item">
        <div class="led-vip">
          <a href="<?php the_permalink(); ?>">
            <img src="<?php echo $flyer[0]; ?>" />
          </a>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
    <div class="row dart-no-gutter d-none">
      <div class="col-md-4 col-sm-4 mr-md-0 pr-md-0">
        <div class="time-info time-info-outer">
          <div class="time-info-inner">
            <div class="heading">
              <span class="dart-fs-48">Time</span>
              <h1>OPEN</h1>
              <hr>
            </div>
            <div class="open-time dart-pt-20 text-center">
              <p>
                <strong class="text-red text-uppercase">L.E.D. Ultra Lounge & Grill</strong><br>
                Monday - Sunday<br>
                6:30PM - 2:30AM<br><br>
                <span class="text-red text-uppercase">THURSDAY - SATURDAY</span><br>
                4PM - 4AM<br><br>
                <span class="text-red text-uppercase">SUNDAY</span><br>
                12PM - 4AM<br>
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8 col-sm-8 ml-md-0 pl-md-0">
        <div class="resevation-block">
          <div class="heading">
            <span class="dart-fs-48">Resevation</span>
            <h1>online booking</h1>
            <hr>
          </div>
          <div class="reservation-form">
            <form class="form-inline" action="book-table.php" id="booktable" name="booktable" method="post">
              <div class="form-inline clearfix">
                <div class="form-group col-sm-4">
                  <input type="text" class="form-control" name="userName" placeholder="Your Name *" required="">
                </div>
                <div class="form-group col-sm-4">
                  <input type="email" class="form-control" name="userEmail" placeholder="Your Email *" required="">
                </div>
                <div class="form-group col-sm-4">
                  <input type="tel" class="form-control" name="userMobileNumber" placeholder="Mobile Number *" required="">
                </div>
              </div>
              <div class="form-inline clearfix">
                <div class="form-group col-sm-4">
                  <div class="input-group date " id="start">
                    <input type="text" class="form-control" name="bookDate" placeholder="Date *" required="">
                    <span class="input-group-addon">
                      <i class="glyphicon glyphicon-calendar"></i>
                    </span>
                  </div>
                </div>
                <div class="form-group col-sm-4">
                  <div class="input-group">
                    <input id="timepicker1" type="text" class="form-control input-small" name="bookTime" placeholder="HH-MM (24hr formet) *" required="">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                  </div>
                </div>
                <div class="form-group col-sm-4">
                  <div class="input-group">
                    <input type="number" class="form-control" name="NoofPersons" placeholder="No. of Persons *" required="">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-default">Book a Table</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="mt-5 pb-5" style="background: #000 url(/wp-content/uploads/2015/02/crowd-40bb5c68.png) center bottom no-repeat; background-size: cover;">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="page-header text-center" style="margin-bottom:  0; border-bottom: 1px solid #ff7d00">
          <h1><?php _e( 'Past Events' ) ?></h1>
        </div>
        <div class="recent-photos p-4">
          <div class="row">
            <?php query_posts( array( 'post_type' => 'gallery', 'showposts' => 4 ) ) ?>
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
      </div>
    </div>
  </div>
</section>

<section id="newsletter" class="py-5 mb-5">
  <h3>Subscribe to our newsletter!</h3>
  <div class="container">
    <div class="row">
      <div class="col-lg-6 ml-auto mr-auto">
        <!-- MailChimp Signup Form -->
        <div id="mc_embed_signup">
          <!-- Replace the form action in the line below with your MailChimp embed action! For more informatin on how to do this please visit the Docs! -->
          <form role="form" action="//ledultralounge.us19.list-manage.com/subscribe/post?u=5563762459828e2ddb71390c5&amp;id=fe39513954" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank" novalidate="">
            <div class="input-group input-group-lg">
              <input type="email" name="EMAIL" class="form-control" id="mce-EMAIL" placeholder="Email address...">
              <span class="input-group-btn">
                <button type="submit" name="subscribe" id="mc-embedded-subscribe" class="btn btn-primary wow fadeInRight" data-wow-delay="0ms" data-wow-duration="800ms" style="visibility: visible; animation-duration: 800ms; animation-delay: 0ms; animation-name: fadeInRight;">Subscribe!</button>
              </span>
            </div>
            <div id="mce-responses">
              <div class="response" id="mce-error-response" style="display:none"></div>
              <div class="response" id="mce-success-response" style="display:none"></div>
            </div>
          </form>
        </div>
        <!-- End MailChimp Signup Form -->
      </div>
    </div>
  </div>
</section>

<section class="" style="background: #000 url(/wp-content/uploads/2015/02/crowd-40bb5c68.png) center bottom no-repeat; background-size: cover;">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="page-header text-center mb-5 mt-5" style="margin-bottom: 0;">
          <h1><?php _e( 'Recent Posts' ) ?></h1>
        </div>
        <?php echo do_shortcode('[elfsight_instagram_feed id="1"]') ?>
      </div>
    </div>
  </div>
</section>

<?php get_footer() ?>
