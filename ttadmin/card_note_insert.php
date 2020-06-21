<?php include("header.php") ?>
    <div class="content-wrapper">
    <h1>Menü Ekleme</h1>
        <div class="card-body table-responsive p-8">
            <div class="card">
                <form method="POST" action="process/insert.php">
                    <div class="card-body">
                        <div class="tab-content">
                                <div class="form-group">
                                    <label for="CATEGORY">Kart Kategorisi Adı</label>
                                    <input type="text" class="form-control" name="CATEGORY">
                                </div>
                                <div class="form-group">
                                    <label for="MESSAGE">Kart Notu</label>
                                    <input type="text" class="form-control" name="MESSAGE">
                                </div>
                                <div class="form-group">
                                    <label for="ORDERS">Sıra</label>
                                    <input type="text" class="form-control" name="ORDERS">
                                </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="card" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php include("footer.php") ?>