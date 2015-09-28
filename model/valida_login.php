<?php
include($_SERVER['DOCUMENT_ROOT']."/controller/conecta.php");
include($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_login.php");

$login = "../view/login.php";
$painel = "../view/painel.php";
$cadastra_empresa = "../view/empresa.php";

//Busca todas as informação do usuário
$usuario = buscaUsuario($conexao, $_POST["email"],$_POST["email"], $_POST["senha"]);

//recebe a empresa do usuário
$idempresa = $usuario['idempresa'];

//se não retornar nada senha ou usuário inválido
if($usuario == null) {
	$_SESSION["Danger"] = "Usuário ou senha inválido.";
	header("Location: $login");
} elseif( $idempresa > 0 and !is_null($idempresa) ) {
	//Logado com sucesso!
	logaUsuario($usuario["email"]);
	header("Location: $painel");
} else{
	//sem empresa usuário novo deve cadastrar a empresa
	logaUsuario($usuario["email"]);
	header("Location: $cadastra_empresa");
}

die();
?>
