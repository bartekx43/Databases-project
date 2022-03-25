<form name="form" onkeydown="return event.key != 'Enter';">            
  <table>
    <tr><td><label for="imie">Imie:</label></td>
    <td><input value="<?php if(isset($formData)) echo $formData['imie']; ?>" type="text" id="imie" name="imie" /></td></tr>
    <tr><td><label for="nazwisko">Nazwisko:</label></td>
    <td><input value="<?php if(isset($formData)) echo $formData['nazwisko']; ?>" type="text" id="nazwisko" name="nazwisko" /></td></tr>
    <tr><td><label for="wiek">Wiek:</label></td>
    <td><input value="<?php if(isset($formData)) echo $formData['wiek']; ?>" type="number" id="wiek" name="wiek" /></td></tr>
    <tr><td><label for="badanie_id">Id badania:</label></td>
    <td><select id="badanie_id" name="badanie_id">
    <?php
    if ($data) { 
       foreach ( $data as $row ) { 
       echo '<option value='.$row['badanie_id'].'>'.$row['substancja'].' (id: '.$row['badanie_id'].')</option>' ;
    }}
    ?>
    </select></td></tr>
    <tr><td><span id="data"><input type="button" value="Dodaj" onclick="fn_dodaj_uczestnik()" /></span></td>
    <td><span id="response"></span></td></tr>
  </table>
</form> 
