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
                        <h4 class="card-title">Add Drugs/Products Into The OPS System</h4>
                        <p class="card-description">
                            Add New Drugs Or Products
                        </p>
                        <form class="forms-sample">
                            <div class="form-group">
                                <label for="product-name">Product Name</label>
                                <input type="text" class="form-control" name="product-name" id="product-name" placeholder="Name of The Product">
                            </div>

                            <div class="form-group">
                                <label for="product-price">Price</label>
                                <input type="text" class="form-control" name="product-price" id="product-price" placeholder="Price of The Product">
                            </div>

                            <div class="form-group">
                                <label for="product-description">Product Description</label>
                                <textarea class="form-control" name="product-description" id="product-description" rows="10" placeholder="Brief Desc of The Product"></textarea>
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

                            <!-- <div class="form-group" data-select2-id="7">
                                <label>Multiple select using select 2</label>
                                <select class="js-example-basic-multiple w-100 select2-hidden-accessible" multiple="" data-select2-id="4" tabindex="-1" aria-hidden="true">
                                <option value="AL" data-select2-id="18">Alabama</option>
                                <option value="WY" data-select2-id="19">Wyoming</option>
                                <option value="AM" data-select2-id="20">America</option>
                                <option value="CA" data-select2-id="21">Canada</option>
                                <option value="RU" data-select2-id="22">Russia</option>
                                </select><span class="select2 select2-container select2-container--default select2-container--above" dir="ltr" data-select2-id="5" style="width: 456.5px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                            </div> -->

                            <button type="submit" class="btn btn-primary mr-2 mt-4">Submit</button>
                            <button class="btn btn-light mt-4">Cancel</button>
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