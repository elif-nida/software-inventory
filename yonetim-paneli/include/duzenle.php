<?php
if(!empty($_GET["tablo"]) && !empty($_GET["ID"]))
{
    $tablo=$VT->filter($_GET["tablo"]);
    $tablo=$VT->filter($_GET["ID"]);
    $kontrol=$VT->VeriGetir(" moduller "," WHERE tablo=? AND durum=? ", ""," ORDER BY ID ASC " , 1);
    if($kontrol!=false)
    {
        $veri=$VT->VeriGetir($kontrol[0]["tablo"], "WHERE ID=?", array($ID), " ORDER BY ID ASC" , 1);
        if($veri!=false)
        {

        }

    


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?=$kontrol[0]["baslik"]?>Düzenleme Sayfası</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?sayfa=ekle">Anasayfa</a></li>
              <li class="breadcrumb-item active"><?=$kontrol[0]["baslik"]?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
 
    <section class="content">
      <div class="container-fluid">
        <div class ="row">
        <div class="col-md-12">
        <a href="index.php?sayfa=liste" <?=$kontrol[0]["tablo"]?>" class="btn btn-info" style="float:right; margin-bottom: 10px; margin-left:10px; "><i class="fa fa-bars"></i> LİSTE </a>
        <a href="index.php?sayfa=ekle" <?=$kontrol[0]["tablo"]?>" class="btn btn-success" style="float:right; margin-bottom: 10px;"><i class="fa fa-plus"></i> YENİ EKLE </a>
 
        </div>
        </div>
        
        <?php
        if($_POST){
          if(!empty($_POST["kategori"]) && !empty($_POST["lisans"]) && !empty($_POST["metin"])&& !empty($_POST["daireBaskanligi"]) && !empty($_POST["proje"]) && !empty($_POST["sirano"] ))
           {
            $kategori=$VT->filter($_POST["kategori"]);
            $lisans=$VT->filter($_POST["lisans"]);
            $metin=$VT->filter($_POST["metin"], true);
            $daireBakanligi=$VT->filter($_POST["daireBaskanligi"]);
            $proje=$VT->filter($_POST["proje"]);
            $sirano=$VT->filter($_POST["sirano"]);
            
            $ekle=$VT->SorguCalistir("UPDATE".$kontrol[0]["tablo"],"SET kategori=?,lisans=?,metin=,daireBaskanligi=?,proje=?,sirano=? WHERE ID=?",array($kategori,$lisans,$metin,$daireBakanligi,$proje,$sirano,$veri[0]["ID"]));
           if($ekle!=false){
            $veri=$VT->VeriGetir($kontrol[0]["tablo"], "WHERE ID=?", array($veri[0]["ID"]), " ORDER BY ID ASC" , 1);
            ?>
            <div class="alert alert-success">İşleminiz başarıyla kaydedildi</div>
           }
          }

          else
          {
            ?>
            <div class="alert alert-danger">Boş bıraktığınız alanları doldurunuz.</div>
            <?php
          }
        }
        ?>
            

          <form action="#" , method="post">
            <div class="com-md-8">
          <div class="card-body" card card-primary>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Yazılım Seç</label>
                  <select class="form-control select2" style="width: 100%;" name="kategori">
                  <?php
                   $sonuc=$VT->kategoriGetir($kontrol[0]["tablo"], $veri[0]["kategori"],-1);
                    if($sonuc!=false){

                      echo $sonuc;
  
                    }else{
                      $VT->tekKategori($kontrol[0]["tablo"]);
                    }

                  ?>
             
                  </select>
                </div>           
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Lisans Süresi</label>
                  <input type="text" class="form-control" placeholder="Lisans süresini giriniz ..." name="lisans" value="<?=stripslashes($veri[0]["lisans"])?>>
              <!-- /.col -->
            </div>
        </div></div>
        <div class="col-md-12">
                <div class="form-group">
                  <label>Açıklama</label>
                 <textarea class="textarea" placeholder="AÇIKLAMA GİRİNİZ..." name="metin" style="width: 100%; height:350px; font-size:14px; line-height:18px; border:1px solid #dddddd; padding: 10px;">
                 <?=stripslashes($veri[0]["metin"])?>
                </textarea>
              <!-- /.col -->
            </div>
            </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Daire Başkanlığı</label>
                  <input type="text" class="form-control" placeholder="Daire başkanlığını giriniz ..." name="daireBaskanligi" value="<?=stripslashes($veri[0]["daireBaskanligi"])?>>
              <!-- /.col -->
            </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                  <label>Projeler</label>
                  <input type="text" class="form-control" placeholder="Yapmış olduğunuz projeleri yazınız ..." name="proje" value="<?=stripslashes($veri[0]["proje"])?>>
              <!-- /.col -->
            </div>
            </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Sıra No</label>
                  <input type="number" class="form-control" placeholder="Sıra no ..." name="sirano" style="width:100px" value="<?=stripslashes($veri[0]["sirano"])?>>
              <!-- /.col -->
            </div>

        </div>
        <div class="col-md-12">
                <div class="form-group">
                <button type="submit" class="btn btn-block btn-secondary">KAYDET</button>
              <!-- /.col -->
            </div>

        </div>
       
            </div>

    </form>
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 <?php
    }
    else{
        ?> 
        <meta http-equiv="refresh" content="0; url=<?SITE?>liste/<?$kontrol[0]["tablo"]?>">
        <?php

    }
 }
 else{ 
 
  ?> 
<meta http-equiv="refresh" content="0; url=<?SITE?>">
<?php
 }
}
else{
  
  ?> 
<meta http-equiv="refresh" content="0; url=<?SITE?>">
<?php

}
 
 ?>