<?php include("../connect/connection.php");
//Page insert
if(isset($_POST['insertType'])) { 
    if($_POST['insertType'] === 'settings') {
        $id = 1;
        $title = $_POST['TITLE'];
        $logo = $_POST['LOGO'];
        $phone = $_POST['PHONE'];
        $email = $_POST['EMAIL'];

        $sqlinsert="UPDATE settings SET
        TITLE = '".$title."',
        LOGO = '".$logo."',
        PHONE = '".$phone."',
        EMAIL = '".$email."'
        WHERE ID = ".$id.";";
        $result=mysqli_query($conn,$sqlinsert);
        if (mysqli_affected_rows($conn))
        {
            header("Location: ../settings.php?action=yes");
        }else {
            header("Location: ../settings.php?action=no");
        }
    }
}
?>