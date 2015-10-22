<?php

function listaCardapios($conexao, $idempresa) {
	$cardapios = array();
	$resultado = mysqli_query($conexao, "select * from cardapios where idempresa = '{$idempresa}'");
	while($cardapio = mysqli_fetch_assoc($resultado)) {
		array_push($cardapios, $cardapio);
	}
	return $cardapios;
}

function insereCardapio($conexao, $nomeprato, $diasemana, $idusuario, $flaginativo, $idempresa,$ingredientes) {
	$query = "insert into cardapios (nomeprato, diasemana, dtalteracao, idusuario,flaginativo, idempresa) values ('{$nomeprato}', '{$diasemana}', NOW(),{$idusuario},{$flaginativo},{$idempresa})";
	//Grava cardapio
	if(mysqli_query($conexao, $query)){
		// //retorna o id
		// return $idCardapio;
		$idcardapio = mysqli_insert_id($conexao);
		//Grava ingredientes
		return insereIngredientes($conexao, $idcardapio, $ingredientes, $idempresa);
	}else{
		//retorna erro
		return false;
	}
}

function insereIngredientes($conexao, $idcardapio, $ingredientes, $idempresa) {
	$values = '';
	//faz um insert multivalorado de todos ingredientes pra gravar uma vez só
	$query = "insert into cardapio_ingredientes (idcardapio, nomeingrediente, idempresa) values";
	foreach ($ingredientes as $nomeingrediente) {
		$values = $values.'('.$idcardapio.',"'.$nomeingrediente.'",'.$idempresa.'),';
	}
	return mysqli_query($conexao, $query.substr($values,0,strlen($values)-1));
}


function alteraCardapio($conexao, $idcardapio, $nomeprato, $diasemana, $idusuario, $flaginativo, $idempresa,$ingredientes) {
	$query = "update cardapios set nomeprato = '{$nomeprato}', diasemana = '{$diasemana}', dtalteracao = NOW(), flaginativo = {$flaginativo} where idcardapio = {$idcardapio} and idusuario = {$idusuario} and idempresa = {$idempresa}";
	return mysqli_query($conexao, $query);
}


function buscaCardapios($conexao, $id,$idempresa) {
	$query = "select * from cardapios WHERE idcardapio = {$id} and idempresa = {$idempresa}";
	$resultado = mysqli_query($conexao, $query) or die(mysql_error());
	return mysqli_fetch_assoc($resultado);
}

function buscaIngredientes($conexao, $id,$idempresa) {
	$ingredientes = array();
	$query = "select * from cardapio_ingredientes where idcardapio = {$id} and idempresa = {$idempresa}";
	$resultado = mysqli_query($conexao, $query) or die(mysql_error());
	while($ingrediente = mysqli_fetch_assoc($resultado)) {
		array_push($ingredientes, $ingrediente);
	}
	return $ingredientes;
}

function excluirCardapios($conexao, $id) {
	if(mysqli_query($conexao, "delete from cardapio_ingredientes where idcardapio = {$id}")){
		$query = "delete from cardapios where idcardapio = {$id}";
		return mysqli_query($conexao, $query);
	}else{
		return false;
	}
}

// function ExcluirIngredientes($conexao, $id) {
// 	$query = "delete from cardapio_ingredientes where idingrediente = {$id}";
// 	return mysqli_query($conexao, $query);
// }
