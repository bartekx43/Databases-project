<table border="1">
 <?php 
    if ($data) { 
       echo '<tr><th>ID</th><th>Czasopismo</th><th>Badana substancja</th><th>Data publikacji</th></tr>' ;
       foreach ( $data as $row ) { 
       echo '<tr><td>'.$row['publikacja_id'].'</td><td>'.$row['czasopismo'].'</td><td>'.$row['substancja'].'</td><td>'.$row['data'].'</td></tr>' ;
    }}
    else{
       echo 'Brak';
    }
 ?> 
 </table>