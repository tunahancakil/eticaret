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
                                <p>Ad Soyad<span>*</span></p>
                                <input type="text" name="SENDER_NAME" placeholder="Ad Soyad">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Telefon<span>*</span></p>
                                        <input type="phone" name="SENDER_PHONE" placeholder="Telefon">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>E-Posta Adersi<span>*</span></p>
                                        <input type="text" name="SENDER_EMAIL" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="checkout__input">
                                        <p>Bireysel<span>*</span></p>
                                        <input type="radio" name="INVOICE_TYPE" value="0" class="faturatipilinsahis">
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="checkout__input">
                                        <p>Kurumsal<span>*</span></p>
                                        <input type="radio" name="INVOICE_TYPE" value="1" class="faturatipilinsahis">
                                    </div>
                                </div>
                            </div>
                            <div id="sahis">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>T.C. Kimlik Numarası<span>*</span></p>
                                            <input type="phone" name="INVOICE_IDENTY_NO" placeholder="Kimlik Numarası">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Fatura Adersi<span>*</span></p>
                                            <input type="text" name="INVOICE_ADDRESS" placeholder="Fatura Adersi">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="firma" style="display:none;">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Firma Adı<span>*</span></p>
                                            <input type="phone" name="COMPANY_NAME" placeholder="Firma Adı">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Fatura Adresi<span>*</span></p>
                                            <textarea class="form-control" placeholder="Fatura Adresi" name="COMPANY_INVOICE_ADDRESS"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Vergi Numarası<span>*</span></p>
                                            <input type="phone" name="COMPANY_INVOICE_IDENTY_NO" placeholder="Vergi Numarası">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Vergi Dairesi<span>*</span></p>
                                            <input type="text" name="TAX_OFFICE" placeholder="Vergi Dairesi">
                                        </div>
                                    </div>
                                </div>
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
                                <button name="invoice" type="submit" class="btn btn-success">İLERLE</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
<?php include "footer.php"; ?>