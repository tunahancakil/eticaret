<?php include("header.php") ?>
    <div class="content-wrapper">
    <h1>Banka Güncelleme</h1>
        <div class="card-body table-responsive p-8">
        <div class="card">
        <?php 
            $sql_bank    = "select * from bank where ACTIVE = 1 and ID = ".$_GET['id']."";
            $result_bank = mysqli_query($conn,$sql_bank);
            $row_bank    = mysqli_fetch_assoc($result_bank);
        ?>
                <form method="POST" action="process/update.php">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="BANK_NAME">Banka Adı</label>
                            <input type="text" class="form-control" name="BANK_NAME" value="<?php echo $row_bank['BANK_NAME'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="DEPARTMENT_NO">Şube Adı</label>
                            <input type="text" class="form-control" name="DEPARTMENT_NO" value="<?php echo $row_bank['DEPARTMENT_NO'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="ACCOUNT_NO">Hesap No</label>
                            <input type="text" class="form-control" name="ACCOUNT_NO" value="<?php echo $row_bank['ACCOUNT_NO'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="ACCOUNT_NAME">Hesap Adı</label>
                            <input type="text" class="form-control" name="ACCOUNT_NAME" value="<?php echo $row_bank['ACCOUNT_NAME'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="IBAN">IBAN</label>
                            <input type="text" class="form-control" name="IBAN" value="<?php echo $row_bank['IBAN'] ?>">
                        </div>
                    </div>
                    <div class="card-footer">
                    <input type="hidden" name="ID" value="<?php echo $row_bank['ID']?>">
                        <button type="submit" name="bankUpdate" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php include("footer.php") ?>