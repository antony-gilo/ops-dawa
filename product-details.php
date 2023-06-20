<!DOCTYPE html>
<html lang="eng">
<?php
session_start();
include('partials/conn.php');
include("partials/head.php");

$product_id = $_GET['id'];

$product_query = "SELECT * FROM products WHERE id = $product_id";
$result = mysqli_query($conn, $product_query);

$product = mysqli_fetch_assoc($result);
$category_id = $product['category_id'];

$category_query = "SELECT * FROM categories WHERE id = $category_id";
$result = mysqli_query($conn, $category_query);
$category = mysqli_fetch_assoc($result);

?>

<body>
    <?php include("partials/header.php") ?>

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                        <a href="#"><?php echo $category['category_name']; ?> </a>
                        <span><?php echo $product['product_name']; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__left product__thumb nice-scroll">
                            <a class="pt active" href="#product-1">
                                <img src="admin/<?php echo $product['product_pictures'] ?>" alt="">
                            </a>
                            <!-- <a class="pt" href="#product-2">
                                <img src="img/product/details/thumb-2.jpg" alt="">
                            </a>
                            <a class="pt" href="#product-3">
                                <img src="img/product/details/thumb-3.jpg" alt="">
                            </a>
                            <a class="pt" href="#product-4">
                                <img src="img/product/details/thumb-4.jpg" alt="">
                            </a> -->
                        </div>
                        <div class="product__details__slider__content">
                            <div class="product__details__pic__slider owl-carousel">
                                <img data-hash="product-1" class="product__big__img" src="admin/<?php echo $product['product_pictures']?>" alt="">
                                <!-- <img data-hash="product-2" class="product__big__img" src="img/product/details/product-3.jpg" alt="">
                                <img data-hash="product-3" class="product__big__img" src="img/product/details/product-2.jpg" alt="">
                                <img data-hash="product-4" class="product__big__img" src="img/product/details/product-4.jpg" alt=""> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product__details__text">
                        <h3><?php echo $product['product_name']; ?> <span><?php echo $product['product_name']; ?></span></h3>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <!-- <span>( 138 reviews )</span> -->
                        </div>
                        <div class="product__details__price"><?php echo $product['price']; ?><span></span></div>
                        <p><?php echo html_entity_decode($product['product_description']); ?></p>
                        <div class="product__details__button">
                            <div>
                                <span>&nbsp;</span>
                                <div>
                                    &nbsp;
                                </div>
                            </div>
                            <a href='handlers/cart_handler.php?product_id=<?php echo $product['id']; ?>&product_name=<?php echo $product['product_name']; ?>&product_price=<?php echo $product['price']; ?>'" 
                            class="cart-btn"><span class="icon_bag_alt"></span> Add to cart</a>
                            <!-- <ul>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_adjust-horiz"></span></a></li>
                            </ul> -->
                        </div>
                        <div class="product__details__widget">
                            <ul>
                                <li>
                                    <span>Promotions:</span>
                                    <p>Free shipping</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Description</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Specification</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Reviews ( 2 )</a>
                            </li> -->
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <h6>Description</h6>
                                <p><?php echo $product['product_description'] ?></p>
                            </div>
                            <!-- <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <h6>Specification</h6>
                                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed
                                    quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt loret.
                                    Neque porro lorem quisquam est, qui dolorem ipsum quia dolor si. Nemo enim ipsam
                                    voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed quia ipsu
                                    consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nulla
                                    consequat massa quis enim.</p>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                                    dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                                    nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium
                                    quis, sem.</p>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <h6>Reviews ( 2 )</h6>
                                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed
                                    quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt loret.
                                    Neque porro lorem quisquam est, qui dolorem ipsum quia dolor si. Nemo enim ipsam
                                    voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed quia ipsu
                                    consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nulla
                                    consequat massa quis enim.</p>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                                    dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                                    nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium
                                    quis, sem.</p>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="related__title">
                        <h5>RELATED PRODUCTS</h5>
                    </div>
                </div>
                <?php 
                    $relate_query = "SELECT * FROM products WHERE category_id = $category_id ORDER BY id DESC LIMIT 4";
                    $result = mysqli_query($conn, $relate_query);
                    while ($product_relate = mysqli_fetch_assoc($result)) {
                   
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg">
                            <img src="admin/<?php echo $product_relate['product_pictures'] ?>" alt="picture" loading="lazy">
                            <div class="label new">New</div>
                            <ul class="product__hover">
                                <li><a href="admin/<?php echo $product_relate['product_pictures']?>" class="image-popup"><span class="arrow_expand"></span></a></li>
                                <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="product-details.php?id=<?php echo $product_relate['id']; ?>"><?php echo $product_relate['product_name']; ?></a></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price"><?php echo $product_relate['price']; ?></div>
                        </div>
                    </div>
                </div>
                <?php 
                    }
                ?>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->
    <?php include("partials/footer.php") ?>
</body>

</html>