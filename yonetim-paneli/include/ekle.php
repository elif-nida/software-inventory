<?php
if(!empty($_GET["tablo"]))
{
  $tablo = $VT->filter(base64_decode($_GET["tablo"]));
  $kontrol = VT::_mysql("select","select baslik from moduller where 
                                  baslik=:tablo  
                                  order by baslik",array("tablo"=>trim($tablo)));
 
  if ($kontrol[0]["baslik"]<>"") {

    


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?=$kontrol[0]["baslik"]?></h1>
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
          
        <a href="index.php?sayfa=liste&tablo=" <?=$kontrol[0]["baslik"]?>" class="btn btn-info" style="float:right; margin-bottom: 10px; margin-left:10px; "><i class="fa fa-bars"></i> LİSTE </a>
        
 
        </div>
        </div>
        
        <?php
        if($_POST){
          if(!empty($_POST["kategori"]) && !empty($_POST["lisans"]) && !empty($_POST["metin"])&& !empty($_POST["daireBaskanligi"]) && !empty($_POST["proje"]) && !empty($_POST["sirano"] ))
           {
            /*$kategori=$VT->filter($_POST["kategori"]);
            $lisans=$VT->filter($_POST["lisans"]);
            $metin=$VT->filter($_POST["metin"], true);
            $daireBakanligi=$VT->filter($_POST["daireBaskanligi"]);
            $proje=$VT->filter($_POST["proje"]);
            $sirano=$VT->filter($_POST["sirano"]);*/
            $_POST["tarih"]=date("Y-m-d");
            
            unset($_POST["files"]);
            $ekle=VT::_mysql("insert","insert into kurumsal (kategori,metin,lisans,daireBaskanligi,proje,tarih,sirano) values (:kategori,:metin,:lisans,:daireBaskanligi,:proje,:tarih,:sirano)",$_POST);
            if($ekle!=false){
              echo "<div class='alert alert-success'>İşleminiz başarıyla kaydedildi.</div>";
            }else            {
              echo "<div class='alert alert-danger'>Boş bıraktığınız alanları doldurunuz.</div>";
            }

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
                    echo "<option value='$tablo'>$tablo";
                  ?>
             
                  </select>
                </div>           
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Lisans Süresi</label>
                  <input type="text" class="form-control" placeholder="Lisans süresini giriniz ..." name="lisans">
              <!-- /.col -->
            </div>
        </div></div>
        <div class="col-md-12">
                <div class="form-group">
                  <label>Açıklama</label>
                 <textarea class="textarea" placeholder="AÇIKLAMA GİRİNİZ..." name="metin" style="width: 100%; height:350px; font-size:14px; line-height:18px; border:1px solid #dddddd; padding: 10px;"></textarea>
              <!-- /.col -->
            </div>
            </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Daire Başkanlığı</label>
                  <input type="text" class="form-control" placeholder="Daire başkanlığını giriniz ..." name="daireBaskanligi">
              <!-- /.col -->
            </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                  <label>Projeler</label>
                  <input type="text" class="form-control" placeholder="Yapmış olduğunuz projeleri yazınız ..." name="proje">
              <!-- /.col -->
            </div>
            </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Sıra No</label>
                  <input type="number" class="form-control" placeholder="Sıra no ..." name="sirano" style="width:100px">
              <!-- /.col -->
            </div>

        </div>
        <div class="col-md-12">
                <div class="form-group">
                <button href= "index.php?sayfa=liste.php"type="submit" class="btn btn-block btn-secondary">KAYDET</button>
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