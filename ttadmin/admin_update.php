<?php include("header.php");
    if(isset($_GET['admin_id'])) {
        $id= $_GET['admin_id'];
    } else {
        header('Location:admin_list.php');
    }
?>

    <div class="content-wrapper">
    <h1>Yönetici Bilgileri Güncelleme</h1>
        <div class="card-body table-responsive p-8">
        <div class="card">
        <?php 
            $sql_admin     = 'select * from user where ID = '.$id;
            $result_admin  = mysqli_query($conn,$sql_admin);
            $row_admin     = mysqli_fetch_assoc($result_admin);
        ?>
                <form method="POST" action="process/insert.php">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="USERNAME">Kullanıcı Adı</label>
                            <input type="text" class="form-control" name="USERNAME" value="<?php echo $row_admin['USERNAME']?>">
                        </div>
                        <div class="form-group">
                            <label for="PASSWORD">Şifre</label>
                            <input type="text" class="form-control" name="PASSWORD" value="<?php echo $row_admin['PASSWORD']?>">
                        </div>
                        <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                <?php if( $row_admin['SUPER_ADMIN'] == '0') {
                                    echo '<input class="custom-control-input" type="checkbox" name="SUPER_ADMIN" id="NEWS">';
                                } else {
                                    echo '<input class="custom-control-input" type="checkbox" name="SUPER_ADMIN" id="NEWS" checked>';
                                } 
                                ?>
                                  <label for="NEWS" class="custom-control-label">E Posta ile bilgilendirmek istiyor.</label>
                                </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="admin" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php include("footer.php") ?>