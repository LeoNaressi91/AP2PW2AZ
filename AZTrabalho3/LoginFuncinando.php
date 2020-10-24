<?php

$conn = new PDO("sqlsrv:Database=dbphp7;server=localhost\SQLEXPRESS;ConnectionPooling=0","sa","root");

echo "<link rel='stylesheet' type='text/css' href='Imagens/Style2.css'>";

$login = isset($conn,$_POST["login"])?$_POST["login"]:0;
$senha = isset($conn,$_POST["senha"])?$_POST["senha"]:0;
//$login = "Gui@teste";
//$senha =123;

	/*No SELECT tive que colocar o que vem post entre '' e com $ em vez de :*/
$query = $conn->prepare("SELECT * FROM tb_usuarios WHERE login = '$login' AND senha = '$senha'");
$query->execute();
$results = $query->fetchall(PDO::FETCH_ASSOC);

	//Neste IF tive coloca TRUE pois 0 ou 1 nã realizava a verificação
	if($results==TRUE){ 
		foreach ($results as $row){
		echo "<h1>===========BEM VINDO!!===============</h1><br>";
			foreach ($row as $key => $value) {//key = nome da coluna
		
				echo "<h1><strong> $key:</strong> $value<br/></h1>";
		
			}
			echo "<h1>=========================================================<br></h1>";
			echo "<br><br><a href='Login.html'><input type='submit' value='DESLOGAR'></a>";
			echo "<a href='cadastrar.html'><input type='submit' value='NOVO CADASTRO'></a>";
		}
	}
	else{
		echo "<h2>Usuario ou senha invalidos!</h2>";
		echo "<br><br><a href='sair.php'><input type='submit' value='TENTAR LOGAR'></a>";
		echo "<br><br><a href='cadastrar.html'><input type='submit' value='FAZER CADASTRO'></a>";
		exit();
	}
?>