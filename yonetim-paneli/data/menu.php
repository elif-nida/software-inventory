 <!-- Sidebar Menu -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="<?=SITE?>data/Konya_Büyükşehir_Belediyesi_logosu.png" width="110px"  style="opacity: .8">
      <img src="<?=SITE?>data\benim-sehrim-logo-CDF18C8F22-seeklogo.com.png" width="110px"  style="opacity: .8">
      <span class="brand-text font-weight-light"> </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=SITE?>" class="img-circle elevation-2" alt="">
        </div>
        <div class="info">
          <a href="index.php?sayfa=login.php" class="d-block"><?php echo $_SESSION["adsoyad"];?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
    
<!-- ./wrapper -->
 <nav class="mt-2">
 <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="index.php?sayfa=modul-ekle" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p> Programlama Dili Ekle</p>
                </a>
              </li>
            </ul>
          </li>
               <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
            <i class="fa fa-suitcase" aria-hidden="true"></i>
              <p> Programlama Dilleri
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
           <ul class="nav nav-treeview">
           
           <?php

            $moduller=VT::_mysql("select","select baslik from moduller where 
                                           durum=1 order by baslik");
            foreach($moduller as $xmodul){
                echo "<li class='nav-item'>
                        <a href='index.php?sayfa=liste&tablo=".base64_encode($xmodul["baslik"])."' class='nav-link'>
                          <i class='far fa-circle nav-icon'></i>
                          <p>$xmodul[baslik]</p>
                        </a>
                      </li>";
            }         
            ?>
            </ul>
          </li>
          
        
          
          <li class="nav-item">
            <a href="index.php?sayfa=iletisim-ayarlari" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                İletişim Bilgileri
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="index.php?sayfa=cikis" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Çıkış Yap
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>