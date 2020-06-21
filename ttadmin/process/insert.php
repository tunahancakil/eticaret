<?php include("../connect/connection.php");
//Page insert
if(isset($_POST['page'])==true) {
    $status = $_POST['STATUS'];
    $title = $_POST['TITLE'];
    $description = $_POST['DESCRIPTION'];
    if (isset($_POST['URL'])) {
        $url = $_POST['URL'];
    } else {
        $url =  str_replace(' ', '-', strtolower($title));
    }
    $sql="select TITLE from page WHERE TITLE='$title' and ACTIVE=1";
    $result  =mysqli_query($conn,$sql);
    $rowcount=mysqli_num_rows($result);

    if ($rowcount>0)
    {
    echo "Bu isimde menü daha önce kayıt edilmiştir.";
    } 
    else
    {
    $sqlinsert="INSERT INTO page (TITLE,STATUS,URL,DESCRIPTION)
    VALUES ('$title',$status,'$url','$description')";
    echo $sqlinsert;
    $result=mysqli_query($conn,$sqlinsert);
    echo $result;
    if ($result==0){
    echo "Eklenemedi, kontrol ediniz";
    header('Location:../page_insert.php?action=no');
    }else{
    echo "Başarıyla eklendi";
    header('Location:../page_insert.php?action=yes');
    };
  }
}
//Category insert
if(isset($_POST['category'])==true) {
    $mainCategory   = $_POST['MAIN_CATEGORY'];
    if ($_POST['IS_MAIN'] == "on") {
        $isMain = 1;
    } else {
        $isMain = 0;
    }
    $status         = $_POST['STATUS'];
    $timeFormat     = $_POST['TIME_FORMAT'];
    $title          = $_POST['TITLE'];
    $url            = $_POST['URL'];
    $description    = $_POST['DESCRIPTION'];
    $notDelivery    = $_POST['NOT_DELIVERY'];
    $rowOrder       = $_POST['ROW_ORDER'];
    $sql            = "select TITLE from category WHERE TITLE='$title' and ACTIVE=1";
    $result         = mysqli_query($conn,$sql);
    $rowcount       = mysqli_num_rows($result);
    if ($rowcount>0)
    {
        echo "Bu isimde menü daha önce kayıt edilmiştir.";
    } else {
        $sqlinsert='INSERT INTO category (IS_MAIN,STATUS,TIME_FORMAT,TITLE,URL,DESCRIPTION,NOT_DELIVERY,ROW_ORDER)
        VALUES ('.$isMain.','.$status.',"'.$timeFormat.'","'.$title.'","'.$url.'","'.$description.'",'.$notDelivery.','.$rowOrder.')';
        $result=mysqli_query($conn,$sqlinsert);
        
        if ($result==0) {
        echo $sqlinsert;   
        echo "Eklenemedi, kontrol ediniz";
        //header('Location:../category_insert.php?action=no');
        } else {
        echo "Başarıyla eklendi";
        header('Location:../category_insert.php?action=yes');
        }
    };
}
//Product insert
if(isset($_POST['product'])==true) {
    $mainCategory = $_POST['MAIN_CATEGORY'];
    $categoryList = $_POST['CATEGORY'];
    $productType = $_POST['PRODUCT_TYPE'];
    $status = $_POST['STATUS'];
    $tax = $_POST['TAX'];
    $includeTax = $_POST['INCLUDE_TAX'];
    $price = $_POST['PRICE'];
    $discountPrice = $_POST['DISCOUNT_PRICE'];
    $stock = $_POST['STOCK'];
    $minStock = $_POST['MIN_STOCK'];
    $stockCode = $_POST['STOCK_CODE'];
    $abroad = 0;
    if (isset($_POST['ABROAD'])) { 
        $abroad = 1;
    }
    $customerUpload = 0;
    if (isset($_POST['CUSTOMER_UPLOAD'])) { 
        $customerUpload = isset($_POST['CUSTOMER_UPLOAD']);
    }
    $deci = $_POST['DECI'];
    $freeCargo = 0;
    if (isset($_POST['FREE_CARGO'])) { 
        $freeCargo = isset($_POST['FREE_CARGO']);
    }
    $cargoNote = $_POST['CARGO_NOTE'];
    $title = $_POST['TITLE'];
    $url = $_POST['URL'];
    $description = $_POST['DESCRIPTION'];

    $sql="select TITLE from product WHERE TITLE='$title' and ACTIVE=1";
    $result  =mysqli_query($conn,$sql);
    $rowcount=mysqli_num_rows($result);

    if ($rowcount>0)
    {
    echo "Bu isimde menü daha önce kayıt edilmiştir.";
    } 
    else
    {
    $sqlinsert_product="INSERT INTO product (PRODUCT_TYPE,STATUS,TAX,INCLUDE_TAX,PRICE,DISCOUNT_PRICE,STOCK,MIN_STOCK,STOCK_CODE,ABROAD,CUSTOMER_UPLOAD,DECI,FREE_CARGO,CARGO_NOTE,TITLE,DESCRIPTION,URL)
    VALUES ($productType,$status,$tax,$includeTax,$price,$discountPrice,$stock,$minStock,'$stockCode',$abroad,$customerUpload,$deci,$freeCargo,'$cargoNote','$title','$description','$url')";
    echo $sqlinsert_product;
    $result_product=mysqli_query($conn,$sqlinsert_product);
    $select_id = "select ID from product where TITLE='$title'";
    $result_id = mysqli_query($conn,$select_id);
    $row=mysqli_fetch_row($result_id);

    foreach($categoryList as $category) {
    $sqlinsert_category="INSERT INTO category_product (PRODUCT_ID, CATEGORY_ID)
    VALUES ($row[0], $category)";
    $result_product_category=mysqli_query($conn,$sqlinsert_category);
    }
    
    $sqlinsert_category_main="INSERT INTO category_product ( PRODUCT_ID, CATEGORY_ID, IS_MAIN)
    VALUES ($row[0], $mainCategory, 1)";
    $result_product_category_main=mysqli_query($conn,$sqlinsert_category_main);
    include "upload.php";
    if ($result_product==0 || $result_product_category==0 ||  $result_product_category_main==0) {
    echo "Eklenemedi, kontrol ediniz";
    header('Location:../product_insert.php?action=no');
    } else {
    echo "Başarıyla eklendi";
    header('Location:../product.php?action=yes');
    }
    };
}

//Bank insert
if(isset($_POST['bank'])==true) {
    $bankName = $_POST['BANK_NAME'];
    $departmentNo = $_POST['DEPARTMENT_NO'];
    $accountName = $_POST['ACCOUNT_NAME'];
    $accountNo = $_POST['ACCOUNT_NO'];
    $iban = $_POST['IBAN'];
    $sql="select BANK_NAME from bank WHERE BANK_NAME='$bankName' and ACTIVE=1";
    $result  =mysqli_query($conn,$sql);
    $rowcount=mysqli_num_rows($result);

    if ($rowcount>0)
    {
    echo "Bu isimde banka daha önce kayıt edilmiştir.";
    } 
    else
    {
    $sqlinsert="INSERT INTO bank (BANK_NAME,DEPARTMENT_NO,ACCOUNT_NAME,ACCOUNT_NO,IBAN)
    VALUES ('$bankName',$departmentNo,'$accountName',$accountNo,$iban)";
    $result=mysqli_query($conn,$sqlinsert);
     
    if ($result==0) {
    echo "Eklenemedi, kontrol ediniz";
    header('Location:../bank_insert.php?action=no');
    } else{
    echo "Başarıyla eklendi";
    header('Location:../bank_insert.php?action=yes');
    }
    };
}
//Menu insert
if (isset($_GET['insertType'])=='Menu'){ // Form has been submitted.
    $name = trim($_POST['name']);
    $sql_menu = "UPDATE menu SET MENU_TEMPLATE = '".$name."' WHERE MENU_TYPE='".$_GET['menuType']."'";
    $result=mysqli_query($conn,$sql_menu);

    if (mysqli_affected_rows($conn)) {
        echo "Menü güncellendi.";
    }else {
        $sql_menu_insert = "INSERT INTO menu(MENU_TYPE,MENU_TEMPLATE) VALUES ('".$_GET['menuType']."','".$name."')";
        if(mysqli_query($conn,$sql_menu_insert)) {
            echo 'Yeni menü eklendi.';
        } else {
            echo 'Menü eklenemedi.';
        }
    }
}

//Card insert
if(isset($_POST['card'])==true) {
    $message = $_POST['MESSAGE'];
    $category = $_POST['CATEGORY'];
    $orders = $_POST['ORDERS'];
    $sql="select MESSAGE from card_note WHERE MESSAGE='$message' and ACTIVE=1";
    $result  =mysqli_query($conn,$sql);
    $rowcount=mysqli_num_rows($result);
    if ($rowcount>0)
    {
    echo "Bu isimde kart notu daha önce kayıt edilmiştir.";
    header('Location:../card_note.php?action=no');
    } 
    else
    {
    $sqlinsert="INSERT INTO card_note (MESSAGE,CATEGORY,ORDERS)
    VALUES ('$message','$category',$orders)";
    echo $sqlinsert;
    $result=mysqli_query($conn,$sqlinsert);
    echo $result;
    if ($result==0){
    echo "Eklenemedi, kontrol ediniz";
    header('Location:../card_note.php?action=no');
    }else{
    echo "Başarıyla eklendi";
    header('Location:../card_note.php?action=yes');
    };
  }
}
?>