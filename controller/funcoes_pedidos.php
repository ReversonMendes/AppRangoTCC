<?php

function listaPedidos($conexao, $idempresa) {
	$pedidos = array();
	$resultado = mysqli_query($conexao, "select 
											idpedido,
											nomecliente,
											nomeprato,
											quantidade,
											observacao,
											cidade,
											bairro,
											rua,
											pedidos.numero,
											complemento,
											descrpagamento,
											status 
										from pedidos,cardapios,forma_pagamento,empresa 
										where pedidos.idempresa = empresa.idempresa  and 
											  pedidos.idcardapio = cardapios.idcardapio and 
											  pedidos.idformapagamento = forma_pagamento.idformapagamento and 
											  pedidos.idempresa = '{$idempresa}' and date(datapedido) = date(NOW())
											  Order by idpedido");
	while($pedido = mysqli_fetch_assoc($resultado)) {
		array_push($pedidos, $pedido);
	}
	return $pedidos;
}

function buscaPedido($conexao, $id,$idempresa) {
	$query = "select 
				idpedido,
				nomecliente,
				nomeprato,
				quantidade,
				observacao,
				cidade,
				bairro,
				rua,
				pedidos.numero,
				complemento,
				descrpagamento,
				status 
			from pedidos,cardapios,forma_pagamento,empresa 
			where pedidos.idempresa = empresa.idempresa  and 
				  pedidos.idcardapio = cardapios.idcardapio and 
				  pedidos.idformapagamento = forma_pagamento.idformapagamento and 
				  pedidos.idempresa = '{$idempresa}' and idpedido = {$id}";
	$resultado = mysqli_query($conexao, $query) or die(mysql_error());
	return mysqli_fetch_assoc($resultado);
}

function alteraPedido($conexao, $idpedido, $status,$idusuario, $idempresa) {
	//atualiza status do pedido
	$query = "update pedidos set status = '{$status}', idusuario = {$idusuario}, dtalteracao = NOW() where idpedido = {$idpedido} and idempresa = {$idempresa}";
	return mysqli_query($conexao, $query);
}

function buscaPedidosPendente($conexao, $idempresa) {
	$query = "select count(*) as total from pedidos where idempresa = '{$idempresa}' and status = 'P' and date(datapedido) = date(NOW())";
	$resultado = mysqli_query($conexao, $query) or die(mysql_error());
	return mysqli_fetch_assoc($resultado);
}

function buscaPedidosEntrega($conexao, $idempresa) {
	$query = "select count(*) as total from pedidos where idempresa = '{$idempresa}' and status = 'E' and date(datapedido) = date(NOW())";
	$resultado = mysqli_query($conexao, $query) or die(mysql_error());
	return mysqli_fetch_assoc($resultado);
}

function buscaEntregadores($conexao, $idempresa) {
	$entregadores = array();
	$query = "select * from entregadores where idempresa = '{$idempresa}' and flaginativo = 'true'";
	$resultado = mysqli_query($conexao, $query) or die(mysql_error());

	while($entregador = mysqli_fetch_assoc($resultado)) {
		array_push($entregadores, $entregador);
	}
	return $entregadores;
}

function validaEntrega($conexao, $idpedido, $idempresa) {
	$query = "select identregador from entregas where idempresa = '{$idempresa}' and idpedido = '{$idpedido}'";
	$resultado = mysqli_query($conexao, $query) or die(mysql_error());
	return mysqli_fetch_assoc($resultado);
}

function insereEntrega($conexao, $idpedido, $identregador, $idempresa) {
	$query = "insert into entregas(idpedido,identregador,idempresa) values ($idpedido,$identregador,$idempresa)";
	return mysqli_query($conexao, $query) or die(mysql_error());
}

function alteraEntrega($conexao, $idpedido, $identregador, $idempresa) {
	$query = "update entregas set identregador = '$identregador' where idempresa = '{$idempresa}' and idpedido = '{$idpedido}'";
	return  mysqli_query($conexao, $query) or die(mysql_error());
}