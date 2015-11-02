<?php

function listaPrecos($conexao,$idempresa) {
	$precos = array();
	$resultado = mysqli_query($conexao, "select * from precos where idempresa = {$idempresa}");
	while($preco = mysqli_fetch_assoc($resultado)) {
		array_push($precos, $preco);
	}
	return $precos;
}

function inserePreco($conexao, $tamanho, $gramatura,$peso, $valor, $idusuario,$idempresa) {
	$query = "insert into precos (tamanho, gramatura, peso, valor, dtalteracao, idusuario, idempresa) values ('{$tamanho}', '{$gramatura}','{$peso}', '{$valor}', NOW(), $idusuario,$idempresa)";
	//Grava preco
	return mysqli_query($conexao, $query);
}


function alteraPreco($conexao, $idpreco, $tamanho, $peso,$gramatura,$valor, $idusuario, $idempresa) {
	$query = "update precos set tamanho = '{$tamanho}', peso = {$peso}, gramatura = '{$gramatura}', valor= {$valor}, dtalteracao = NOW() where idpreco = '{$idpreco}' and idempresa='{$idempresa}'";
	return mysqli_query($conexao, $query);
}

function excluirPreco($conexao, $id,$idusuario,$idempresa) {	
	$query = "delete from precos where idpreco = {$id} and idusuario = {$idusuario} and idempresa = {$idempresa}";
	return mysqli_query($conexao, $query);
}

function buscaPrecos($conexao, $id, $idempresa) {
	$query = "select * from precos WHERE idpreco = {$id} and idempresa = {$idempresa}";
	$resultado = mysqli_query($conexao, $query) or die(mysql_error());
	return mysqli_fetch_assoc($resultado);
}
