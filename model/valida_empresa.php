<?php
include_once($_SERVER['DOCUMENT_ROOT']."/controller/conecta.php");
include($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_login.php");

include($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_empresa.php");

//Dados do form
$idempresa = $_POST['idempresa'];
$razao = $_POST['razao'];
$fantasia = $_POST['fantasia'];
$cnpj = $_POST['cnpj'];
$endereco = $_POST['endereco'];
$numero = $_POST['numero'];
$cep = $_POST['cep'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];

//busca id do usuário
$idusuario = buscaIdUsuario($conexao,usuarioLogado());

// foreach($_POST as $field => $value) {
//     echo " Campo: ".$field." Valor: ".$value;
// }

//Validações Obrigatórias

//se for maior vai alterar a empresa
if($idempresa > 0) {
	//Altera a empresa
	if( alteraEmpresa($conexao, $razao, $fantasia, $cnpj, $endereco, $numero, $cep, $telefone,$email,$idempresa)) {
		$_SESSION["Success"] = "Dados da sua empresa alterado com sucesso!";
			header("Location: ../view/perfil.php");
	}else {
		$erro = mysqli_error($conexao);
		$_SESSION["Danger"] = "Houve um erro ao gravar os dados da sua empresa. erro:".$erro;
		header("Location: ../view/perfil.php");
	};
}else{
	//Insere nova empresa
	if( insereEmpresa($conexao, $razao, $fantasia, $cnpj, $endereco, $numero, $cep, $telefone,$email,$idusuario["idusuario"])) {
		$_SESSION["Success"] = "Dados da sua empresa gravado com sucesso!";
			header("Location: ../view/painel.php");
	}else {
		$erro = mysqli_error($conexao);
		$_SESSION["Danger"] = "Houve um erro ao gravar os dados da sua empresa. erro:".$erro;
		header("Location: ../view/empresa.php");
	};
};
die();
?>
