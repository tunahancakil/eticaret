<?php 
include "ttadmin/connect/connection.php"; 
session_start();
?>
<!DOCTYPE html>
<html lang="tr">
<?php
            $sql_settings    = "select * from settings where active = 1";
            $result_settings = mysqli_query($conn,$sql_settings);
            $row_settings    = mysqli_fetch_assoc($result_settings);
?>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $row_settings['TITLE']?></title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i>Giriş</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <?php
                            $sql_menu    = "select * from menu where MENU_TYPE = 'HEADER' AND ACTIVE = 1";
                            $result_menu = mysqli_query($conn,$sql_menu);
                            $row_menu    = mysqli_fetch_assoc($result_menu);
                            $json = json_decode($row_menu['MENU_TEMPLATE'],true);
                            foreach($json as $mydata)
                            { if(isset($mydata['children'])){ ?>
                            <li><a href="#"><?php echo $mydata["text"]?></a>
                                <ul class="header__menu__dropdown">
                                <?php foreach($mydata['children']  as $child)  { ?>
                                    <li><a href="<?php echo $child['menuType'].'.php?title='.$mydata["text"] ?>"><?php echo $child["text"] ?></a></li>
                                <?php } ?>
                                </ul>
                            </li>
                            <?php } else { ?>
                                <li><a href="./blog.html"><?php echo $mydata["text"]?></a></li>
                            <?php }?>
                <?php }?>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> <?php echo $row_settings['EMAIL']?></li>
                <li>Aynı gün teslimat</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> <?php echo $row_settings['EMAIL']?></li>
                                <li>Tüm siparişleriniz aynı gün kargoda</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <!--
                            <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                            -->
                            <div class="header__top__right__auth">
                                <a href="#"><i class="fa fa-user"></i>Giriş</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.php"><img src="<?php echo $row_settings['LOGO']; ?>" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                        <?php
                            $sql_menu    = "select * from menu where MENU_TYPE = 'HEADER' AND ACTIVE = 1";
                            $result_menu = mysqli_query($conn,$sql_menu);
                            $row_menu    = mysqli_fetch_assoc($result_menu);
                            $json = json_decode($row_menu['MENU_TEMPLATE'],true);
                            foreach($json as $mydata)
                            { if(isset($mydata['children'])){ ?>
                            <li><a href="#"><?php echo $mydata["text"]?></a>
                                <ul class="header__menu__dropdown">
                                <?php foreach($mydata['children']  as $child)  { ?>
                                    <li><a href="<?php echo $child['menuType'].'.php?title='.$mydata["text"] ?>"><?php echo $child["text"] ?></a></li>
                                <?php } ?>
                                </ul>
                            </li>
                            <?php } else { ?>
                                <li><a href="./blog.html"><?php echo $mydata["text"]?></a></li>
                            <?php }?>
                        <?php }?>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="selling/checkout.php"><i class="fa fa-shopping-bag"></i> <span><?php if(isset($_SESSION["shopping_cart"])) {echo count($_SESSION["shopping_cart"]);} ?></span></a></li>
                        </ul>
                        <div class="header__cart__price">item:<span>$150.00</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
    
