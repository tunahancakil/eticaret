<?php include("../connect/connection.php");
//Page Delete
if(isset($_GET['pageId'])) {
	$page_id = $_GET['pageId'];

	$sql_page_delete    = "update page set active = 0 where id =".$page_id."";
	$delete_page        = mysqli_query($conn,$sql_page_delete);

	if (mysqli_affected_rows($conn)) {
		header('Location:../page.php?status=yes');
	}else{
        header('Location:../menu.php?status=no');
	}
}

//Bank Delete
if(isset($_GET['bankId'])) {
	$bank_id = $_GET['bankId'];

	$sql_bank_delete    = "update bank set active = 0 where id =".$bank_id."";
	$delete_bank        = mysqli_query($conn,$sql_bank_delete);

	if (mysqli_affected_rows($conn)) {
		header('Location:../bank.php?status=yes');
	}else{
        header('Location:../bank.php?status=no');
	}
}

//Category Delete
if(isset($_GET['categoryId'])) {
	$category_id = $_GET['categoryId'];

	$sql_category_delete    = "update category set active = 0 where id =".$category_id."";
	$delete_category        = mysqli_query($conn,$sql_category_delete);

	if (mysqli_affected_rows($conn)) {
		header('Location:../category.php?status=yes');
	}else{
        header('Location:../category.php?status=no');
	}
}

//Product Delete
if(isset($_GET['productId'])) {
	$product_id = $_GET['productId'];

	$sql_product_delete    = "update product set active = 0 where id =".$product_id."";
	$delete_product        = mysqli_query($conn,$sql_product_delete);

	if (mysqli_affected_rows($conn)) {
		header('Location:../product.php?status=yes');
	}else{
        header('Location:../product.php?status=no');
	}
}
?>