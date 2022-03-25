<table border="1">
 <?php 
    if ($data) { 
       echo '<tr><th>Tytuł</th><th>Imie</th><th>Nazwisko</th><th>Dołącz do badania</th></tr>' ;
       foreach ( $data as $row ) { 
       echo '<tr><td>'.$row['tytul'].'</td><td>'.$row['imie'].'</td><td>'.$row['nazwisko'].'</td><td><a href="index.php?sub=baza&action=joinBadanie&info='.$row['badacz_id'].'">dołącz</a></td></tr>' ;
    }}
    else{
       echo 'Brak';
    }
 ?> 
 </table>
