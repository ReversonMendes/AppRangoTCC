<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>MarmitApp</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- jQuery -->
    <script src="../js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../js/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../js/sb-admin-2.js"></script>
</head>

<?php
    require_once("mostra_alerta.php");
?>
<body>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Dados da empresa</h4>
              </div>
              <!-- <div class="modal-body"> -->
                  <div class="col-lg-6">
                    <form role="form" action="../model/valida_empresa.php" method="post">
                        <div class="form-group">
                            <label>Nome</label>
                            <input class="form-control" type="text" name="razao">
                        </div>
                        <div class="form-group">
                            <label>Nome Fantasia</label>
                            <input class="form-control" type="text" name="fantasia">
                        </div>
                        <div class="form-group">
                            <label>CNPJ</label>
                            <input class="form-control" type="text" name="cnpj">
                        </div>
                        <div class="form-group">
                            <label>Endereço</label>
                            <input class="form-control" type="text" name="endereco">
                        </div>
                    </form>
                  </div>
                  <div class="col-lg-6">
                    <form role="form">
                        <div class="form-group">
                            <label>Número</label>
                            <input class="form-control" type="text" name="numero">
                        </div>
                        <div class="form-group">
                            <label>CEP</label>
                            <input class="form-control" type="text" name="cep">
                        </div>
                        <div class="form-group">
                            <label>Telefone</label>
                            <input class="form-control" type="text" name="telefone">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="email" name="email">
                        </div>
                    </form>
                </div>
              <!-- </div> -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Avançar</button>
              </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<?php include("rodape.php") ?>
<script>
$(document).ready(function(){
    $("#myModal").modal({backdrop: false});
});
</script>