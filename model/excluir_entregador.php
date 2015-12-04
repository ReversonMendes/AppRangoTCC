<?php
//deletar precos
require_once($_SERVER['DOCUMENT_ROOT']."/controller/conecta.php");
require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_login.php");

require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_entregas.php");

 $id = $_POST['id'];
 $usuario = buscaIdUsuario($conexao,usuarioLogado());
 
 // foreach($_POST as $key => $value) {
 //  echo "POST parameter '$key' has '$value'";
 // }

if(excluirEntregador($conexao, $id,$usuario['idempresa'])){
	$_SESSION["Success"] = "Entregador excluído com Sucesso!.";
	header("Location: ../view/entregas.php");
} else {
	$erro = mysqli_error($conexao);
	$_SESSION["Danger"] = "Entregador não foi excluído. erro:".$erro;
	header("Location: ../view/entregas.php");
}
 die();
?>