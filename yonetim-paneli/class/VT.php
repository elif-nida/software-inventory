<?php
class VT{
    var $sunucu = "localhost";
    var $user = "root";
    var $password = "";
    var $dbname = "yonetim-paneli";
    var $baglanti;

    function __construct()
    {
        try {
            $this->baglanti = new PDO("mysql:host=" . $this->sunucu . ";dbname=" . $this->dbname . ";charset=utf8", $this->user, $this->password);
        } catch (PDOException $error) {
            echo $error->getMessage();
            exit();
        }
    }
    private function bindveri($vericek,$args=[]){
        foreach($args as $k=>$v){
            $vericek->bindParam(":$k",$v, PDO::PARAM_STR);
        }
        return $vericek;
    }
    public function insert($sql,$args=[]){
            $wwlink=$this->baglanti;
            $vericek = $wwlink->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
            return $vericek->execute($args);
           
    }
    public function select($sql,$args=[]){
        $wwlink=$this->baglanti;
        $gelenveri=[];
         $vericek = $wwlink->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
         $this->bindveri($vericek,$args);
        
         $vericek->execute($args);
         
         if($vericek->rowCount()>0){
            while($veri=$vericek->fetch(PDO::FETCH_ASSOC))$gelenveri[]=$veri;
         }else{
            $veri=$vericek->fetch(PDO::FETCH_ASSOC);
         }
         
         return $gelenveri;
    }
    public function delete($sql,$args=[]){
        $wwlink=$this->baglanti;
        $vericek = $wwlink->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
         $this->bindveri($vericek,$args);
         return $vericek->execute($args);
    }

    public function Verigetir($tablo, $wherealanlar, $wherearraydeger, $orderby = " ORDER BY ID ASC ", $limit = "")
    {/*
        $tablo= " ".$tablo." ";
        $wherealanlar= " ".$wherealanlar." ";
        $wherearraydeger= " ".$wherearraydeger." ";
        $limit= " ".$limit." ";*/
        
        $this->baglanti->query("SET CHARSET utf8");
        $sql = "SELECT * FROM " . $tablo;
        if (!empty($wherealanlar) && !empty($wherearraydeger)) {
            $sql .= " " . $wherealanlar;

            if (!empty($orderby)) {
                $sql .= " " . $orderby;
            }
            if (!empty($limit)) {
                $sql .= " LIMIT " . $limit;
            }
         
            $calistir = $this->baglanti->prepare($sql);
            //$calis = "SELECT * FROM kurumsal where kategori=";
            
           
            $sonuc =$calistir->execute($wherearraydeger);
            
            $veri = $calistir->fetchAll(PDO::FETCH_ASSOC);
            
        } else {
            if (!empty($orderby)) {
                $sql .= " " . $orderby;
            }
            if (!empty($limit)) {
                $sql .= "LIMIT " . $limit;
            }
            
            $veri = $this->baglanti->query($sql, PDO::FETCH_ASSOC);
        }
        if ($veri != false && !empty($veri)) {
            $datalar = array();
            foreach ($veri as $bilgiler) {
                $datalar[] = $bilgiler;
            }
            return $datalar;
        } else {
            return false;
        }
    }
    public function SorguCalistir($tablo , $alanlar="", $degerlerarray, $limit=""){
        
        $this->baglanti->query("SET CHARSET utf8");
        if(!empty($alanlar) && !empty($degerlerarray))
        {
        $sql=$tablo." ".$alanlar;
        if ($limit) {
            $sql .= "LIMIT " . $limit;

        }
        

        $calistir=$this->baglanti->prepare($sql);
        print_r($degerlerarray);
        $sonuc=$calistir->execute($degerlerarray); 
     }else{
        $sql=$tablo;
        if (!empty($limit)) {
            $sql .= "LIMIT " . $limit;

        }
        $sonuc=$this->baglanti->exec($sql);

     }
     if($sonuc!=false){
        return true;
     }else{
        return false;
     }
    }
	public function createSorguCalistir($sorgu){
        
        $this->baglanti->query("SET CHARSET utf8");
        
     
        if (!empty($sorgu)) {
          
            $calistir=$this->baglanti->prepare($sorgu);
            //$sonuc=$calistir->execute($sorgu); 
        }
       
   
        
        $sonuc=$this->baglanti->exec($sorgu);

     
     if($sonuc!=false){
        return true;
     }else{
        return false;
     }
    }
    public function seflink($val){
        $find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#','?','*','!','.','(',')');
		$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp','','','','','','');
		$string = strtolower(str_replace($find, $replace, $val));
		$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
		$string = trim(preg_replace('/\s+/', ' ', $string));
		$string = str_replace(' ', '-', $string);
		return $string;
	
    }
   public function ModulEkle()
	{   
		if(!empty($_POST["baslik"]))
		{  
			$baslik=$_POST["baslik"];
			if(!empty($_POST["durum"])){$durum=1;}else{$durum=2;}
			$tablo=str_replace("-","",$this->seflink($baslik));
            $kontrol=$this->Verigetir("moduller", "WHERE tablo=?",array($tablo),"ORDER BY ID ASC",1);
            $kontrol=false;
            if($kontrol!=false){
                return false;
            }else{ 
             

                     
				$sorgu="CREATE TABLE ".$tablo."
                
                
              (`ID` int(11) NOT NULL,
              `baslik` varchar(255) DEFAULT NULL,
              `seflink` varchar(255) DEFAULT NULL,
              `kategori` int(11) DEFAULT NULL,
              `metin` text DEFAULT NULL,
              `lisans` varchar(255) DEFAULT NULL,
              `sure` varchar(255) DEFAULT NULL,
             `daireBaskanligi` varchar(255) DEFAULT NULL,
             `proje` varchar(255) DEFAULT NULL,
              `islem` int(5) DEFAULT NULL,
              `anahtar` varchar(255) DEFAULT NULL,
              `description` varchar(255) DEFAULT NULL,
              `durum` int(5) DEFAULT NULL,
              `sirano` int(11) DEFAULT NULL,
              `tarih` date DEFAULT NULL)
            ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;";
                    
                    
			
			 $tabloOlustur=$this->createSorguCalistir($sorgu);
                
			$modulekle=$this->baglanti->prepare("INSERT INTO moduller SET baslik=?, tablo=?, durum=?, tarih=?");
            $modulekle->execute(array($baslik, $tablo, $durum, date("Y-m-d")));
            $kategoriekle=$this->baglanti->prepare("INSERT INTO kategoriler SET baslik=?, seflink=?, tablo=?, durum=?, tarih=?");
            $kategoriekle->execute(array($baslik , $tablo , 'modul', 1, date("Y-m-d")));
			if($modulekle!=false)
			{
				return true;
			}
			else
			{
				return false;
			}
        }
        }
		else
		{
			return false;
		}
	}
   public function filter($val,$tf=false)
   {
    if($tf==false){
        $val=strip_tags($val);
    }
    $val=addslashes(trim($val));
    return $val;
   }


   public function kategoriGetir($tablo,$secID="",$uz=-1)
   {
	$uz++;
	$kategori=$this->VeriGetir("kategoriler", "WHERE tablo=?" , array($tablo), "ORDER BY ID ASC");
    print_r($kategori);
    if($kategori!=false)
	{
		for($q=0 ; $q<count($kategori) ; $q++)
		{
			$kategoriseflink=$kategori[$q]["seflink"];
			$kategoriID=$kategori[$q]["ID"];
			if($secID==$kategoriID){
				echo '<option value="'.$kategoriID.'" selected="selected">'.str_repeat("&nbsp;&nbsp;&nbsp;",$uz).stripslashes($kategori[$q]["baslik"]).'</option>';

			}
			else{
				echo '<option value="'.$kategoriID.'">'.str_repeat("&nbsp;&nbsp;&nbsp;",$uz).stripslashes($kategori[$q]["baslik"]).'</option>';

			}
			if($kategoriseflink==$tablo){
				break;
			}
			$this->kategoriGetir($kategoriseflink,$secID.$uz);
		}
	}
	else{
		return false;
	}
}

	      public function tekKategori($tablo,$secID="",$uz=-1){
		$uz++;
		$kategori=$this->VeriGetir("kategoriler", "WHERE seflink=? AND tablo=?" , array($tablo , "modul"), "ORDER BY ID ASC");
		if($kategori!=false){
			for($q=0 ; $q<count($kategori) ; $q++){
				$kategoriseflink=$kategori[$q]["seflink"];
				$kategoriID=$kategori[$q]["ID"];
				if($secID==$kategoriID){
					echo '<option value="'.$kategoriID.'" selected="selected">'.str_repeat("&nbsp;&nbsp;&nbsp;",$uz).stripslashes($kategori[$q]["baslik"]).'</option>';
	
				}
				else{
					echo '<option value="'.$kategoriID.'">'.str_repeat("&nbsp;&nbsp;&nbsp;",$uz).stripslashes($kategori[$q]["baslik"]).'</option>';
	
				}
				
			}
		}
		else{
			return false;
		}
   }

   public static function _mysql($func="",$sql="",$args=[]){
        $main=new VT();
        
        return $main->$func($sql,$args);
   }


}


?>
