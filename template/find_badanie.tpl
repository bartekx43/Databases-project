<form name="form">            
  <table>
    <tr><td><label for="substancja">Badana substancja:</label></td>
    <td><input value="<?php if(isset($formData)) echo $formData['substancja']; ?>" type="text" id="substancja" name="substancja" /></td></tr>
    <tr><td><span id="data"><input type="button" value="Szukaj" onclick="fn_find()"/></span></td></tr>
  </table>
  <span id="response"></span></td>
</form> 
