<?php 
session_start();

error_reporting(error_reporting() & ~E_NOTICE);
?>
<!DOCTYPE html>
<html lang="en">

<?php include('admin-partials/head.php') ?>

<body>
  <div class="container-scroller d-flex">
    <!-- partial:./admin-partials/_sidebar.html -->
    <?php include('admin-partials/header.php') ?>

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            main content here
          </div>
          <!-- row end -->
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:./admin-partials/_footer.html -->
        <?php include('admin-partials/footer.php') ?>
</body>

</html>