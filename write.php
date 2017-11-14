<?php
session_start();
?>
<form action="upload.php" method="post" autocomplete="on" enctype="multipart/form-data">
<table>
 	<tr><td><input type="file" name="image"></td></tr>
 	<tr><td><input name="submit" type="submit" value="Upload image">
       </td></tr>
 </table>	
 </form>