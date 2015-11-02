<?php

function insereEmpresa($conexao, $razao, $fantasia, $cnpj, $endereco, $numero, $cep, $telefone,$email,$idusuario) {
	$query = "insert into empresa (razaosocial, nomefantasia, endereco, cnpj, cep, fone, numero,email) values 
			 ('{$razao}', '{$fantasia}', '{$endereco}', '{$cnpj}', '{$cep}','{$telefone}','{$numero}','{$email}')";
	$resultado = mysqli_query($conexao, $query);

	if($resultado){
		//pega id da empresa gerado pelo insert
	   $idEmpresa = mysqli_insert_id($conexao);	
	  if(relacionaUsuario($conexao,$idusuario,$idEmpresa)){
	  	return true;
	  }else{
	  	return false;
	  }
	}else{
	  	return false;
	  }
}
	
function alteraEmpresa($conexao, $razao, $fantasia, $cnpj, $endereco, $numero, $cep, $telefone,$email, $idempresa) {
	$query = "update empresa set razaosocial = '{$razao}', nomefantasia = '{$fantasia}', cnpj = '{$cnpj}', endereco = '{$endereco}', 
	          numero='{$numero}', cep = '{$cep}', fone = '{$telefone}',email = '{$email}' where idempresa = '{$idempresa}'";
	return mysqli_query($conexao, $query);
}

function alteraLogo($conexao, $id, $logo) {
	$query = "update empresa set logo='{$logo}' where idempresa = '{$id}'";
	return mysqli_query($conexao, $query);
}

function buscaEmpresa($conexao, $idempresa) {
	$query = "select * from empresa where idempresa = {$idempresa}";
	$resultado = mysqli_query($conexao, $query) or die(mysql_error());
	return mysqli_fetch_assoc($resultado);
}

function relacionaUsuario($conexao, $idusuario, $idempresa) {
	$query = "update usuario set idempresa = '{$idempresa}' where idusuario = '{$idusuario}'";
	return mysqli_query($conexao, $query);
}

?>
