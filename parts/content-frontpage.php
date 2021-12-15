<?php
  $sectionOneTitle = get_field("section_one_title");
  $sectionOneText = get_field("section_one_text");
  $sectionOneImage = get_field("section_one_image");
  $sectionOneLink = get_field("section_one_link");

  $sectionTwoTitle = get_field("section_two_title");
  $sectionTwoText = get_field("section_two_text");

  $sectionThreeTitle = get_field("section_three_title");
  $sectionThreeText = get_field("section_three_text");
  $sectionThreeImage = get_field("section_three_image");

  $sectionFourTitle = get_field("section_four_title");
  $sectionFourText = get_field("section_four_text");
  $sectionFourImage = get_field("section_four_image");
  $sectionFourLink = get_field("section_four_link");

?>

<div class="container-fluid homeDark">
  <div class="container-xl">
    <div class="row">
      <div class="col-md-12 homeDarkContent">
        <h1 class="display-1"><?php echo $sectionOneTitle; ?></h1>
        <?php echo $sectionOneText; ?>
        <a href="<?php echo $sectionOneLink; ?>" class="transition boxLink">Find your brand's true purpose <i class="fas fa-arrow-right"></i></a>
      </div><!-- col -->
    </div><!-- row -->
  </div><!-- containre -->
  <div class="homeDarkGradient"></div>
  <video poster="" id="bgvid" autoplay loop muted playsinline>
    <source src="<?php bloginfo("template_directory"); ?>/videos/mainVideo.webm" type="video/webm">
    <source src="<?php bloginfo("template_directory"); ?>/videos/mainVideo.mp4" type="video/mp4">
  </video>
</div><!-- container -->

<div class="container-xl scrollFade">
  <div class="row homepage justify-content-center">
    <div class="col-md-9">
      <h2 class=""><?php echo $sectionTwoTitle; ?></h2>
      <?php echo $sectionTwoText; ?>
    </div><!-- col -->
  </div><!-- row -->
</div><!-- container -->

<div class="container-fluid" id="homeAboutContainer">
  <div class="container-xl">
    <div class="row homepage about justify-content-between">
      <div class="col-md-5 scrollFade">
        <div id="homeAboutImage" style="background: url(<?php echo $sectionThreeImage; ?>) center center no-repeat;"></div>
      </div><!-- col -->
      <div class="col-md-6 scrollFade">
        <h2><?php echo $sectionThreeTitle; ?></h2>
        <?php echo $sectionThreeText; ?>
        <a href="<?php echo $sectionOneLink; ?>" class="transition boxLink">Tell me more <i class="fas fa-arrow-right"></i></a>
      </div><!-- col -->
    </div><!-- row -->
  </div><!-- container -->
</div><!-- container -->

<div class="container-xl">
  <div class="row homepage">
    <div class="col-md-7 content_col scrollFade">
      <h2 class=""><?php echo $sectionFourTitle; ?></h2>
      <?php echo $sectionFourText; ?>
      <a href="<?php echo $sectionFourLink; ?>" class="transition boxLink">I need a strategy <i class="fas fa-arrow-right"></i></a>
    </div><!-- col -->
    <div class="section_4_image scrollFade" style="background: url(<?php echo $sectionFourImage; ?>) center center no-repeat;"></div><!-- col -->
  </div><!-- row -->
</div><!-- container -->

<?php get_template_part( 'parts/testimonials' ); ?>
