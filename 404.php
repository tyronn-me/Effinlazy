<?php
// 404 not found
include('header.php');
?>

<div class="container-xl interiorContainers">
  <div class="row justify-content-between notFoundPage">
    <div class="col-md-12">
      <h1>404</h1>
      <p>The page you are looking for seems to not exist or was removed.</p>
      <a href="<?php bloginfo('url'); ?>">Take me home</a>
    </div><!-- col -->
  </div><!-- row -->
</div><!-- container -->

<?php include('footer.php'); ?>
