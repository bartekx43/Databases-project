<table border="1">
 <?php 
    if ($data) { 
       echo '<tr><th>ID</th><th>Nazwa</th><th>Min. uczestników</th></tr>' ;
       foreach ( $data as $row ) { 
       echo '<tr><td>'.$row['czasopismo_id'].'</td><td>'.$row['nazwa'].'</td><td>'.$row['min_uczestnikow'].'</td></tr>' ;
    }}
    else{
       echo 'Brak';
    }
 ?> 
 </table>