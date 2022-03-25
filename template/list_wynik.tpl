<table border="1">
 <?php 
    if ($data) { 
       echo '<tr><th>ID</th><th>Badanie ID</th><th>Substancja</th><th>Prewencja hospitalizacji</th><th>Prewencja zgonu</th><th>Liczba uczestników</th><th>Publikuj</th></tr>' ;
       foreach ( $data as $row ) { 
       echo '<tr><td>'.$row['wynik_id'].'</td><td>'.$row['badanie_id'].'</td><td>'.$row['substancja'].'</td><td>'.$row['skutecznosc_hospitalizacje'].'</td><td>'.$row['skutecznosc_zgony'].'</td><td>'.$row['liczba_uczestnikow'].'</td><td><a href="index.php?sub=baza&action=publishWynik&info='.$row['wynik_id'].'">publikuj</a></td></tr>' ;
    }}
    else{
       echo 'Brak';
    }
 ?> 
 </table>
