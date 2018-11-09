<?php global $woocommerce; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="<?php bloginfo( 'stylesheet_url' ); ?>?v=<?php echo rand(0,999) ?>" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,500,700|Oswald:400,300|Allura' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/owl.theme.default.min.css">

    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <nav class="headerNav navbar navbar-expand-md navbar-dark fixed-top py-md-3">
      <a class="navbar-brand d-block d-md-none" href="/"><img src="<?php echo get_template_directory_uri() ?>/images/logo.png" alt="<?php bloginfo( 'name' ) ?>" height="45" /></a>
      <button class="navbar-toggler p-0 border-0" type="button" data-toggle="collapse" data-target="#mainMenu" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-md-center" id="mainMenu">
        <ul class="navbar-nav align-items-center">
          <li class="nav-item active">
            <a class="nav-link" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/venue">Venue</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/events">Events</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/packages">Packages</a>
          </li>
          <li class="nav-logo d-none d-md-inline-block mx-4">
            <a href="<?php echo home_url() ?>"><img src="<?php echo get_template_directory_uri() ?>/images/logo.png" alt="<?php bloginfo( 'name' ) ?>" height="60" /></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/reservations">Reservations</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/gallery">Gallery</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/contact">Contact</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container">
        <div class="row d-none">
            <div class="col-12">
                <header id="header">
                    <div class="row">
                        <div class="col-12 col-sm-4 col-sm-offset-4">
                            <div class="social-icons" style="margin-bottom: 20px;">
                                <a style="background-color: #3b5998;" href="https://www.facebook.com/ledultraloungeak" target="_blank"><i class="fa fa-facebook"></i></a> Facebook
                                <a style="background-color: #125688;" href="https://instagram.com/ledultraloungeak" target="_blank"><i class="fa fa-instagram"></i></a> Instagram
                                <!--
                                <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                                <a href="#" target="_blank"><i class="fa fa-youtube-play"></i></a>
                                -->
                            </div>
                            <div class="clearfix"></div>
                            <div class="newsletter_form">
                                <?php //echo do_shortcode( '[newsletter_signup_form id=0]' ) ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <nav class="main-nav">
                                <?php wp_nav_menu( array( 'menu' => 'main-menu', 'container' => '', 'menu_id' => '', 'menu_class' => 'main-nav' ) ); ?>
                            </nav>
                        </div>
                    </div>
                </header>
            </div>
        </div>
      </div>
