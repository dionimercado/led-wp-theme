<?php get_header() ?>

  <div class="container">
    <div class="row">
        <div class="col-12">
            <div>
                <div class="page-header text-center mb-5">
                    <h1><?php the_title(); ?></h1>
                </div>
                <div class="p-4" style="background-color: #222;">
                  <?php while( have_posts() ) : the_post(); the_content(); endwhile; ?>
                </div>
            </div>
        </div>
    </div>
  </div>

<?php get_footer() ?>
