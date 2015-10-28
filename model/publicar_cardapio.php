<?php
require_once($_SERVER['DOCUMENT_ROOT']."/controller/conecta.php");
require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_cardapios.php");
require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_login.php");

$usuario = buscaIdUsuario($conexao,usuarioLogado());
$idcardapio = isset($_POST['idcardapio']) ? $_POST['idcardapio'] : 0;
$acao = $_GET['acao'];

if($acao > 0){
	if(publicarCardapio($conexao,$idcardapio,$usuario['idempresa'])) {
		$_SESSION["Success"] = "Cardápio publicado com Sucesso!. Acesse o aplicativo pelo dispositivo móvel para visualizar o cardápio.";
		header("Location: ../view/painel.php");
	} else {
		$erro = mysqli_error($conexao);
		$_SESSION["Danger"] = "Cardápio não foi publicado. erro:".$erro;
		header("Location: ../view/painel.php");
	}
}else{
	if(desPublicarCardapio($conexao,$idcardapio,$usuario['idempresa'])) {
		$_SESSION["Success"] = "O Cardápio não está mais publicado!";
		header("Location: ../view/painel.php");
	} else {
		$erro = mysqli_error($conexao);
		$_SESSION["Danger"] = "Não foi despublicar o Cardápio. erro:".$erro;
		header("Location: ../view/painel.php");
	}
}


