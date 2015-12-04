<?php
session_start();

function buscaUsuario($conexao, $usuario, $email, $senha) {
	$senhaMd5 = md5($senha);
	$email = mysqli_real_escape_string($conexao, $email);
	$query = "select * from usuario where (email='{$email}' or usuario='{$usuario}') and senha='{$senhaMd5}' and flaginativo = false";
	$resultado = mysqli_query($conexao, $query);
	$usuario = mysqli_fetch_assoc($resultado);
	return $usuario;
}

function buscaIdUsuario($conexao, $email) {
	$email = mysqli_real_escape_string($conexao, $email);
	$query = "select idusuario,idempresa from usuario where email='{$email}'";
	$resultado = mysqli_query($conexao, $query);
	$usuario = mysqli_fetch_assoc($resultado);
	return $usuario;
}

function usuarioEstaLogado() {
	return isset($_SESSION["usuario_logado"]);
}

function verificaUsuario() {
  if(!usuarioEstaLogado()) {
  	$_SESSION["Danger"] = "Você não possui acesso, faça login.";
 	header("Location: login.php");
 	die();
  }
}

function usuarioLogado() {
	return $_SESSION["usuario_logado"];
}

function logaUsuario($email) {
	$_SESSION["usuario_logado"] = $email;
}

function logout() {
	session_destroy();
	session_start();
}
