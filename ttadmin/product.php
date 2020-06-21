<?php include("header.php") ?>
    <div class="content-wrapper">
        <div class="card-body table-responsive p-0">
        <h3>Ürünler</h3>
        <div class="col-md-12">
            <div class="card card-primary card-outline">
            <div class="card-body">
                <p>Ürünlerde Ara</p>
                    <div class="form-group">
                    <input class="form-control" placeholder="Ürünlerde Ara">
                    </div>
                    <button type="button" class="btn btn-success btn-sm">Ara</button>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                    <th></th>
                    <th>Ürün</th>
                    <th>Fiyat</th>
                    <th>Stok Miktarı</th> 
                    <th>Kategori</th>
                    <th>Durum</th>
                    <th>Görüntülenme</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php
                        if (empty($_GET['CATEGORY_ID'])) { 
                        $sql = "select * from product where ACTIVE = 1";
                        }else {
                        $sql = "select * from product where ID in (select PRODUCT_ID from category_product where CATEGORY_ID = ".$_GET['CATEGORY_ID'].") and ACTIVE = 1";
                        }
                        $result = mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_array($result))
                        {
                            $sql_category = "select TITLE from category where ID in (select CATEGORY_ID from category_product where PRODUCT_ID = ".$row['ID'].") and ACTIVE = 1";
                            $result_category = mysqli_query($conn,$sql_category);
                    ?>
                    <td>
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group mr-2" role="group" aria-label="Third group">
                            <a href = "product_update.php?id=<?php echo $row['ID'] ?>">
                            <button type="submit" class="btn btn-block bg-gradient-warning btn-xs"><ion-icon size="small" name="document-text-outline"></ion-icon>Düzenle</button>
                            </a>
                        </div>
                        <div class="btn-group mr-2" role="group" aria-label="Third group">
                            <a href = "process/delete.php?productId=<?php echo $row['ID'] ?>">
                            <button type="button" class="btn btn-block bg-gradient-danger btn-xs"><ion-icon size="small" name="trash-outline"></ion-icon>Sil</button>
                            </a>
                        </div>
                        </div>
                    </td>
                    <?php
                        echo '<td>'.$row['TITLE'].'</td>';
                        echo '<td>'.$row['PRICE'].'</td>';
                        echo '<td>'.$row['STOCK'].'</td>';
                        echo '<td><div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">';
                        while($row_product_category = mysqli_fetch_assoc($result_category)) {
                            echo '<div class="btn-group mr-2" role="group" aria-label="Third group">';
                            echo '<button type="button" class="btn btn-primary btn-xs">'.$row_product_category['TITLE'].'</button>';
                            echo '</div>';
                        }
                        echo '</div></td>';
                        echo '<td>'.$row['STATUS'].'</td>';
                        echo '<td>'.$row['VIEW'].'</td>';
                        echo '</tr>';
                        }
                    ?>
                </tbody>
             </table>
         </div>
        </div>
    </div>
<?php include("footer.php") ?>