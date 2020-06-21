<?php include("header.php");
        $sql_product    = "select * from product where ID = ".$_GET['id']." and ACTIVE = 1";
        $result_product = mysqli_query($conn,$sql_product);
        $row_product    = mysqli_fetch_assoc($result_product);
?>
<head>
    <style type="text/css">
        .thumb{
                margin: 10px 5px 0 0;
                width: 100px;
            }
    </style>
</head>
    <div class="content-wrapper">
    <h1>Ürün Ekleme</h1>
        <div class="card-body table-responsive p-8">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#general_data" data-toggle="tab">Genel Bilgiler</a></li>
                    <li class="nav-item"><a class="nav-link" href="#pages" data-toggle="tab">Türkçe Sayfa</a></li>   
                    </ul>
                </div>
                <form method="POST" id="save" action="process/update.php" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="tab-content">
                        <div class="active tab-pane" id="general_data">
                            <div class="form-group">
                                <label>Ana Kategori Seçiniz</label>
                                <div class="select2-purple">
                                <select name="MAIN_CATEGORY" class="form-control select2bs4" style="width: 100%;">
                                    <?php
                                        $sql    = 'select * from category_product where PRODUCT_ID = '.$_GET['id'].' AND IS_MAIN = 1';
                                        $result = mysqli_query($conn,$sql);
                                        $row    = mysqli_fetch_assoc($result) ;

                                        $sql_category    = 'select * from category where ID ='.$row['CATEGORY_ID'].'';
                                        $result_category = mysqli_query($conn,$sql_category);
                                        $row_category    = mysqli_fetch_assoc($result_category);

                                        echo '<option value="'.$row['CATEGORY_ID'].'">'.$row_category['TITLE'].'</option>';
                                    ?>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Alt Kategori Seçiniz</label>
                                <div class="select2-purple">
                                <select name="CATEGORY[]" class="select2bs4" multiple="multiple" data-placeholder="Kategori Seçimi Yapınız" style="width: 100%;">
                                    <?php
                                        $sql = 'select * from category_product where PRODUCT_ID = '.$_GET['id'].' AND IS_MAIN != 1';
                                        $result = mysqli_query($conn,$sql);
                                        while($row=mysqli_fetch_array($result)) {

                                            $sql_category    = 'select * from category where ID ='.$row['CATEGORY_ID'].'';
                                            $result_category = mysqli_query($conn,$sql_category);
                                            $row_category    = mysqli_fetch_assoc($result_category);
                                        echo '<option value="'.$row['CATEGORY_ID'].'" selected>'.$row_category['TITLE'].'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                            </div>
                            <label class="col-form-label" for="inputError"> Ürün Tipi</label>
                            <?php if($row_product['PRODUCT_TYPE']==1) { ?>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="MAIN_PRODUCT" name="PRODUCT_TYPE" value="1" checked>
                                    <label for="MAIN_PRODUCT" class="custom-control-label">Ana Ürün</label>
                                </div>
                            </div>
                            <?php } else { ?>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="EXTRA_PRODUCT" value="0" name="PRODUCT_TYPE">
                                    <label for="EXTRA_PRODUCT" class="custom-control-label">Ek Ürün</label>
                                </div>
                            </div>
                            <?php } ?>
                            <?php if($row_product['PRODUCT_TYPE']==0) { ?>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="MAIN_PRODUCT" name="PRODUCT_TYPE" value="1" >
                                    <label for="MAIN_PRODUCT" class="custom-control-label">Ana Ürün</label>
                                </div>
                            </div>
                            <?php } else { ?>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="EXTRA_PRODUCT" value="0" name="PRODUCT_TYPE" checked>
                                    <label for="EXTRA_PRODUCT" class="custom-control-label">Ek Ürün</label>
                                </div>
                            </div>
                            <?php } ?>
                            <label class="col-form-label" for="inputError">Yayına Alınsın Mı?</label>
                            <?php if($row_product['STATUS']==1) { ?>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" value="1" id="YES_TAX" name="STATUS" checked>
                                    <label for="YES_TAX" class="custom-control-label">Evet</label>
                                </div>
                            </div>
                            <?php } else { ?>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="NO_TAX" value="0" name="STATUS">
                                    <label for="NO_TAX" class="custom-control-label">Hayır, taslak olarak kaydet</label>
                                </div>
                            </div>
                            <?php } ?>
                            <?php if($row_product['STATUS']==0) { ?>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" value="1" id="YES_TAX" name="STATUS">
                                    <label for="YES_TAX" class="custom-control-label">Evet</label>
                                </div>
                            </div>
                            <?php } else { ?>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="NO_TAX" value="0" name="STATUS" checked>
                                    <label for="NO_TAX" class="custom-control-label">Hayır, taslak olarak kaydet</label>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="form-group">
                              <label>KDV %</label>
                              <select name="TAX" class="form-control select2bs4" style="width: 100%;">
                                <option selected="<?php echo $row_product['TAX']?>"><?php echo $row_product['TAX']?></option>
                                <option value="8">8</option>
                                <option value="1">1</option>
                              </select>
                            </div>
                            <label class="col-form-label" for="INCLUDE_TAX">Girilen Fiyatlara KDV</label>
                            <?php if($row_product['INCLUDE_TAX']==1) { ?>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="YES_KDV" name="INCLUDE_TAX" value="1" checked required>
                                    <label for="YES_KDV" class="custom-control-label">Dahil</label>
                                </div>
                            </div>
                            <?php } else { ?>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="NO_KDV" value="0" name="INCLUDE_TAX" required>
                                    <label for="NO_KDV" class="custom-control-label">Hariç</label>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="form-group">
                                <label for="PRICE">Ürün Fiyatı</label>
                                <input step="0.01" type="number" class="form-control" name="PRICE" placeholder="Ürün Fiyatı" value = "<?php echo $row_product['PRICE'] ?>">
                            </div>
                            <p>( Örn. 15.50 )</p>
                            <div class="form-group">
                                <label for="DISCOUNT_PRICE">Varsa İndirimli Fiyat</label>
                                <input step="0.01" type="number" class="form-control" name="DISCOUNT_PRICE" value = "<?php echo $row_product['DISCOUNT_PRICE'] ?>">
                            </div>
                            <p>( Örn. 15.50 )</p>
                            <div class="form-group">
                                <label for="STOCK">Stok Miktarı</label>
                                <input type="number" class="form-control" name="STOCK" placeholder="Stok Miktarı" value = "<?php echo $row_product['STOCK'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="MIN_STOCK">Minimum Stok Miktarı</label>
                                <input type="number" class="form-control" name="MIN_STOCK" placeholder="Minimum Stok Miktarı" value = "<?php echo $row_product['MIN_STOCK'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="STOCK_CODE">Stok Kodu</label>
                                <input type="text" class="form-control" name="STOCK_CODE" placeholder="Stok Kodu" value = "<?php echo $row_product['STOCK_CODE'] ?>">
                            </div>
                            <?php if($row_product['ABROAD']== 0) {?>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                  <input class="custom-control-input" type="checkbox" name="ABROAD" id="ABROAD">
                                  <label for="ABROAD" class="custom-control-label">Bu ürün sadece yurtdışı bölgelerine satılsın.</label>
                                </div>
                            </div>
                            <?php } else { ?>
                                <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                  <input class="custom-control-input" type="checkbox" name="ABROAD" id="ABROAD" checked>
                                  <label for="ABROAD" class="custom-control-label">Bu ürün sadece yurtdışı bölgelerine satılsın.</label>
                                </div>
                            </div>
                            <?php } ?>
                            <?php if($row_product['CUSTOMER_UPLOAD']== 0) {?>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                  <input class="custom-control-input" type="checkbox" name="CUSTOMER_UPLOAD" id="CUSTOMER_UPLOAD">
                                  <label for="CUSTOMER_UPLOAD" class="custom-control-label">Müşteriler Görsel Yükleyebilsin (Kişisel Ürünler)</label>
                                </div>
                            </div>
                            <?php } else { ?>
                                <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                  <input class="custom-control-input" type="checkbox" name="CUSTOMER_UPLOAD" id="CUSTOMER_UPLOAD" checked>
                                  <label for="CUSTOMER_UPLOAD" class="custom-control-label">Müşteriler Görsel Yükleyebilsin (Kişisel Ürünler)</label>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="form-group">
                                <label for="DECI">Desi</label>
                                <input type="number" class="form-control" name="DECI" placeholder="Desi" required>
                            </div>
                            <?php if($row_product['FREE_CARGO']== 0) { ?>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                  <input class="custom-control-input" type="checkbox" name="FREE_CARGO" id="FREE_CARGO">
                                  <label for="FREE_CARGO" class="custom-control-label">Ücretsiz Kargo Olsun</label>
                                </div>
                            </div>
                            <?php } else { ?>
                                <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                  <input class="custom-control-input" type="checkbox" name="FREE_CARGO" id="FREE_CARGO" checked>
                                  <label for="FREE_CARGO" class="custom-control-label">Ücretsiz Kargo Olsun</label>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="form-group">
                                <label for="CARGO_NOTE">Kargo Yazısı</label>
                                <input type="text" class="form-control" name="CARGO_NOTE" value = "<?php echo $row_product['CARGO_NOTE'] ?>">
                            </div>
                        </div>
                        <div class="tab-pane" id="pages">
                            <div class="form-group">
                                <label for="TITLE">Ürün Başlık</label>
                                <input type="text" class="form-control" name="TITLE" placeholder="Ürün Adı" value = "<?php echo $row_product['TITLE'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="URL">Türkçe İsteğe Bağlı URL</label>
                                <input pattern="\S+" type="text" class="form-control" name="URL" placeholder="Türkçe İsteğe Bağlı URL" value = "<?php echo $row_product['URL'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="DESCRIPTION">Türkçe Ürün Yazısı</label>
                                <div class="mb-3">
                                    <textarea class="textarea" name="DESCRIPTION"
                                              style="width: 100%; height: 300px; font-size: 14px; line-height: 50px; border: 1px solid #dddddd; padding: 15px;">
                                              <?php echo $row_product['DESCRIPTION'] ?>
                                              </textarea>
                                </div>
                            </div>
                                <input type="file" name="file-input[]" id="file-input" multiple />
                                <div id="thumb-output"></div>
                        </div>
                        </div>    
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="productUpdate" class="btn btn-success">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
    $('#file-input').on('change', function(){ //on file input change
        if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
        {
            $('#thumb-output').html(''); //clear html of output element
            var data = $(this)[0].files; //this file data
            
            $.each(data, function(index, file){ //loop though each file
                if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                    var fRead = new FileReader(); //new filereader
                    fRead.onload = (function(file){ //trigger function on successful read
                    return function(e) {
                        var img = $('<img/>').addClass('thumb').attr('src', e.target.result); //create image element 
                        $('#thumb-output').append(img); //append image to output element
                    };
                    })(file);
                    fRead.readAsDataURL(file); //URL representing the file's data.
                }
            });
            
        }else{
            alert("Your browser doesn't support File API!"); //if File API is absent
        }
    });
});
    </script>
<?php include("footer.php") ?>