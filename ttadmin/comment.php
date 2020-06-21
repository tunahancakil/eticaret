<?php include("header.php");
    if (isset($_GET['status'])) {
        if ($_GET['status'] == 1) {
            $sql_comment = "select * from comment where STATUS = 1";
        } else {
            $sql_comment = "select * from comment where STATUS = 0";
        }
    } else {
        $sql_comment = "select * from comment";
    }
?>
    <div class="content-wrapper">
        <div class="card-body table-responsive p-0"><br><br>
        <h2>Üyeler</h3>
        <div class="col-md-12">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                    <th></th>
                    <th>Yorum</th>
                    <th>Ürün No</th>
                    <th>Üye No</th>
                    <th>Yorum Tarihi</th> 
                    </tr>
                </thead>
                <tbody>
                        <?php 
                        $result_comment = mysqli_query($conn,$sql_comment);
                        while($row_comment=mysqli_fetch_array($result_comment)) {
                        ?>
                    <tr>
                    <td>
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group mr-2" role="group" aria-label="Third group">
                        <form action="comment_update.php" method="GET">
                            <input type="hidden" name="COMMENT_ID" value="<?php echo $row_comment['ID'] ?>">
                            <button type="submit" id="update" class="btn btn-block bg-gradient-warning btn-xs"><ion-icon size="small" name="document-text-outline"></ion-icon>Düzenle</button>
                        </form>
                        </div>
                        <div class="btn-group mr-2" role="group" aria-label="Third group">
                            <a href = "product_delete.php"><button type="button" class="btn btn-block bg-gradient-danger btn-xs"><ion-icon size="small" name="trash-outline"></ion-icon>Sil</button></a>
                        </div>
                        </div>
                    </td>
                    <?php
                        echo '<td>'.$row_comment['COMMENT'].'</td>';
                        echo '<td>'.$row_comment['PRODUCT_ID'].'</td>';
                        echo '<td>'.$row_comment['MEMBER_ID'].'</td>';
                        echo '<td>'.$row_comment['PROCESS_DATE'].'</td>';
                    ?>
                    <td>
                    </td>
                <?php } ?>
                    </tr>
                </tbody>
             </table>
         </div>
        </div>
    </div>
<?php include("footer.php") ?>