<?php include "header.php";?>
    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Üye Giriş</h4>
                <form action="../process/login.php">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="checkout__input">
                                <p>Kullanıcı Adı/E-Mail<span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="checkout__input">
                                <p>Şifre<span>*</span></p>
                                <input type="password">
                            </div>
                            <button type="submit" class="btn btn-success">Giriş Yap</button>
                            <a href="invoice.php" class="btn btn-warning">Üye Olmadan Devam Et</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
<?php include "footer.php"; ?>