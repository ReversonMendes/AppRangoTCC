<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/controller/conecta.php");
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

	
	$cardapios = array();
	$resultado = mysqli_query($conexao, "select c.idempresa, c.idcardapio,nomeprato, razaosocial, fone, e.logo from cardapios as c, cardapio_ingredientes as ci, empresa as e where c.idcardapio = ci.idcardapio and c.idempresa = e.idempresa and c.flagativo = true and c.flagexcluido = false group by c.idcardapio");
	while($cardapio = mysqli_fetch_assoc($resultado)) {
		array_push($cardapios, $cardapio);
	}

	echo json_encode($cardapios);

?>