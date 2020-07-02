<?php include "header.php";?>
    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Fatura Detayı</h4>
                <form action="save/add_order.php" method="POST">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="checkout__input">
                                <p>Alıcı Ad Soyad<span>*</span></p>
                                <input type="text" name="CUSTOMER_NAME_SURNAME" placeholder="Ad Soyad">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Telefon Numarası<span>*</span></p>
                                        <input type="phone" name="CUSTOMER_PHONE" placeholder="Telefon">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Gönderilecek Yer<span>*</span></p>
                                        <select name="PLACE" >
                                            <option value="Ev">Ev</option>
                                            <option value="İş Yeri">İş Yeri</option>
                                            <option value="Okul">Okul</option>
                                            <option value="Diğer">Diğer</option>
                                        </select>
                                    </div>
                                </div>                                
                            </div>
                            <div class="checkout__input">
                                    <p>Adres<span>*</span></p>
                                    <textarea class="form-control" rows="4" cols="100" name="CUSTOMER_ADDRESS"></textarea>
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
                                <button type="submit" name="customer" class="btn btn-success">İLERLE</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
<?php include "footer.php"; ?>