<?php
// Template name: Contact
include("header.php");
$post_thumbnail_id = get_post_thumbnail_id( $post );
$conBG = wp_get_attachment_image_url( $post_thumbnail_id, $size );

$section_one_content = get_field('section_one_content');
$section_two_content = get_field('section_two_content');
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
  <div class="calBg" style="background: url(<?php echo $conBG; ?>) center center no-repeat;"></div>
</div><!-- container -->

<div class="container-xl">
  <div class="row justify-content-between">
    <div class="col-md-4">
	  <img src="<?php echo $section_one_content["image"]; ?>" alt=""/>
      <h2><?php echo $section_one_content["title"]; ?></h2>
      <?php echo $section_one_content["content"]; ?>
    </div><!-- col -->
    <div class="col-md-7">
      <h2><?php echo $section_two_content["title"]; ?></h2>
      <form id="contactForm">
	     <?php echo $section_two_content["content"]; ?>
        <div class="row justify-content-between">
          <input type="hidden" name="main_email" id="main_email" value="<?php bloginfo("admin_email"); ?>">
          <div class="col-md-6">
            <input type="text" name="f_name" id="f_name" class="form-control" placeholder="Name*">
          </div>
          <div class="col-md-6">
            <input type="text" name="f_email" id="f_email" class="form-control" placeholder="Email*">
          </div>
          <div class="col-md-12">
            <input type="text" name="f_subject" id="f_subject" class="form-control" placeholder="Subject*">
          </div>
          <div class="col-md-12">
            <textarea type="text" name="f_message" id="f_message" class="form-control" placeholder="Your message*"></textarea>
          </div>
          <div class="col-md-12">
            <button type="submit" id="contactSubmit" class="btn btn-danger">Send your message</button>
          </div>
        </div>
      </form>

      <h2>Schedule your free one to one with Sid</h2>
      <div class="calendly-inline-widget" data-url="https://calendly.com/talktosid/coffeesessions?hide_landing_page_details=1&hide_gdpr_banner=1" style="min-width:100%;height:700px;"></div>
      <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
      <p><small>*Times not convenient? Email us your time zone & we will set up a meeting.</small></p>
    </div><!-- col -->
  </div><!-- row -->
</div><!-- container -->

<?php include("footer.php"); ?>
