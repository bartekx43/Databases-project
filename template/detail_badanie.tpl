
 <?php 
    echo '<h1>Opis badania</h1>' ;  
    echo $opis[0][0];
    echo '<h1>Uczestnicy</h1>' ;
    echo '<table border="1">';
    echo '<tr><th>Imie</th><th>Nazwisko</th><th>Wiek</th><th>Skutek uboczny</th><th>Infekcja</th><th>Choroba</th></tr>';
    if ($uczestnicy) { 
        foreach ( $uczestnicy as $row ) { 
        echo '<tr><td>'.$row['imie'].'</td><td>'.$row['nazwisko'].'</td><td>'.$row['wiek'].'</td><td><a href="index.php?sub=baza&action=addSkutek&info='.$row['uczestnik_id'].'">zgłoś</a></td><td><a href="index.php?sub=baza&action=addInfekcja&info='.$row['uczestnik_id'].'">zgłoś</a></td><td><a href="index.php?sub=baza&action=addChoroba&info='.$row['uczestnik_id'].'">dodaj</a></td></tr>' ;
        }
    }
    echo '</table>';
    echo '<h1>Badacze</h1>' ;
    echo '<table border="1">';
    echo '<tr><th>Imie</th><th>Nazwisko</th><th>Rola</th></tr>';
    if ($badacze) { 
        foreach ( $badacze as $row ) { 
        echo '<tr><td>'.$row['imie'].'</td><td>'.$row['nazwisko'].'</td><td>'.$row['rola'].'</td></tr>' ;
        }
    }
    echo '</table>';
 ?> 

