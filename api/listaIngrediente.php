<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/controller/conecta.php");
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

	//pega o ingrediente que o usuário quer
	$idcardapio = $_GET['cardapio_id'];
  
	$ingredientes = array();
	$resultado = mysqli_query($conexao, "select c.idempresa, c.idcardapio, ci.idingrediente,nomeingrediente from cardapios as c, cardapio_ingredientes as ci, empresa as e where ci.idcardapio = c.idcardapio and ci.idempresa = e.idempresa and c.flagativo = true and ci.idcardapio = {$idcardapio}");
	while($ingrediente = mysqli_fetch_assoc($resultado)) {
		array_push($ingredientes, $ingrediente);
	}

	echo json_encode($ingredientes);
?>