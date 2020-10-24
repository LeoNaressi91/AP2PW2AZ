<?php
session_start();

$conn = new PDO("sqlsrv:Database=dbphp7;server=localhost\SQLEXPRESS;ConnectionPooling=0","sa","root");

//$login = isset($conn,$_POST["login"])?$_POST["login"]:0;
//$senha = isset($conn,$_POST["senha"])?$_POST["senha"]:0;
$login = "Gui@test";
$senha =123;
$query = $conn->prepare("SELECT idusuario FROM tb_usuarios WHERE login = '$login' AND senha = '$senha'");
$query->execute();


if($query>0) {
	$_SESSION['login'] = $login;
	header('Location: Logado.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: Login.php');
	exit();
}
?>