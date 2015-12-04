<?php
require_once($_SERVER['DOCUMENT_ROOT']."/controller/conecta.php");
require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_login.php");

require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_entregas.php");

$usuario = buscaIdUsuario($conexao,usuarioLogado());

$identregador = isset($_POST['identregador']) ? $_POST['identregador'] : 0;
$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
$veiculo = isset($_POST['veiculo']) ? $_POST['veiculo'] : '';
$idusuario = $usuario['idusuario'];
$idempresa = $usuario['idempresa'];

verificaUsuario();

// foreach($_POST as $key => $value) {
//   echo "POST parameter '$key' has '$value'";
//  }


if($identregador <= 0){ 
	if(insereEntregador($conexao, $nome, $cpf,$telefone, $veiculo,$idempresa)) {
		$_SESSION["Success"] = "Entregador gravado com Sucesso!";
		header("Location: ../view/entregas.php");
	} else {
		$erro = mysqli_error($conexao);
		$_SESSION["Danger"] = "Entregador não foi gravado. erro:".$erro;
		header("Location: ../view/entregas.php");
	}
 }else{ 
 	if(alteraEntregador($conexao, $identregador, $nome, $cpf,$telefone, $veiculo,$idempresa)) {
 		$_SESSION["Success"] = "Entregador alterado com Sucesso!.";
 		header("Location: ../view/entregas.php");
 	} else {
 		$erro = mysqli_error($conexao);
 		$_SESSION["Danger"] = "Entregador não foi alterado. erro:".$erro;
 		header("Location: ../view/entregas.php");
 	}
 }

 die();
 ?>
