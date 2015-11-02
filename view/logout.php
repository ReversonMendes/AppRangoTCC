<?php require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_login.php");
logout();
$_SESSION["Success"] = "Deslogado com sucesso.";
header("Location: login.php");
die();
