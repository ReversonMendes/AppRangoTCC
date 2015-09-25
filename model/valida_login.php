<?php
include($_SERVER['DOCUMENT_ROOT']."/controller/conecta.php");
require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_login.php");
$login = "../view/login.php";
$painel = "../view/painel.php";

$usuario = buscaUsuario($conexao, $_POST["email"],$_POST["email"], $_POST["senha"]);
if($usuario == null) {
	$_SESSION["danger"] = "Usuário ou senha inválido.";
	header("Location: $login");
} else {
	logaUsuario($usuario["email"]);
	header("Location: $painel");
}

die();
?>
