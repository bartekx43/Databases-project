<?php 
if ($data[0]['wiek']){
      echo '<a href="index.php?sub=baza&action=listUczestnik&info=0">Widok publiczny</a>';
   }
   else{
      echo '<a href="index.php?sub=baza&action=listUczestnik&info=1">Widok badacza</a>';
   }
echo '<table border="1">';
    if ($data) { 
      echo '<tr><th>ID badania</th><th>Imie</th><th>Nazwisko</th><th>Wiek</th><th>Grupa kontrolna</th></tr>';
      foreach ( $data as $row ) { 
      echo '<tr><td>'.$row['badanie_id'].'</td><td>'.$row['imie'].'</td><td>'.$row['nazwisko'].'</td><td>'.$row['wiek'].'</td><td>'.$row['grupa_kontrolna'].'</td></tr>' ;
    }}
    else{
       echo 'Brak';
    }
   echo '</table>';
 ?> 
 
