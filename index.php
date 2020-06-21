<?php include "header.php"; ?>
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Tüm Kategoriler</span>
                        </div>
                        <ul>
                        <?php
                            $sql_menu    = "select * from menu where MENU_TYPE = 'HEADER' AND ACTIVE = 1";
                            $result_menu = mysqli_query($conn,$sql_menu);
                            $row_menu    = mysqli_fetch_assoc($result_menu);
                            $json = json_decode($row_menu['MENU_TEMPLATE'],true);
                            foreach($json as $mydata)
                            {   
                        ?>
                            <li><a href="<?php echo $mydata['href']?>"><?php echo $mydata['text']?></a></li>
                        <?php 
                        }
                        ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    Tüm Kategoriler
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="Neye ihtiyacınız var?">
                                <button type="submit" class="site-btn">Arama</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5><?php echo $row_settings['PHONE']?></h5>
                                <span>7 Gün 24 Saat Destek</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="img/banner1.jpg">
                        <div class="hero__text">
                            <span>Her Zaman Taze</span>
                            <h2><br />100% Organik</h2>
                            <p>Aynı Gün Teslimat Seçeneği</p>
                            <a href="#" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
<!--
    <div class="contents">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                    <tr>
                                    <th width="10%">Ürün Resim</th>
                                    <th width="30%">Ürün Adı</th>
                                    <th width="10%">Adet</th>
                                    <th width="20%">Fiyat</th>
                                    <th width="15%">Toplam</th>
                                    <th width="5%">Sil</th>
                                    </tr>
                                    <?php
                                    /*
                                    if(!empty($_SESSION["shopping_cart"]))
                                    {
                                    $total = 0;
                                    foreach($_SESSION["shopping_cart"] as $keys => $values)
                                    {
                                    ?>
                                        <tr>
                                        <?php   
                                                $sql_image    = "select * from image where ID = ".$values["item_image"]."";
                                                $result_image = mysqli_query($conn,$sql_image);
                                                $row_image    = mysqli_fetch_assoc($result_image);
                                        ?>
                                        <td><img src="<?php echo 'ttadmin/process/'.$row_image["URL"]; ?>"></td>
                                        <td><?php echo $values["item_name"]; ?></td>
                                        <td><?php echo $values["item_quantity"]; ?></td>
                                        <td>₺ <?php echo $values["item_price"]; ?></td>
                                        <td>₺ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
                                        <td><a href="product.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Sil</span></a></td>
                                        </tr>
                                        <?php
                                        $total = $total + ($values["item_quantity"] * $values["item_price"]);
                                    }
                                    ?>
                                    <tr>
                                    <td colspan="3" align="right">Total</td>
                                    <td align="right">₺ <?php echo number_format($total, 2); ?></td>
                                    <td></td>
                                    </tr>
                                    <?php
                                    }*/
                                    ?>                                    
                                    </table>
                                        <div class="coupon-area">
                                            <form action="" method="post">
                                                <div class="input-group">
                                                    <input type="text" name="coupon" id="coupon" class="form-control" placeholder="İndirim Kodu" autocomplete="off">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-info couponbutton" type="button"><span class="fa fa-gift"></span> Kullan</button>
                                                    </span>
                                                </div>
                                            </form>
                                            <div class="checkout">
                                            <a href="selling/checkout.php" role="button" class="btn btn-success">Satın Al</a>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            -->
    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                <?php 
                $sql = "select * from product where ACTIVE = 1 Order By id DESC LIMIT 5;";
                $result = mysqli_query($conn,$sql);
                while($row=mysqli_fetch_array($result))
                {
                    $sql_image         = "select * from product_image where PRODUCT_ID = ".$row['ID']."";
                    $result_image      = mysqli_query($conn,$sql_image);
                    $row_image         = mysqli_fetch_assoc($result_image);
                        $sql_get_image     = "select * from image where ID = ".$row_image['IMAGE_ID']."";
                        $result_get_image  = mysqli_query($conn,$sql_get_image);
                        $row_get_image     = mysqli_fetch_assoc($result_get_image);
                ?>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="<?php echo 'ttadmin/uploads/'.$row_get_image['URL']?>">
                        <h5><a href="<?php echo 'product.php?id='.$row['ID'].''?>"><?php echo $row['TITLE']?> </a></h5>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Ürün Kategorilerimiz</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                        <li class="active" data-filter="*">Tümü</li>
                        <?php                 
                            $sql_category_title = "select * from category where ACTIVE = 1 AND MAIN_PAGE = 1";
                            $result_category_title = mysqli_query($conn,$sql_category_title);
                            while($row_category_title=mysqli_fetch_array($result_category_title))
                            { 
                        ?>
                            <li data-filter=".<?php echo $row_category_title['TITLE'] ?>"><?php echo $row_category_title['TITLE'] ?></li>
                        <?php
                            } 
                        ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                <?php                 
                    $sql_category = "select * from category where ACTIVE = 1 AND MAIN_PAGE = 1";
                    $result_category = mysqli_query($conn,$sql_category);
                    while($row_category=mysqli_fetch_array($result_category))
                    { 
                        $sql_index_category      = "select * from category_product where CATEGORY_ID = ".$row_category['ID']." and IS_MAIN = 1";
                        $result_index_category   = mysqli_query($conn,$sql_index_category);
                        while($row_index_category= mysqli_fetch_array($result_index_category)){
                            $sql_index_product      = "select * from product where ID = ".$row_index_category['PRODUCT_ID'];
                            $result_index_product   = mysqli_query($conn,$sql_index_product);
                            $row_index_product      = mysqli_fetch_assoc($result_index_product);
                ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mix <?php echo $row_category['TITLE'] ?>">
                        <div class="featured__item">
                        <?php
                            $sql_index_product_image           = "select * from product_image where PRODUCT_ID = ".$row_index_category['PRODUCT_ID'];
                            $result_index_product_image        = mysqli_query($conn,$sql_index_product_image);
                            $row_index_product_image           = mysqli_fetch_assoc($result_index_product_image);
                            $sql_index_get_product_image           = "select * from image where ID = ".$row_index_product_image['IMAGE_ID'];
                            $result_index_get_product_image        = mysqli_query($conn,$sql_index_get_product_image);
                            $row_index_get_product_image           = mysqli_fetch_assoc($result_index_get_product_image);
                        ?>    
                            <div class="featured__item__pic set-bg" data-setbg="ttadmin/uploads/<?php echo $row_index_get_product_image['URL']?>">
                                <ul class="featured__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <h6><a href="product.php?id=<?php echo $row_index_product['ID']?>"><?php echo $row_index_product['TITLE'] ?></a></h6>
                                <h5>$30.00</h5>
                            </div>
                        </div>
                    </div>
                <?php
                    }
                }
                ?> 
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Review Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->
<?php include "footer.php"; ?>