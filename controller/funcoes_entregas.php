<?php

function listaentregadores($conexao,$idempresa) {
	$entregadores = array();
	$resultado = mysqli_query($conexao, "select * from entregadores where idempresa = {$idempresa} and flaginativo = 'false'");
	while($entregador = mysqli_fetch_assoc($resultado)) {
		array_push($entregadores, $entregador);
	}
	return $entregadores;
}

function insereEntregador($conexao, $nome, $cpf, $fone, $veiculo,$idempresa) {
	$query = "insert into entregadores (nomeentregador, cpf, fone, veiculo, idempresa) values ('{$nome}', '{$cpf}','{$fone}', '{$veiculo}', $idempresa)";
	//Grava entregador
	return mysqli_query($conexao, $query);
}


function alteraEntregador($conexao, $identregador, $nome, $cpf, $fone, $veiculo,$idempresa) {
	$query = "update entregadores set nomeentregador = '{$nome}', fone = '{$fone}', cpf = '{$cpf}', veiculo= '{$veiculo}' where identregador = '{$identregador}' and idempresa='{$idempresa}'";
	return mysqli_query($conexao, $query);
}

function excluirEntregador($conexao, $id,$idempresa) {	
	$query = "update entregadores set flaginativo = 1 where identregador = {$id} and idempresa = {$idempresa}";
	return mysqli_query($conexao, $query);
}

function buscaEntregadores($conexao, $id, $idempresa) {
	$query = "select * from entregadores where identregador = {$id} and idempresa = {$idempresa}";
	$resultado = mysqli_query($conexao, $query) or die(mysql_error());
	return mysqli_fetch_assoc($resultado);
}
