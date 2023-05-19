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
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create Drug Categories</h4>
                        <p class="card-description">
                            Create the categories in which the drugs will belong to:
                        </p>
                        <form class="forms-sample" action="" method="POST">
                            <div class="form-group">
                                <label for="category-name">Category Name</label>
                                <input type="text" class="form-control" name="category-name" id="category-name" placeholder="Category Name">
                            </div>
                    
                            <button type="submit" class="btn btn-primary mr-2 mt-4">Submit</button>
                        </form>
                    </div>
                </div>
                </div>
            
          </div>
          <!-- row end -->
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:./admin-partials/_footer.html -->
        <?php include('admin-partials/footer.php') ?>
        <script src="js/file-upload.js"></script>

</body>

</html>