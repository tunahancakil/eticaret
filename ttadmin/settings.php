<?php include("header.php") ?>
<?php
            $sql_settings    = "select * from settings where ACTIVE = 1";
            $result_settings = mysqli_query($conn,$sql_settings);
            $row_settings    = mysqli_fetch_assoc($result_settings);
?>
    <div class="content-wrapper">
    <h1>Site Ayarları Düzenleme</h1>
        <div class="card-body table-responsive p-8">
        <div class="card">
            <?php
                if (isset($_GET['action']) == "yes") {
                    echo "Good job wesley";    
                }else if (isset($_GET['action']) == "no") {
                    echo "No update";
                }else {
                    echo "";
                }
                
            ?>
                <form method="POST" action="process/settings.php">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="TITLE">Site Başlığı</label>
                            <input type="text" class="form-control" name="TITLE" value="<?php echo $row_settings['TITLE'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="LOGO">Site Logo</label>
                            <img src="../<?php echo $row_settings['LOGO'] ?>">
                            <input type="text" class="form-control" name="LOGO" value="<?php echo $row_settings['LOGO'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="PHONE">Telefon Numarası</label>
                            <input type="text" class="form-control" name="PHONE" value="<?php echo $row_settings['PHONE'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="EMAIL">E-Posta Adresi</label>
                            <input type="text" class="form-control" name="EMAIL" value="<?php echo $row_settings['EMAIL'] ?>">
                        </div>
                    </div>
                    <input type="hidden" name="insertType" value="settings">
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php include("footer.php") ?>