<table border="1">
 <?php 
    if ($data) { 
       echo '<tr><th>ID</th><th>Nazwa</th></tr>' ;
       foreach ( $data as $row ) { 
       echo '<tr><td>'.$row['skutek_id'].'</td><td>'.$row['nazwa'].'</td></tr>' ;
    }}
    else{
       echo 'Brak';
    }
 ?> 
 </table>