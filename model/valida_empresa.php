<?php
require_once("funcoes_empresa.php");
include($_SERVER['DOCUMENT_ROOT']."/funcoes_login.php");
$usuario = buscaIdUsuario($conexao,usuarioLogado());

// $nomeprato = $_POST['nomeprato'];
// $diasemana = $_POST['diasemana'];
// $idusuario = $usuario['idusuario'];
// $flaginativo = "false";
// $idempresa = $usuario['idempresa'];

foreach($_POST as $field => $value) {
    echo " Campo: ".$field." Valor: ".$value;
}

?>
