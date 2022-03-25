function fn_dodaj_uczestnik()
{
    var fname = document.getElementById("imie").value ;
    var lname = document.getElementById("nazwisko").value ;
    var id  = document.getElementById("badanie_id").value ;
    var wiek  = document.getElementById("wiek").value ;
    document.getElementById("data").style.display = "none" ;
    var json_data = "{\"imie\":\"" + fname + "\",\"nazwisko\":\"" + lname + "\",\"badanie_id\":\"" + id + "\",\"wiek\":\"" + wiek + "\"}" ;
    var msg = "data=" + encodeURIComponent(json_data) ;
    var url = "index.php?sub=baza&action=saveUczestnik" ;
    resp = function(response) {
       
       document.getElementById("response").innerHTML = response ; 
     }
     xmlhttpPost (url, msg, resp) ;                          
}  

function fn_dodaj_badacz()
{
    var fname = document.getElementById("imie").value ;
    var lname = document.getElementById("nazwisko").value ;
    var title  = document.getElementById("tytul").value ;
    document.getElementById("data").style.display = "none" ;
    var json_data = "{\"imie\":\"" + fname + "\",\"nazwisko\":\"" + lname + "\",\"tytul\":\"" + title + "\"}" ;
    var msg = "data=" + encodeURIComponent(json_data) ;
    var url = "index.php?sub=baza&action=saveBadacz" ;
    resp = function(response) {
       
       document.getElementById("response").innerHTML = response ; 
     }
     xmlhttpPost (url, msg, resp) ;                          
}  

function fn_dodaj_badanie()
{
    var substance = document.getElementById("substancja").value ;
    var description = document.getElementById("opis").value ;
    document.getElementById("data").style.display = "none" ;
    var json_data = "{\"substancja\":\"" + substance + "\",\"opis\":\"" + description + "\"}" ;
    var msg = "data=" + encodeURIComponent(json_data) ;
    var url = "index.php?sub=baza&action=saveBadanie" ;
    resp = function(response) {
       
       document.getElementById("response").innerHTML = response ; 
     }
     xmlhttpPost (url, msg, resp) ;                          
}  

function fn_dodaj_choroba()
{
    var name = document.getElementById("nazwa").value ;
    document.getElementById("data").style.display = "none" ;
    var json_data = "{\"nazwa\":\"" + name + "\"}" ;
    var msg = "data=" + encodeURIComponent(json_data) ;
    var url = "index.php?sub=baza&action=saveChoroba" ;
    resp = function(response) {
       
       document.getElementById("response").innerHTML = response ; 
     }
     xmlhttpPost (url, msg, resp) ;                          
}  

function fn_dodaj_skutek()
{
    var name = document.getElementById("nazwa").value ;
    document.getElementById("data").style.display = "none" ;
    var json_data = "{\"nazwa\":\"" + name + "\"}" ;
    var msg = "data=" + encodeURIComponent(json_data) ;
    var url = "index.php?sub=baza&action=saveSkutek" ;
    resp = function(response) {
       
       document.getElementById("response").innerHTML = response ; 
     }
     xmlhttpPost (url, msg, resp) ;                          
}  

function fn_zglos_skutek(id)
{
    var skutek_id = document.getElementById("skutek").value ;
    var opis = document.getElementById("opis").value;
    document.getElementById("data").style.display = "none" ;
    var json_data = "{\"skutek_id\":\"" + skutek_id + "\",\"opis\":\"" + opis + "\"}" ;
    var msg = "data=" + encodeURIComponent(json_data) ;
    var url = "index.php?sub=baza&action=reportSkutek&info=" + id;
    resp = function(response) {
      if(response.trim() != "Dodano") response = "Błąd - skutek został wcześniej zgłoszony";
       document.getElementById("response").innerHTML = response ; 
     }
     xmlhttpPost (url, msg, resp) ;                          
}  

function fn_zapisz_badacza(id)
{
    var badanie_id = document.getElementById("badanie").value ;
    var rola = document.getElementById("rola").value;
    document.getElementById("data").style.display = "none" ;
    var json_data = "{\"badanie_id\":\"" + badanie_id + "\",\"rola\":\"" + rola + "\"}" ;
    var msg = "data=" + encodeURIComponent(json_data) ;
    var url = "index.php?sub=baza&action=addBadacz&info=" + id;
    resp = function(response) {
      if(response.trim() != "Dodano") response = "Błąd - badacz jest już zgłoszony";
       document.getElementById("response").innerHTML = response ; 
     }
     xmlhttpPost (url, msg, resp) ;                          
}  

function fn_publikuj_wynik(id)
{
    var czasopismo = document.getElementById("czasopismo").value ;
    document.getElementById("data").style.display = "none" ;
    var json_data = "{\"czasopismo\":\"" + czasopismo + "\",\"wynik_id\":\"" + id + "\"}" ;
    var msg = "data=" + encodeURIComponent(json_data) ;
    var url = "index.php?sub=baza&action=savePublikacja";
    resp = function(response) {
      if(response.trim() != "Dodano") response = "Błąd w publikacji. Proszę wyybrać prawidłowe czasopismo";
      document.getElementById("response").innerHTML = response ; 
     }
     xmlhttpPost (url, msg, resp) ;                          
}  

function fn_zglos_infekcja(id)
{
    var czas = document.getElementById("czas").value;
    var hospitalizacja = document.getElementById("hospitalizacja").checked;
    var zgon = document.getElementById("zgon").checked;
    document.getElementById("data").style.display = "none" ;
    var json_data = "{\"czas\":\"" + czas + "\",\"hospitalizacja\":\"" + hospitalizacja + "\",\"zgon\":\"" + zgon + "\"}" ;
    var msg = "data=" + encodeURIComponent(json_data) ;
    var url = "index.php?sub=baza&action=reportInfekcja&info=" + id;
    resp = function(response) {
      if(response.trim() != "Dodano") response = "Błąd - infekcja została wcześniej zgłoszona";
       document.getElementById("response").innerHTML = response ; 
     }
     xmlhttpPost (url, msg, resp) ;                          
}  

function fn_zglos_choroba(id)
{
  var choroba_id = document.getElementById("choroba").value ;
  document.getElementById("data").style.display = "none" ;
  var json_data = "{\"choroba_id\":\"" + choroba_id + "\"}" ;
  var msg = "data=" + encodeURIComponent(json_data) ;
  var url = "index.php?sub=baza&action=reportChoroba&info=" + id;
  resp = function(response) {
    if(response.trim() != "Dodano") response = "Błąd - choroba została wcześniej zgłoszona";
     document.getElementById("response").innerHTML = response ; 
   }
   xmlhttpPost (url, msg, resp) ;                          
}  

function fn_find()
 {
     var substancja = document.getElementById("substancja").value;
     document.getElementById("data").style.display = "none" ;
     var json_data = "{\"substancja\":\"" + substancja + "\"}";
     var msg = "data=" + encodeURIComponent(json_data) ;
     var url = "index.php?sub=baza&action=findBadanie" ;
     resp = function(response) {
        document.getElementById("response").innerHTML = response;
      }
      xmlhttpPost (url, msg, resp) ;                          
}  
  
function xmlhttpPost(strURL, mess, respFunc) {
    var xmlHttpReq = false;
    var self = this;
    // Mozilla/Safari
    if (window.XMLHttpRequest) {
        self.xmlHttpReq = new XMLHttpRequest();
    }
    // IE
    else if (window.ActiveXObject) {
        self.xmlHttpReq = new ActiveXObject("Microsoft.XMLHTTP");
    }
    self.xmlHttpReq.onreadystatechange = function() {
    if(self.xmlHttpReq.readyState == 4){
        // alert ( self.xmlHttpReq.status ) ;
        if ( self.xmlHttpReq.status == 200 ) {    
           // document.getElementById("data").innerHTML = http_request.responseText;
          respFunc( self.xmlHttpReq.responseText ) ;
        }
        else if ( self.xmlHttpReq.status == 401 ) {
           window.location.reload() ;
        } 
      }
    }
    self.xmlHttpReq.open('POST', strURL);
    self.xmlHttpReq.setRequestHeader("X-Requested-With","XMLHttpRequest");
    self.xmlHttpReq.setRequestHeader("Content-Type","application/x-www-form-urlencoded; ");
    // self.xmlHttpReq.setRequestHeader("Content-length", mess.length);
    self.xmlHttpReq.send(mess);        
}
