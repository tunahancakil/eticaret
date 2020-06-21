<?php include("header.php") ?>
    <div class="content-wrapper">
    <h1>Yorum Ekleme</h1>
        <div class="card-body table-responsive p-8">
        <div class="card">
                <form method="POST" action="process/insert.php">
                    <div class="card-body">
                        <div class="tab-content">
                            <label class="col-form-label" for="inputError">Yayına Alınsın Mı?</label>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" value="1" id="YES" name="STATUS" checked>
                                    <label for="YES" class="custom-control-label">Evet</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" value="0" id="NO" name="STATUS">
                                    <label for="NO" class="custom-control-label">Hayır, taslak olarak kaydet</label>
                                </div>
                            </div>
                            <div class="form-group">
                                    <label for="TITLE">Yorumunuz</label>
                                    <input type="text" class="form-control" name="COMMENT">
                            </div>
                            <div class="form-group">
                                    <label for="TITLE">Ürün Seçiniz</label>
                                    <input type="text" class="form-control" name="PRODUCT_ID">
                            </div>
                            <div class="form-group">
                                    <label for="TITLE">Üye Seçiniz</label>
                                    <input type="text" class="form-control" name="MEMBER_ID">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="insertType" value="Page">
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php include("footer.php") ?>