<form name="form" onkeydown="return event.key != 'Enter';">            
  <table>
    <tr><td><label for="substancja">Substancja:</label></td>
    <td><input value="<?php if(isset($formData)) echo $formData['substancja']; ?>" type="text" id="substancja" name="substancja" /></td></tr>
    <tr><td><label for="opis">Opis:</label></td>
    <td><input value="<?php if(isset($formData)) echo $formData['opis']; ?>" type="text" id="opis" name="opis" /></td></tr>
    <tr><td><span id="data"><input type="button" value="Dodaj" onclick="fn_dodaj_badanie()" /></span></td>
    <td><span id="response"></span></td></tr>
  </table>
</form> 
