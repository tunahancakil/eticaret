<?php include("header.php") ?>
    <div class="content-wrapper">
        <div class="card-body table-responsive p-0">
        <h3>Kategoriler</h3>
        <div class="col-md-12">
            <div class="card card-primary card-outline">
            <div class="card-body">
                <p>Kategorilerde Ara</p>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <div class="form-group">
                    <input class="form-control" placeholder="Kategorilerde Ara" name="search">
                    </div>
                    <button type="submit" class="btn btn-success btn-sm">Ara</button>
                </form>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                    <th></th>
                    <th>Kategori Adı</th>
                    <th>Kategoriye Ait Ürünler</th>
                    <th>Durum</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $param = "";
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                          $search = $_REQUEST['search'];
                          if (!empty($search)) {
                            $param = $search;
                          }
                        }        
                        $sql = "select * from category where ACTIVE=1 and upper(TITLE) LIKE upper('%".$param."%')";
                        $result = mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_array($result))
                        {
                        echo '<tr>';
                    ?>
                    <td>
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group mr-2" role="group" aria-label="Third group">
                            <a href="category_update.php?id=<?php echo $row['ID'] ?>">
                            <button type="button" class="btn btn-block bg-gradient-warning btn-xs"><ion-icon size="small" name="document-text-outline"></ion-icon>Düzenle</button>
                            </div>
                            <div class="btn-group mr-2" role="group" aria-label="Third group">
                            <a href="process/delete.php?categoryId=<?php echo $row['ID'] ?>">
                            <button type="button" class="btn btn-block bg-gradient-danger btn-xs"><ion-icon size="small" name="trash-outline"></ion-icon>Sil</button>
                            </a>
                            </div>
                        </div>
                    </td>
                    <?php
                        echo '<td>'.$row['TITLE'].'</td>';
                    ?>
                    <td>
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group mr-2" role="group" aria-label="Third group">
                                <form action="product.php" method="GET">
                                <?php
                                    echo '<input type="hidden" name="CATEGORY_ID" value="'.$row['ID'].'">'
                                ?>
                               <button type="submit"  class="btn  bg-gradient-primary btn-s"><ion-icon size="small" name="document-text-outline"></ion-icon> Kategoriye Ait Ürünler</button>
                            </form>
                            </div>

                        </div>
                    </td>
                    <?php
                        echo '<td>'.$row['STATUS'].'</td>';
                        echo '</tr>';
                        }
                    ?>
                </tbody>
             </table>
            </div>
         </div>
    </div>
<?php include("footer.php") ?>