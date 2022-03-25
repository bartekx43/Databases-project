<table>
<tr><td>
<label for="choroba">Choroba: </label>
<select name="choroba" id="choroba">
 <?php 
    if ($data) { 
       foreach ( $data as $row ) { 
       echo '<option value='.$row['choroba_id'].'>'.$row['nazwa'].'</option>' ;
    }}
 echo '</select>
<tr><td><span id="data"><input type="button" value="Zgłoś" onclick="fn_zglos_choroba('.$uczestnik_id.')"/></span></td></tr>
<td><span id="response"></span></td></tr>';
?> 
</table>

