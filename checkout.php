<!DOCTYPE html>
<html lang="eng">
<?php
session_start();

include('partials/conn.php');
include("partials/head.php");

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
                        <span>Checkout Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6 class="coupon__link"><span class="icon_tag_alt"></span> <a href="#">We wish you a quick recovery</a></h6>
                </div>
            </div>
            <form action="handlers/order-handler.php" method="POST" class="checkout__form">
                <div class="row">
                    <div class="col-lg-8">
                        <h5>Billing details</h5>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="checkout__form__input">
                                    <p>Address <span>*</span></p>
                                    <input type="text" placeholder="Street Address" name="address">
                                </div>
                                <div class="checkout__form__input">
                                    <p>Town/City <span>*</span></p>
                                    <input type="text" placeholder="Street Address" name="city">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Phone <span>*</span></p>
                                    <input type="text" placeholder="Phone Number" name="phone">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Email <span>*</span></p>
                                    <input type="email" placeholder="Email Address" name="email">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="checkout__form__checkbox">
                                    <label for="acc">
                                        <input type="hidden" type="checkbox" id="acc">
                                    </label>
                                    </div>
                                    <div class="checkout__form__input">
                                        <input type="hidden" type="text">
                                    </div>
                                    <div class="checkout__form__checkbox">
                                        <label for="note">
                                            <input type="hidden" type="checkbox" id="note">
                                        </label>
                                    </div>
                                    <div class="checkout__form__input">
                                        <input type="hidden" type="text"
                                        placeholder="Note about your order, e.g, special noe for delivery">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="checkout__order">
                                <h5>Your order</h5>
                                <div class="checkout__order__product">
                                    <ul>
                                        <li>
                                            <span class="top__text">Product</span>
                                            <span class="top__text__right">Total</span>
                                        </li>
                                        <li>01. Chain buck bag <span>$ 300.0</span></li>
                                        <li>02. Zip-pockets pebbled<br /> tote briefcase <span>$ 170.0</span></li>
                                        <li>03. Black jean <span>$ 170.0</span></li>
                                        <li>04. Cotton shirt <span>$ 110.0</span></li>
                                    </ul>
                                </div>
                                <div class="checkout__order__total">
                                    <ul>
                                        <li>Subtotal <span>$ 750.0</span></li>
                                        <li>Total <span>$ 750.0</span></li>
                                    </ul>
                                </div>
                                <div class="checkout__order__widget">
                                    <label for="check-payment">
                                        Cash on Delivery
                                        <input type="checkbox" id="check-payment" name="cod" value="cod">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label for="paypal">
                                        PayPal
                                        <input type="checkbox" id="paypal" name="paypal" value="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button type="submit" class="site-btn">Place oder</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- Checkout Section End -->




    <?php include("partials/footer.php") ?>
</body>

</html>
