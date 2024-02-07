<?php
  if (!empty($_GET["id"])){
      
      $veri=VT::_mysql("select","select * from kurumsal where ID=:id order by ID",["id"=>$_GET["id"]]);
      if($veri!=false){
          VT::_mysql("delete","delete from kurumsal where ID=:id", ["id"=>$_GET["id"]]);
          echo "<script>location='http://localhost/yonetim-paneli/index.php?sayfa=liste&tablo=$_GET[tablo]';</script>";
      }
      else{
        
      }
    }
?>

 