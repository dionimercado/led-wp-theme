<?php
/* Template Name: Contact */
get_header()
?>
  <iframe class="mb-5" style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1921.0972599132542!2d-149.899895!3d61.216589!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x56c8bd81211e14b9%3A0x79ddea9c4d5efc1f!2s901+W+6th+Ave%2C+Anchorage%2C+AK+99501%2C+EE.+UU.!5e0!3m2!1ses!2sdo!4v1422583210298" width="100%" height="400" frameborder="0"></iframe>
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="contact-info">
          <h1>Contact Info</h1>
          <ul class="mb-4">
            <li>
              <p><strong>Address: </strong>901 W. 6th Ave</p>
              <p><strong>City: </strong>Anchorage</p>
              <p><strong>State: </strong>Alaska</p>
              <p><strong>Zip: </strong>99501</p>
              <p><strong>Phone: </strong>+1 907-677-8797</p>
              <p><strong>Email: </strong>ledultralounge@gmail.com</p>
            </li>
          </ul>
          <h1>Follow us</h1>
          <div class="social-icons">
            <a href="https://www.facebook.com/ledultraloungeak" target="_blank"><i class="fa fa-facebook"></i></a>
            <a href="https://www.instagram.com/ledultraloungeak/" target="_blank"><i class="fa fa-instagram"></i></a>
            <a href="mailto:+19076778797" target="_blank"><i class="fa fa-envelope"></i></a>
            <a href="tel:ledultralounge@gmail.com" target="_blank"><i class="fa fa-phone"></i></a>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="p-4" style="background-color: #222;">
          <?php while( have_posts() ) : the_post(); the_content(); endwhile; ?>
        </div>
      </div>
    </div>
  </div>

<?php get_footer() ?>
