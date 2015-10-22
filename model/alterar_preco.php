<?php
	$id   = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
	require_once($_SERVER['DOCUMENT_ROOT']."/controller/conecta.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_login.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_precos.php");
?>

<form role="form" action="../model/valida_precos.php" method="post">
    <?php
      $idempresa = buscaIdUsuario($conexao, usuarioLogado());;
      $precoAlt = buscaPrecos($conexao, $id,$idempresa['idempresa']);
    ?>
     <div class="form-group">
      <input type="hidden" name="idpreco" value="<?=$precoAlt['idpreco']?>">
    </div>
    <div class="form-group">
      <label>tamanho</label>
      <select class="form-control" name="tamanho">
          <option value="P" <?=$precoAlt['tamanho'] == 'P' ? 'selected' : ''?>>P (Pequena)</option>
          <option value="M" <?=$precoAlt['tamanho'] == 'M' ? 'selected' : ''?>>M (Média)</option>
          <option value="G" <?=$precoAlt['tamanho'] == 'G' ? 'selected' : ''?>>G (Grande)</option>
          <option value="GG"<?=$precoAlt['tamanho'] == 'GG' ? 'selected' : ''?>>GG (Gigante)</option>
      </select>
    </div>
   <div class="form-group">
     <label>Gramatura</label>
     <input class="form-control" type="text" name="gramatura" value="<?=$precoAlt['gramatura']?>">
   </div>
   <div class="form-group">
     <label>Peso</label>
     <input class="form-control" type="text" id="peso" name="peso" value="<?=$precoAlt['peso']?>">
   </div>
   <div class="form-group">
     <label>Valor</label>
     <input class="form-control" type="text" id="valor" name="valor" value="<?=$precoAlt['valor']?>">
   </div>
  <div class="form-group" align="center">
    <button  type="submit"  class="btn btn-info">Gravar</button>
  </div>
</form>
<script>
$(document).ready(function(){
       $("#valor").maskMoney({prefix:'R$ ', thousands:'.', decimal:',', symbolStay: true});
       $("#peso").maskMoney({suffix:' Kg', thousands:'.', decimal:',', symbolStay: true, precision:3});
});
</script>