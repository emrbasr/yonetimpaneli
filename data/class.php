<?php
class AdminClass{
protected $pdo = null;   
protected $host = 'localhost';
protected $dbname = 'yonetimpaneli';
protected $username = 'root';
protected $password = '529440';
protected $charset = 'utf8';



public function __construct()
{
    try {
        $this->pdo = new pdo("mysql:host".$this->host.";dbname=".$this->dbname.":charset=".$this->charset,$this->username,$this->password);
        print 'bağlantı sağlandı';
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

public function pdoInsert($sql,$args)
{
   $statment=$this->pdo->prepare($sql);
   $response=$statment->execute($args);
   if ($response) {
    return '<div class=alert alert-success> İşlem Başarili ...</div>';
   }
   else {
    return '<div class=alert alert-danger> İşlem Başarisiz !!!</div>';
   }
}

public function getAbout()
{
    $sql=$this->pdo->query("SELECT * FROM yonetimpaneli.urunler ORDER BY id ASC",PDO::FETCH_ASSOC)->fetchAll();
    if ($sql) {
        return $sql;
       
    }else {
        return '<div class="alert alert-danger">veri bulunamadı ...</div>';
    }
}

public function getSecurity($data)
{
   
   if (is_array($data)) {
    $veriable= array_map('htmlspecialchars',$data);
    $response= array_map('stripslashes',$veriable);
    return $response;
     }
   else {
    $veriable= htmlspecialchars($data);
    $response= stripslashes($veriable);
    return $response;
  }
}


}

?>