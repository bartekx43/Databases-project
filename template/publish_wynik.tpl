
<table>
<tr><td>Proszę wybrać czasopismo z listy. Znajdują się tam te, w których wynik z daną ilością uczestników może być opublikowany:</td></tr>
<tr><td>
<label for="czasopismo">Czasopismo: </label>
<select name="czasopismo" id="czasopismo">
 <?php 
    if ($data) { 
       foreach ( $data as $row ) { 
       echo '<option value='.$row[czasopismo_id].'>'.$row['nazwa'].'</option>' ;
    }}
 echo '</select>
<tr><td><span id="data"><input type="button" value="Opublikuj" onclick="fn_publikuj_wynik('.$wynik_id.')"/></span></td></tr>
<td><span id="response"></span></td></tr>'
?> 
</table>



