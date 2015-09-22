<?php
include($_SERVER['DOCUMENT_ROOT']."/conecta.php");
require_once("funcoes_login.php");

$usuario = buscaUsuario($conexao, $_POST["email"],$_POST["email"], $_POST["senha"]);
if($usuario == null) {
	$_SESSION["danger"] = "Usuário ou senha inválido.";
	header("Location: index.php");
} else {
	logaUsuario($usuario["email"]);
	header("Location: painel.php");
}

die();
?>
