<table>
<tr><td>
<label for="badanie">Badanie: </label>
<select name="badanie" id="badanie">
 <?php 
    if ($data) { 
       foreach ( $data as $row ) { 
       echo '<option value='.$row['badanie_id'].'>'.$row['substancja'].' (id: '.$row['badanie_id'].')</option>' ;
    }}
 echo '</select>
<tr><td>Rola: <input type="text" name="rola" id="rola"></td></tr>
<tr><td><span id="data"><input type="button" value="Zgłoś" onclick="fn_zapisz_badacza('.$badacz_id.')"/></span></td></tr>
<td><span id="response"></span></td></tr>'
?> 
</table>

