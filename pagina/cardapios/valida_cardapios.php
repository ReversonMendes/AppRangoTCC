<?php
require_once("funcoes_cardapios.php");
include($_SERVER['DOCUMENT_ROOT']."/funcoes_login.php");
$usuario = buscaIdUsuario($conexao,usuarioLogado());

$nomeprato = $_POST['nomeprato'];
$diasemana = $_POST['diasemana'];
$idusuario = $usuario['idusuario'];
$flaginativo = "false";
$idempresa = $usuario['idempresa'];

foreach($_POST as $field => $value) {
    echo " Campo: ".$field." Valor: ".$value;
}
// verificaUsuario();
//
// if(insereCardapio($conexao, $nomeprato, $diasemana, $idusuario, $flaginativo, $idempresa)) {
// 	$_SESSION["success"] = "Cardápio gravado com Sucesso!.";
// 	header("Location: cad_cardapios.php");
// } else {
// 	$erro = mysqli_error($conexao);
// 	$_SESSION["danger"] = "Cardápio não foi gravado. erro:".$erro;
// 	header("Location: cad_cardapios.php");
// }

?>
