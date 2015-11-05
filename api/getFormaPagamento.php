<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/controller/conecta.php");
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

	//pega a empresa que o usuário quer
	$idempresa = $_GET['empresa_id'];
  
	$pagamentos = array();
	$resultado = mysqli_query($conexao, "select idformapagamento, descrpagamento from forma_pagamento where idempresa = {$idempresa}");
	while($pagamento = mysqli_fetch_assoc($resultado)) {
		array_push($pagamentos, $pagamento);
	}

	echo json_encode($pagamentos);

?>