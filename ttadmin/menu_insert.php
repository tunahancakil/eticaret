<?php include("header.php") ?>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
* {
  box-sizing: border-box;
}

body {
  font: 16px Arial;  
}

/*the container must be positioned relative:*/
.autocomplete {
  position: relative;
  display: inline-block;
}

input {
  border: 1px solid transparent;
  background-color: #f1f1f1;
  padding: 10px;
  font-size: 16px;
}

input[type=text] {
  background-color: #f1f1f1;
  width: 100%;
}

input[type=submit] {
  background-color: DodgerBlue;
  color: #fff;
  cursor: pointer;
}

.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}

/*when hovering an item:*/
.autocomplete-items div:hover {
  background-color: #e9e9e9; 
}

/*when navigating through the items using the arrow keys:*/
.autocomplete-active {
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}
</style>
    <style type="text/css">
        .thumb{
                margin: 10px 5px 0 0;
                width: 100px;
            }
    </style>
</head>     
    <div class="content-wrapper">
    <h1>Menü Ekleme</h1>
        <div class="card-body table-responsive p-8">
            <div class="card">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <!--
                                <div class="card-header"><h5 class="float-left">Menu</h5>
                                    <div class="float-right">
                                        <button id="btnReload" type="button" class="btn btn-outline-secondary">
                                            <i class="fa fa-play"></i> Load Data</button>
                                    </div>
                                </div>
                                -->
                                <div class="card-body">
                                    <ul id="myEditor" class="sortableLists list-group">
                                    </ul>
                                </div>
                            </div>
                            <!--
                            <p>Click the Output button to execute the function <code>getString();</code></p>
                            <div class="card">
                                <div class="card-header">JSON Output
                                <div class="float-right">
                                <button id="btnOutput" type="button" class="btn btn-success"><i class="fas fa-check-square"></i> Output</button>
                                </div>
                                </div>
                                <div class="card-body">
                                <div class="form-group"><textarea id="out" class="form-control" cols="50" rows="10"></textarea>
                                </div>
                                </div>
                            </div>
                            -->
                        </div>

                        <div class="col-md-6">
                            <div class="card border-primary mb-3">
                                <div class="card-header bg-primary text-white">Edit item</div>
                                <div class="card-body">
                                    <form id="frmEdit" class="form-horizontal">
                                        <div class="form-group">
                                            <label for="menuType">Menu Tipi</label>
                                            <select name="menuType" id="menuType" class="form-control item-menu">
                                                <option></option>
                                                <option value="page">Sayfa</option>
                                                <option value="text">Düz Yazı</option>
                                                <option value="category">Kategori</option>
                                                <option value="product">Ürün</option>
                                                <option value="image">Resim</option>
                                            </select>
                                        </div>
                                        <div id="textID" class="form-group">
                                            <label for="text">Text</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control item-menu" name="text" id="text" placeholder="Text">
                                                <div class="input-group-append">
                                                    <button type="button" id="myEditor_icon" class="btn btn-outline-secondary"></button>
                                                </div>
                                            </div>
                                            <input type="hidden" name="icon" class="item-menu">
                                        </div>
                                            <input type="hidden" class="form-control item-menu" id="href" name="href" placeholder="URL">
                                    </form>
                                </div>
                                <div class="card-footer">
                                    <button type="button" id="btnUpdate" class="btn btn-primary" disabled><i class="fas fa-sync-alt"></i> Update</button>
                                    <button type="button" id="btnAdd" class="btn btn-success"><i class="fas fa-plus"></i> Add</button>
                                    <div class="container">
                                      <!-- Trigger the modal with a button -->
                                      <button type="button" class="btn btn-info" data-toggle="modal" id="selectImage" data-target="#myModal">Görsel Belirle</button>
                                       <!-- Modal -->
                                        <div class="modal fade" id="myModal" role="dialog">
                                          <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Modal Header</h4>
                                              </div>
                                              <div class="modal-body">
                                                <?php 
                                                      $dirname = "uploads/";
                                                      $images =  glob($dirname."*");
                                                      foreach($images as $image) { ?>
                                                          <div class="form-group">
                                                                <div class="custom-control custom-radio">
                                                                  <input class="custom-control-input" type="radio" value="<?php echo $image ?>" id="<?php echo $image ?>" name="IMAGE">
                                                                  <label for="<?php echo $image ?>" class="custom-control-label">
                                                                  <img class ="thumb" src="<?php echo $image ?>" /></label>
                                                                </div>
                                                          </div>
                                                     <?php }
                                                ?>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    <button type="submit" name="btnSave" class="btn btn-primary">Giriş</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <?php 
                    $sql_menu     = "select MENU_TEMPLATE from menu where MENU_TYPE = '".$_GET['menuType']."'";
                    $result_menu  = mysqli_query($conn,$sql_menu);
                    $row_menu     = mysqli_fetch_assoc($result_menu);
        echo '<script type="text/javascript"> var getMenuType = "'.$_GET['menuType'].'"</script>';
        if (isset($row_menu['MENU_TEMPLATE'])) {
        echo '<script type="text/javascript"> var menuTemplate = \''.$row_menu['MENU_TEMPLATE'].'\'</script>';
        } else {
        echo '<script type="text/javascript"> var menuTemplate = []</script>';    
        }
        ?>
        <script>
            jQuery(document).ready(function () {
            $("#selectImage").hide();
            $("#menuType").change(function(){
              if ($('#menuType').val() == 'image') {
                  $("#textID").hide();
                  $("#selectImage").show();
                } else {
                  $("#textID").show();
                  $("#selectImage").hide();
                };
            });

            $("#myModal").on("hidden.bs.modal", function () {
                var imgUrl = $("input[name=IMAGE]").val();
            });
            function autocomplete(inp, arr) {
              /*the autocomplete function takes two arguments,
              the text field element and an array of possible autocompleted values:*/
              var currentFocus;
              /*execute a function when someone writes in the text field:*/
              inp.addEventListener("input", function(e) {
                  var a, b, i, val = this.value;
                  /*close any already open lists of autocompleted values*/
                  closeAllLists();
                  if (!val) { return false;}
                  currentFocus = -1;
                  /*create a DIV element that will contain the items (values):*/
                  a = document.createElement("DIV");
                  a.setAttribute("id", this.id + "autocomplete-list");
                  a.setAttribute("class", "autocomplete-items");
                  /*append the DIV element as a child of the autocomplete container:*/
                  this.parentNode.appendChild(a);
                  /*for each item in the array...*/
                  for (i = 0; i < arr.length; i++) {
                    /*check if the item starts with the same letters as the text field value:*/
                    if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                      /*create a DIV element for each matching element:*/
                      b = document.createElement("DIV");
                      /*make the matching letters bold:*/
                      b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                      b.innerHTML += arr[i].substr(val.length);
                      /*insert a input field that will hold the current array item's value:*/
                      b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                      /*execute a function when someone clicks on the item value (DIV element):*/
                      b.addEventListener("click", function(e) {
                          /*insert the value for the autocomplete text field:*/
                          inp.value = this.getElementsByTagName("input")[0].value;
                          /*close the list of autocompleted values,
                          (or any other open lists of autocompleted values:*/
                          closeAllLists();
                      });
                      a.appendChild(b);
                    }
                  }
              });
              /*execute a function presses a key on the keyboard:*/
              inp.addEventListener("keydown", function(e) {
                  var x = document.getElementById(this.id + "autocomplete-list");
                  if (x) x = x.getElementsByTagName("div");
                  if (e.keyCode == 40) {
                    /*If the arrow DOWN key is pressed,
                    increase the currentFocus variable:*/
                    currentFocus++;
                    /*and and make the current item more visible:*/
                    addActive(x);
                  } else if (e.keyCode == 38) { //up
                    /*If the arrow UP key is pressed,
                    decrease the currentFocus variable:*/
                    currentFocus--;
                    /*and and make the current item more visible:*/
                    addActive(x);
                  } else if (e.keyCode == 13) {
                    /*If the ENTER key is pressed, prevent the form from being submitted,*/
                    e.preventDefault();
                    if (currentFocus > -1) {
                      /*and simulate a click on the "active" item:*/
                      if (x) x[currentFocus].click();
                    }
                  }
              });
              function addActive(x) {
                /*a function to classify an item as "active":*/
                if (!x) return false;
                /*start by removing the "active" class on all items:*/
                removeActive(x);
                if (currentFocus >= x.length) currentFocus = 0;
                if (currentFocus < 0) currentFocus = (x.length - 1);
                /*add class "autocomplete-active":*/
                x[currentFocus].classList.add("autocomplete-active");
              }
              function removeActive(x) {
                /*a function to remove the "active" class from all autocomplete items:*/
                for (var i = 0; i < x.length; i++) {
                  x[i].classList.remove("autocomplete-active");
                }
              }
              function closeAllLists(elmnt) {
                /*close all autocomplete lists in the document,
                except the one passed as an argument:*/
                var x = document.getElementsByClassName("autocomplete-items");
                for (var i = 0; i < x.length; i++) {
                  if (elmnt != x[i] && elmnt != inp) {
                    x[i].parentNode.removeChild(x[i]);
                  }
                }
              }
              /*execute a function when someone clicks in the document:*/
              document.addEventListener("click", function (e) {
                  closeAllLists(e.target);
              });
            }

                $('#menuType').change(function(){
                    //Selected value
                    var inputValue = $(this).val();
                    //Ajax for calling php function
                    $.post('process/get_element.php', 
                        { dropdownValue: inputValue }, 
                        function(data){
                        var dataArray = [];
                        console.log(data);
                        var objParse = jQuery.parseJSON(data);
                        for(key in objParse) {
                        dataArray.push(String([objParse [key]['TITLE']]));
                        }
                        autocomplete(document.getElementById("text"), dataArray);
                        //do after submission operation in DOM
                    });
                });
                /* =============== DEMO =============== */
                // icon picker options
                var iconPickerOptions = {searchText: "Buscar...", labelHeader: "{0}/{1}"};
                // sortable list options
                var sortableListOptions = {
                    placeholderCss: {'background-color': "#cccccc"}
                };

                var editor = new MenuEditor('myEditor', {listOptions: sortableListOptions, iconPicker: iconPickerOptions});
                editor.setForm($('#frmEdit'));
                editor.setUpdateButton($('#btnUpdate'));
                editor.setData(menuTemplate);

                $('#btnOutput').on('click', function () {
                    var str = editor.getString();
                    $("#out").text(str);
                });

                $("[name='btnSave']").on('click', function () {
                    var str = editor.getString();
                    $("#out").text(str);
                    saveData(str);
                });

                function saveData(str){
                $.ajax({
                    type: "POST",
                    url: "process/insert.php?insertType=Menu&menuType="+getMenuType,
                    data: { name : str }
                    }).done(function( msg ) {
                    alert( "Data was saved: " + msg );
                    });
                }

                $("#btnUpdate").click(function(){
                    editor.update();
                });

                $('#btnAdd').click(function(){
                  if ($('#menuType').val() != 'image') {
                    $('#href').val(convertTrToEn(createURL($('#text').val())));
                    editor.add();
                  } else {
                    $('#text').val( $("input[name=IMAGE]").val());
                    editor.add();
                  }
                });

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
                }
                /* ====================================== */

                /** PAGE ELEMENTS **/
                $('[data-toggle="tooltip"]').tooltip();
                $.getJSON( "https://api.github.com/repos/davicotico/jQuery-Menu-Editor", function( data ) {
                    $('#btnStars').html(data.stargazers_count);
                    $('#btnForks').html(data.forks_count);
                });
            });
            
        </script>
<?php include("footer.php") ?>