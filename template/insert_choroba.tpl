<form name="form" onkeydown="return event.key != 'Enter';">            
  <table>
    <tr><td><label for="nazwa">Nazwa:</label></td>
    <td><input value="<?php if(isset($formData)) echo $formData['nazwa']; ?>" type="text" id="nazwa" name="nazwa" /></td></tr>
    <tr><td><span id="data"><input type="button" value="Dodaj" onclick="fn_dodaj_choroba()" /></span></td>
    <td><span id="response"></span></td></tr>
  </table>
</form> 
