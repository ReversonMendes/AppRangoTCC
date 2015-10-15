<?php
    require_once("cabecalho.php");
?>

<!--<style>
body {
    background-image: url('../img/background.png');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center;
    background-size: 100% 100%;
} -->
</style>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Informe os dados da sua empresa</h4>
                   <?php mostraAlerta("Success"); ?>
                   <?php mostraAlerta("Danger"); ?>
              </div>
              <!-- <div class="modal-body"> -->
                <form role="form" action="../model/valida_empresa.php" method="post">
                    <div class="col-lg-6">
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
                            <input class="form-control" type="text" id="cnpj" name="cnpj">
                        </div>
                        <div class="form-group">
                            <label>Endereço</label>
                            <input class="form-control" type="text" name="endereco">
                        </div>
                    
                  </div>
                  <div class="col-lg-6">
                        <div class="form-group">
                            <label>Número</label>
                            <input class="form-control" type="text" name="numero">
                        </div>
                        <div class="form-group">
                            <label>CEP</label>
                            <input class="form-control" type="text" id="cep" name="cep">
                        </div>
                        <div class="form-group">
                            <label>Telefone</label>
                            <input class="form-control" type="tel" id="telefone" name="telefone">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="email" name="email"  placeholder="Informe um endereço de Email válido">
                        </div>
                    </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Avançar</button>
                      </div>
              </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<?php require_once("rodape.php") ?>
<script>
//Desabilita fechar o modal no fundo
    $(document).ready(function(){
        $("#myModal").modal({backdrop: false});
    });
</script>