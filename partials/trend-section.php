    <!-- Trend Section Begin -->
    <section class="trend spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="trend__content">
                        <div class="section-title">
                            <h4>Hot Trend</h4>
                        </div>
                        <?php 
                            $trend_query = "SELECT * FROM `products` WHERE created_at < NOW() - INTERVAL 1 WEEK";
                            $trendy_products = mysqli_query($conn, $trend_query);
                            
                            while ($trend = mysqli_fetch_assoc($trendy_products)) { 
                                ?>
                        <div class="trend__item">
                            <div class="trend__item__pic">
                                <img src="admin/<?php echo $trend['product_pictures'] ?>" alt="picture">
                            </div>
                            <div class="trend__item__text">
                                <h6><a href="product-details.php?id=<?php echo $trend['id']?>" style="color: grey;"><?php echo $trend['product_name'] ?></a></h6>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product__price"><?php echo $trend['price'] ?></div>
                            </div>
                        </div>
                        <?php 
                            }
                        ?>      
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="trend__content">
                        <div class="section-title">
                            <h4>Best seller</h4>
                        </div>
                        <?php 
                            $seller_query = "SELECT * FROM `products` LIMIT 4";
                            $seller_products = mysqli_query($conn, $seller_query);
                            
                            while ($seller = mysqli_fetch_assoc($seller_products)) { 
                                ?>
                        <div class="trend__item">
                            <div class="trend__item__pic">
                                <img src="admin/<?php echo $seller['product_pictures'] ?>" alt="picture">
                            </div>
                            <div class="trend__item__text">
                                <h6><a href="product-details.php?id=<?php echo $seller['id']?>" style="color: grey;"><?php echo $seller['product_name'] ?></a>></h6>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product__price"><?php echo $seller['price'] ?></div>
                            </div>
                        </div>
                        <?php 
                            }
                        ?>      
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="trend__content">
                        <div class="section-title">
                            <h4>Feature </h4>
                        </div>
                        <?php 
                            $feature_query = "SELECT * FROM `products` LIMIT 5";
                            $feature_products = mysqli_query($conn, $feature_query);
                            
                            while ($feature = mysqli_fetch_assoc($feature_products)) { 
                                ?>
                        <div class="trend__item">
                            <div class="trend__item__pic">
                                <img src="admin/<?php echo $feature['product_pictures'] ?>" alt="picture">
                            </div>
                            <div class="trend__item__text">
                                <h6><a href="product-details.php?id=<?php echo $feature['id']?>" style="color: grey;"><?php echo $feature['product_name'] ?></a></h6>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product__price"><?php echo $feature['price'] ?></div>
                            </div>
                        </div>
                        <?php 
                            }
                        ?>      
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Trend Section End -->