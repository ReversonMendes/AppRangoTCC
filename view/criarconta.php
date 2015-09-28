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
  <div class="container">
      <div class="row">
          <div class="col-md-4 col-md-offset-4">
              <div class="login-panel panel panel-default">
                  <div class="panel-heading">
                      <h3 class="panel-title">Criar conta em MarmitApp</h3>
                  </div>
                  <div class="panel-body">
                    <?php mostraAlerta("Danger"); ?>
                    <?php mostraAlerta("Success"); ?>
                      <form role="form" action="../model/valida_conta.php" method="post" name="conta">
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
                          <button type="submit" class="btn btn-lg btn-success btn-block"  onClick="validarSenha()">Gravar</button>
                        </div>
                      </form>
                      <div>
                          <label>
                            <strong>Já possui uma conta? </strong>  <a href="login.php"> Acesse sua conta </a>
                          </label>
                      </div>
                  </div>
             </div>
          </div>
        </div>
    </div>
<?php include("rodape.php") ?>
<script>
function validarSenha(){
  senha = document.conta.senha.value
  confirmasenha = document.conta.confirmasenha.value
  if (senha == confirmasenha)
    alert("SENHAS IGUAIS")
  else
    alert("SENHAS DIFERENTES")
}
</script>
