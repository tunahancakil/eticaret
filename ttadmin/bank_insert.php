<?php include("header.php") ?>
    <div class="content-wrapper">
    <h1>Banka Ekleme</h1>
        <div class="card-body table-responsive p-8">
        <div class="card">
                <form method="POST" action="process/insert.php">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="BANK_NAME">Banka Adı</label>
                            <input type="text" class="form-control" name="BANK_NAME">
                        </div>
                        <div class="form-group">
                            <label for="DEPARTMENT_NO">Şube Adı</label>
                            <input type="text" class="form-control" name="DEPARTMENT_NO">
                        </div>
                        <div class="form-group">
                            <label for="ACCOUNT_NO">Hesap No</label>
                            <input type="text" class="form-control" name="ACCOUNT_NO">
                        </div>
                        <div class="form-group">
                            <label for="ACCOUNT_NAME">Hesap Adı</label>
                            <input type="text" class="form-control" name="ACCOUNT_NAME">
                        </div>
                        <div class="form-group">
                            <label for="IBAN">IBAN</label>
                            <input type="text" class="form-control" name="IBAN">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="bank" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php include("footer.php") ?>