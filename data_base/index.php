<HTML>
<HEAD>
<TITLE>caricamento foto</TITLE>
</HEAD>
<BODY>
<form action="upload.php" enctype="multipart/form-data" method="POST">
	Invia questo file: <input name="userfile" type="file"></br>
<?php
	echo"<input type='hidden' value='".$_POST["tick_id"]."' name='id_t'>";
?>
	<input type="submit" value="Invia File">
</form>
</BODY>
</HTML>