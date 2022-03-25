<?php 
 
class baza extends controller 
{
 
   protected $layout ;
   protected $model ;

   function __construct() {
      parent::__construct() ;
      $this->layout = new view('main') ;
      $this->model  = new model ;
      $this->layout->css = $this->css ;
      $this->layout->menu = $this->menu;
      $this->layout->title  = 'Baza badań szczepionek przeciw COVID-19' ;
   }

   function about() {
      $this->layout->header = 'Opis projektu' ;
      $this->view = new view('about') ;
      $this->layout->content = $this->view; 
      return $this->layout ;
   }

   function listBadacz() {
      $this->layout->header = 'Lista wszystkich badaczy' ;
      $this->view = new view('list_badacz') ;
      $this->view->data = $this->model->listAll('badacz') ;
      $this->layout->content = $this->view ; 
      return $this->layout ;
   }

   function listBadanie() {
      $this->layout->header = 'Lista wszystkich badań' ;
      $this->view = new view('list_badanie') ;
      $this->view->data = $this->model->listAll('badanie');
      $this->view->statystyki = $this->model->badanieStatystyki();
      $this->layout->content = $this->view ; 
      return $this->layout ;
   }
         
   function listUczestnik($auth) {
      $this->layout->header = 'Lista wszystkich uczestników' ;
      $this->view = new view('list_uczestnik') ;
      if($auth) $this->view->data = $this->model->listUczestnik();
      else $this->view->data = $this->model->listPartUczestnik();
      $this->layout->content = $this->view ; 
      return $this->layout ;
   }

   function listChoroba() {
      $this->layout->header = 'Lista wszystkich chorób' ;
      $this->view = new view('list_choroba') ;
      $this->view->data = $this->model->listAll('choroba') ;
      $this->layout->content = $this->view ; 
      return $this->layout ;
   }

   function listCzasopismo() {
      $this->layout->header = 'Lista wszystkich czasopism' ;
      $this->view = new view('list_czasopismo') ;
      $this->view->data = $this->model->listAll('czasopismo') ;
      $this->layout->content = $this->view ; 
      return $this->layout ;
   }

   function listSkutek() {
      $this->layout->header = 'Lista wszystkich skutków' ;
      $this->view = new view('list_skutek') ;
      $this->view->data = $this->model->listAll('skutek') ;
      $this->layout->content = $this->view ; 
      return $this->layout ;
   }

   function listWynik() {
      $this->layout->header = 'Wyniki badań' ;
      $this->view = new view('list_wynik') ;
      $this->view->data = $this->model->listWynik() ;
      $this->layout->content = $this->view ; 
      return $this->layout ;
   }

   function listPublikacja() {
      $this->layout->header = 'Publikacje' ;
      $this->view = new view('list_publikacja') ;
      $this->view->data = $this->model->listPublikacja() ;
      $this->layout->content = $this->view ; 
      return $this->layout ;
   }

   function insertUczestnik() {
      $this->layout->header = 'Dodaj nowego uczestnika' ;
      $this->view = new view('insert_uczestnik') ;
      $this->view->data = $this->model->listAll('badanie') ;
      $this->layout->content = $this->view ;
      return $this->layout ;
   }

   function insertBadanie() {
      $this->layout->header = 'Dodaj nowe badanie' ;
      $this->view = new view('insert_badanie') ;
      $this->layout->content = $this->view ;
      return $this->layout ;
   }

   function insertBadacz() {
      $this->layout->header = 'Dodaj nowego badacza' ;
      $this->view = new view('insert_badacz') ;
      $this->layout->content = $this->view ;
      return $this->layout ;
   }

   function insertChoroba() {
      $this->layout->header = 'Dodaj nową chorobę' ;
      $this->view = new view('insert_choroba') ;
      $this->layout->content = $this->view ;
      return $this->layout ;
   }

   function insertSkutek() {
      $this->layout->header = 'Dodaj nowy skutek' ;
      $this->view = new view('insert_skutek') ;
      $this->layout->content = $this->view ;
      return $this->layout ;
   }
   
   function saveUczestnik() {
      $data = $_POST['data'] ;
      $obj  = json_decode($data) ;
      if ( isset($obj->imie) and isset($obj->nazwisko) and isset($obj->badanie_id)) {    
         $response = $this->model->saveUczestnik($obj) ;
      }
      return ( $response ? "Dodano rekord" : "Blad " ) ;
   }

   function saveBadacz() {
      $data = $_POST['data'] ;
      $obj  = json_decode($data) ;
      if ( isset($obj->imie) and isset($obj->nazwisko)) {    
         $response = $this->model->saveBadacz($obj) ;
      }
      return ( $response ? "Dodano rekord" : "Blad " ) ;
   }

   function saveBadanie() {
      $data = $_POST['data'] ;
      $obj  = json_decode($data) ;  
      $response = $this->model->saveBadanie($obj) ;
      return ( $response ? "Dodano rekord" : "Blad " ) ;
   }

   function saveChoroba() {
      $data = $_POST['data'] ;
      $obj  = json_decode($data) ;  
      $response = $this->model->saveChoroba($obj) ;
      return ( $response ? "Dodano rekord" : "Blad " ) ;
   }

   function saveSkutek() {
      $data = $_POST['data'] ;
      $obj  = json_decode($data) ;  
      $response = $this->model->saveSkutek($obj) ;
      return ( $response ? "Dodano rekord" : "Blad " ) ;
   }
   
   function find(){
      $this->layout->header = 'Szukanie w bazie' ;
      $this->view = new view('find_badanie') ;
      $this->layout->content = $this->view ;
      return $this->layout ;
   }

   function findBadanie(){
      $data = $_POST['data'] ;
      $obj  = json_decode($data) ;
      if(isset($obj->substancja)){
         $data= $this->model->findBadanieBySubstancja($obj) ;
      }
      $table = "<table border=1>";
      if ($data) { 
         $table .= '<tr><th>ID</th><th>Substancja</th><th>Opis</th></tr>' ;
         foreach ( $data as $row ) { 
         $table .= '<tr><td><a href="index.php?sub=baza&action=detailBadanie&info='.$row['badanie_id'].'">'.$row['badanie_id'].'</a></td><td>'.$row['substancja'].'</td><td>'.$row['opis'].'</td></tr>' ;
      }
         $table .= '</table>';
      }
      else{
         $table = 'Brak';
      }
      return $table ;
   }

   function detailBadanie($id) {
      $this->layout->header = 'Szczegóły badania' ;
      $this->view = new view('detail_badanie') ;
      $this->view->opis = $this->model->badanieOpis($id);
      $this->view->uczestnicy = $this->model->badanieUczestnicy($id);
      $this->view->badacze = $this->model->badanieBadacze($id);
      $this->layout->content = $this->view ; 
      return $this->layout ;
   }

   function addSkutek($id) {
      $this->layout->header = 'Wybierz z listy' ;
      $this->view = new view('add_skutek') ;
      $this->view->data = $this->model->listAll('skutek');
      $this->view->uczestnik_id = $id;
      $this->layout->content = $this->view ;
      return $this->layout ;
   }

   function reportSkutek($id) {
      $data = $_POST['data'] ;
      $obj  = json_decode($data) ;  
      $response = $this->model->reportSkutek($obj, $id) ;
      return ( $response ? "Dodano" : "Blad" ) ;
   }

   function addInfekcja($id) {
      $this->layout->header = 'Wybierz z listy' ;
      $this->view = new view('add_infekcja') ;
      $this->view->uczestnik_id = $id;
      $this->layout->content = $this->view ;
      return $this->layout ;
   }

   function reportInfekcja($id) {
      $data = $_POST['data'] ;
      $obj  = json_decode($data) ;  
      $response = $this->model->reportInfekcja($obj, $id) ;
      return ( $response ? "Dodano" : "Blad" ) ;
   }

   function addChoroba($id) {
      $this->layout->header = 'Wybierz z listy' ;
      $this->view = new view('add_choroba') ;
      $this->view->data = $this->model->listAll('choroba');
      $this->view->uczestnik_id = $id;
      $this->layout->content = $this->view ;
      return $this->layout ;
   }

   function reportChoroba($id) {
      $data = $_POST['data'] ;
      $obj  = json_decode($data) ;  
      $response = $this->model->reportChoroba($obj, $id) ;
      return ( $response ? "Dodano" : "Blad" ) ;
   }

   function joinBadanie($id) {
      $this->layout->header = 'Wybierz z listy' ;
      $this->view = new view('add_badacz') ;
      $this->view->data = $this->model->listAll('badanie');
      $this->view->badacz_id = $id;
      $this->layout->content = $this->view ;
      return $this->layout ;
   }

   function addBadacz($id) {
      $data = $_POST['data'] ;
      $obj  = json_decode($data) ;  
      $response = $this->model->addBadacz($obj, $id) ;
      return ( $response ? "Dodano" : "Blad" ) ;
   }

   function endBadanie($id) {
      $this->model->endBadanie($id) ;
      $this->layout->header = 'Lista wszystkich badań' ;
      $this->view = new view('list_badanie') ;
      header("Location: index.php?sub=baza&action=listBadanie");
   }

   function publishWynik($id) {
      $this->layout->header = 'Publikacja wyniku' ;
      $this->view = new view('publish_wynik') ;
      $this->view->data = $this->model->listAvailableCzasopismo($id);
      $this->view->wynik_id = $id;
      $this->layout->content = $this->view ; 
      return $this->layout ;
   }

   function savePublikacja() {
      $data = $_POST['data'] ;
      $obj  = json_decode($data) ;  
      $response = $this->model->savePublikacja($obj) ;
      return ( $response ? "Dodano" : "Blad" ) ;
   }

}
 
?>
