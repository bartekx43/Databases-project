<table>
<tr><td>Czas trwania(dni): <input type="number" name="czas" id="czas" value=10 min=0 ></td></tr>
<tr><td>Hospitalizacja: <input type="checkbox" name="hospitalizacja" id="hospitalizacja"</td></tr>
<tr><td>Zgon: <input type="checkbox" name="zgon" id="zgon"</td></tr>
<?php
echo '<tr><td><span id="data"><input type="button" value="Zgłoś" onclick="fn_zglos_infekcja('.$uczestnik_id.')"/></span></td></tr>'
?>
<td><span id="response"></span></td></tr>
</table>

