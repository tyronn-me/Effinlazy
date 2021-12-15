<?php
// This is the single blog post template
include('header.php');
global $post;

$author_id = $post->post_author;
$post_date = get_the_date( 'l F j, Y' );
$author = get_the_author_meta( 'nicename', $author_id );

$post_thumbnail_id = get_post_thumbnail_id( $post );
$blogBG = wp_get_attachment_image_url( $post_thumbnail_id, $size );
?>

<div class="container-xl blogContainer">
  <div class="row justify-content-between singlePost">
    <div class="col-md-4">
      <a style="margin-bottom: 30px;" href="<?php bloginfo("url"); ?>/blog" class="btn btn-dark"><i class="fas fa-arrow-left"></i> Back to the blog</a>
      <h1 class="display-3"><?php the_title(); ?></h1>
      <p class="blogInfo">Posted: <?php echo $post_date; ?> by <?php echo $author; ?></p>
      <?php if ($blogBG) { ?><img src="<?php echo $blogBG; ?>" alt="<?php echo get_the_title(); ?>"/><?php } ?>
    </div><!-- col -->
    <div class="col-md-7">
      <?php the_content(); ?>
    </div><!-- col -->
  </div><!-- row -->
</div><!-- container -->

<?php include('footer.php'); ?>
