<?php
require_once($_SERVER['DOCUMENT_ROOT']."/controller/conecta.php");
require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_login.php");

require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_conta.php");

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$novasenha = $_POST['novasenha'];
$confirmasenha = $_POST['confirmasenha'];
$ativado = "false";
$senhacripto = md5($senha);
$novasenhacripto = md5($novasenha);

if($id > 0){
	if(alteraConta($conexao, $id, $usuario, $novasenhacripto)) {
		$_SESSION["Success"] = "Dados alterado com sucesso!";
		header("Location: ../view/perfil.php");
	} else {
		$erro = mysqli_error($conexao);
		$_SESSION["Danger"] = "Os dados não foram alterado. erro:".$erro;
		header("Location: ../view/perfil.php");
	}
}else{

	if(sizeof(validaUsuario($conexao, $usuario, $email)) > 0 ) {
		$_SESSION["Danger"] = "Já existe um usuário cadastrado com esse email ou usuario. Por favor informe outro nome.";
		header("Location: ../view/criarconta.php");
	} else{
		if(insereUsuario($conexao, $nome, $usuario, $senhacripto, $email, $ativado)) {
			$_SESSION["Success"] = "Cadastro realizado com Sucesso! Acesse a sua conta";
			header("Location: ../../index.php");
		} else {
			$erro = mysqli_error($conexao);
			$_SESSION["Danger"] = "Usuário não foi gravado. erro:".$erro;
			header("Location: ../view/criarconta.php");
		}
	}
}
?>
