<?php include("header.php") ?>
    <div class="content-wrapper">
        <div class="card-body table-responsive p-0">
        <h2>Yöneticiler</h3>
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                    <th></th>
                    <th>Kullanıcı Adı</th>
                    <th>Süper Admin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php         
                        $sql_menu = "select * from user where ACTIVE = 1";
                        $result_menu = mysqli_query($conn,$sql_menu);
                        while($row_menu=mysqli_fetch_array($result_menu))
                        { ?>
                    <tr>
                    <td>
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group mr-2" role="group" aria-label="Third group">
                        <a href="admin_update.php?admin_id=<?php echo $row_menu['ID'] ?>">
                            <button type="submit" id="update" class="btn btn-block bg-gradient-warning btn-xs"><ion-icon size="small" name="document-text-outline"></ion-icon>Düzenle</button>
                        </a>
                        </div>
                        </div>
                    </td>
                    <?php
                        echo '<td>'.$row_menu['USERNAME'].'</td>';
                        echo '<td>'.$row_menu['SUPER_ADMIN'].'</td>';
                        }
                    ?>
                    </tr>
                </tbody>
             </table>
         </div>
    </div>
<?php include("footer.php") ?>