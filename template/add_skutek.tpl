<table>
<tr><td>
<label for="skutek">Skutek uboczny: </label>
<select name="skutek" id="skutek">
 <?php 
    if ($data) { 
       foreach ( $data as $row ) { 
       echo '<option value='.$row['skutek_id'].'>'.$row['nazwa'].'</option>' ;
    }}
 echo '</select>
<tr><td>Opis skutku: <input type="text" name="opis" id="opis"></td></tr>
<tr><td><span id="data"><input type="button" value="Zgłoś" onclick="fn_zglos_skutek('.$uczestnik_id.')"/></span></td></tr>
<td><span id="response"></span></td></tr>'
?> 
</table>

