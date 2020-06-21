<?php
if(isset($_FILES["file-input"])){
  $url = $_POST['URL'];
  $target_dir = "../uploads/";
  // Count total files
  $countfiles = count($_FILES['file-input']['name']);
  // Looping all files
  for($i=0;$i<$countfiles;$i++){
  $filename = $url.$_FILES['file-input']['name'][$i];
  $target_file = $target_dir . $filename ;
  $uploadOk = 1;
  
  $check = getimagesize($_FILES["file-input"]["tmp_name"][$i]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
  } else {
      echo "File is not an image.";
        $uploadOk = 0;
  }
  // Check if file already exists
  if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
  }
  // Check file size
  if ($_FILES["file-input"]["size"][$i] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
  }
  // Allow certain file formats
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
  }
      // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES['file-input']['tmp_name'][$i],$target_file)) {
        echo "The file ".$filename." has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
      }
  }
  $imageinsert="INSERT INTO image (URL)
  VALUES ('$target_file')";
  $result=mysqli_query($conn,$imageinsert);
  $select_image_id = "select ID from image where URL='$target_file'";
  $result_image_id = mysqli_query($conn,$select_image_id);
  $row_image_id=mysqli_fetch_row($result_image_id);
  //Product Image Insert
  $isMainImage = 0;
  if ($i == 0) {
    $isMainImage = 1;
  }
  $imageinsert="INSERT INTO product_image(PRODUCT_ID, IMAGE_ID, IS_MAIN_IMAGE)
  VALUES (".$row[0].",".$row_image_id[0].",".$isMainImage.")";
  $result=mysqli_query($conn,$imageinsert);
  if ($result==0) {
  echo "Eklenemedi, kontrol ediniz";
  } else{
    echo "Başarıyla eklendi";
  }
 }
}
?>