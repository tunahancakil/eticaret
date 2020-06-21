<?php include("header.php") ?>
    <div class="content-wrapper">
        <div class="card-body table-responsive p-0"><br><br>
        <h2>Üyeler</h3>
        <div class="col-md-12">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                    <th></th>
                    <th>Ad Soyad</th>
                    <th>Kategori</th>
                    </tr>
                </thead>
                <tbody>
                        <?php 
                        $sql_card = "select * from card_note where ACTIVE = 1";
                        $result_card = mysqli_query($conn,$sql_card);
                        while($row_card=mysqli_fetch_array($result_card)) {
                        ?>
                    <tr>
                    <td>
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group mr-2" role="group" aria-label="Third group">
                        <form action="member_update.php" method="GET">
                            <input type="hidden" name="MEMBER_ID" value="<?php echo $row_card['ID'] ?>">
                            <button type="submit" id="update" class="btn btn-block bg-gradient-warning btn-xs"><ion-icon size="small" name="document-text-outline"></ion-icon>Düzenle</button>
                        </form>
                        </div>
                        <div class="btn-group mr-2" role="group" aria-label="Third group">
                            <a href = "product_delete.php"><button type="button" class="btn btn-block bg-gradient-danger btn-xs"><ion-icon size="small" name="trash-outline"></ion-icon>Sil</button></a>
                        </div>
                        </div>
                    </td>
                    <?php
                        echo '<td>'.$row_card['MESSAGE'].'</td>';
                        echo '<td>'.$row_card['CATEGORY'].'</td>';
                    ?>
                <?php } ?>
                    </tr>
                </tbody>
             </table>
         </div>
        </div>
    </div>
<?php include("footer.php") ?>