<?php
//deletar precos
require_once($_SERVER['DOCUMENT_ROOT']."/controller/conecta.php");
require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_login.php");

require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_precos.php");

 $id = $_POST['id'];
 $usuario = buscaIdUsuario($conexao,usuarioLogado());
 
 // foreach($_POST as $key => $value) {
 //  echo "POST parameter '$key' has '$value'";
 // }

if(excluirPreco($conexao, $id,$usuario['idusuario'],$usuario['idempresa'])){
	$_SESSION["Success"] = "Preço excluído com Sucesso!.";
	header("Location: ../view/precos.php");
} else {
	$erro = mysqli_error($conexao);
	$_SESSION["Danger"] = "Preço não foi excluído. erro:".$erro;
	header("Location: ../view/precos.php");
}
 die();
?>