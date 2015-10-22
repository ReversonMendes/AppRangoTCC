<?php
    require_once("cabecalho.php");
?>
  <div class="container">
      <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <?php mostraAlerta("Danger"); ?>
            <?php mostraAlerta("Success"); ?>
              <div class="login-panel panel panel-default">
                  <div class="panel-heading">
                      <h3 class="panel-title">Criar conta em MarmitApp</h3>
                  </div>
                  <div class="panel-body">
                      <form id="form" role="form" action="../model/valida_conta.php" method="post" name="conta">
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
                            <strong>Já possui uma conta? </strong>  <a href="login.php"> Acesse sua conta </a>
                          </label>
                      </div>
                  </div>
             </div>
          </div>
        </div>
    </div>
<?php require_once("rodape.php") ?>

<!-- <script type="text/javascript">
//     $(document).ready(function valida(){
//         $('#form').validate({
      
//             rules:{
//                 senha: {
//                     required: true
//                 },
//                 confirmasenha:{
//                     required: true,
//                     equalTo: "#senha"
//                 },
        
//       },
        
//             messages:{

//                 senha: {
//                     required: "O campo senha é obrigatório."
//                 },
//                 confirmasenha:{
//                     required: "O campo confirmação de senha é obrigatório.",
//                     equalTo: "O campo confirmação de senha deve ser idêntico ao campo senha."
//                 },
        
//       },
 
//         });
//     });
// </script>
-->