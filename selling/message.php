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
                                <p>Hazır Kart Notları<span>*</span></p>
                                <select name="CARD_ID" class="form-control">
                                <option value="0">Hazır Kart Mesajı Ekle</option>
                                <?php
                                    include "../ttadmin/connect/connection.php";
                                    $sql_message = "select * from card_note where ACTIVE = 1";
                                    $result_message = mysqli_query($conn,$sql_message);
                                    while($row_message=mysqli_fetch_array($result_message))
                                { ?>
                                    <option value="<?php echo $row_message['ID']?>"><?php echo $row_message['CATEGORY']?></option>
                                <?php }?>
                                </select>
                                <br/>
                                <br/>
                            </div>
                            <div class="checkout__input">
                                    <p>Mesajınız<span>*</span></p>
                                    <textarea class="form-control" placeholder="Karta Yazılacak Yazı" rows="4" cols="100" name="CARD_NOTE"  style="height:100px;" ></textarea>
                            </div>
                            <div class="checkout__input">
                                <p>Karta Yazılacak İsim<span>*</span></p>
                                <input type="text" name="CARD_NAME" placeholder="Karta Yazılacak İsim">
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="autoSizingCheck">
                                <label class="form-check-label" name="NO_NAME" value="1" for="autoSizingCheck">
                                Kart üzerinde ismim görünmesin
                                </label>
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
    <!-- Checkout Section End -->
<?php include "footer.php"; ?>