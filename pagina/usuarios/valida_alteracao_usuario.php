<?php
require_once("funcoes_usuario.php");
include($_SERVER['DOCUMENT_ROOT']."/funcoes_login.php");

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$datanascimento = $_POST['datanascimento'];
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$codificado = md5($senha);

verificaUsuario();

if(array_key_exists('ativo', $_POST)) {
	$ativado = "true";
} else {
	$ativado = "false";
}

if(alteraUsuario($conexao, $id, $nome, $usuario, $codificado, $datanascimento, $email, $ativado)) {
	$_SESSION["success"] = "Usuário alterado com Sucesso!";
	header("Location: cad_usuarios.php");
}
 else {
	$erro = mysqli_error($conexao);
	$_SESSION["danger"] = "Usuário não foi alterado. erro:".$erro;
	header("Location: cad_usuarios.php");
}



?>

