<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/controller/conecta.php");
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

	//pega o status do pedido do usuario
	$idpedido = $_GET['pedido_id'];
  
	$pedidos = array();
	$resultado = mysqli_query($conexao, "select 
											idpedido,
											nomeprato,	
											case status 
									        when 'P' Then 'Pendente'
									        when 'A' Then 'Aceito'
									        when 'F' Then 'Finalizado'
									        when 'E' Then 'Em entrega'
									        when 'R' Then 'Recusado'
										end as status 
									   from pedidos,cardapios where cardapios.idcardapio = pedidos.idcardapio and idpedido in({$idpedido}) ");
	while($pedido = mysqli_fetch_assoc($resultado)) {
		array_push($pedidos, $pedido);
	}

	echo json_encode($pedidos);
?>

