<table border="1">
 <?php 
    if ($data) { 
       echo '<tr><th>ID</th><th>Substancja</th><th>Liczba uczestników</th><th>Stan</th></tr>' ;
       foreach ( $data as $row ) { 
       echo '<tr><td><a href="index.php?sub=baza&action=detailBadanie&info='.$row['badanie_id'].'">'.$row['badanie_id'].'</td><td>'.$row['substancja'].'</td><td>'.$row['liczba_uczestnikow'];
       if ($row['data_zakonczenia'] == NULL){
          echo '</td><td><a href="index.php?sub=baza&action=endBadanie&info='.$row['badanie_id'].'">zakończ</a></td></tr>' ;
       }
       else{
          echo '</td><td>zakończone</td></tr>' ;
       }
    }}
    else{
       echo 'Brak';
    }
    echo '</table>';
 
 echo '<h1>Statystyki</h1>';
 echo '<table border="1"><tr><th>ID</th><th>Śr. l. chorób</th><th>Min wiek</th><th>Max wiek</th></tr>';
   foreach ( $statystyki as $row ) { 
       echo '<td>'.$row['badanie_id'].'</td><td>'.$row['choroba_avg'].'</td><td>'.$row['wiek_min'].'</td><td>'.$row['wiek_max'].'</td></tr>';
   }
echo '</table>';
?>