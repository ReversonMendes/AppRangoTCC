<?php
	$id   = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
	require_once($_SERVER['DOCUMENT_ROOT']."/controller/conecta.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_login.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_entregas.php");
?>


<form role="form" action="../model/valida_entregas.php" method="post">
    <?php
      $idempresa = buscaIdUsuario($conexao, usuarioLogado());;
      $EntregadorAlt = buscaEntregadores($conexao, $id,$idempresa['idempresa']);
    ?>
     <div class="form-group">
      <input type="hidden" name="identregador" value="<?=$EntregadorAlt['identregador']?>">
    </div>
    <div class="form-group">
     <label>Nome Entregador</label>
     <input class="form-control" type="text" name="nome" value="<?=$EntregadorAlt['nomeentregador']?>">
    </div>
    <div class="form-group">
     <label>CPF</label>
     <input class="form-control" type="text" id="cpf" name="cpf" value="<?=$EntregadorAlt['cpf']?>">
    </div>
    <div class="form-group">
     <label>Telefone</label>
     <input class="form-control" type="text" id="telefone" name="telefone" value="<?=$EntregadorAlt['fone']?>">
    </div>
    <div class="form-group">
     <label>Veículo</label>
     <input class="form-control" type="text" id="veiculo" name="veiculo" value="<?=$EntregadorAlt['veiculo']?>">
    </div>
    <div class="form-group" align="center">
     <button  type="submit"  class="btn btn-info">Gravar</button>
    </div>
</form>
 <script>
    // $(document).ready(function(){
    //   $("#telefone").mask("(999)9999-9999");
    //   $("#cpf").mask("99.999.999/9999-99");
    // });
</script>