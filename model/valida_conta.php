<?php
include($_SERVER['DOCUMENT_ROOT']."/controller/conecta.php");
require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_conta.php");
include($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_login.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$confirmasenha = $_POST['confirmasenha'];
$ativado = "false";
$senhacripto = md5($senha);
//$admin = $_POST['admin'];

//$usuario = buscaIdUsuario($conexao,usuarioLogado());
if(sizeof(validaUsuario($conexao, $nome, $email)) > 0 ) {
	$_SESSION["danger"] = "Já existe um usuário cadastrado com esse email ou usuario. Por favor informe outro nome.";
	header("Location: ../view/criarconta.php");
} else{
	if(insereUsuario($conexao, $nome, $usuario, $senhacripto, $email, $ativado)) {
		$_SESSION["success"] = "Cadastro realizado com Sucesso! Acesse a sua conta";
		header("Location: ../../index.php");
	} else {
		$erro = mysqli_error($conexao);
		$_SESSION["danger"] = "Usuário não foi gravado. erro:".$erro;
		header("Location: ../view/criarconta.php");
	}
}
?>
