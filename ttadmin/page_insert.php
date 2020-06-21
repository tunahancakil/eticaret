<?php include("header.php") ?>
    <div class="content-wrapper">
    <h1>Sayfa Ekleme</h1>
        <div class="card-body table-responsive p-8">
        <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#feature" data-toggle="tab">Özellik</a></li>
                    <li class="nav-item"><a class="nav-link" href="#pages" data-toggle="tab">Türkçe Sayfa</a></li>
                    </ul>
                </div>
                <form method="POST" action="process/insert.php">
                    <div class="card-body">
                        <div class="tab-content">
                        <div class="active tab-pane" id="feature">
                            <label class="col-form-label" for="inputError">Yayına Alınsın Mı?</label>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" value="1" id="YES" name="STATUS" checked>
                                    <label for="YES" class="custom-control-label">Evet</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="NO" value="0" name="STATUS">
                                    <label for="NO" class="custom-control-label">Hayır, taslak olarak kaydet</label>
                                </div>
                            </div>
                        </div>
                            <div class="tab-pane" id="pages">
                                <div class="form-group">
                                    <label for="TITLE">Türkçe Kategori Adı</label>
                                    <input type="text" id="title" class="form-control" name="TITLE">
                                </div>
                                <div class="form-group">
                                    <label for="URL">Türkçe İsteğe bağlı URL</label>
                                    <input type="text" id="href" class="form-control" name="URL" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="DESCRIPTION">Türkçe Ürün Yazısı</label>
                                    <div class="mb-3">
                                        <textarea class="textarea" name="DESCRIPTION"
                                                  style="width: 100%; height: 300px; font-size: 14px; line-height: 50px; border: 1px solid #dddddd; padding: 15px;"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="page" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $("#title").change(function(){
            $('#href').val(convertTrToEn(createURL($('#title').val()))) });
                    function createURL(str){
                    return str.replace(/ /g, '-').toLowerCase();
                }

                function convertTrToEn(str) {
                    var charMap = {
                        Ç: 'C',
                        Ö: 'O',
                        Ş: 'S',
                        İ: 'I',
                        I: 'i',
                        Ü: 'U',
                        Ğ: 'G',
                        ç: 'c',
                        ö: 'o',
                        ş: 's',
                        ı: 'i',
                        ü: 'u',
                        ğ: 'g'
                    };

                    str_array = str.split('');

                    for (var i = 0, len = str_array.length; i < len; i++) {
                        str_array[i] = charMap[str_array[i]] || str_array[i];
                    }
                    str = str_array.join('');
                    return str.replace(/[çöşüğı]/gi, "");
                }</script>
<?php include("footer.php") ?>