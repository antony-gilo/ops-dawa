<?php 
session_start();
error_reporting(error_reporting() & ~E_NOTICE);

include_once('../partials/conn.php');

if (!isset($_SESSION['id-admin'])) {
  header('Location: admin-login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<?php 

include('admin-partials/head.php');

$product_id = $_GET['id'];

$product_query = "SELECT * FROM products WHERE id = '$product_id'";
$result = mysqli_query($conn, $product_query);

$row = mysqli_fetch_assoc($result);

?>

<body>
  <div class="container-scroller d-flex">
    <!-- partial:./admin-partials/_sidebar.html -->
    <?php include('admin-partials/header.php') ?>

      <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $row['product_name'] ?></h4>
                                <p class="card-description">More Details About The Product</p>
                                <div class="template-demo">
                                <img src="<?php echo $row['product_pictures']; ?>" alt="picture">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 pt-5" >
                            <div class="card-body">
                                <h4 class="card-title"> Product Name:</h4>
                                <p class="card-description"> <?php echo $row['product_name'] ?> </p>
                                <h4 class="card-title">Product Selling Price:</h4>
                                <p class="card-description"> <?php echo $row['price'] ?> </p>
                                <hr>
                                <div class="template-demo">
                                <p>
                                <h4 class="card-title">Product Description:</h4>
                                    <?php echo $row['product_description'] ?>
                                </p>
                                </div>
                                <hr>
                                <h4 class="card-title">Date Added To OPS System:</h4>
                                <p class="card-description"> <?php echo $row['created_at'] ?> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>

        
        <!-- content-wrapper ends -->
        <!-- partial:./admin-partials/_footer.html -->
        <?php include('admin-partials/footer.php') ?>
</body>

</html>