<?php include("header.php") ?>
    <div class="content-wrapper">
        <div class="card-body table-responsive p-0"><br><br>
        <h2>Siparişler</h3>
        <div class="col-md-12">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                    <th></th>
                    <th>Üye Ad Soyad</th>
                    <th>Sipariş Numarası</th>
                    <th>Ödeme Tipi</th>
                    <th>Durum</th>
                    <th>Toplam Tutar</th>
                    <th>Sipariş Tarihi</th> 
                    </tr>
                </thead>
                <tbody>
                        <?php 
                        $sql_order = "select * from orders where STATUS = 'WAITING_CARGO'";
                        $result_order = mysqli_query($conn,$sql_order);
                        while($row_order=mysqli_fetch_array($result_order)) {
                        ?>
                    <tr>
                    <td>
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group mr-2" role="group" aria-label="Third group">
                        <a href="">
                            <button type="submit" id="update" class="btn btn-block bg-gradient-warning btn-xs"><ion-icon size="small" name="document-text-outline"></ion-icon>Düzenle</button>
                        </a>
                        </div>
                        </div>
                    </td>
                    <?php
                        if ($row_order['MEMBER_ID']==0) {
                            $nameSurname = $row_order['SENDER_NAME'];
                        } else {
                            $nameSurname = "Tunahan";
                        }
                        echo '<td>'.$nameSurname.'</td>';
                        echo '<td>'.$row_order['REFERENCE_NO'].'</td>';
                        echo '<td>'.$row_order['PAYMENT_TYPE'].'</td>';
                        echo '<td>'.$row_order['STATUS'].'</td>';
                        echo '<td>'.$row_order['TOTAL_AMOUNT'].'</td>';
                        echo '<td>'.$row_order['PROCESS_DATE'].'</td>';
                    ?>
                <?php } ?>
                    </tr>
                </tbody>
             </table>
         </div>
        </div>
    </div>
<?php include("footer.php") ?>