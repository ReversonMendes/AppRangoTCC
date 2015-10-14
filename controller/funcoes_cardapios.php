<?php
function listaCardapios($conexao) {
	$cardapios = array();
	$resultado = mysqli_query($conexao, "select * from cardapios");
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


// function alteraUsuario($conexao, $id,  $nome, $usuario, $senha, $datanascimento, $email, $ativado) {
// 	$query = "update usuario set nome = '{$nome}', email = '{$email}', dtnascimento = {$datanascimento}, usuario= '{$usuario}', senha = '{$senha}', flaginativo = {$ativado} where idusuario = '{$id}'";
// 	return mysqli_query($conexao, $query);
// }


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

// function validaUsuario($conexao, $nome, $email) {
// 	$query = "select * from usuario where nome = '{$nome}' or email = '{$email}'";
// 	$resultado = mysqli_query($conexao, $query);
// 	return mysqli_fetch_assoc($resultado);
// }

// function removeUsuario($conexao, $id) {
// 	$query = "delete from usuarios where idusuario = {$id}";
// 	return mysqli_query($conexao, $query);
// }
