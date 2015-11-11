<?php
	$id   = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
	require_once($_SERVER['DOCUMENT_ROOT']."/controller/conecta.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_login.php");

	require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_pedidos.php");
?>


<form role="form" action="../model/valida_pedido.php" method="post">
    <?php
       $idempresa = buscaIdUsuario($conexao, usuarioLogado());;
       $pedidoAlt = buscaPedido($conexao, $id,$idempresa['idempresa']);
    ?>
	<table class="table">
		<tr>
			<input type="hidden" name="idpedido" value="<?=$pedidoAlt['idpedido']?>">
	     	<td><label>Pedido: </label> <?= $pedidoAlt['idpedido'] ?></td>
	    </tr>
	    <tr>
	     	<td><label>Nome Cliente: </label><?= $pedidoAlt['nomecliente'] ?></td>
	    </tr>
	     <tr>
	    	<td><label>Prato escolhido: </label><?= $pedidoAlt['nomeprato'] ?></td>
	     </tr>
	     <tr>
	     	<td><label>Quantidade: </label> <?= $pedidoAlt['quantidade'] ?></td>
	     </tr>
	     <tr>
	     	<td><label>Observação: </label><?= $pedidoAlt['observacao'] ?></td>
	     </tr>
	     <tr>
	     	<td><label>Local de Entrega: </label> Cidade: <?= $pedidoAlt['cidade'] ?>, Bairro: <?= $pedidoAlt['bairro'] ?>, Rua:<?= $pedidoAlt['rua'] ?>, Numero: <?= $pedidoAlt['numero'] ?>, complemento: <?= $pedidoAlt['complemento'] ?> </td>
	     </tr>
	     <tr>
	     	<td><label>Forma de Pagamento: </label> <?= $pedidoAlt['descrpagamento'] ?></td>
	     </tr>
	     <tr>
	     	<td>
		         <label>Status</label>
		      <!-- pendente aceito fazendo finalizado em entrega -->
				<select class="form-control" name="status">
					<option value="P" <?=$pedidoAlt['status'] == 'P' ? 'selected' : ''?>>Pendente</option>
					<option value="A" <?=$pedidoAlt['status'] == 'A' ? 'selected' : ''?>>Aceito</option>
					<option value="F" <?=$pedidoAlt['status'] == 'F' ? 'selected' : ''?>>Finalizado</option>
					<option value="E" <?=$pedidoAlt['status'] == 'E' ? 'selected' : ''?>>Em entrega</option>
					<option value="R" <?=$pedidoAlt['status'] == 'R' ? 'selected' : ''?>>Recusado</option>
				</select>
		  	</td>
	     </tr>
		<tr>
			<td>
				<button class="btn btn-info" type="submit">Gravar</button>
			</td>
		</tr>
	</table>
</form> 