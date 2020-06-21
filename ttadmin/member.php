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
                    <th>Email</th>
                    <th>Durum</th>
                    <th>Kayıt Tarihi</th>
                    <th>Sipariş Geçmişi</th> 
                    </tr>
                </thead>
                <tbody>
                        <?php 
                        $sql_member = "select * from member where STATUS = 1";
                        $result_member = mysqli_query($conn,$sql_member);
                        while($row_member=mysqli_fetch_array($result_member)) {
                        ?>
                    <tr>
                    <td>
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group mr-2" role="group" aria-label="Third group">
                        <form action="member_update.php" method="GET">
                            <input type="hidden" name="MEMBER_ID" value="<?php echo $row_member['ID'] ?>">
                            <button type="submit" id="update" class="btn btn-block bg-gradient-warning btn-xs"><ion-icon size="small" name="document-text-outline"></ion-icon>Düzenle</button>
                        </form>
                        </div>
                        <div class="btn-group mr-2" role="group" aria-label="Third group">
                            <a href = "product_delete.php"><button type="button" class="btn btn-block bg-gradient-danger btn-xs"><ion-icon size="small" name="trash-outline"></ion-icon>Sil</button></a>
                        </div>
                        </div>
                    </td>
                    <?php
                        echo '<td>'.$row_member['NAME_SURNAME'].'</td>';
                        echo '<td>'.$row_member['EMAIL'].'</td>';
                        echo '<td>'.$row_member['STATUS'].'</td>';
                        echo '<td>'.$row_member['PROCESS_DATE'].'</td>';
                    ?>
                    <td>
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group mr-2" role="group" aria-label="Third group">
                            <?php
                                echo '<input type="hidden" name="MEMBER_ID" value="'.$row_member['ID'].'">'
                            ?>
                            <button type="submit" id="orders" class="btn btn-block btn-secondary btn-xs"><ion-icon size="small" name="document-text-outline"></ion-icon>Sipariş Geçmişi</button>
                        </div>
                        </div>
                    </td>
                <?php } ?>
                    </tr>
                </tbody>
             </table>
         </div>
        </div>
    </div>
<?php include("footer.php") ?>