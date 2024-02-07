<?php
  
if (!empty($_GET["tablo"])) {
  
  $tablo = $VT->filter(base64_decode($_GET["tablo"]));
  $kontrol = VT::_mysql("select","select baslik from moduller where 
                                  baslik=:tablo  
                                  order by baslik",array("tablo"=>trim($tablo)));
 
  if ($kontrol[0]["baslik"]<>"") {




?>
    <script>
        function silelim(xid){
          if(confirm('Silmek istediğinizden emin misiniz?')){
            location="index.php?sayfa=sil&id="+xid+"&tablo=<?=$_GET["tablo"]?>";
          }
        }
    </script>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">


          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"><?=$kontrol[0]["baslik"] ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= SITE ?>">Anasayfa</a></li>
                <li class="breadcrumb-item active"><?= $kontrol[0]["baslik"] ?></li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <section class="content">
        <div class="container-fluid">   
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-12">
              <a href="index.php?sayfa=ekle&tablo=<?=$_GET["tablo"]?>" class="btn btn-success" style="float:right; margin-bottom: 10px;"><i class="fa fa-plus"></i> YENİ EKLE </a>
            </div>
          </div>
          <div class="card">
            <div class="card-header">

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Sıra</th>
                    <th>Açıklama</th>
                    <th>Lisans Süresi</th>
                    <th>Proje</th>
                    <th>Tarih</th>
                    <th>İşlem</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                 
                    
                    }
                    
                    $kurumsal=VT::_mysql("select","select * from kurumsal where kategori=:tablo",["tablo"=>$tablo]);
                    $i=0;
                    foreach($kurumsal as $xkurum){
                      $i++;
                      echo "<tr>
                              <td>$i</td>
                              <td>$xkurum[metin]</td>
                              <td>$xkurum[lisans]</td>
                              <td>$xkurum[proje]</td>
                              <td>$xkurum[tarih]</td>
                              <td><a href='index.php?sayfa=ekle&tablo=$xkurum[kategori]' class='btn btn-success' style='float:right; margin-bottom: 10px;'><i class='fa fa-plus'></i> Düzenle </a>
                                  <a onclick='silelim($xkurum[ID])' class='btn btn-danger btn-sm'>Kaldır</a>
                              </td> 
                            </tr>";
                    }
?>

                </tbody>
                <tfoot>
                  <tr>
                    <th>Sıra</th>
                    <th>Açıklama</th>
                    <th>Lisans Süresi</th>
                    <th>Proje</th>
                    <th>Tarih</th>
                    <th>İşlem</th>>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->



        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
  <?php
  } else {
  ?>
    <!--<meta http-equiv="refresh" content="0; url=<?= SITE ?>">-->
  <?php
  }


?>