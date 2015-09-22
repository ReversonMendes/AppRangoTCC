<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MarmitApp</title>

    <!-- Bootstrap Core CSS -->
    <link href="../../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/mostra_alerta.php");
?>
<body>
  <div class="container">
      <div class="row">
          <div class="col-md-4 col-md-offset-4">
              <div class="login-panel panel panel-default">
                  <div class="panel-heading">
                      <h3 class="panel-title">Criar conta em MarmitApp</h3>
                  </div>
                  <div class="panel-body">
                    <?php mostraAlerta("danger"); ?>
                    <?php mostraAlerta("success"); ?>
                      <form role="form" action="/pagina/conta/valida_conta.php" method="post">
                        <div class="form-group">
                           <label>Nome completo</label>
                           <input class="form-control" type="text" name="nome" required>
                        </div>
                        <div class="form-group">
                           <label>Email</label>
                           <input class="form-control" type="email" name="email" required placeholder="Informe um endereço de Email válido">
                        </div>
                        <div class="form-group">
                           <label>Usuário</label>
                           <input class="form-control" type="text" name="usuario"required >
                        </div>
                        <div class="form-group">
                           <label>Senha</label>
                           <input class="form-control" type="password" name="senha" required>
                        </div>
                        <div class="form-group">
                           <label>Confirmar senha</label>
                           <input class="form-control" type="password" name="confirmasenha" required>
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-lg btn-success btn-block">Gravar</button>
                        </div>
                      </form>
                      <div>
                          <label>
                            <strong>Já possui uma conta? </strong>  <a href="/./../index.php"> Acesse sua conta </a>
                          </label>
                      </div>
                  </div>
             </div>
          </div>
        </div>
    </div>
<?php include($_SERVER['DOCUMENT_ROOT']."/rodape.php") ?>
