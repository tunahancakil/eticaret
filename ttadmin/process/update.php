<?php include("../connect/connection.php");
//Page update
if(isset($_POST['pageUpdate'])) {
    $status = $_POST['STATUS'];
    $title = $_POST['TITLE'];
    $url = $_POST['URL'];
    $description = $_POST['DESCRIPTION'];

    $sqlinsert='UPDATE page SET STATUS = '.$status.', TITLE = "'.$title.'", URL = "'.$url.'", DESCRIPTION = "'.$description.'" WHERE ID = '.$_POST['ID'].' ';
    $result=mysqli_query($conn,$sqlinsert);
     
    if ($result==0) {
    header('Location:../page_update.php?action=no');
    } else {
    header('Location:../page.php?action=yes');
    }
};
//Bank update
if(isset($_POST['bankUpdate'])) {
    $bankName    = $_POST['BANK_NAME'];
    $departmentNo= $_POST['DEPARTMENT_NO'];
    $accountNo   = $_POST['ACCOUNT_NO'];
    $accountName = $_POST['ACCOUNT_NAME'];
    $iban        = $_POST['IBAN'];
    $sqlinsert='UPDATE bank 
                SET BANK_NAME = "'.$bankName.'", DEPARTMENT_NO = '.$departmentNo.', ACCOUNT_NO = '.$accountNo.', ACCOUNT_NAME = "'.$accountName.'",
                IBAN = "'.$iban.'"
                WHERE ID = '.$_POST['ID'].' ';
    $result=mysqli_query($conn,$sqlinsert);
     
    if ($result==0) {
        header('Location:../bank_update.php?action=no');
    } else {
        header('Location:../bank.php?action=yes');
    }
};
//Category update
if(isset($_POST['categoryUpdate'])) {
    $mainCategory   = $_POST['MAIN_CATEGORY'];
    $status         = $_POST['STATUS'];
    $timeFormat     = $_POST['TIME_FORMAT'];
    $title          = $_POST['TITLE'];
    $url            = $_POST['URL'];
    $description    = $_POST['DESCRIPTION'];
    $notDelivery    = $_POST['NOT_DELIVERY'];
    $rowOrder       = $_POST['ROW_ORDER'];

    $sqlinsert='UPDATE category 
                SET STATUS = '.$status.', TIME_FORMAT = "'.$timeFormat.'", TITLE = "'.$title.'", URL = "'.$url.'", DESCRIPTION = "'.$description.'",
                NOT_DELIVERY = "'.$notDelivery.'", ROW_ORDER = '.$rowOrder.'
                WHERE ID = '.$_POST['ID'].' ';
    $result=mysqli_query($conn,$sqlinsert);
     
    if ($result==0) {
        header('Location:../category.php?action=no');
    } else {
        header('Location:../category.php?action=yes');
    }
};

//Product update
if(isset($_POST['productUpdate'])) {
    $title = $_POST['TITLE'];
    $category_list = $_POST['CATEGORY'];
    $main_category = $_POST['MAIN_CATEGORY'];
    $product_id = $_POST['ID'];

    $sqlinsert_product="UPDATE product
                        SET TITLE = ".$title.", 
                            PIECE = ".$piece.",
                            PRICE = ".$price.",
                            STOCK_CODE = ".$stock_code."
                        WHERE id = ".$product_id."";
    $result_product=mysqli_query($conn,$sqlinsert_product);

    $sqldelete_category="delete from category_product where product_id = ".$product_id."";
    $result_product_category_delete=mysqli_query($conn,$sqldelete_category);

    foreach($category_list as $category) {
    $sqlinsert_category="INSERT INTO category_product ( PRODUCT_ID, CATEGORY_ID) VALUES ($product_id, $category)";
    $result_product_category=mysqli_query($conn,$sqlinsert_category);
    }

    $sqlinsert_category_main="INSERT INTO category_product ( PRODUCT_ID, CATEGORY_ID, IS_MAIN) VALUES ($product_id, $category, 1)";
    $result_product_category_main=mysqli_query($conn,$sqlinsert_category_main);

    if ($result_product==0 || $result_product_category==0 || $result_product_category_main == 0) 
    echo "Eklenemedi, kontrol ediniz";
    else 
    echo "Başarıyla eklendi";
}
?>