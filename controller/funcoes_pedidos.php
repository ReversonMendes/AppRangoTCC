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
											  pedidos.idempresa = '{$idempresa}'
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

