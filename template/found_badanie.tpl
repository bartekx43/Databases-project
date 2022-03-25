<table border="1">
 <?php 
    if ($data) { 
       echo '<tr><th>ID</th><th>Substancja</th><th>Opis</th></tr>' ;
       foreach ( $data as $row ) { 
       echo '<tr><td>'.$row['badanie_id'].'</td><td>'.$row['substancja'].'</td><td>'.$row['opis'].'</td></tr>' ;
    }}
    else{
       echo 'Brak';
    }
 ?> 
 </table>
