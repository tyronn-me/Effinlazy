<?php
// Template name: Brand Audit
include("header.php");
$post_thumbnail_id = get_post_thumbnail_id( $post );
$blogBG = wp_get_attachment_image_url( $post_thumbnail_id, $size );

$section_one_text = get_field('section_one_text');

$section_two_content = get_field('section_two_content');

$section_three_content = get_field('section_three_content');

$section_four_content = get_field('section_four_content');

$section_five_content = get_field('section_five_content');

$section_six_content = get_field('section_six_content');

?>

<div class="container-fluid brandAuditDark">
  <div class="container-xl">
    <div class="row justify-content-between">
      <div class="col-md-12 brandAuditDarkContent">
        <?php
          if ( have_posts() ) {
            while ( have_posts() ) {
              the_post();
              the_content();
            }
          }
        ?>
      </div><!-- col -->
    </div><!-- row -->
  </div><!-- containre -->
  <div class="brandAuditBg" style="background: url(<?php echo $blogBG; ?>) center top no-repeat;"></div>
</div><!-- container -->

<div class="container-fluid darkBox" id="mystory">
  <div class="container-xl">
    <div class="row">
      <div class="col-md-12">
        <?php echo $section_one_text = get_field('section_one_text'); ?>
      </div><!-- col -->
    </div><!-- row -->
  </div><!-- container -->
</div><!-- container -->

<div class="container-fluid">
  <div class="container-xl">
    <div class="row">
      <div class="col-md-8 scrollFade brandBooking">
        <div class="brandBookingInner">
          <h2><?php echo $section_two_content["title"]; ?></h2>
          <?php echo $section_two_content["content"]; ?>
          <a href="#brandauditcal" class="transition boxLink">Book my brand audit <i class="fas fa-arrow-right"></i></a>
        </div><!-- inner -->
      </div><!-- col -->
    </div><!-- row -->
    <div class="brandVideo scrollThis" data-scrollfactor="5">
      <video poster="" id="bgvid" autoplay loop muted playsinline>
        <source src="<?php bloginfo("template_directory"); ?>/videos/mainVideo.webm" type="video/webm">
        <source src="<?php bloginfo("template_directory"); ?>/videos/mainVideo.mp4" type="video/mp4">
      </video>
    </div><!-- brand video -->
  </div><!-- container -->
</div><!-- container -->

<div class="container-fluid">
  <div class="container-xl">
    <div class="row scrollFade">
      <div class="col-md-12">
        <div class="darkBox">
          <h2><?php echo $section_three_content["title"]; ?></h2>
          <?php echo $section_three_content["content"]; ?>
        </div><!-- dark box -->
      </div><!-- col -->
    </div><!-- row -->
  </div><!-- container -->
</div><!-- container -->

<div class="container-xl">
  <div class="row strategyBrandList">
    <div class="col-md-12 scrollFade">
      <h2><?php echo $section_four_content["title"]; ?></h2>
      <?php echo $section_four_content['content']; ?>
      <a href="#brandauditcal" class="transition boxLink">I need this <i class="fas fa-arrow-right"></i></a>
    </div><!-- col -->
  </div><!-- row -->
</div><!-- container -->

<div class="container-xl">
  <div class="row">
    <div class="col-md-12 scrollFade">
      <h2 style="text-align: center; margin-bottom: 60px;">The right strategy for you?</h2>
    </div><!-- col -->
    <div class="col-md-6 scrollFade">
      <div class="card text-white">
        <div class="card-body">
          <h5 class="card-title"><?php echo $section_five_content["column_one_title"]; ?></h5>
          <p class="card-text"><?php echo $section_five_content["column_one"]; ?></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 scrollFade">
      <div class="card text-white">
        <div class="card-body">
          <h5 class="card-title"><?php echo $section_five_content["column_two_title"]; ?></h5>
          <p class="card-text"><?php echo $section_five_content["column_two"]; ?></p>
        </div>
      </div>
    </div>
  </div>
</div><!-- container -->

<?php get_template_part( 'parts/testimonials' ); ?>

<div class="container-fluid brandAuditSid">
  <div class="container-xl">
    <div class="row">
      <div class="col-md-7 scrollFade">
        <h2><?php echo $section_six_content["title"]; ?></h2>
        <?php echo $section_six_content["content"]; ?>
        <a href="#brandauditcal" class="transition boxLink">Take my business to the next level <i class="fas fa-arrow-right"></i></a>
      </div><!-- col -->
    </div><!-- row -->
  </div><!-- container xl -->
  <div id="st_section_three_bg" style="background: url(<?php echo $section_six_content["image"]; ?>) center center no-repeat;"></div>
</div><!-- container -->

<div class="container-xl" id="brandauditcal">
	<div class="row justify-content-between">
		<div class="col-md-12">
			<div class="calendly-inline-widget" data-url="https://calendly.com/talktosid/brandaudit?hide_landing_page_details=1&hide_gdpr_banner=1" style="min-width:100%;height:700px;"></div>
			<script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
		</div><!-- col-md -12 -->
	</div><!-- row -->
</div><!-- container -->

<?php include("footer.php"); ?>
