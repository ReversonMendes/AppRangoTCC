<?php
require_once($_SERVER['DOCUMENT_ROOT']."/controller/conecta.php");
require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_login.php");

require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_pedidos.php");

$usuario = buscaIdUsuario($conexao,usuarioLogado());

$idpedido = isset($_POST['idpedido']) ? $_POST['idpedido'] : 0;
$identregador = isset($_POST['entregador_id']) ? $_POST['entregador_id'] : 0;
$status = isset($_POST['status']) ? $_POST['status'] : '';

verificaUsuario();


foreach($_POST as $key => $value) {
  echo "POST parameter '$key' has '$value'";
 }

if($idpedido > 0){ 
   if(alteraPedido($conexao, $idpedido, $status,$usuario['idusuario'],$usuario['idempresa'])) {
   		if($identregador > 0 and $status == 'E'){
   			//valida se ja existe o pedido na entrega
   			// da insert ou update conforme o retorno
   			if(validaEntrega($conexao,$idpedido,$usuario['idempresa']) <= 0){
   				insereEntrega($conexao,$idpedido,$identregador,$usuario['idempresa']);
   			}else{
   				alteraEntrega($conexao,$idpedido,$identregador,$usuario['idempresa']);
   			}
   		}
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
