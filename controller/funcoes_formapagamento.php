<?php

function listaFormaPagamento($conexao,$idempresa) {
	$formas = array();
	$resultado = mysqli_query($conexao, "select * from forma_pagamento where idempresa = {$idempresa}");
	while($forma = mysqli_fetch_assoc($resultado)) {
		array_push($formas, $forma);
	}
	return $formas;
}

function insereFormaPagamento($conexao, $descrpagamento, $idusuario,$idempresa) {
	$query = "insert into forma_pagamento (descrpagamento, dtalteracao, idusuario, idempresa) values ('{$descrpagamento}', NOW(), $idusuario,$idempresa)";
	//Grava preco
	return mysqli_query($conexao, $query);
}


function excluirFormaPagamento($conexao, $id,$idusuario,$idempresa) {	
	$query = "delete from forma_pagamento where idformapagamento = {$id} and idusuario = {$idusuario} and idempresa = {$idempresa}";
	return mysqli_query($conexao, $query);
}

