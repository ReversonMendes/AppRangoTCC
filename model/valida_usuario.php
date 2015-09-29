<?php
include($_SERVER['DOCUMENT_ROOT']."/controller/conecta.php");
include($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_login.php");

require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_usuario.php");

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$datanascimento = $_POST['datanascimento'];
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$ativado = "false";
$empresa = 1;
$senhacripto = md5($senha);
//$admin = $_POST['admin'];

verificaUsuario();
$usuariologado = buscaIdUsuario($conexao,usuarioLogado());

if(sizeof(validaUsuario($conexao, $nome, $email)) > 0 ) {
	$_SESSION["Danger"] = "Já existe um usuário cadastrado com esse email ou usuario. Por favor informe outro nome.";
	header("Location: ../view/perfil.php");
}

if($id > 0){
	if(alteraUsuario($conexao, $id, $nome, $usuario, $senhacripto, $datanascimento, $email, $ativado)) {
		$_SESSION["Success"] = "Usuário alterado com sucesso!";
		header("Location: ../view/perfil.php");
	}
	 else {
		$erro = mysqli_error($conexao);
		$_SESSION["Danger"] = "Usuário não foi alterado. erro:".$erro;
		header("Location: ../view/perfil.php");
	}
}else{
		if(insereUsuario($conexao, $nome, $usuario, $senhacripto, $datanascimento, $email, $ativado, 1)) {
			$_SESSION["Success"] = "Usuário gravado com sucesso!";
			header("Location: ../view/perfil.php");
		} else {
			$erro = mysqli_error($conexao);
			$_SESSION["Danger"] = "Usuário não foi gravado. erro:".$erro;
			header("Location: ../view/perfil.php");
		}
}
?>
