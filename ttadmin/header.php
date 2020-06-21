<?php include("connect/connection.php");
session_start();
if (!isset($_SESSION['USER'])) {
  header('Location: login.php');
}
?>
<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TT Yazılım | TT Admin Panel</title>
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/981f261072.js" crossorigin="anonymous"></script>
  <!-- ionicons -->
  <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="bootstrap-iconpicker/css/bootstrap-iconpicker.min.css">

  <script type="text/script">
  $(document).ready(function() 
  { 
   $('form').ajaxForm(function() 
   {
    alert("Uploaded SuccessFully");
   }); 
  });

  function preview_image() 
  {
    var total_file=document.getElementById("fileToUpload").files.length;
    for(var i=0;i<total_file;i++)
    {
      $('#image_preview').append("<img width=10% height=10% src='"+URL.createObjectURL(event.target.files[i])+"'><br><br>");
    }
  }
  </script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
    <a href="process/logout.php"><button type="button" class="btn btn-block btn-danger btn-xs">Güvenli Çıkış</button></a>
  </nav>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/favicon.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">TT Panel</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="index.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Ana Sayfa </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>Raporlar
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ürün Satış Raporu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sipariş Raporu</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>Sayfalar
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="page_insert.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sayfa Ekle</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="page.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sayfa Listele</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Ürün Kategorileri
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="category_insert.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ürün Kategori Ekle</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="category.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ürün Kategori Listele</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Ürünler
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="product_insert.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ürün Ekle</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="product.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ürün Listele</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p> Sayfa Tasarımları
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class=" nav-icon fas fa-cart-arrow-down"></i>
              <p>Siparişler
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="orders.php?status='DELIVERED'" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bütün Siparişler</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="orders.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Teslim Edilen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="orders.php?status='CANCEL'" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>İptal/İade Edilen</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="member.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p> Üyeler
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-comments"></i>
              <p>Ürün Yorumları
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="comment_insert.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Yorum Ekle</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="comment.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tüm Yorumlar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="comment.php?status=1" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Onaylı Yorumlar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="comment.php?status=0" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Onaysız Yorumlar</p>
                </a>
              </li>
            </ul>
          </li>
          <!--
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-gifts"></i>
              <p>Hediye Çekleri
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="product_insert.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hediye Çeki Ekle</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="product.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hediye Çekleri</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="product.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kullanılmış Hediye Çekleri</p>
                </a>
              </li>
            </ul>
          </li>
          -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-gifts"></i>
              <p>Kart Notları
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="card_note_insert.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kart Notu Ekle</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="card_note.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kart Notu Listele</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-list"></i>
              <p>Menüler
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="menu_insert.php?menuType=HEADER" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Üst Menü Ekle</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="menu_insert.php?menuType=FOOTER" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Alt Menü Ekle</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="menu.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Menüleri Listele</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-city"></i>
              <p>Şehirler
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!--
              <li class="nav-item">
                <a href="city_insert.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Şehir Ekle</p>
                </a>
              </li>
              -->
              <li class="nav-item">
                <a href="city.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Şehir Listele</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-globe-europe"></i>
              <p>İlçe&Yol Ücreti
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!--
              <li class="nav-item">
                <a href="district_insert.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>İlçe Ekle</p>
                </a>
              </li>
              -->
              <li class="nav-item">
                <a href="district.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>İlçe Listele</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-university"></i>
              <p>Bankalar
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="bank_insert.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Banka Ekle</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="bank.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Banka Listele</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-clock"></i>
              <p>Saat Şablonları
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="product_insert.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Şablon Ekle</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="product.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Şablon Listele</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-folder-open"></i>
              <p>Dosya İşlemleri
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="product_insert.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dosya Yükle</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="product.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Yüklenmiş Dosyalar</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users-cog"></i>
              <p>Site Yöneticileri
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="admin_insert.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Yönetici Ekle</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="admin_list.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Yönetici Listele</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-cogs"></i>
              <p>Ayarlar
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <!--
              <li class="nav-item">
                <a href="settings_logo.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tasarım & Logo</p>
                </a>
              </li>
              -->
              <!--
              <li class="nav-item">
                <a href="product.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fatura Tasarımı</p>
                </a>
              </li>
              -->
              <li class="nav-item">
                <a href="settings.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Genel Ayarlar</p>
                </a>
              </li>
              <!--
              <li class="nav-item">
                <a href="product.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Google - SEO Ayarları</p>
                </a>
              </li>
              -->
            </ul>
          </li>
      </nav>
    </div>
  </aside>