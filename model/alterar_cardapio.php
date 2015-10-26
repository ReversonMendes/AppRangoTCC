<?php
	$id   = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
	require_once($_SERVER['DOCUMENT_ROOT']."/controller/conecta.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_login.php");

	require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_cardapios.php");
?>
 
<form role="form" action="../model/valida_cardapios.php" method="post">
    <?php
       $idempresa = buscaIdUsuario($conexao, usuarioLogado());;
       $cardapioAlt = buscaCardapios($conexao, $id,$idempresa['idempresa']);
       $ingredientesAlt = buscaIngredientes($conexao, $id,$idempresa['idempresa']);
       $ativo = $cardapioAlt['flagativo' ] ? "checked = 'checked'" : "";
    ?>
  <div class="form-group">
      <input type="hidden" name="idcardapio" value="<?=$cardapioAlt['idcardapio']?>">
   </div>
   <div class="form-group">
     <label>Nome do prato</label>
     <input class="form-control" type="text" name="nomeprato" value="<?=$cardapioAlt['nomeprato']?>" required>
   </div>
   <div class="form-group">
      <label>Dia da Semana</label>
      <select class="form-control" name="diasemana">
          <option value="segunda" <?=$cardapioAlt['diasemana'] == 'segunda' ? 'selected' : ''?>>Segunda-feira</option>
          <option value="terca"   <?=$cardapioAlt['diasemana'] == 'terca'   ? 'selected' : ''?>>Terça-feira</option>
          <option value="quarta"  <?=$cardapioAlt['diasemana'] == 'quarta'  ? 'selected' : ''?>>Quarta-feira</option>
          <option value="quinta"  <?=$cardapioAlt['diasemana'] == 'quinta'  ? 'selected' : ''?>>Quinta-feira</option>
          <option value="sexta"   <?=$cardapioAlt['diasemana'] == 'sexta'   ? 'selected' : ''?>>Sexta-feira</option>
          <option value="sabado"  <?=$cardapioAlt['diasemana'] == 'sabado'  ? 'selected' : ''?>>Sábado</option>
          <option value="domingo" <?=$cardapioAlt['diasemana'] == 'domingo' ? 'selected' : ''?>>Domingo</option>
      </select>
  </div>
  <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id='tabela_ingredientealt'>
          <thead>
              <tr>
                  <th>Ingredientes</th>
                  <th>&nbsp;</th>
              </tr>
          </thead>
          <tbody>
          <?php foreach ($ingredientesAlt as $key =>$ingrediente) { ?>
            <tr>
              <td>
                  <input class='form-control' type='text' name="ingrediente[<?=$key?>]" value="<?=$ingrediente['nomeingrediente']?>" />
              </td>
              <td align="center">
                  <a class='btn btn-danger' id='excluir' value='excluir' onclick='deleta_ingredientealt(<?=$key + 1?>)'><i class='fa fa-minus'></i></a>
              </td>
            </tr>
            <?php }?>
          </tbody>
      </table>
      <a class="btn btn-success" id='incluir' value='incluir' onclick='adiciona_ingredientealt()'>
              <i class="fa fa-plus"></i>
      </a>
  </div>
  <div class="form-group" align="center">
    <button  type="submit"  class="btn btn-info">Gravar</button>
  </div>
</form>
