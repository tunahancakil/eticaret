<?php include("header.php") ?>
    <div class="content-wrapper">
    <h1>Kategori Ekleme</h1>
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
                            <div class="form-group">
                                <label>Üst Kategorisi</label>
                                <div class="select2-purple">
                                <select name="MAIN_CATEGORY" class="form-control select2bs4" style="width: 100%;">
                                    <option value="0">Ana Kategori</option>
                                    <?php
                                        $sql = "select ID,TITLE from category where ACTIVE = 1";
                                        $result = mysqli_query($conn,$sql);
                                        while($row=mysqli_fetch_array($result)) {
                                        echo '<option value="'.$row['ID'].'">'.$row['TITLE'].'</option>';
                                        }
                                    ?>
                                </select>
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
                            <label class="col-form-label" for="TIME_FORMAT">Saat Aralığı</label>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="BETWEEN" name="TIME_FORMAT" value="BETWEEN" checked required>
                                    <label for="BETWEEN" class="custom-control-label">Güniçi Teslimat(09:00-18:00)</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="ON_TIME" name="TIME_FORMAT" value="ON_TIME" required>
                                    <label for="ON_TIME" class="custom-control-label">Tam Saat (17:20)</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Date range:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                    </div>
                                    <input type="text" name="NOT_DELIVERY" class="form-control float-right" id="reservation">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                  <input class="custom-control-input" type="checkbox" name="IS_MAIN" id="IS_MAIN">
                                  <label for="IS_MAIN" class="custom-control-label">Ana Sayfada Gösterilsin</label>
                                </div>
                            </div>
                            <div class="form-group">
                                    <label for="ROW_ORDER">Ana Sayfa Sırası</label>
                                    <input type="number" class="form-control" name="ROW_ORDER">
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
                                    <label for="DESCRIPTION">Kategori Açıklama</label>
                                    <div class="mb-3">
                                        <textarea class="textarea" name="DESCRIPTION" style="width: 100%; height: 300px; font-size: 14px; line-height: 50px; border: 1px solid #dddddd; padding: 15px;">
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="category" class="btn btn-primary">Kaydet</button>
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