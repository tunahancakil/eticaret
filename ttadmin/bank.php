<?php include("header.php") ?>
    <div class="content-wrapper">
        <div class="card-body table-responsive p-0"><br><br>
        <h2>Bankalar</h3>
        <div class="col-md-12">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                    <th></th>
                    <th>Banka Adı</th>
                    <th>Hesap Adı</th>
                    <th>IBAN</th> 
                    </tr>
                </thead>
                <tbody>
                        <?php 
                        $sql_bank = "select * from bank where ACTIVE = 1";
                        $result_bank = mysqli_query($conn,$sql_bank);
                        while($row_bank=mysqli_fetch_array($result_bank)) {
                        ?>
                    <tr>
                    <td>
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group mr-2" role="group" aria-label="Third group">
                        <a href="bank_update.php?id=<?php echo $row_bank['ID'] ?>">
                        <button type="submit" class="btn btn-block bg-gradient-warning btn-xs"><ion-icon size="small" name="document-text-outline"></ion-icon>Düzenle</button>
                        </a>
                        </div>
                        <div class="btn-group mr-2" role="group" aria-label="Third group">
                            <a href="process/delete.php?bankId=<?php echo $row_bank['ID'] ?>">
                            <button type="button" class="btn btn-block bg-gradient-danger btn-xs"><ion-icon size="small" name="trash-outline"></ion-icon>Sil</button></a>
                            </a>
                        </div>
                        </div>
                    </td>
                    <?php
                        echo '<td>'.$row_bank['BANK_NAME'].'</td>';
                        echo '<td>'.$row_bank['ACCOUNT_NAME'].'</td>';
                        echo '<td>'.$row_bank['IBAN'].'</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
             </table>
         </div>
        </div>
    </div>
<?php include("footer.php") ?>