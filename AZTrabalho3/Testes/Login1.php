<?php
session_start();
$conn = new PDO("sqlsrv:Database=dbphp7;server=localhost\SQLEXPRESS;ConnectionPooling=0","sa","root");

$login = isset($conn,$_POST["login"])?$_POST["login"]:0;
$senha = isset($conn,$_POST["senha"])?$_POST["senha"]:0;

$query = $conn->prepare("SELECT idusuario FROM tb_usuarios WHERE login = '$login' AND senha = '$senha'");
$query->bindValue(':login',$login);
$query->bindValue(':senha',$senha);
$query->execute();
$results = $query->fetchall(PDO::FETCH_ASSOC);

if($results>0) {
	$_SESSION['login'] = $login;
	header('Location: Logado.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: Login.php');
	exit();
}
?>