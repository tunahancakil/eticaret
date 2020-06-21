<?php include("header.php") ?>
    <div class="content-wrapper">
    <h1>Üye Bilgileri Güncelleme</h1>
        <div class="card-body table-responsive p-8">
        <div class="card">
        <?php 
            $sql_member     = "select * from member where STATUS = 1";
            $result_member  = mysqli_query($conn,$sql_member);
            $row_member     = mysqli_fetch_assoc($result_member);
        ?>
                <form method="POST" action="process/insert.php">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="BANK_NAME">Ad Soyad</label>
                            <input type="text" class="form-control" name="NAME_SURNAME" value="<?php echo $row_member['NAME_SURNAME']?>">
                        </div>
                        <div class="form-group">
                            <label for="DEPARTMENT_NO">E-Posta</label>
                            <input type="text" class="form-control" name="EMAIL" value="<?php echo $row_member['EMAIL']?>">
                        </div>
                        <div class="form-group">
                            <label for="ACCOUNT_NO">Telefon Numarası</label>
                            <input type="text" class="form-control" name="PHONE" value="<?php echo $row_member['PHONE']?>">
                        </div>
                        <div class="form-group">
                            <label for="ACCOUNT_NAME">Durum</label>
                            <input type="text" class="form-control" name="STATUS" value="<?php echo $row_member['STATUS']?>">
                        </div>
                        <div class="form-group">
                            <label for="LAST_LOGIN">Son Giriş Tarihi</label>
                            <input type="datetime" class="form-control" name="LAST_LOGIN" value="<?php echo $row_member['LAST_LOGIN']?>">
                        </div>
                        <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                <?php if( $row_member['NEWS'] == '0') {
                                    echo '<input class="custom-control-input" type="checkbox" name="NEWS" id="NEWS">';
                                } else {
                                    echo '<input class="custom-control-input" type="checkbox" name="NEWS" id="NEWS" checked>';
                                } 
                                ?>
                                  <label for="NEWS" class="custom-control-label">E Posta ile bilgilendirmek istiyor.</label>
                                </div>
                        </div>
                    </div>
                    <input type="hidden" name="insertType" value="Bank">
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php include("footer.php") ?>