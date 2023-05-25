<?php 
session_start();
error_reporting(error_reporting() & ~E_NOTICE);

if (!isset($_SESSION['id-admin'])) {
  header('Location: admin-login.php');
}

include('../partials/conn.php');
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
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Products Added to OPS Database</h4>
                  <p class="card-description">
                    All Our Products In Stock
                  </p>
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>
                            No:
                          </th>
                          <th>
                            Product Image
                          </th>
                          <th>
                            Product Name
                          </th>
                          <th>
                            Product Description
                          </th>
                          <th>
                            Selling Price
                          </th>
                          <th>
                            Date Added
                          </th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                    <?php 
                        $query = "SELECT * FROM products";
                        $products = mysqli_query($conn, $query);
                        $i = 0;
                        while ($all_products = mysqli_fetch_assoc($products)) {
                            $i++;
                        ?>

                        <tr>
                          <td class="py-1">
                            <?php echo $i; ?>
                          </td>

                          <td class="py-1">
                            <img src="<?php echo $all_products['product_pictures']; ?>" alt="image">
                          </td>
                          <td>
                            <?php echo $all_products['product_name'] ?>
                          </td>
                          <td class="text-truncate" style="max-width: 300px;">
                            <?php echo $all_products['product_description'] ?>
                          </td>
                          <td>
                            <?php echo $all_products['price'] ?>
                          </td>
                          <td>
                          <?php echo $all_products['created_at'] ?>
                          </td>
                          <td>
                            <a href="" type="button" class="btn btn-info btn-rounded btn-icon pt-2">
                                <i class="mdi mdi-pencil"></i>
                            </a>
                          </td>
                          <td>
                            <a href="index.php" type="button" class="btn btn-danger btn-rounded btn-icon pt-2">
                                <i class="mdi mdi-delete"></i>
                            </a>
                          </td>
                        </tr>

                    <?php
                        }
                    ?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- row end -->
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:./admin-partials/_footer.html -->
        <?php include('admin-partials/footer.php') ?>
        <script src="js/settings.js"></script>
</body>

</html>