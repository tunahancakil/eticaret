<?php include("header.php") ?>
    <div class="content-wrapper">
        <div class="card-body table-responsive p-0">
        <h2>Menüler</h3>
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                    <th></th>
                    <th>İlçe</th>
                    <th>Posta Kodu</th>
                    <th>Yol Ücreti</th>
                    </tr>
                </thead>
                <tbody>
                    <?php         
                        $sql_menu = "select * from district where PLATE_NO = 34 and ACTIVE = 1";
                        $result_menu = mysqli_query($conn,$sql_menu);
                        while($row_menu=mysqli_fetch_array($result_menu))
                        { ?>
                    <tr>
                    <td>
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group mr-2" role="group" aria-label="Third group">
                        <a href="menu_update.php?menu_id=<?php echo $row_menu['ID'] ?>">
                            <button type="submit" id="update" class="btn btn-block bg-gradient-warning btn-xs"><ion-icon size="small" name="document-text-outline"></ion-icon>Düzenle</button>
                        </a>
                        </div>
                        </div>
                    </td>
                    <?php
                        echo '<td>'.$row_menu['DISTRICT_NAME'].'</td>';
                        echo '<td>'.$row_menu['PLATE_NO'].'</td>';
                        echo '<td>'.$row_menu['TOLL_ROAD'].' ₺</td>';
                        echo '</tr>';
                        }
                    ?>
                </tbody>
             </table>
         </div>
    </div>
<?php include("footer.php") ?>