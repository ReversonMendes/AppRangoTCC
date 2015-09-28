<?php

function insereEmpresa($conexao, $razao, $fantasia, $cnpj, $endereco, $numero, $cep, $telefone,$email,$idusuario) {
	$query = "insert into empresa (razaosocial, nomefantasia, endereco, cnpj, cep, fone, numero,email) values 
			 ('{$razao}', '{$fantasia}', '{$endereco}', {$cnpj}, '{$cep}','{$telefone}','{$numero}','{$email}')";
	$resultado = mysqli_query($conexao, $query);

	if($resultado){
		//pega id da empresa gerado pelo insert
	   $idEmpresa = mysql_insert_id();	
	   //inclui na coluna idempresa da tabela USUARIO no linha do usuário
	   return $idEmpresa;
	  // if (alteraUsuario($conexao,$idusuario,$idEmpresa)){
	  // 	return true;
	  // }else{
	  // 	return false;
	  // }
	}
}
	

function alteraEmpresa($conexao, $id, $empresa) {
	$query = "update empresa set idempresa = '{$empresa}' where idempresa = '{$id}'";
	return mysqli_query($conexao, $query);
}

function buscaEmpresa($conexao, $id) {
	$query = "select * from usuario where idusuario = {$id}";
	$resultado = mysqli_query($conexao, $query) or die(mysql_error());
	return mysqli_fetch_assoc($resultado);
}

function alteraUsuario($conexao, $idusuario, $empresa) {
	$query = "update usuario set idempresa = '{$empresa}' where idusuario = '{$idusuario}'";
	return mysqli_query($conexao, $query);
}

?>
