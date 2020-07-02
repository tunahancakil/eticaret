<?php
include("../../ttadmin/connect/connection.php");
session_start();
/* Checkout Info */
if (isset($_POST['checkout'])) {
    if(isset($_SESSION["shopping_cart"]))
    {
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {       
                if (empty($_SESSION["shopping_cart"][$keys]['item_reference_no'])) {
                $referenceNo   = strtoupper(uniqid());
                $_SESSION["shopping_cart"][$keys]['item_reference_no'] = $referenceNo;
                    $sql_orders    = 'INSERT INTO orders (REFERENCE_NO,DELIVERY_CLOCK,DELIVERY_CITY,DELIVERY_DISTRICT,IS_DELIVERY,TOTAL_AMOUNT) VALUES (
                        "'.$referenceNo.'","'.$values["item_delivery_clock"].'","'.$values["item_delivery_city"].'","'.$values["item_delivery_district"].'",
                        "'.$values["item_is_delivery"].'","'.($values["item_price"]*$values["item_quantity"]).'"
                    )';
                    $result_orders = mysqli_query($conn,$sql_orders);
                    if ($result_orders==0){
                    echo "Sipariş başlatılamadı, kontrol ediniz.";
                    }else{
                    echo "Başarıyla eklendi";
                    header('Location:../user_login.php');
                    };
                } else {
                    $sql_orders = 'UPDATE orders SET DELIVERY_CLOCK = "'.$values["item_delivery_clock"].'", DELIVERY_CITY = '.$values["item_delivery_city"].', 
                    DELIVERY_DISTRICT = "'.$values["item_delivery_city"].'", IS_DELIVERY = '.$values["item_is_delivery"].', TOTAL_AMOUNT = '.($values["item_price"]*$values["item_quantity"]).' 
                    WHERE REFERENCE_NO = '.$values['item_reference_no'].'';
                    $result_orders = mysqli_query($conn,$sql_orders);
                    if ($result_orders==0){
                    echo "Sipariş başlatılamadı, kontrol ediniz.";
                    }else{
                    echo "Başarıyla eklendi";
                    header('Location:../user_login.php');
                    };
                }
        }
    }
}
// Customer Info 
if (isset($_POST['customer'])) {
    if(isset($_SESSION["shopping_cart"]))
    {
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {       
                $sql_orders = 'UPDATE orders SET CUSTOMER_NAME = "'.$_POST['CUSTOMER_NAME_SURNAME'].'", CUSTOMER_PHONE = "'.$_POST['CUSTOMER_PHONE'].'", 
                CUSTOMER_ADDRESS = "'.$_POST['CUSTOMER_ADDRESS'].'", STATUS = "CUSTOMER_INFORMATION",
                CUSTOMER_PLACE = "'.$_POST['PLACE'].'" WHERE REFERENCE_NO = "'.$values['item_reference_no'].'"';
                $result_orders = mysqli_query($conn,$sql_orders);
                if ($result_orders==0){
                    echo $sql_orders;
                    echo "Sipariş başlatılamadı, kontrol ediniz.";
                }else{
                    echo "Başarıyla eklendi";
                    header('Location:../message.php');
                };
        }
    }
}
//Message Info
if (isset($_POST['message'])) {
    if(isset($_SESSION["shopping_cart"]))
    {
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {       
                if ($_POST['CARD_ID'] != 0) {
                    echo "<script>alert('asdad".$_POST['CARD_ID']."')</script>";
                    $sql_cart    = 'SELECT * FROM card_note WHERE ID = '.$_POST['CARD_ID'];
                    $result_cart = mysqli_query($conn,$sql_cart);
                    $row_cart    = mysqli_fetch_assoc($result_cart);
                    $card_note   = $row_cart['MESSAGE'];
                } else {
                    $card_note = $_POST['CARD_NOTE'];
                }
                $sql_orders = 'UPDATE orders SET CARD_NOTE_ID = "'.$_POST['CARD_ID'].'", CUSTOM_CARD_NOTE = "'.$card_note.'", CARD_NOTE_NAME = "'.$_POST['CARD_NAME'].'",
                STATUS = "CUSTOMER_INFORMATION"
                WHERE REFERENCE_NO = "'.$values['item_reference_no'].'"';
                $result_orders = mysqli_query($conn,$sql_orders);
                if ($result_orders==0){
                    echo $sql_orders;
                    echo "Sipariş başlatılamadı, kontrol ediniz.";
                }else{
                    echo "Başarıyla eklendi";
                    header('Location:../invoice.php');
                };
        }
    }
}
//Invoice Info
if (isset($_POST['invoice'])) {
    if(isset($_SESSION["shopping_cart"]))
    {
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {   
            if ($_POST['INVOICE_TYPE']==0) {
                $sql_orders = 'UPDATE orders SET SENDER_NAME = "'.$_POST['SENDER_NAME'].'", SENDER_PHONE = "'.$_POST['SENDER_PHONE'].'", SENDER_EMAIL = "'.$_POST['SENDER_EMAIL'].'",
                INVOICE_TYPE = '.$_POST['INVOICE_TYPE'].', 	INVOICE_IDENTY_NO = "'.$_POST['INVOICE_IDENTY_NO'].'", INVOICE_ADDRESS = "'.$_POST['INVOICE_ADDRESS'].'", STATUS = "INVOICE_INFORMATION"
                WHERE REFERENCE_NO = "'.$values['item_reference_no'].'"';
                $result_orders = mysqli_query($conn,$sql_orders);
                if ($result_orders==0){
                    echo $sql_orders;
                    echo "Sipariş başlatılamadı, kontrol ediniz.";
                }else{
                    echo "Başarıyla eklendi";
                    header('Location:../payment.php');
                };
            } else {
                $sql_orders = 'UPDATE orders SET SENDER_NAME = "'.$_POST['SENDER_NAME'].'", SENDER_PHONE = '.$_POST['SENDER_PHONE'].', SENDER_EMAIL = "'.$_POST['SENDER_EMAIL'].'",
                INVOICE_TYPE = '.$_POST['INVOICE_TYPE'].', 	INVOICE_IDENTY_NO = "'.$_POST['COMPANY_INVOICE_IDENTY_NO'].'", INVOICE_ADDRESS = "'.$_POST['COMPANY_INVOICE_ADDRESS'].'",
                INVOICE_TAX_OFFICE = "'.$_POST['TAX_OFFICE'].'", INVOICE_COMPANY_NAME = "'.$_POST['COMPANY_NAME'].'", STATUS = "INVOICE_INFORMATION"
                WHERE REFERENCE_NO = "'.$values['item_reference_no'].'"';
                $result_orders = mysqli_query($conn,$sql_orders);
                if ($result_orders==0){
                    echo $sql_orders;
                    echo "Sipariş başlatılamadı, kontrol ediniz.";
                }else{
                    echo "Başarıyla eklendi";
                    header('Location:../payment.php');
                };
            }
        }
    }
}
//Payment Info
if (isset($_POST['paymentCard'])) {
    if(isset($_SESSION["shopping_cart"]))
    {
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {       
                $sql_orders = 'UPDATE orders SET IS_ONLINE_CONTRACT = '.$_POST['IS_ONLINE_CONTRACT'].', STATUS = "WAITING_CARGO", PAYMENT_TYPE = "CREDIT_CARD"
                WHERE REFERENCE_NO = "'.$values['item_reference_no'].'"';
                $result_orders = mysqli_query($conn,$sql_orders);
                $sql_get_order_id = 'select ID from orders where REFERENCE_NO = "'.$values['item_reference_no'].'"';
                $result_get_id = mysqli_query($conn,$sql_get_order_id);
                $row_id = mysqli_fetch_assoc($result_get_id);
                $sql_product_order = 'INSERT INTO product_order (PRODUCT_ID, ORDER_ID) VALUES ('.$values['item_id'].','.$row_id.')';
                $result_product_order = mysqli_query($conn,$sql_product_order);
                if ($result_orders==0 && $result_product_order==0 ){
                    echo "Sipariş başlatılamadı, kontrol ediniz.";
                }else{
                    echo "Başarıyla eklendi";
                    session_unset();
                    header('Location:../thanku.php');
                };
        }
    }
}

?>