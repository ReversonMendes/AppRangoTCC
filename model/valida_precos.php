<?php
require_once($_SERVER['DOCUMENT_ROOT']."/controller/conecta.php");
require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_login.php");

require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_precos.php");

$usuario = buscaIdUsuario($conexao,usuarioLogado());

$idpreco = isset($_POST['idpreco']) ? $_POST['idpreco'] : 0;
$tamanho = isset($_POST['tamanho']) ? $_POST['tamanho'] : '';
$peso = isset($_POST['peso']) ? $_POST['peso'] : '';
$gramatura = isset($_POST['gramatura']) ? $_POST['gramatura'] : '';
$valor = isset($_POST['valor']) ? $_POST['valor'] : '';
$idusuario = $usuario['idusuario'];
$idempresa = $usuario['idempresa'];
//tira a formatação de R$
$valor = str_replace("R$","",$valor);
//Troca vírgula por ponto
$valor = str_replace(",",".",$valor);

//tira a formatação de Kg
$peso = str_replace("R$","",$peso);
//Troca vírgula por ponto
$peso = str_replace(",",".",$peso);

verificaUsuario();

// foreach($_POST as $key => $value) {
//   echo "POST parameter '$key' has '$value'";
//  }

 if($idpreco <= 0){ 
	if(inserePreco($conexao, $tamanho, $gramatura,$peso, $valor, $idusuario,$idempresa)) {
		$_SESSION["Success"] = "Preço gravado com Sucesso!.";
		header("Location: ../view/precos.php");
	} else {
		$erro = mysqli_error($conexao);
		$_SESSION["Danger"] = "Preço não foi gravado. erro:".$erro;
		header("Location: ../view/precos.php");
	}
}else{ 
	if(alteraPreco($conexao, $idpreco, $tamanho, $peso,$gramatura,$valor, $idusuario, $idempresa)) {
		$_SESSION["Success"] = "Preço alterado com Sucesso!.";
		header("Location: ../view/precos.php");
	} else {
		$erro = mysqli_error($conexao);
		$_SESSION["Danger"] = "Preço não foi alterado. erro:".$erro;
		header("Location: ../view/precos.php");
	}
}

die();
?>
