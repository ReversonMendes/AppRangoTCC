<?php

function listaCardapios($conexao, $idempresa) {
	$cardapios = array();
	$resultado = mysqli_query($conexao, "select * from cardapios where idempresa = '{$idempresa}'");
	while($cardapio = mysqli_fetch_assoc($resultado)) {
		array_push($cardapios, $cardapio);
	}
	return $cardapios;
}

function insereCardapio($conexao, $nomeprato, $diasemana, $idusuario, $flagativo, $idempresa,$ingredientes) {
	$query = "insert into cardapios (nomeprato, diasemana, dtalteracao, idusuario,flagativo, idempresa) values ('{$nomeprato}', '{$diasemana}', NOW(),{$idusuario},{$flagativo},{$idempresa})";
	//Grava cardapio
	if(mysqli_query($conexao, $query)){
		// //retorna o id
		// return $idCardapio;
		$idcardapio = mysqli_insert_id($conexao);
		//Grava ingredientes
		if(count($ingredientes) > 0 ){
			return insereIngredientes($conexao, $idcardapio, $ingredientes, $idempresa);
		}else{
			return true;
		}

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


function alteraCardapio($conexao, $idcardapio, $nomeprato, $diasemana, $idusuario, $flagativo, $idempresa,$ingredientes) {
	//atualiza dados do cardapio
	$query = "update cardapios set nomeprato = '{$nomeprato}', diasemana = '{$diasemana}', dtalteracao = NOW(), flagativo = {$flagativo} where idcardapio = {$idcardapio} and idusuario = {$idusuario} and idempresa = {$idempresa}";
	
	if(mysqli_query($conexao, $query)){
		//elimina os ingredientes
		if(excluirIngredientes($conexao, $idcardapio,$idempresa )){
			//insere novamente
			return 
			insereIngredientes($conexao, $idcardapio, $ingredientes, $idempresa);
		}else{
			return false;
		}
	}else{
		return false;	
	}
}


function buscaCardapios($conexao, $id,$idempresa) {
	$query = "select * from cardapios WHERE idcardapio = {$id} and idempresa = {$idempresa}";
	$resultado = mysqli_query($conexao, $query) or die(mysql_error());
	return mysqli_fetch_assoc($resultado);
}

function buscaAllCardapios($conexao, $idempresa) {
	$cardapios = array();
	$resultado = mysqli_query($conexao, "select * from cardapios where idempresa = '{$idempresa}'");
	while($cardapio = mysqli_fetch_assoc($resultado)) {
		array_push($cardapios, $cardapio);
	}
	return $cardapios;
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

function excluirIngredientes($conexao, $idcardapio,$idempresa ) {
	$query = "delete from cardapio_ingredientes where idcardapio = {$idcardapio} and idempresa = {$idempresa}";
	return mysqli_query($conexao, $query);
}

function validaPublicacao($conexao,$idempresa){
	$query = "select count(*)  as total from cardapios where flagativo = true and idempresa = {$idempresa}";
	$resultado = mysqli_query($conexao, $query) or die(mysql_error());
	return mysqli_fetch_assoc($resultado);
}

function verificaStatus($conexao,$idempresa,$idcardapio){
	$query = "select flagativo from cardapios where idcardapio = {$idcardapio} and idempresa = {$idempresa}";
	$resultado = mysqli_query($conexao, $query) or die(mysql_error());
	return mysqli_fetch_assoc($resultado);
}

function publicarCardapio($conexao,$idcardapio, $idempresa){
	$query = "update cardapios set flagativo = true where idcardapio = {$idcardapio} and idempresa = {$idempresa}";
	return mysqli_query($conexao, $query);
}

function desPublicarCardapio($conexao,$idcardapio, $idempresa){
	$query = "update cardapios set flagativo = false where idcardapio = {$idcardapio} and idempresa = {$idempresa}";
	return mysqli_query($conexao, $query);
}