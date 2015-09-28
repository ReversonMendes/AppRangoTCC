<?php
include_once($_SERVER['DOCUMENT_ROOT']."/controller/conecta.php");
include($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_login.php");

include($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_empresa.php");

//Dados do form
$razao = $_POST['razao'];
$fantasia = $_POST['fantasia'];
$cnpj = $_POST['cnpj'];
$endereco = $_POST['endereco'];
$numero = $_POST['numero'];
$cep = $_POST['cep'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];

$gravado = false;
//busca id do usuário
$idusuario = buscaIdUsuario($conexao,usuarioLogado());

// foreach($_POST as $field => $value) {
//     echo " Campo: ".$field." Valor: ".$value;
// }
//$result = insereEmpresa($conexao, $razao, $fantasia, $cnpj, $endereco, $numero, $cep, $telefone,$email,$idusuario);
$query = "insert into empresa (razaosocial, nomefantasia, endereco, cnpj, cep, fone, numero,email) values 
			 ('{$razao}', '{$fantasia}', '{$endereco}', {$cnpj}, '{$cep}','{$telefone}','{$numero}','{$email}')";
$resultado = mysqli_query($conexao, $query);
echo(mysql_insert_id());
	// if($resultado){
	// 	//pega id da empresa gerado pelo insert
	//    $idEmpresa = mysql_insert_id();	
	//    //inclui na coluna idempresa da tabela USUARIO no linha do usuário
	//    echo(mysql_insert_id());
	//   // if (alteraUsuario($conexao,$idusuario,$idEmpresa)){
	//   // 	return true;
	//   // }else{
	//   // 	return false;
	//   // }
	// }

// if( insereEmpresa($conexao, $razao, $fantasia, $cnpj, $endereco, $numero, $cep, $telefone,$email,$idusuario)) {
// 	$_SESSION["Success"] = "Dados da sua empresa gravado com sucesso!";
// 		header("Location: ../view/painel.php");
// }else {
// 	$erro = mysqli_error($conexao);
// 	$_SESSION["Danger"] = "Houve um erro ao gravar os dados da sua empresa. erro:".$erro;
// 	header("Location: ../view/empresa.php");
// };

die();
?>
