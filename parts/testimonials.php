<div class="container-fluid testimonials_container">
  <div class="container-xl">
    <div class="row justify-content-between">
      <div class="col-md-12 testimonialsText">
        <h2>A few kind words from amazing clients..</h2>
      </div><!-- col -->
      <div class="col-md-12 testimonialsText">
        <div id="carouselExampleIndicators" class="carousel carousel-dark slide">
          <div class="carousel-inner">
      <?php
        $args = array( 'post_type' => 'testimonials', 'posts_per_page' => 4 );
        $the_query = new WP_Query( $args );
        $postNum = 1;
        ?>
        <?php if ( $the_query->have_posts() ) : ?>
        <?php while ( $the_query->have_posts() ) : $the_query->the_post();
          if( $postNum == 1)  {
            $isActive = "active";
          } else {
            $isActive = "";
          }
        ?>
        <div class="carousel-item <?php echo $isActive; ?>">
            <div class="testimonials_content">
              <?php the_content(); ?>
            </div>
        </div>
        <?php
          $postNum++;
          endwhile;
            wp_reset_postdata();
          endif;
        ?>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <i class="fas fa-arrow-circle-left"></i>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div><!-- col -->
    </div><!-- row -->
  </div><!-- container -->
</div><!-- container -->
