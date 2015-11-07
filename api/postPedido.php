<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/controller/conecta.php");
	if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }

    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers:        
            {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

        exit(0);
    }

    $postdata = file_get_contents("php://input");

	if (isset($postdata)) {

		$dataobject = json_decode($postdata);
		$nomecliente = $dataobject->dados->nome;
		$quantidade  = $dataobject->dados->quantidade;
		$idcardapio  = $dataobject->dados->idcardapio;
		$observacao  = $dataobject->dados->remover;
		$status      = 'Pendente';
		$complemento = $dataobject->dados->localentrega->complemento;
		$bairro      = $dataobject->dados->localentrega->bairro;
		$rua      = $dataobject->dados->localentrega->rua;
		$cidade      = $dataobject->dados->localentrega->cidade;
		$numero      = $dataobject->dados->localentrega->numero;
		$idformapagamento = $dataobject->dados->pagamento->idformapagamento;
		$idempresa = $dataobject->dados->idempresa;

		$resultado = mysqli_query($conexao, 	"insert into 
												pedidos(nomecliente,
													     datapedido,
													     quantidade,
													     idcardapio,
													     observacao,
													     status,
													     complemento,
													     bairro,
													     rua,
													     cidade,
													     numero,
													     dtalteracao,
													     idformapagamento,
													     idempresa)
												values('{$nomecliente}',
													     NOW(),
													     {$quantidade},
													     {$idcardapio},
													     '{$observacao}',
													     '{$status}',
													     '{$complemento}',
													     '{$bairro}',
													     '{$rua}',
													     '{$cidade}',
													     {$numero},
													     NOW(),
													     {$idformapagamento},
													     {$idempresa})");
		if($resultado){
			$idpedido = mysqli_insert_id($conexao);
			echo mysql_real_escape_string($idpedido);
		}else{
			echo mysql_real_escape_string(0);
		}
		
	}
	else {
		echo "Não foi recebido nenhum parâmentro!";
	}

?>