<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">İletişim Bilgileri</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php?sayfa=ekle">Anasayfa</a></li>
                        <li class="breadcrumb-item active">İletişim Ayarları</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">

            </div>

            <?php
            if ($_POST) {
                if (!empty($_POST["telefon"]) && !empty($_POST["mail"]) && !empty($_POST["adres"]) && !empty($_POST["fax"])) {
                    $telefon= $VT->filter($_POST["telefon"]);
                    $mail = $VT->filter($_POST["mail"]);
                    $adres = $VT->filter($_POST["adres"]);
                    $fax = $VT->filter($_POST["fax"]);

                    $guncelle = $VT->SorguCalistir("UPDATE ayarlar", "SET telefon=?,mail=?,adres=?, fax=? WHERE ID=?", array($telefon, $mail, $adres,$fax, 1));
                    if ($guncelle != false) {
                        $veri = $VT->VeriGetir($kontrol[0]["tablo"], "WHERE ID=?", array($veri[0]["ID"]), " ORDER BY ID ASC", 1);
            ?>
                        <div class="alert alert-success">İşleminiz başarıyla kaydedildi</div>
                        }
                        }

                        else
                        {
                        ?>
                        <div class="alert alert-danger">Boş bıraktığınız alanları doldurunuz.</div>
                        <meta http-equiv="refresh" content="2; url<?=SITE?>iletisim-ayarlari"/>
                <?php
                    }
                }
                ?>
                }

                else
                {
                ?>
                <div class="alert alert-danger">Boş bıraktığınız alanları doldurunuz.</div>
            <?php
            }

            ?>


            <form action="#" , method="post">

                <div class="col-md-12">
                    <div class="form-group">
                        <label>Telefon</label>
                        <input type="text" class="form-control" placeholder="444 55 42" name="telefon" value="<?=$sitetelefon ?>">
                        <!-- /.col -->
                    </div>
                </div>
        </div>
        
        <div class="col-md-12">
            <div class="form-group">
                <label>Mail Adresimiz</label>
                <input type="text" class="form-control" placeholder="konyabuyuksehirbelediyesi@hs01.kep.tr" name="kepadres1" value="<?=$sitemail ?>">
                <!-- /.col -->
            </div>
        </div>
     
        <div class="col-md-12">
            <div class="form-group">
                <label>Adres</label>
                <input type="text" class="form-control" placeholder="Konevi Mahallesi, Millet Cd. No:14, 42040 Meram/Konya" name="adres" value="<?=$siteadres ?>">
                <!-- /.col -->
            </div>
        </div>
        <div class="form-group">
                <label>Fax</label>
                <input type="text" class="form-control" placeholder="+ 90 332 211 15 76" name="fax" value="<?=$sitefax ?>">
                </div>
          
          
        </div>
 <!-- /.col -->
            <!-- /.col -->
         
           

       
        
</div>

</form>

</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>