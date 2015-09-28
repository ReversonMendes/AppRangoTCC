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
   <!--  <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->

    <!-- jQuery -->
    <script src="../js/jquery.min.js"></script>

    <!-- jQuery -->
    <script src="../js/jquery.alert.min.js"></script>
    
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../js/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../js/sb-admin-2.js"></script>
</head>

<style>
body {
    background-image: url('../img/background.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center;
    background-size: 100% 100%;
}
</style>

<?php
    require_once("mostra_alerta.php")
?>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Entrar em MarmitApp</h3>
                    </div>
                    <div class="panel-body">
                    <?php mostraAlerta("Danger"); ?>
                    <?php mostraAlerta("Success"); ?>
                        <form role="form" action="../model/valida_login.php" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail ou usuário" name="email" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Senha" name="senha" type="password">
                                </div>
                                <div class="form-group">
                                  <button type="submit" class="btn btn-lg btn-success btn-block">Entrar</button>
                                  <a href="#">Esqueci minha senha</a>
                                </div>
                            </fieldset>
                        </form>
                        <label>
                          <strong>Não possui uma conta? </strong>  <a href="criarconta.php"> Crie uma conta </a>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
