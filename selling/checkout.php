<?php include "header.php"; 
if(isset($_GET["action"]))
{
    if($_GET["action"] == "delete")
    {
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
        if($values["item_id"] == $_GET["id"])
        {
        unset($_SESSION["shopping_cart"][$keys]);
        echo '<script>alert("Item Removed")</script>';
        echo '<script>window.location="checkout.php"</script>';
        }
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
                            <li><a href="../<?php echo $mydata['href']?>"><?php echo $mydata['text']?></a></li>
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
    <section class="breadcrumb-section set-bg" data-setbg="../img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Sepet</h2>
                        <div class="breadcrumb__option">
                            <a href="../index.php">Anasayfa</a>
                            <span>Sepet</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
    <form method="POST" action="save/add_order.php" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Ürün</th>
                                    <th>Fiyat</th>
                                    <th>Adet</th>
                                    <th>Toplam</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if(isset($_SESSION["shopping_cart"])) {
                                    foreach($_SESSION["shopping_cart"] as $keys => $values)
                                    {
                                ?>
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="img/cart/cart-1.jpg" alt="">
                                        <h5><?php echo $_SESSION["shopping_cart"][$keys]['item_name']; ?></h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        <?php echo $_SESSION["shopping_cart"][$keys]['item_price']; ?>
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="<?php echo $_SESSION["shopping_cart"][$keys]['item_quantity'] ?>">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        <?php echo ($_SESSION["shopping_cart"][$keys]['item_price']*$_SESSION["shopping_cart"][$keys]['item_quantity']); ?>
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <a href="<?php echo "checkout.php?action=delete&id=".$_SESSION["shopping_cart"][$keys]['item_id']; ?>"><span class="icon_close"></span></a>
                                    </td>
                                </tr>
                                <?php
                                    $total_price = 0;
                                    $total_price = $total_price + $_SESSION["shopping_cart"][$keys]['item_price'];
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="../index.php" class="primary-btn cart-btn">Alışverişe Devam Et</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>İndirim Kodu</h5>
                            <form action="#">
                                <input type="text" placeholder="İndirim Kodu Giriniz">
                                <button type="submit" class="btn btn-success">İndirim Uygula</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Toplam Tutar</h5>
                        <ul>
                            <li>Toplam <span><?php echo $total_price; ?></span></li>
                        </ul>
                        <button name="checkout" type="submit" class="btn btn-success">İLERLE</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </section>
    <!-- Shoping Cart Section End -->
<?php include "footer.php"; ?>