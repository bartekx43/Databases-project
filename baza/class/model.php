<?php
class model 
{

   static $dsn = 'pgsql:host=localhost;dbname=u9bardian' ;
   protected static $db ;
   private $sth ;

   function __construct()
   {
      self::$db = new PDO ( self::$dsn, 'u9bardian', '') ; //nalezy wpisac haslo
      self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) ;
   }

   public function listAll($tabela){
      $this->sth = self::$db->prepare('SELECT * FROM project.'.$tabela.' ORDER BY '.$tabela.'_id') ;
      $this->sth->execute() ;
      $result = $this->sth->fetchAll() ;
      return $result ;
   }

   public function listUczestnik(){
      $this->sth = self::$db->prepare('SELECT * FROM project.uczestnik ORDER BY badanie_id') ;
      $this->sth->execute() ;
      $result = $this->sth->fetchAll() ;
      return $result ;
   }

   public function listWynik(){
      $this->sth = self::$db->prepare('SELECT * FROM project.badanie b JOIN project.wynik w ON b.badanie_id=w.badanie_id') ;
      $this->sth->execute() ;
      $result = $this->sth->fetchAll() ;
      return $result ;
   }

   public function listPartUczestnik(){
      $this->sth = self::$db->prepare('SELECT * FROM project.uczestnik_part_view ORDER BY badanie_id') ;
      $this->sth->execute() ;
      $result = $this->sth->fetchAll() ;
      return $result ;
   }

   public function listPublikacja(){
      $this->sth = self::$db->prepare('SELECT * FROM project.listaPublikacji()') ;
      $this->sth->execute() ;
      $result = $this->sth->fetchAll() ;
      return $result ;
   }

   public function saveUczestnik($obj)
   {
      $this->sth = self::$db->prepare('INSERT INTO project.uczestnik(badanie_id, imie, nazwisko, wiek) VALUES ( :badanie_id, :imie, :nazwisko, :wiek)');
      $this->sth->bindValue(':imie',$obj->imie,PDO::PARAM_STR) ; 
      $this->sth->bindValue(':nazwisko',$obj->nazwisko,PDO::PARAM_STR) ; 
      $this->sth->bindValue(':badanie_id',$obj->badanie_id,PDO::PARAM_STR) ; 
      $this->sth->bindValue(':wiek',$obj->wiek,PDO::PARAM_STR) ; 
      $resp = ( $this->sth->execute() ? 'true' : 'false' ) ;
      return $resp ; 
   }

   public function saveBadacz($obj)
   {
      $this->sth = self::$db->prepare('INSERT INTO project.badacz(imie, nazwisko, tytul) VALUES ( :imie, :nazwisko, :tytul )');
      $this->sth->bindValue(':imie',$obj->imie,PDO::PARAM_STR) ; 
      $this->sth->bindValue(':nazwisko',$obj->nazwisko,PDO::PARAM_STR) ; 
      $this->sth->bindValue(':tytul',$obj->tytul,PDO::PARAM_STR) ; 
      $resp = ( $this->sth->execute() ? 'true' : 'false' ) ;
      return $resp ; 
   }

   public function saveBadanie($obj)
   {
      $this->sth = self::$db->prepare('INSERT INTO project.badanie(substancja, opis) VALUES ( :substancja, :opis )');
      $this->sth->bindValue(':substancja',$obj->substancja,PDO::PARAM_STR) ; 
      $this->sth->bindValue(':opis',$obj->opis,PDO::PARAM_STR) ; 
      $resp = ( $this->sth->execute() ? 'true' : 'false' ) ;
      return $resp ; 
   }


   public function saveChoroba($obj)
   {
      $this->sth = self::$db->prepare('INSERT INTO project.choroba(nazwa) VALUES ( :nazwa )');
      $this->sth->bindValue(':nazwa',$obj->nazwa,PDO::PARAM_STR) ; 
      $resp = ( $this->sth->execute() ? 'true' : 'false' ) ;
      return $resp ; 
   }


   public function saveSkutek($obj)
   {
      $this->sth = self::$db->prepare('INSERT INTO project.skutek(nazwa) VALUES ( :nazwa )');
      $this->sth->bindValue(':nazwa',$obj->nazwa,PDO::PARAM_STR) ; 
      $resp = ( $this->sth->execute() ? 'true' : 'false' ) ;
      return $resp ; 
   }

   public function savePublikacja($obj)
   {
      $this->sth = self::$db->prepare('INSERT INTO project.publikacja(czasopismo_id, wynik_id, data) VALUES ( :czasopismo_id, :wynik_id, NOW() )');
      $this->sth->bindValue(':czasopismo_id',$obj->czasopismo,PDO::PARAM_STR) ; 
      $this->sth->bindValue(':wynik_id',$obj->wynik_id,PDO::PARAM_STR) ; 
      $resp = ( $this->sth->execute() ? 'true' : 'false' ) ;
      return $resp ; 
   }

   public function findBadanieBySubstancja($obj)
   {   
      $this->sth = self::$db->prepare("SELECT * FROM project.badanie WHERE substancja LIKE '".$obj->substancja."'") ;
      $this->sth->execute() ;
      $result = $this->sth->fetchAll() ;
      return $result;
   }

   public function listAvailableCzasopismo($id)
   {   
      $this->sth = self::$db->prepare("SELECT * FROM project.listaCzasopism(".$id.")") ;
      $this->sth->execute() ;
      $result = $this->sth->fetchAll() ;
      return $result;
   }

   function badanieOpis($id) {
      $this->sth = self::$db->prepare("SELECT opis FROM project.badanie WHERE badanie_id =".$id) ;
      $this->sth->execute() ;
      $result = $this->sth->fetchAll() ;
      return $result;
   }

   function badanieUczestnicy($id) {
      $this->sth = self::$db->prepare("SELECT * FROM project.uczestnik WHERE badanie_id =".$id) ;
      $this->sth->execute() ;
      $result = $this->sth->fetchAll() ;
      return $result;
   }

   function badanieBadacze($id) {
      $this->sth = self::$db->prepare("SELECT * FROM project.badacz_w_badaniu bb JOIN project.badacz b ON b.badacz_id=bb.badacz_id WHERE badanie_id =".$id) ;
      $this->sth->execute() ;
      $result = $this->sth->fetchAll() ;
      return $result;
   }

   function badanieStatystyki() {
      $this->sth = self::$db->prepare("SELECT * FROM project.statystykiBadania()") ;
      $result = $this->sth->execute() ;
      $result = $this->sth->fetchAll() ;
      return $result;
   }

   public function reportSkutek($obj, $id)
   {
      $this->sth = self::$db->prepare('INSERT INTO project.uczestnik_ze_skutkiem(skutek_id, uczestnik_id, opis) VALUES ( :skutek_id, :uczestnik_id, :opis )');
      $this->sth->bindValue(':skutek_id',$obj->skutek_id,PDO::PARAM_STR) ; 
      $this->sth->bindValue(':uczestnik_id',$id,PDO::PARAM_STR) ; 
      $this->sth->bindValue(':opis',$obj->opis,PDO::PARAM_STR) ; 
      $resp = ( $this->sth->execute() ? 'true' : 'false' ) ;
      return $resp ; 
   }

   public function reportInfekcja($obj, $id)
   {
      $this->sth = self::$db->prepare('INSERT INTO project.infekcja(uczestnik_id, czas, hospitalizacja, zgon) VALUES (:uczestnik_id, :czas, :hospitalizacja, :zgon)');
      $this->sth->bindValue(':uczestnik_id',$id,PDO::PARAM_STR) ; 
      $this->sth->bindValue(':czas', $obj->czas,PDO::PARAM_STR); 
      $this->sth->bindValue(':hospitalizacja',$obj->hospitalizacja,PDO::PARAM_STR) ; 
      $this->sth->bindValue(':zgon',$obj->zgon,PDO::PARAM_STR) ; 
      
      $resp = ( $this->sth->execute() ? 'true' : 'false' ) ;
      return $resp ; 
   }

   public function reportChoroba($obj, $id)
   {
      $this->sth = self::$db->prepare('INSERT INTO project.uczestnik_z_choroba(choroba_id, uczestnik_id) VALUES ( :choroba_id, :uczestnik_id)');
      $this->sth->bindValue(':choroba_id',$obj->choroba_id,PDO::PARAM_STR) ; 
      $this->sth->bindValue(':uczestnik_id',$id,PDO::PARAM_STR) ; 
      $resp = ( $this->sth->execute() ? 'true' : 'false' ) ;
      return $resp ; 
   }

   public function addBadacz($obj, $id)
   {
      $this->sth = self::$db->prepare('INSERT INTO project.badacz_w_badaniu(badanie_id, badacz_id, rola) VALUES ( :badanie_id, :badacz_id, :rola )');
      $this->sth->bindValue(':badanie_id',$obj->badanie_id,PDO::PARAM_STR) ; 
      $this->sth->bindValue(':badacz_id',$id,PDO::PARAM_STR) ; 
      $this->sth->bindValue(':rola',$obj->rola,PDO::PARAM_STR) ; 
      $resp = ( $this->sth->execute() ? 'true' : 'false' ) ;
      return $resp ; 
   }

   public function endBadanie($id)
   {
      $this->sth = self::$db->prepare('SELECT project.zakonczBadanie('.$id.')');
      $resp = ( $this->sth->execute() ? 'true' : 'false' ) ;
      return $resp ; 
   }
}
?>

