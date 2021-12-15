<?php
$pb_title_option = get_option( 'pb_title_option' );
$pb_content_option = get_option( 'pb_content_option' );
if ( $pb_title_option ) {
?>
<div class="container-fluid" id="brandBuilderWrap">
    <div class="container-xl">
      <div class="row justify-content-between">
        <div class="col-md-5">
          <h2><?php echo $pb_title_option; ?></h2>
          <p><?php echo $pb_content_option; ?></p>
        </div><!-- col -->
        <div class="col-md-7">
          <form id="converKitForm">
            <input type="hidden" id="formID" name="formID" value=""/>
            <div class="form-group">
              <label for="c_first_name">First Name*</label>
              <input type="email" class="form-control" id="c_first_name" placeholder="Your First Name">
            </div>
            <div class="form-group">
              <label for="c_email">Email Address*</label>
              <input type="email" class="form-control" id="c_email" aria-describedby="emailHelp" placeholder="Your Email Address">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <button type="submit" id="converKitSubmit" class="btn btn-dark">Join my Free Brand Builder Program!</button>
          </form><!-- form -->
        </div><!-- col -->
      </div><!-- row -->
    </div><!-- container -->
</div><!-- container -->
<?php } ?>
</div><!-- site wrap -->
<div class="container-fluid" id="footer">
  <div class="container-xl">
    <div class="row justify-content-between">
      <div class="cols col-md-3">
        <h3 class="footerLogo">Effinlazy</h3>
        <p>Brand Strategist and Consultant</p>
      </div><!-- col -->
      <div class="cols col-md-3">
        <h4>Quick Links</h4>
        <ul class="list-group list-group-flush">
          <?php dynamic_sidebar( 'Footer Sidebar' ); ?>
        </ul>
      </div><!-- col -->
      <div class="cols col-md-3">
        <h4>Recent Posts</h4>
        <ul class="list-group list-group-flush">
          <?php dynamic_sidebar( 'Footer Sidebar Right' ); ?>
        </ul>
      </div><!-- col -->
    </div><!-- row -->
    <div class="row">
      <div class="col-md-12">
        <p id="copydate">copyright &copy; <?php echo date("Y"); ?> <?php bloginfo("title"); ?></p>
      </div><!-- col -->
    </div><!-- row -->
  </div><!-- container -->
</div><!-- footer -->
<?php wp_footer(); ?>
</body>
</html>
