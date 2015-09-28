<?php
function listaCardapios($conexao) {
	$cardapios = array();
	$resultado = mysqli_query($conexao, "select * from cardapios");
	while($cardapio = mysqli_fetch_assoc($resultado)) {
		array_push($cardapios, $cardapio);
	}
	return $cardapios;
}

function insereCardapio($conexao, $nomeprato, $diasemana, $idusuario, $flaginativo, $idempresa) {
	$query = "insert into cardapio (nomeprato, diasemana, dtalteracao, idusuario,flaginativo, idempresa) values ('{$nomeprato}', '{$diasemana}', NOW(),{$idusuario},{$flaginativo},{$idempresa})";
	return mysqli_query($conexao, $query);
}

// function alteraUsuario($conexao, $id,  $nome, $usuario, $senha, $datanascimento, $email, $ativado) {
// 	$query = "update usuario set nome = '{$nome}', email = '{$email}', dtnascimento = {$datanascimento}, usuario= '{$usuario}', senha = '{$senha}', flaginativo = {$ativado} where idusuario = '{$id}'";
// 	return mysqli_query($conexao, $query);
// }


// function buscaUsuarios($conexao, $id) {
// 	$query = "select * from usuario where idusuario = {$id}";
// 	$resultado = mysqli_query($conexao, $query) or die(mysql_error());
// 	return mysqli_fetch_assoc($resultado);
// }

// function validaUsuario($conexao, $nome, $email) {
// 	$query = "select * from usuario where nome = '{$nome}' or email = '{$email}'";
// 	$resultado = mysqli_query($conexao, $query);
// 	return mysqli_fetch_assoc($resultado);
// }

// function removeUsuario($conexao, $id) {
// 	$query = "delete from usuarios where idusuario = {$id}";
// 	return mysqli_query($conexao, $query);
// }
