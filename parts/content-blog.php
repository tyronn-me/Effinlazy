<div class="container-fuid blogContainer">
  <div class="container-xl">
        <?php
        //get the current page
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        //pagination fixes prior to loop
        $temp =  $query;
        $query = null;

        //custom loop using WP_Query
        $query = new WP_Query( array(
          'post_status' => 'publish',
          'orderby' => 'date',
          'order' => 'ASC'
        ) );

       //set our query's pagination to $paged
       $query -> query('post_type=post&posts_per_page=2'.'&paged='.$paged);

       if ( $query->have_posts() ) :
         while ( $query->have_posts() ) : $query->the_post();
          $author_id = $post->post_author;
          $post_date = get_the_date( 'l F j, Y' );
          $author = get_the_author_meta( 'nicename', $author_id );
          ?>
          <div class="row blog_post justify-content-between">
	          <?php if ( has_post_thumbnail()) : ?>
            <div class="col-md-4">
                <?php
                  $post_thumbnail_id = get_post_thumbnail_id( $post );
                  $blogBG = wp_get_attachment_image_url( $post_thumbnail_id, $size );
                ?>
                <div class="blog_post_bg" style="background: url(<?php echo $blogBG; ?>) center center no-repeat;">
                </div><!-- bg -->
            </div><!-- col -->
            <?php endif; ?>
            <div <?php if ( has_post_thumbnail()) { ?>class="col-md-7"<?php } else {?>class="col-md-12"<?php }?>>
              <h2 class="display-4"><?php the_title(); ?></h2>
              <p class="blogInfo">Posted: <?php echo $post_date; ?> by <?php echo $author; ?></p>
              <div class="blog_post_content" >
                  <?php the_excerpt(); ?>
                  <a class="boxLink" href="<?php echo get_the_permalink(); ?>">Read More</a>
              </div>
          </div><!-- col -->
        </div><!-- row -->
        <?php endwhile;?>

        <?php //pass in the max_num_pages, which is total pages ?>
        <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-center">
            <li class="page-item">
              <?php previous_posts_link('<i class="fas fa-arrow-left"></i> Newer Articles', $query->max_num_pages) ?>
            </li>
            <li class="page-item">
              <?php next_posts_link('Older Articles <i class="fas fa-arrow-right"></i>', $query->max_num_pages) ?>
            </li>
          </ul>
        </nav>
        

      <?php endif; ?>

      <?php //reset the following that was set above prior to loop
      $query = null; $query = $temp; ?>
      </div><!-- col -->
    </div><!-- row -->
  </div><<!-- container -->
</div><!-- container -->
