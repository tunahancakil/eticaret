<?php include("header.php") ?>
    <div class="content-wrapper">
    <h1>Sayfa Güncelleme</h1>
        <div class="card-body table-responsive p-8">
        <div class="card">
        <?php 
            $sql_page    = "select * from page where ID = ".$_GET['id']." and ACTIVE = 1";
            $result_page = mysqli_query($conn,$sql_page);
            $row_page    = mysqli_fetch_assoc($result_page);
        ?>
                <form method="POST" action="process/update.php">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="TITLE">Başlık</label>
                            <input type="text" class="form-control" name="TITLE" value="<?php echo $row_page['TITLE'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="URL">URL</label>
                            <input type="text" class="form-control" name="URL" value="<?php echo $row_page['URL'] ?>">
                        </div>
                        <div class="form-group">
                                <label for="DESCRIPTION">Sayfa İçerik</label>
                                <div class="mb-3">
                                    <textarea class="textarea" name="DESCRIPTION"
                                              style="width: 100%; height: 300px; font-size: 14px; line-height: 50px; border: 1px solid #dddddd; padding: 15px;">
                                              <?php echo $row_page['DESCRIPTION'] ?>
                                              </textarea>
                                </div>
                        </div>
                        <label class="col-form-label" for="STATUS">Yayına Alınsın Mı ?</label>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="ACTIVE" name="STATUS" value="1" checked required>
                                    <label for="ACTIVE" class="custom-control-label">Evet</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="NO_ACTIVE" value="0" name="STATUS" required>
                                    <label for="NO_ACTIVE" class="custom-control-label">Hayır, taslak olarak kaydet</label>
                                </div>
                            </div>
                    </div>
                    <input type="hidden" name="ID" value="<?php echo $row_page['ID'] ?>">
                    <div class="card-footer">
                        <button type="submit" name="pageUpdate" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php include("footer.php") ?>