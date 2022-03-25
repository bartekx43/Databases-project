<form name="form" onkeydown="return event.key != 'Enter';">            
  <table>
    <tr><td><label for="tytul">Tytuł:</label></td>
    <td><input value="<?php if(isset($formData)) echo $formData['tytul']; ?>" type="text" id="tytul" name="tytul" /></td></tr>
    <tr><td><label for="imie">Imie:</label></td>
    <td><input value="<?php if(isset($formData)) echo $formData['imie']; ?>" type="text" id="imie" name="imie" /></td></tr>
    <tr><td><label for="nazwisko">Nazwisko:</label></td>
    <td><input value="<?php if(isset($formData)) echo $formData['nazwisko']; ?>" type="text" id="nazwisko" name="nazwisko" /></td></tr>
    <tr><td><span id="data"><input type="button" value="Dodaj" onclick="fn_dodaj_badacz()" /></span></td>
    <td><span id="response"></span></td></tr>
  </table>
</form> 
