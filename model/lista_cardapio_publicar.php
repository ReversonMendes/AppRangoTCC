<?php
//Irá abri o model para publicar o cárdapio da empresa
	require_once($_SERVER['DOCUMENT_ROOT']."/controller/conecta.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_login.php");

	require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_cardapios.php");
?>
 
<table class="table table-striped table-bordered table-hover" id="tabela_cardapio" width="100%" cellspacing="0">
   <thead>
      <tr>
         <th hidden="hidden">#</th>
         <th>Nome Prato</th>
         <th>Dia Semana</th>
         <th>Status</th>
         <th>Publicar</th>
      </tr>
   </thead>
   <?php
      $usuario  = buscaIdUsuario($conexao, usuarioLogado());
      $cardapios = buscaAllCardapios($conexao,$usuario["idempresa"]);
      if(count($cardapios) <= 0){
      	echo" <tbody>
	        <tr>
	          <p>Nenhum cárdapio cadastrado.Acesse o Menu Cardápio para adicionar um cárdapio.</p>
	        <tr>
	      </tbody>";
	   }else{ 
	   		foreach ($cardapios as $cardapio) { ?>
	   <tbody>
	      <tr>
	         <td hidden="hidden"><?= $cardapio['idcardapio'] ?></td>
	         <td><?= $cardapio['nomeprato'] ?></td>
	         <td><?= $cardapio['diasemana'] ?></td>
	         <td><?php if($cardapio['flagativo']){ ?>
	               Publicado
	            <?php
	               } else {
	            ?>
	               Não Publicado
	            <?php
	              }
	             ?>
	         </td>
	         <td align="center">
	         <!-- Se não foi mostra botão para publicar -->
	         <?php if($cardapio['flagativo']) { ?>
	         	<form action="../model/publicar_cardapio.php?acao=0" method="post">
	                <input type="hidden" name="idcardapio" value="<?= $cardapio['idcardapio'] ?>">
	                  <button type="submit" class="btn btn-success btn-sm" id="excluir">
	                      <i class="fa fa-check"></i>
	                   </button>
	            </form>
	         <?php } else { ?>
	         <!-- Senão mostra para despublicar -->
	              <form action="../model/publicar_cardapio.php?acao=1" method="post">
	                <input type="hidden" name="idcardapio" value="<?= $cardapio['idcardapio'] ?>">
	                  <button type="submit" class="btn btn-danger btn-sm" id="excluir">
	                      <i class="fa fa-minus"></i>
	                   </button>
	              </form>
	         <?php } ?>
	         </td>
	      </tr>
	   </tbody>
      <?php } }  ?>
</table>
