<?php
require_once($_SERVER['DOCUMENT_ROOT']."/controller/conecta.php");
require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_login.php");

require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_formapagamento.php");

 $id = $_POST['id'];
$usuario = buscaIdUsuario($conexao,usuarioLogado());

if(excluirFormaPagamento($conexao, $id,$usuario['idusuario'],$usuario['idempresa'])){
	$_SESSION["Success"] = " excluído com Sucesso!.";
	header("Location: ../view/precos.php");
} else {
	$erro = mysqli_error($conexao);
	$_SESSION["Danger"] = "Cardápio não foi excluído. erro:".$erro;
	header("Location: ../view/precos.php");
}
 die();
?>