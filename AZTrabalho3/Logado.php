<?php
	session_start();
	echo "Olá, ".$_SESSION['login'];
	echo "<br><br><a href='sair.php'><input type='submit' value='SAIR'></a>";
?>

