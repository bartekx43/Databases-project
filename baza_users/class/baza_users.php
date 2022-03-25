<?php 
 
class baza_users extends controller 
{
 
    protected $layout ;
    protected $model ;

    function __construct() {
       parent::__construct() ;
       $this->layout = new view('main') ;
       $this->model  = new model_users;
       $this->layout->css = $this->css ;
       $this->layout->menu = $this->menu;       
       $this->layout->title  = 'Baza danych SQL' ;
    }

    function register(){
        $this->layout->header = 'Rejestracja' ;
        $this->view = new view('register') ;
        $this->layout->content = $this->view ;
        return $this->layout ;
    }

    function login(){
        $this->layout->header = 'Logowanie' ;
        $this->view = new view('login') ;
        $this->layout->content = $this->view ;
        return $this->layout ;  
    }

    function saveReg() {
        $data = $_POST['data'] ;
        $obj  = json_decode($data) ;
        $this->layout->menu = file_get_contents ('template/menu.tpl') ;
        if ( isset($obj->fname) and isset($obj->lname) and isset($obj->pass)  ) {    
             $response = $this->model->saveReg($obj) ;
        }
        return ( $response ? "Zarejestrowano" : "Blad" ) ;
     }

     function loginTry(){
        $data = $_POST['data'] ;
        $obj  = json_decode($data) ;
        $this->layout->menu = file_get_contents ('template/menu.tpl') ;
        if(isset($obj->fname) and isset($obj->lname) and isset($obj->pass) ){
           $response = $this->model->loginTry($obj) ;
        }
        return $response;
     }
      
 
    function listAll() {
       $this->layout->header = 'Lista wszystkich rekordow' ;
       $this->view = new view('listAll') ;
       $this->view->data = $this->model->listAll() ;
       $this->layout->content = $this->view ; 
       return $this->layout ;
    }
    function index() {
   return $this->listAll() ;
}
     
function insertRec() {
   $this->layout->header = 'Wprowadzanie danych do bazy' ;
   $this->view = new view('form') ;
   $this->layout->content = $this->view ;
   return $this->layout ;
}
 
function saveRec() {
   $data = $_POST['data'] ;
   $obj  = json_decode($data) ;
   if ( isset($obj->fname) and isset($obj->lname) and isset($obj->city)  ) {    
        $response = $this->model->saveRec($obj) ;
   }
   return ( $response ? "Dodano rekord" : "Blad " ) ;
}
 
function find(){
   $this->layout->header = 'Szukanie w bazie' ;
   $this->view = new view('form_find') ;
   $this->layout->content = $this->view ;
   return $this->layout ;
}

function findResult(){
   $data = $_POST['data'] ;
   $obj  = json_decode($data) ;
   if(isset($obj->lname)){
      $response = $this->model->find($obj) ;
   }
   return $response;
}

}
 
?>
