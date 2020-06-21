<?php include("header.php") ?>
    <div class="content-wrapper">
    <h1>Kategori Güncelleme</h1>
        <?php
            $sql_category    = "select * from category where ID = ".$_GET['id']." and ACTIVE = 1";
            $result_category = mysqli_query($conn,$sql_category);
            $row_category    = mysqli_fetch_assoc($result_category);
        ?>
        <div class="card-body table-responsive p-8">
        <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#feature" data-toggle="tab">Özellik</a></li>
                    <li class="nav-item"><a class="nav-link" href="#pages" data-toggle="tab">Türkçe Sayfa</a></li>
                    </ul>
                </div>
                <form method="POST" action="process/update.php">
                    <div class="card-body">
                        <div class="tab-content">
                        <div class="active tab-pane" id="feature">
                            <div class="form-group">
                                <label>Üst Kategorisi</label>
                                <div class="select2-purple">
                                <select name="MAIN_CATEGORY" class="form-control select2bs4" style="width: 100%;">
                                    <?php if($row_category['IS_MAIN'] == 1) { ?>
                                        <option value="0">Ana Kategori</option>
                                    <?php }else { ?>
                                        <option value="<?php echo $row_category['ID'] ?>"><?php echo $row_category['TITLE'] ?></option>
                                    <?php }?>    
                                </select>
                                </div>
                            </div>
                            <label class="col-form-label" for="STATUS">Yayına Alınsın Mı ?</label>
                            <div class="form-group">
                            <?php if($row_category['STATUS'] == 1) { ?>
                                <div class="form-group">
                                    <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="ACTIVE" name="STATUS" value="1" checked>
                                    <label for="ACTIVE" class="custom-control-label">Evet</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="NO_ACTIVE" value="0" name="STATUS">
                                    <label for="NO_ACTIVE" class="custom-control-label">Hayır, taslak olarak kaydet</label>
                                    </div>
                                </div>
                            </div>
                            <?php } else { ?>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="ACTIVE" name="STATUS" value="1">
                                    <label for="ACTIVE" class="custom-control-label">Evet</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="NO_ACTIVE" value="0" name="STATUS" checked>
                                    <label for="NO_ACTIVE" class="custom-control-label">Hayır, taslak olarak kaydet</label>
                                </div>
                            </div>
                            <?php } ?>
                            <label class="col-form-label" for="TIME_FORMAT">Saat Aralığı</label>

                            <?php if($row_category['TIME_FORMAT'] == 'BETWEEN') { ?>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="BETWEEN" name="TIME_FORMAT" value="BETWEEN" checked >
                                    <label for="BETWEEN" class="custom-control-label">Güniçi Teslimat(09:00-18:00)</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="ON_TIME" name="TIME_FORMAT" value="ON_TIME" >
                                    <label for="ON_TIME" class="custom-control-label">Tam Saat (17:20)</label>
                                </div>
                            </div>
                            <?php } else {?>
                                <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="BETWEEN" name="TIME_FORMAT" value="BETWEEN"  >
                                    <label for="BETWEEN" class="custom-control-label">Güniçi Teslimat(09:00-18:00)</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="ON_TIME" name="TIME_FORMAT" value="ON_TIME" checked >
                                    <label for="ON_TIME" class="custom-control-label">Tam Saat (17:20)</label>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="form-group">
                                <label>Date range:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                    </div>
                                    <input type="text" name="NOT_DELIVERY" class="form-control float-right" id="reservation" value="<?php echo $row_category['NOT_DELIVERY']?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                  <?php if($row_category['MAIN_PAGE'] == 1) { ?>
                                        <input class="custom-control-input" type="checkbox" name="MAIN_PAGE" id="MAIN_PAGE" checked>
                                  <?php } else { ?>
                                        <input class="custom-control-input" type="checkbox" name="MAIN_PAGE" id="MAIN_PAGE">
                                  <?php }?>
                                  <label for="MAIN_PAGE" class="custom-control-label">Ana Sayfada Gösterilsin</label>
                                </div>
                            </div>
                            <div class="form-group">
                                    <label for="ROW_ORDER">Ana Sayfa Sırası</label>
                                    <input type="number" class="form-control" name="ROW_ORDER" value="<?php echo $row_category['ROW_ORDER']?>">
                            </div>
                        </div>
                            <div class="tab-pane" id="pages">
                                <div class="form-group">
                                    <label for="TITLE">Türkçe Kategori Adı</label>
                                    <input type="text" class="form-control" name="TITLE" value="<?php echo $row_category['TITLE']?>">
                                </div>
                                <div class="form-group">
                                    <label for="URL">Türkçe İsteğe bağlı URL</label>
                                    <input type="text" class="form-control" name="URL" value="<?php echo $row_category['URL']?>">
                                </div>
                                <div class="form-group">
                                    <label for="DESCRIPTION">Kategori Açıklama</label>
                                    <div class="mb-3">
                                        <textarea class="textarea" name="DESCRIPTION" style="width: 100%; height: 300px; font-size: 14px; line-height: 50px; border: 1px solid #dddddd; padding: 15px;">
                                        <?php echo $row_category['DESCRIPTION']?>
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="ID" value="<?php echo $row_category['ID'] ?>">
                    <div class="card-footer">
                        <button type="submit" name="categoryUpdate" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php include("footer.php") ?>