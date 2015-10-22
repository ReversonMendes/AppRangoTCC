<?php
//deletar cardapios
require_once($_SERVER['DOCUMENT_ROOT']."/controller/conecta.php");
require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_login.php");

require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_cardapios.php");

 $id = $_POST['id'];

if(excluirCardapios($conexao, $id)){
	$_SESSION["Success"] = "Cardápio excluído com Sucesso!.";
	header("Location: ../view/cardapios.php");
} else {
	$erro = mysqli_error($conexao);
	$_SESSION["Danger"] = "Cardápio não foi excluído. erro:".$erro;
	header("Location: ../view/cardapios.php");
}
 die();
?>