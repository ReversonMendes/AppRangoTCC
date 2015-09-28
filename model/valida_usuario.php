<?php
include($_SERVER['DOCUMENT_ROOT']."/controller/conecta.php");
include($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_login.php");

require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_usuario.php");

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
	$_SESSION["danger"] = "Já existe um usuário cadastrado com esse email ou usuario. Por favor informe outro nome.";
	header("Location: cad_usuarios.php");
} else{
	if(insereUsuario($conexao, $nome, $usuario, $senhacripto, $datanascimento, $email, $ativado, 1)) {
		$_SESSION["success"] = "Usuário gravado com sucesso!";
		header("Location: cad_usuarios.php");
	} else {
		$erro = mysqli_error($conexao);
		$_SESSION["danger"] = "Usuário não foi gravado. erro:".$erro;
		header("Location: cad_usuarios.php");
	}
}
?>
