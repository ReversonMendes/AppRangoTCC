<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/controller/conecta.php");
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

	//pega a empresa que o usuário quer
	$idempresa = $_GET['empresa_id'];
  
	$precos = array();
	$resultado = mysqli_query($conexao, "select idpreco,tamanho, replace( valor, '.', ',' ) as valor from precos where idempresa = {$idempresa}");
	while($preco = mysqli_fetch_assoc($resultado)) {
		array_push($precos, $preco);
	}

	echo json_encode($precos);

?>