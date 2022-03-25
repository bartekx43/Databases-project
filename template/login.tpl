<form name="login">            
  <table>
    <tr><td><label for="fname">Imie:</label></td>
    <td><input value="<?php if(isset($formData)) echo $formData['fname']; ?>" type="text" id="fname" name="fname" /></td></tr>
    <tr><td><label for="lname">Nazwisko:</label></td>
    <td><input value="<?php if(isset($formData)) echo $formData['lname']; ?>" type="text" id="lname" name="lname" /></td></tr>
    <tr><td><label for="pass">Haslo:</label></td>
    <td><input value="<?php if(isset($formData)) echo $formData['pass']; ?>" type="text" id="pass" name="pass" /></td></tr>
    <tr><td><span id="data"><input type="button" value="Zapisz" onclick="fn_login()" /></span></td>
    <td><span id="response"></span></td></tr>
  </table>
</form>