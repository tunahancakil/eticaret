<?php include("header.php") ?>
    <div class="content-wrapper">
        <div class="card-body table-responsive p-0">
        <h3>Sayfalar</h3>
        <div class="col-md-12">
            <div class="card card-primary card-outline">
            <div class="card-body">
                <p>Sayfalarda Ara</p>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <div class="form-group">
                    <input class="form-control" placeholder="Sayfalarda Ara" name="search">
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
                    <th>Sayfa Adı</th>
                    <th>Durum</th>
                    <th>Görüntülenme</th>
                    <th>Eklenme Tarihi</th>
                    </tr>
                </thead>
                <tbody>    
                    <?php
                        $param = "";
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                          $search = $_REQUEST['search'];
                          if (empty($search)) {
                            $param = $search;
                          }
                        }
                        $sql = "select * from page where ACTIVE=1 and upper(TITLE) like upper('%".$param."%')";
                        $result = mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_array($result))
                        {
                        echo '<tr>';
                    ?>
                    <td>
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group mr-2" role="group" aria-label="Third group">
                            <a href="page_update.php?id=<?php echo $row['ID'] ?>">
                            <button type="button" class="btn btn-block bg-gradient-warning btn-xs"><ion-icon size="small" name="document-text-outline"></ion-icon>Düzenle</button>
                            </a>
                            </div>
                            <div class="btn-group mr-2" role="group" aria-label="Third group">
                            <a href="process/delete.php?pageId=<?php echo $row['ID'] ?>">
                            <button type="button" class="btn btn-block bg-gradient-danger btn-xs"><ion-icon size="small" name="trash-outline"></ion-icon>Sil</button>
                            </a>
                            </div>
                        </div>
                    </td>
                    <?php
                        echo '<td>'.$row['TITLE'].'</td>';
                        echo '<td>'.$row['STATUS'].'</td>';
                        echo '<td>'.$row['VIEW'].'</td>';
                        echo '<td>'.$row['PROCESS_DATE'].'</td>';
                        echo '</tr>';
                        }
                    ?>
                </tbody>
             </table>
            </div>
         </div>
    </div>
<?php include("footer.php") ?>