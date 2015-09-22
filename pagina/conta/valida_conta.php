<?php
require_once("funcoes_conta.php");
include($_SERVER['DOCUMENT_ROOT']."/funcoes_login.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$ativado = "false";
$codificado = md5($senha);
//$admin = $_POST['admin'];


//$usuario = buscaIdUsuario($conexao,usuarioLogado());

if(sizeof(validaUsuario($conexao, $nome, $email)) > 0 ) {
	$_SESSION["danger"] = "Já existe um usuário cadastrado com esse email ou usuario. Por favor informe outro nome.";
	header("Location: criarconta.php");
} else{
	if(insereUsuario($conexao, $nome, $usuario, $codificado, $datanascimento, $email, $ativado,$usuario,["idempresa"])) {
		$_SESSION["success"] = "Cadastro realizado com Sucesso! Acesse a sua conta";
		header("Location: ../../index.php");
	} else {
		$erro = mysqli_error($conexao);
		$_SESSION["danger"] = "Usuário não foi gravado. erro:".$erro;
		header("Location: criarconta.php");
	}
}
?>
