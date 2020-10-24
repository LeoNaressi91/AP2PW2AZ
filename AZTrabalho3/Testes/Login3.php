<?php
$conn = new PDO("sqlsrv:Database=dbphp7;server=localhost\SQLEXPRESS;ConnectionPooling=0","sa","root");

$login ="Leo@teste";


$query = $conn->prepare("SELECT * FROM tb_usuarios WHERE login = '$login'");
$query->bindParam(':login',$login);


$result = $query->execute();


if (!$result)
{
		var_dump($query->errorInfo());
		exit;
}
else{
	$_SESSION['login'] = $login;
	header('Location: Logado.php');
	exit();
}



?>