<?php 
include('partials/conn.php');
?>
<!DOCTYPE html>
<html lang="eng">

<?php
include("partials/head.php");
?>

<body>

    <?php 
    
        include("partials/header.php");

        $query = "SELECT * FROM products LIMIT 30";
        $all_products = mysqli_query($conn, $query);

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

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-1 col-md-1">
                    <div class="section-title">
                        <h4>New</h4>
                    </div>
                </div>
                <div class="col-lg-11 col-md-11">
                    <ul class="filter__controls">
                        <li class="active" data-filter="*">All</li>
                        <?php 
                        
                            while ($category = mysqli_fetch_assoc($all_categories)) {?>
                               <li data-filter=".<?php echo str_replace(' ', '', $category['category_name'])?>"><?php echo $category['category_name']?></li>
                        <?php 
                            }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="row property__gallery">
                <?php 
                    while ($product = mysqli_fetch_assoc($all_products)) {
                        $id = $product['category_id'];
                        $categ = "SELECT * FROM categories WHERE id = $id";
                        $cat_result = mysqli_query($conn, $categ);
                        $row = mysqli_fetch_array($cat_result);
                ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mix <?php echo str_replace(' ', '', $row['category_name'])?>">
                    <div class="product__item">
                        <div class="product__item__pic set-bg">
                        <img src="admin/<?php echo $product['product_pictures'] ?>" alt="picture">
                            <div class="label new">New</div>
                            <ul class="product__hover">
                                <li><a href="admin/<?php echo $product['product_pictures'] ?>" class="image-popup"><span class="arrow_expand"></span></a></li>
                                <li><a href="#"><span class="icon_bag_alt mb-5"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#"><?php echo $product['product_name'] ?></a></h6>
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

            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Banner Section Begin -->
    <section class="banner set-bg" data-setbg="img/banner/ops-banner-nobg.png">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-8 m-auto">
                    <div class="banner__slider owl-carousel">
                        <div class="banner__item">
                            <div class="banner__text">
                                <span>LIMITED TIME OFFER</span>
                                <h1>Hurry While Stock Lasts</h1>
                                <a href="#">Shop now</a>
                            </div>
                        </div>
                        <div class="banner__item">
                            <div class="banner__text">
                                <span>LIMITED TIME OFFER</span>
                                <h1>20% OFF on All Mum & Baby</h1>
                                <a href="#">Shop now</a>
                            </div>
                        </div>
                        <div class="banner__item">
                            <div class="banner__text">
                                <span>LIMITED TIME OFFER</span>
                                <h1>50% Off for all Shipping Fee</h1>
                                <a href="#">Shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->

    <?php include('partials/trend-section.php') ?>
    
    <!-- Services Section Begin -->
    <section class="services spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="services__item">
                        <i class="fa fa-car"></i>
                        <h6>Free Shipping</h6>
                        <p>For all oder over Ksh. 5,000</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="services__item">
                        <i class="fa fa-money"></i>
                        <h6>Money Back Guarantee</h6>
                        <p>If good have Problems</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="services__item">
                        <i class="fa fa-support"></i>
                        <h6>Online Support 24/7</h6>
                        <p>Dedicated support</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="services__item">
                        <i class="fa fa-headphones"></i>
                        <h6>Payment Secure</h6>
                        <p>100% secure payment</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->

    <?php include("partials/footer.php") ?>
</body>

</html>