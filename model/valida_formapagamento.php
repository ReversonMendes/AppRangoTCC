<?php
require_once($_SERVER['DOCUMENT_ROOT']."/controller/conecta.php");
require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_login.php");

require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_formapagamento.php");

$usuario = buscaIdUsuario($conexao,usuarioLogado());

// $idformapagamento = isset($_POST['idformapagamento']) ? $_POST['idformapagamento'] : 0;
$descrpagamento = isset($_POST['descrpagamento']) ? $_POST['descrpagamento'] : '';
$idusuario = $usuario['idusuario'];
$idempresa = $usuario['idempresa'];

verificaUsuario();

// foreach($_POST as $key => $value) {
//   echo "POST parameter '$key' has '$value'";
//  }


if(insereformapagamento($conexao, $descrpagamento, $idusuario,$idempresa)) {
	$_SESSION["Success"] = "Forma pagamento gravado com Sucesso!.";
	header("Location: ../view/precos.php");
} else {
	$erro = mysqli_error($conexao);
	$_SESSION["Danger"] = "Forma pagamento não foi gravado. erro:".$erro;
	header("Location: ../view/precos.php");
}


die();
?>
