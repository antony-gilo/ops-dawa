<!DOCTYPE html>
<html lang="eng">
<?php
session_start();

include('partials/conn.php');
include("partials/head.php");
?>

<body>
    <?php
     include("partials/header.php");
     ?>

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                        <span>Shopping cart</span>
                    </div>
                </div>
            </div>  
        </div>
    </div>
<!-- Breadcrumb End -->

 <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <!-- <th>Quantity</th> -->
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                        <?php 
                            $total = 0;

                            if (isset($_SESSION['cart'])) {
                                
                                foreach ($_SESSION['cart'] as $value) {

                                    $product_id = $value['product_id'];
                                    $query = "SELECT * FROM products WHERE id = $product_id";
                                    $result = mysqli_query($conn, $query);
                                    $row = mysqli_fetch_assoc($result);

                                    $picture = 'admin/' . $row['product_pictures'];
                                    $int_price = explode('Ksh. ', $value['product_price']);
                                    $raw_price = intval($int_price[1]);
                                    $price = $raw_price * $value['quantity'];
                                    $total = $total + $price;
                        
                        ?>
                                <tr>
                                    <td class="cart__product__item">
                                        <img src="<?php echo $picture ?>" alt="" style="max-width: 90px; !important;">
                                        <div class="cart__product__item__title">
                                            <h6><?php echo $row['product_name'] ?></h6>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__price">Ksh. <?php echo $raw_price ?></td>

                                    <td class="cart__total">Ksh. <?php echo $price ?></td>
                                    <td class="cart__close">
                                    <layer>
                                        <form action="handlers/remove-cart.php" method="POST">
                                            <input type="hidden" name="cart_id" value="<?php echo $row['id'] ?>">
                                            <button class="footer__social" name="edit_cart" type="submit" style="border-radius: 50%; border: 0px;">
                                                <span class="icon_close"></span>
                                            </button>
                                        </form>
                                    </layer>
                                    </td>
                                </tr>
                            <?php 
                              }
                            } 
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn">
                        <a href="shop.php">Continue Shopping</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                </div>
                <div class="col-lg-4 offset-lg-2">
                    <div class="cart__total__procced">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Subtotal <span>Ksh. <?php echo isset($_SESSION['cart']) ? $total : 0; ?></span></li>
                            <li>Total <span>Ksh. <?php echo isset($_SESSION['cart']) ? $total : 0; ?></span></li>
                        </ul>
                        <a href="#" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Cart Section End -->

    <?php include("partials/footer.php") ?>
</body>

</html>