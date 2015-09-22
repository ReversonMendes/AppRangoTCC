<?php require_once("funcoes_login.php");
logout();
$_SESSION["success"] = "Deslogado com sucesso.";
header("Location: login.php");
die();
