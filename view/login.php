<?php
    require_once("cabecalho.php");
?>

<style>
body {
    background-image: url('../img/background.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center;
    background-size: 100% 100%;
}
</style> 

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
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
            <!-- <div class="col-md-4 col-md-offset-4"> -->
             <!-- <h3>Site em construção entre em contato: reversondv@gmail.com</h3> -->
            <!-- </div> -->
        </div>
    </div>
</body>

</html>
