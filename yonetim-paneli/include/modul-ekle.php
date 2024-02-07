<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">

          <h1 class="m-0">Yazılım ekle </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
            <li class="breadcrumb-item active">Yazılım ekle</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <?php
      if ($_POST) {
        $_POST["tablo"]="";
        $_POST["tarih"]=date("Y-m-d");
        $calistir=VT::_mysql("insert","insert into moduller (baslik,tablo,durum,tarih) values(:baslik,:tablo,:durum,:tarih)",$_POST);     
        if ($calistir != false) {
          echo '<div class="alert alert-success">" Yazılım başarıyla eklendi."</div>';
      ?>
          <meta http-equiv="refresh" content="2; url=<?=SITE ?>">
      <?php
        } else {
          echo '<div class="alert alert-danger">"Yazılımınız eklenirken bir sorun oluştu."</div>';
        }
      }

      ?>

      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header ">
            <h3 class="card-title">Yazıılım tanımlama ekranı</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" action="#" method="post">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Yazılımı Giriniz</label>
                <input type="text" class="form-control" name="baslik" placeholder="Yazılım dilini yazınız">
              </div>


              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="durum" value="1" checked="checked">
                <label class="form-check-label" for="exampleCheck1">Aktif yap</label>
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit"  class="btn btn-primary">YAZILIM EKLE</button>
            </div>
          </form>
        </div>
      </div>




    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->