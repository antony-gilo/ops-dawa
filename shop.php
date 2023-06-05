<?php
include('partials/conn.php');

$limit = 20;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;
$next = $page + 1;
$previous = ($page - 1) === 0 ? 1 : $page -1;

$query = "SELECT * FROM products LIMIT $start, $limit";

$all_products = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html lang="eng">

<?php
include("partials/head.php");
?>

<body>

<?php

include("partials/header.php");

$category_query = "SELECT * FROM categories";
$all_categories = mysqli_query($conn, $category_query);

?>

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

     <!-- Shop Section Begin -->
     <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="shop__sidebar">
                        <div class="sidebar__color">
                            <div class="section-title">
                                <h4>Shop by size</h4>
                            </div>
                            <div class="size__list color__list">
                                <?php
                                $category_query = "SELECT * FROM categories";
                                $all_categories = mysqli_query($conn, $category_query);

                                while ($category = mysqli_fetch_assoc($all_categories)) {
                                    ?>
                                    <label for="<?php echo $category['category_name']; ?>">
                                        <?php echo $category['category_name']; ?>
                                        <input type="checkbox" value="<?php echo $category['id'] ?>" id="<?php echo $category['category_name']; ?>">
                                        <span class="checkmark"></span>
                                    </label>
                                <?php
                                    }
                                    ?>
                            </div>
                        </div>
                        
                        <div class="sidebar__filter">
                            <div class="section-title">
                                <h4>Shop by price</h4>
                            </div>
                            <div class="filter-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="150" data-max="4999"></div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <span>Ksh:</span>
                                        <input type="text" id="minamount">
                                        <input type="text" id="maxamount">
                                    </div>
                                </div>
                            </div>
                            <a href="#">Filter</a>
                        </div>  
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="row">
                        <?php
                            
                            while ($product = mysqli_fetch_assoc($all_products)) {
                        ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg">
                                    <img src="admin/<?php echo $product['product_pictures'] ?>" alt="picture" loading="lazy">
                                    <div class="label new">New</div>
                                    <ul class="product__hover">
                                        <li><a href="admin/<?php echo $product['product_pictures'] ?>" class="image-popup"><span class="arrow_expand"></span></a></li>
                                        <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="product-details.php?id=<?php echo $product['id'] ?>"><?php echo $product['product_name'] ?></a></h6>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="product__price"><?php echo $product['price'] ?></div>
                                </div>
                            </div>
                        </div>
                            <?php 
                                }
                             ?>
                        <div class="col-lg-12 text-center">
                            <div class="pagination__option">
                                <a href="shop.php?page=<?php echo $previous; ?>"><i class="fa fa-angle-left"></i></a>
                                <a href="shop.php?page=1">1</a>
                                <a href="shop.php?page=2">2</a>
                                <a href="shop.php?page=3">3</a>
                                <a href="shop.php?page=<?php echo $next; ?>"><i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->

    <?php include("partials/footer.php") ?>
</body>

</html>