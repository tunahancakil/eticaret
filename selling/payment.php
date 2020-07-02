<?php include "header.php";?>
    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Ödeme Sayfası</h4>
                <form action="save/add_order.php" method="POST">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <!-- Ödeme formunun açılması için gereken HTML kodlar / Başlangıç -->
                                <script src="https://www.paytr.com/js/iframeResizer.min.js"></script>
                                <iframe src="https://www.paytr.com/odeme/guvenli/8eabd8841305eeece0b57555ffc005db79c8e44bcddb0fed0e45527bd4b7dbf8" id="paytriframe" frameborder="0" scrolling="no" style="width: 100%; overflow: hidden; min-height: 600px;"></iframe>
                                <script>iFrameResize({}, '#paytriframe');</script>
                                <!-- Ödeme formunun açılması için gereken HTML kodlar / Bitiş -->
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Siparişin</h4>
                                <div class="checkout__order__products">Ürünler <span>Toplam</span></div>
                                <ul>
                                <?php 
                                if(isset($_SESSION["shopping_cart"])) {
                                    foreach($_SESSION["shopping_cart"] as $keys => $values)
                                    {
                                            $_SESSION["shopping_cart"][$keys]['item_quantity'] = $_SESSION["shopping_cart"][$keys]['item_quantity'] + 1;
                                ?>
                                    <li><?php echo $_SESSION["shopping_cart"][$keys]['item_name']; ?><span><?php echo $_SESSION["shopping_cart"][$keys]['item_price']; ?>TL</span></li>
                                <?php
                                    $total_price = 0;
                                    $total_price = $total_price + $_SESSION["shopping_cart"][$keys]['item_price'];
                                    }
                                }
                                ?>
                                </ul>
                                <div class="checkout__order__subtotal">Ara Toplam <span>$750.99</span></div>
                                <div class="checkout__order__total">Toplam <span><?php echo $total_price ?></span></div>
                                <button name="message" type="submit" class="btn btn-success">İLERLE</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section class="checkout spad">
        <div class="container">
            <div>
                <input type="checkbox" id="sozlesme" name="IS_ONLINE_CONTRACT" value="1">
                <div>
                <label>Mesafeli satış sözleşmesini okudum, kabul ediyorum.</label>
            </div>
            <div class="sozlesme-div">
                Sözleşme gelecek
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
<?php include "footer.php"; ?>