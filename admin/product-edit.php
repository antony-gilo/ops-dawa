<?php 
session_start();
error_reporting(error_reporting() & ~E_NOTICE);

if (!isset($_SESSION['id-admin'])) {
  header('Location: admin-login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

<?php 
include('../partials/conn.php');

$product_id = $_GET['id'];

$product_query = "SELECT * FROM products WHERE id = '$product_id'";
$result = mysqli_query($conn, $product_query);

$row = mysqli_fetch_assoc($result);

$selected_cat_id = $row['category_id']; 

$selected_cat_query = "SELECT category_name FROM categories WHERE id = '$selected_cat_id'";
$selected_cat = mysqli_query($conn, $selected_cat_query);

$selected_cat_name = mysqli_fetch_array($selected_cat)['category_name'];


?>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>OPS | Admin</title>
  <!-- base:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/select2/select2.min.css">
  <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller d-flex">
    <!-- partial:./admin-partials/_sidebar.html -->
    <?php include('admin-partials/header.php') ?>

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Drugs/Products Into The OPS System</h4>
                        <p class="card-description">
                            Add New Drugs Or Products
                        </p>
                        <form class="forms-sample" action="../handlers/product-edit-handler.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="product-name">Product Name</label>
                                <input type="text" class="form-control" name="product-name" id="product-name" value="<?php echo $row['product_name'] ?>" required>
                                <input type="hidden" class="form-control" name="product-id" value="<?php echo $row['id'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="product-price">Price</label>
                                <input type="text" class="form-control" name="product-price" id="product-price" value="<?php echo $row['price'] ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="product-description">Product Description</label>
                                <textarea class="form-control" name="product-description" id="product-description" rows="10" required><?php echo strip_tags($row['product_description']); ?></textarea>
                            </div>

                            <div class="form-group">
                                <label>Upload Product Pictures</label>
                                <input type="file" name="product-img" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Product Picture" style="background-color: #F0EDFF;">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload Picture</button>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="product-category">Select Product Categories</label>
                                <select class="form-control" name="product-category" id="product-category" aria-hidden="true" >
                                    <option selected value="<?php echo $selected_cat_id ?>"><?php echo $selected_cat_name ?></option>
                                <?php 
                                    
                                    $category_query = "SELECT * FROM categories";
                                    $result = mysqli_query($conn, $category_query);

                                    while ($row_cat = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <option value="<?php echo $row_cat['id']; ?>"><?php echo $row_cat['category_name']; ?></option>
                                <?php 
                                    }
                                ?>
                                </select>   
                            </div>

                            <button type="submit" name="submit-product" class="btn btn-primary mr-2 mt-4">Submit</button>
                        </form>
                    </div>
                </div>
                </div>
            
          </div>
          <!-- row end -->
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:./admin-partials/_footer.html -->
        <footer class="footer">
            <div class="card">
                <div class="card-body">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted d-block text-center d-sm-inline-block">Copyright © Grace Nyambura 2023</span>
                </div>
                </div>
            </div>
            </footer>
            <!-- partial -->
            </div>
            <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
            </div>
            <!-- container-scroller -->

            <!-- base:js -->
            <script src="vendors/js/vendor.bundle.base.js"></script>
            <!-- endinject -->
            <!-- Plugin js for this page-->
            <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
            <script src="vendors/chart.js/Chart.min.js"></script>
            <script src="vendors/select2/select2.min.js"></script>
            <!-- End plugin js for this page-->
            <!-- inject:js -->
            <script src="js/off-canvas.js"></script>
            <script src="js/hoverable-collapse.js"></script>
            <script src="js/template.js"></script>
            <script src="js/settings.js"></script>
            <!-- endinject -->
            <!-- plugin js for this page -->
            <!-- End plugin js for this page -->
            <!-- Custom js for this page-->
            <script src="js/dashboard.js"></script>
            <!-- End custom js for this page-->
            <script src="js/file-upload.js"></script>
            <script src="js/typeahead.js"></script>
            <script src="js/select2.js"></script>

</body>

</html>