<!DOCTYPE html>
<?php
  error_reporting(E_ALL ^ E_NOTICE);
  require_once("mostra_alerta.php");
?>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MarmitApp</title>

    <!-- Bootstrap Core CSS -->
    <link href="/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Meus script -->
    <script src="/js/marmita.js"></script>

    <!-- Jquery script -->
    <script src="/js/jquery.js"></script>
    <script src="/js/jquery.maskedinput.js"></script>

        <!-- jQuery -->
    <script src="/bower_components/jquery/dist/jquery.min.js"></script>

     <!-- /#wrapper -->
    <script src="/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>

    <script src="/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/dist/js/sb-admin-2.js"></script>

</head>
<body>

    <?php
        //include($_SERVER['DOCUMENT_ROOT']."/conexao.php");
        //$conexao = new Conexao(DB_SERVER, DB_NAME, DB_USERNAME, DB_PASSWORD);
        include($_SERVER['DOCUMENT_ROOT']."/menu.php");
    ?>
