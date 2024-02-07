<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Seo Ayarları</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php?sayfa=ekle">Anasayfa</a></li>
                        <li class="breadcrumb-item active">Seo Ayarları</li>
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
                if (!empty($_POST["baslik"]) && !empty($_POST["anahtar"]) && !empty($_POST["description"])) {
                    $baslik = $VT->filter($_POST["baslik"]);
                    $anahtar = $VT->filter($_POST["anahtar"]);
                    $description = $VT->filter($_POST["description"]);

                    $guncelle = $VT->SorguCalistir("UPDATE ayarlar", "SET baslik=?,anahtar=?,description=?, WHERE ID=?", array($baslik, $anahtar, $description, 1));
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
                        <meta http-equiv="refresh" content="2; url=index.php?sayfa=seo-ayarlari/>
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
                        <label>Site Başlık</label>
                        <input type="text" class="form-control" placeholder="başlık..." name="baslik" value="<?= $sitebaslik ?>">
                        <!-- /.col -->
                    </div>
                </div>
        </div>
        
        <div class="col-md-12">
            <div class="form-group">
                <label>Tanım</label>
                <input type="text" class="form-control" placeholder="description..." name="description" value="<?=$siteaciklama ?>">
                <!-- /.col -->
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Anahtar</label>
                <input type="text" class="form-control" placeholder="Anahtar" name="anahtar" value="<?=$siteanahtar ?>">
                <!-- /.col -->
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <button type="submit" class="btn btn-block btn-secondary">GÜNCELLE</button>
                <!-- /.col -->
            </div>

        </div>

</div>

</form>

</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>