<?php
require_once($_SERVER['DOCUMENT_ROOT']."/controller/conecta.php");
require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_login.php");

require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_cardapios.php");

$usuario = buscaIdUsuario($conexao,usuarioLogado());

$idcardapio = isset($_POST['idcardapio']) ? $_POST['idcardapio'] : 0;
$nomeprato = isset($_POST['nomeprato']) ? $_POST['nomeprato'] : '';
$diasemana = isset($_POST['diasemana']) ? $_POST['diasemana'] : '';
$idusuario = $usuario['idusuario'];
$flagativo = "false";
$idempresa = $usuario['idempresa'];
$ingredientes = isset($_POST['ingrediente']) ? $_POST['ingrediente'] : '[]';

verificaUsuario();


// foreach($_POST as $key => $value) {
//   echo "POST parameter '$key' has '$value'";
//  }

if($idcardapio <= 0){ 
	if(insereCardapio($conexao, $nomeprato, $diasemana, $idusuario, $flagativo, $idempresa,$ingredientes)) {
		$_SESSION["Success"] = "Cardápio gravado com Sucesso!.";
		header("Location: ../view/cardapios.php");
	} else {
		$erro = mysqli_error($conexao);
		$_SESSION["Danger"] = "Cardápio não foi gravado. erro:".$erro;
		header("Location: ../view/cardapios.php");
	}
}else{ 
 	$status = verificaStatus($conexao,$idempresa,$idcardapio);
 	if($status['flagativo']){
 		$_SESSION["Warning"] = "Cardápio não pode ser alterado pois o mesmo está publicado.";
		header("Location: ../view/cardapios.php");
 	}else{
	 	if(alteraCardapio($conexao, $idcardapio, $nomeprato, $diasemana, $idusuario, $flagativo, $idempresa,$ingredientes)) {
			$_SESSION["Success"] = "Cardápio alterado com Sucesso!.";
			header("Location: ../view/cardapios.php");
		} else {
			$erro = mysqli_error($conexao);
			$_SESSION["Danger"] = "Cardápio não foi alterado. erro:".$erro;
			header("Location: ../view/cardapios.php");
		}
 	}
}

die();
?>
