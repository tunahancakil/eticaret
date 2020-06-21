<?php include "header.php";?>
    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Fatura Detayı</h4>
                <form action="save/add_order.php" action="POST">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="checkout__input">
                                <p>Ad Soyad<span>*</span></p>
                                <input type="text" name="SENDER_NAME"
                                placeholder="Posta Kodu">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Telefon<span>*</span></p>
                                        <input type="phone" name="SENDER_PHONE"
                                        placeholder="Telefon">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>E-Posta Adersi<span>*</span></p>
                                        <input type="text" name="SENDER_EMAIL" 
                                        placeholder="Email">
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
                                            <input type="phone" name="INVOICE_IDENTY_NO"
                                            placeholder="Telefon">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Fatura Adersi<span>*</span></p>
                                            <input type="text" name="INVOICE_ADDRESS" 
                                            placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="firma" style="display:none;">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Firma Adı<span>*</span></p>
                                            <input type="phone" name="SENDER_PHONE"
                                            placeholder="Telefon">
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
                                            <input type="phone" name="SENDER_PHONE"
                                            placeholder="Telefon">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Vergi Dairesi<span>*</span></p>
                                            <input type="text" name="SENDER_EMAIL" 
                                            placeholder="Email">
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
                                    <li>Vegetable’s Package <span>$75.99</span></li>
                                    <li>Fresh Vegetable <span>$151.99</span></li>
                                    <li>Organic Bananas <span>$53.99</span></li>
                                </ul>
                                <div class="checkout__order__subtotal">Subtotal <span>$750.99</span></div>
                                <div class="checkout__order__total">Total <span>$750.99</span></div>
                                <button type="submit" name="invoice" class="site-btn">İLERLE</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script>
            $(document).ready(function () {
                $(".faturatipilinsahis").on("click", function () {
                    $("#d").val("1");
                    $("#sahis").css("display", "block");
                    $("#firma").css("display", "none");
                });
                $(".faturatipilinfirma").on("click", function () {
                    $("#faturatipi").val("2");
                    $("#sahis").css("display", "none");
                    $("#firma").css("display", "block");
                });
            });
    </script>
    <!-- Checkout Section End -->
<?php include "footer.php"; ?>