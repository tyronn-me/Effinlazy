<?php
// Template name: strategy
include('header.php');

$section_two_title = get_field('section_two_title');
$section_two_content = get_field('section_two_content');

$section_three_title = get_field('section_three_title');
$section_three_content = get_field('section_three_content');
$section_three_image = get_field('section_three_image');

$section_four_content = get_field('section_four_content');
?>

<div class="container-fuid strategyDark">
  <div class="container-xl">
    <div id="" class="row justify-content-between">
        <?php
          if ( have_posts() ) {
            while ( have_posts() ) {
              the_post();
              $feature_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
              echo '<div class="col-md-12 strategyDarkContent">' . get_the_content() . '</div>';
            }
          }
        ?>
    </div><!-- row -->
  </div><!-- container -->
  <div class="homeDarkGradient"></div>
  <video poster="" id="bgvid" autoplay loop muted playsinline>
    <source src="<?php bloginfo("template_directory"); ?>/videos/Blurrylightsatnight.webm" type="video/webm">
    <source src="<?php bloginfo("template_directory"); ?>/videos/Blurrylightsatnight.mp4" type="video/mp4">
  </video>
</div><!-- container -->

<div class="container-xl">
  <div class="row strategyRow">
    <div class="col-md-7 content_col scrollFade">
      <h2><?php echo $section_two_title; ?></h2>
      <?php echo $section_two_content['column_one']; ?>
    </div><!-- col -->
    <div class="section_4_image scrollFade" style="background: url(<?php echo $section_two_content['section_image']; ?>) center center no-repeat; padding-bottom: 100%"></div><!-- col -->
  </div><!-- row -->
</div><!-- container -->

<div class="container-xl">
  <div class="row strategyBrandList">
    <div class="col-md-12 scrollFade">
      <h2><?php echo $section_two_content['section_list_title']; ?></h2>
    </div><!-- col -->
    <div class="col-md-12 scrollFade">
      <?php echo $section_two_content['section_list']; ?>
      <a href="#discovercall" class="transition boxLink">I need this <i class="fas fa-arrow-right"></i></a>
    </div><!-- col -->
  </div><!-- row -->
</div><!-- container -->

<div class="container-fuid interiorContainers">
  <div class="container-fluid darkBGContainer">
    <div class="container-xl">
      <div class="row">
        <div class="col-md-7 scrollFade">
          <h2><?php echo $section_three_title; ?></h2>
          <?php echo $section_three_content; ?>
        </div><!-- col -->
      </div><!-- row -->
    </div><!-- container -->
    <div id="st_section_three_bg" style="background: url(<?php echo $section_three_image; ?>) center center no-repeat;"></div>
  </div><!-- container -->

  <div class="container-xl">
    <div class="row">
      <div class="col-md-12 scrollFade">
        <h2 style="text-align: center; margin-bottom: 60px;">The right strategy for you?</h2>
      </div><!-- col -->
      <div class="col-md-6 scrollFade">
        <div class="card text-white">
          <div class="card-body">
            <h5 class="card-title"><?php echo $section_four_content["column_one_title"]; ?></h5>
            <p class="card-text"><?php echo $section_four_content["column_one_content"]; ?></p>
          </div>
        </div>
      </div>
      <div class="col-md-6 scrollFade">
        <div class="card text-white">
          <div class="card-body">
            <h5 class="card-title"><?php echo $section_four_content["column_two_title"]; ?></h5>
            <p class="card-text"><?php echo $section_four_content["column_two_content"]; ?></p>
          </div>
        </div>
      </div>
    </div>
  </div><!-- container -->

  <div class="container-xl" id="discovercall">
    <div class="row">
        <div class="col-md-12 scrollFade">
          <h2>Book your free discovery call</h2>
        </div><!-- col -->
        <div class="col-12 scrollFade">
          <div class="calendly-inline-widget" data-url="https://calendly.com/talktosid/coffeesessions?hide_landing_page_details=1&hide_gdpr_banner=1" style="min-width:100%;height:700px;"></div>
          <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
        </div><!-- col -->
      </div><!-- row -->
  </div><!-- container -->
</div><!-- container -->

<?php get_template_part("parts/testimonials"); ?>

<?php include("footer.php") ?>
