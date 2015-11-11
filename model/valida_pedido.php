<?php
require_once($_SERVER['DOCUMENT_ROOT']."/controller/conecta.php");
require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_login.php");

require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_pedidos.php");

$usuario = buscaIdUsuario($conexao,usuarioLogado());

$idpedido = isset($_POST['idpedido']) ? $_POST['idpedido'] : 0;
$status = isset($_POST['status']) ? $_POST['status'] : '';

verificaUsuario();


// foreach($_POST as $key => $value) {
//   echo "POST parameter '$key' has '$value'";
//  }

if($idpedido > 0){ 
// 	if(insereCardapio($conexao, $nomeprato, $diasemana, $idusuario, $flagativo, $idempresa,$ingredientes)) {
// 		$_SESSION["Success"] = "Cardápio gravado com Sucesso!.";
// 		header("Location: ../view/cardapios.php");
// 	} else {
// 		$erro = mysqli_error($conexao);
// 		$_SESSION["Danger"] = "Cardápio não foi gravado. erro:".$erro;
// 		header("Location: ../view/cardapios.php");
// 	}
// }else{ 

   if(alteraPedido($conexao, $idpedido, $status,$usuario['idusuario'],$usuario['idempresa'])) {
		$_SESSION["Success"] = "Pedido alterado com Sucesso!.";
		header("Location: ../view/pedidos.php");
	} else {
		$erro = mysqli_error($conexao);
		$_SESSION["Danger"] = "Pedido não foi alterado. erro:".$erro;
		header("Location: ../view/pedidos.php");
	}
}

die();
?>
