<?php
<<<<<<< HEAD
require_once($_SERVER['DOCUMENT_ROOT']."/controller/conecta.php");
require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_login.php");

require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_cardapios.php");
=======
include($_SERVER['DOCUMENT_ROOT']."/controller/conecta.php");
include($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_login.php");

include($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_cardapios.php");
>>>>>>> 886eb94294c3156be13894db054d50524369d7e2

$usuario = buscaIdUsuario($conexao,usuarioLogado());

$nomeprato = $_POST['nomeprato'];
$diasemana = $_POST['diasemana'];
$idusuario = $usuario['idusuario'];
$flaginativo = "false";
$idempresa = $usuario['idempresa'];
$ingredientes = $_POST['ingrediente'];

<<<<<<< HEAD
foreach($_POST as $field => $value) {
    echo " Campo: ".$field." Valor: ".$value;
}
// verificaUsuario();

// if(insereCardapio($conexao, $nomeprato, $diasemana, $idusuario, $flaginativo, $idempresa,$ingredientes)) {
// 	$_SESSION["Success"] = "Cardápio gravado com Sucesso!.";
// 	header("Location: ../view/cardapios.php");
// } else {
// 	$erro = mysqli_error($conexao);
// 	$_SESSION["Danger"] = "Cardápio não foi gravado. erro:".$erro;
// 	header("Location: ../view/cardapios.php");
=======
// foreach($_POST as $field => $value) {
//     echo " Campo: ".$field." Valor: ".$value;
>>>>>>> 886eb94294c3156be13894db054d50524369d7e2
// }
verificaUsuario();

if(insereCardapio($conexao, $nomeprato, $diasemana, $idusuario, $flaginativo, $idempresa,$ingredientes)) {
	$_SESSION["Success"] = "Cardápio gravado com Sucesso!.";
	header("Location: ../view/cardapios.php");
} else {
	$erro = mysqli_error($conexao);
	// $_SESSION["Danger"] = "Cardápio não foi gravado. erro:".$erro;
	// header("Location: ../view/cardapios.php");
	echo($erro);
}

die();
?>
