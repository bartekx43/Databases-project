<?php
class model_users 
{
 
   static $dsn = 'sqlite:sql/baza_users.db' ;
   protected static $db ;
   private $sth ;
 
   function __construct()
   {
      session_start(); 
      self::$db = new PDO ( self::$dsn ) ;
      self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) ;
   }
 
   public function saveReg($obj)
   {
      $this->sth = self::$db->prepare('INSERT INTO osoba VALUES ( :fname, :lname, :pass)');
      $this->sth->bindValue(':fname',$obj->fname,PDO::PARAM_STR) ; 
      $this->sth->bindValue(':lname',$obj->lname,PDO::PARAM_STR) ; 
      $this->sth->bindValue(':pass',md5($obj->pass),PDO::PARAM_STR) ; 
      $resp = ( $this->sth->execute() ? 'true' : 'false' ) ;
      return $resp ; 
   }

   public function loginTry($obj){
        $_SESSION['logged'] = 'no';
        $this->sth = self::$db->prepare('SELECT haslo FROM osoba WHERE nazwisko LIKE "'.$obj->lname.'"'.'AND imie LIKE "'.$obj->fname.'"') ;
        $this->sth->execute() ;
        $result = $this->sth->fetchAll() ;
        if (($result[0][0] == md5($obj->pass)) && ($obj->pass != '')){
           $_SESSION['logged'] = 'yes';
           return "Zalogowano";
        }
        else{
           $_SESSION['logged'] = 'no';
           return "Błędne dane";
        }

   }

   public function isLogged() {
      if (isset($_SESSION['logged'])) {
          $result = $_SESSION['logged'] == 'yes' ? true : false;
      } else {
          $result = false;
      }
      return $result;
  }

   public function listAll()
   {
      $this->sth = self::$db->prepare('SELECT * FROM osoba') ;
      $this->sth->execute() ;
      $result = $this->sth->fetchAll() ;
      return $result ;
   }

  public function saveRec($obj)
  {
     $this->sth = self::$db->prepare('INSERT INTO osoba VALUES ( :fname, :lname, :city)');
     $this->sth->bindValue(':fname',$obj->fname,PDO::PARAM_STR) ; 
     $this->sth->bindValue(':lname',$obj->lname,PDO::PARAM_STR) ; 
     $this->sth->bindValue(':city',$obj->city,PDO::PARAM_STR) ; 
     $resp = ( $this->sth->execute() ? 'true' : 'false' ) ;
     return $resp ; 
  }
  
  public function find($obj){
     
   $this->sth = self::$db->prepare('SELECT * FROM osoba WHERE nazwisko LIKE "'.$obj->lname.'"') ;
   $this->sth->execute() ;
   $result = $this->sth->fetchAll() ;
   return $result[0][0] ? "Osoba istnieje w bazie" : "Osoba nie istnieje w bazie";

  }

  public function logout(){
   unset($_SESSION);
   session_destroy();
   return "<a href='index.php' >Strona główna</a><br />";
  }
}
?>

