<?php
// Template name: Calendar
include("header.php");
$post_thumbnail_id = get_post_thumbnail_id( $post );
$calBG = wp_get_attachment_image_url( $post_thumbnail_id, $size );

$calendar_content = get_field("calendar_content");
?>

<div class="container-fluid calDark">
  <div class="container-xl">
    <div class="row">
      <div class="col-md-12 brandAuditDarkContent">
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
      </div><!-- col -->
    </div><!-- row -->
  </div><!-- container -->
  <div class="calBg" style="background: url(<?php echo $calBG; ?>) center center no-repeat;"></div>
</div><!-- container -->

<div class="container-xl">
  <div class="row justify-content-center">
    <div class="col-md-7" id="calContent">
      <h2><?php echo $calendar_content["title"]; ?></h2>
      <?php echo $calendar_content["content"]; ?>
    </div><!-- col -->
    <div class="col-md-12">
      <div class="calendly-inline-widget" data-url="https://calendly.com/talktosid/coffeesessions?hide_landing_page_details=1&hide_gdpr_banner=1" style="min-width:100%;height:700px;"></div>
      <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
    </div><!-- col -->
    <div class="col-md-9">
	    <p><small>*We work with clients all around the world. Book your free call or Email us if you can't find a time that works for you. We are currently working from Ontario, Canada.</small></p>
    </div><!-- col -->
  </div><!-- row -->
</div><!-- container -->

<?php include("footer.php"); ?>
