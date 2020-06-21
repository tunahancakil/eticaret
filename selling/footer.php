<?php
            $sql_settings    = "select * from settings where active = 1";
            $result_settings = mysqli_query($conn,$sql_settings);
            $row_settings    = mysqli_fetch_assoc($result_settings);
?>
    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="../img/logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Telefon: <?php echo $row_settings['PHONE']?></li>
                            <li>Email: <?php echo $row_settings['EMAIL']?></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Yararlı Linkler</h6>
                        <ul>
                        <?php
                            $sql_menu    = "select * from menu where MENU_TYPE = 'FOOTER' AND ACTIVE = 1";
                            $result_menu = mysqli_query($conn,$sql_menu);
                            $row_menu    = mysqli_fetch_assoc($result_menu);
                            $json = json_decode($row_menu['MENU_TEMPLATE'],true);
                            foreach($json as $mydata)
                            { ?>
                                <li><a href="../<?php echo $mydata["href"]?>"><?php echo $mydata["text"]?></a></li>
                    <?php   } ?>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Kampanyalar için kayıt ol</h6>
                        <p>E-mail adresinize kampanyalarımız gönderilecektir.</p>
                        <form action="#">
                            <input type="text" placeholder="E-mail adresinizi giriniz">
                            <button type="submit" class="site-btn">Abone Ol</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                        <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script>  TT Yazılım Tarafından Tasarlanmış olup tüm hakları saklıdır. |
                        <a href="http:\\www.ttyazilim.net">TT Yazılım</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <div class="footer__copyright__payment"><img src="../img/payment-item-change.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->
    <!-- Js Plugins -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.nice-select.min.js"></script>
    <script src="../js/jquery-ui.min.js"></script>
    <script src="../js/jquery.slicknav.js"></script>
    <script src="../js/mixitup.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>