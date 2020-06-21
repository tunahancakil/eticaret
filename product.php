<?php include "header.php";
if(isset($_GET['id'])) {
    $sql_get_product           = "select * from product where ID = ".$_GET['id'];
    $result_get_product        = mysqli_query($conn,$sql_get_product);
    $row_get_product           = mysqli_fetch_assoc($result_get_product);    
}
if(isset($_POST["add_to_cart"]))
{   
    echo "<script>alert('Hello! I am an alert box!!');</script>";
    if(isset($_SESSION["shopping_cart"]))
        {
            echo "<script>alert('2Hello! I am an alert box!!');</script>";
            $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
            if(!in_array($_GET["id"], $item_array_id))
            {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
            'item_id'                  =>  $_GET["id"],
            'item_name'                =>  $_POST["hidden_name"],
            'item_price'               =>  $_POST["hidden_price"],
            'item_delivery_clock'      =>  "12",
            'item_delivery_city'       =>  "İstanbul",
            'item_delivery_district'   =>  "Tümü",
            'item_is_delivery'         =>  $_POST["hidden_is_delivery"],
            'item_quantity'            =>  $_POST["quantity"],
            'item_image'               =>  $_POST["productImage"],
            'item_reference_no'        =>  "",
            /*
            'item_customer_name'       =>  "",
            'item_customer_phone'      =>  "",
            'item_customer_address'    =>  "",
            'item_customer_place'      =>  "",
            'item_card_note_id'        =>  "",
            'item_custom_cart_notee'   =>  "",
            'item_sender_name'         =>  "",
            'item_sender_phone'        =>  "",
            'item_sender_email'        =>  "",
            'item_invoice_type'        =>  "",
            'item_invoice_identy_no'   =>  "",
            'item_invoice_address'     =>  "",
            'item_invoice_company_name'=>  "",
            'item_invoice_tax_office'  =>  "",
            'item_is_onlince_contract' =>  ""
            */
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
            }
        }
}
?>
    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
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
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">Arama</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <?php
                                        $sql_settings    = "select * from settings where active = 1";
                                        $result_settings = mysqli_query($conn,$sql_settings);
                                        $row_settings    = mysqli_fetch_assoc($result_settings);
                            ?>
                            <div class="hero__search__phone__text">
                                <h5><?php echo $row_settings["PHONE"]?></h5>
                                <span>7/24 Canlı Destek</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Ürün Detayları</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Anasayafa</a>
                            <span>Ürün Detay</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                    <?php 
                        $sql_get_image           = "select * from product_image where PRODUCT_ID = ".$_GET['id'];
                        $result_get_image        = mysqli_query($conn,$sql_get_image);
                        while($row_get_image     = mysqli_fetch_assoc($result_get_image)) {
                        if($row_get_image['IS_MAIN_IMAGE']==1) { 
                            $sql_get_main_image            = "select * from image where ID = ".$row_get_image['IMAGE_ID'];
                            $result_get_main_image         = mysqli_query($conn,$sql_get_main_image);
                            $row_get_main_image            = mysqli_fetch_assoc($result_get_main_image);
                    ?>
                            <div class="product__details__pic__item">
                                <img class="product__details__pic__item--large" src="ttadmin/uploads/<?php echo $row_get_main_image['URL']?>" alt="">
                            </div>
                    <?php } else { ?>
                        <div class="product__details__pic__slider owl-carousel">
                            <?php
                                $sql_get_main_image            = "select * from image where ID = ".$row_get_image['IMAGE_ID'];
                                $result_get_main_image         = mysqli_query($conn,$sql_get_main_image);
                                while($row_get_main_image      = mysqli_fetch_array($result_get_main_image))
                                {
                            ?>
                                <img data-imgbigurl="ttadmin/uploads/<?php echo $row_get_main_image['URL']?>" src="ttadmin/uploads/<?php echo $row_get_main_image['URL']?>" alt="">
                            <?php }?>
                        </div>
                    <?php
                            } 
                        }
                    ?>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3><?php echo $row_get_product['TITLE'] ?></h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span><?php echo $row_get_product['VIEW'] ?></span>
                        </div>
                        <div class="product__details__price"><?php echo $row_get_product['PRICE'] ?> ₺</div>
                        <p>
                        <?php echo $row_get_product['DESCRIPTION'];
                            if(isset($_SESSION["shopping_cart"])) {
                                foreach($_SESSION["shopping_cart"] as $keys => $values)
                                {       
                                    if (empty($_SESSION["shopping_cart"][$keys]['item_reference_no'])) {
                                        echo $values["item_id"];
                                    }
                                }
                            }
                        ?>
                        </p>
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1">
                                </div>
                            </div>
                        </div>
                        <?php       
                            if(isset($_GET['id'])) {
                                $sql_product_image    = "select * from product_image where PRODUCT_ID = ".$_GET['id']." and IS_MAIN_IMAGE = 1";
                                $result_product_image = mysqli_query($conn,$sql_product_image);
                                $row_product_image    = mysqli_fetch_assoc($result_product_image);
                            }
                        ?>
                        <form method="post" action="product.php?action=add&id=<?php echo $row_get_product["ID"]; ?>">
                                                <input type="hidden" name="quantity" value="1" class="form-control">
                                                <input type="hidden" name="deliveryCity" value="1" class="form-control">
                                                <input type="hidden" name="deliveryDistrict" value="1" class="form-control">
                                                <input type="hidden" name="deliveryDay" value="1" class="form-control">
                                                <input type="hidden" name="deliveryClock" value="1" class="form-control">
                                                <input type="hidden" name="productImage" value="<?php echo $row_product_image['IMAGE_ID']?>" class="form-control">
                                                <input type="hidden" name="hidden_name" value="<?php echo $row_get_product["TITLE"];?>">
                                                <?php if (empty($row_get_product['DISCOUNT_PRICE'])) {?>
                                                <input type="hidden" name="hidden_price" value="<?php echo $row_get_product["PRICE"]; ?>">
                                                <?php } else { ?>
                                                <input type="hidden" name="hidden_price" value="<?php echo $row_get_product["DISCOUNT_PRICE"]; ?>">
                                                <?php }; ?>
                                                <input type="submit" name="add_to_cart" class="btn btn-success" value="Sepete Ekle" />
                                                <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        </form>
                        <ul>
                            <li><b>Durum</b> <span>Stokta</span></li>
                            <li><b>Teslimat</b><span>Aynı gün kargo. <samp>Saat 16:00'a kadar...</samp></span></li>
                            <li><b>Ağırlık</b><span>0.5 kg</span></li>
                            <li><b>Burada Paylaş</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Açıklama</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                    aria-selected="false">Bilgi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                    aria-selected="false">Yorumlar <span>(1)</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Ürün Açıklama</h6>
                                    <p><?php echo $row_get_product['DESCRIPTION'] ?></p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Ürün Bilgileri</h6>
                                    <p><?php echo $row_get_product['DESCRIPTION'] ?></p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Yorumlar</h6>
                                    <p>Yorumm</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Benzer Ürünler</h2>
                    </div>
                </div>
            </div>
            <div class="row">
            <?php
                    $sql_category_product    = "SELECT * FROM category_product WHERE PRODUCT_ID =".$_GET["id"];
                    $result_category_product = mysqli_query($conn,$sql_category_product);
                    $row_category_product    = mysqli_fetch_assoc($result_category_product);
                    
                    $sql_category_limit         = "SELECT * FROM category_product WHERE IS_MAIN = 0 AND CATEGORY_ID =".$row_category_product["CATEGORY_ID"]." limit 4";
                    $result_category_limit      = mysqli_query($conn,$sql_category_limit);
                    while ($row_category_limit  = mysqli_fetch_array($result_category_limit)) { ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="img/product/product-1.jpg">
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <?php 
                                $sql_product    = "SELECT * FROM product WHERE ID =".$row_category_limit["PRODUCT_ID"];
                                $result_product = mysqli_query($conn,$sql_product);
                                $row_product    = mysqli_fetch_assoc($result_product);
                            ?>
                            <div class="product__item__text">
                                <h6><a href="product.php?id=<?php echo $row_product["ID"] ?>"><?php echo $row_product["TITLE"] ?></a></h6>
                                <h5><?php echo $row_product["PRICE"] ?></h5>
                            </div>
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->
<?php include "footer.php"; ?>