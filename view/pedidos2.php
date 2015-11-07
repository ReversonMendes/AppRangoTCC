<?php 
  require_once("cabecalho.php"); 
  require_once("menu.php");
  require_once($_SERVER['DOCUMENT_ROOT']."/controller/conecta.php");
  require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_pedidos.php");
  require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_login.php");
?>
<div id="page-wrapper">
    <div class="row">
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-18">
            <div class="panel panel-default">
                <div class="panel-heading">
                   Pedidos
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css">
                	<table id="example" class="display" cellspacing="0" width="100%">
                       <thead>
                          <tr>
                             <th>&nbsp;</th>
                             <th>Idpedido</th>
                             <th>Nome Cliente</th>
                             <th>Cardápio</th>
                             <th>Quantidade</th>
                             <th>Observação</th>
                             <th>Endereço</th>
                             <th>Forma de Pagamento</th>
                             <th>Status</th>
                             <th>Alterar</th>
                             <th>Excluir</th>
                          </tr>
                       </thead>

                       <?php
                          $usuario  = buscaIdUsuario($conexao, usuarioLogado());
                          $pedidos = listaPedidos($conexao,$usuario["idempresa"]);
                          if(count($pedidos) > 0)       {
                          foreach ($pedidos as $pedido) {
                          ?>
                       <tbody>
                          <tr>
                             <td><input type="checkbox" value="<?=$key?>" name="marcar[]" /></td>
                             <td><?= $pedido['idpedido'] ?></td>
                             <td><?= $pedido['nomecliente'] ?></td>
                             <td><?= $pedido['nomeprato'] ?></td>
                             <td><?= $pedido['quantidade'] ?></td>
                             <td><?= $pedido['observacao'] ?></td>
                             <td><?= $pedido['cidade'] ?>, Bairro: <?= $pedido['bairro'] ?>, Rua:<?= $pedido['rua'] ?>, <?= $pedido['numero'] ?>, <?= $pedido['complemento'] ?> </td>
                             <td><?= $pedido['descrpagamento'] ?></td>
                             <td><?= $pedido['status'] ?></td>
                             <td align="center">
                                <a class="btn btn-info btn-sm" id="btnAlterarpedido" data-toggle="modal" data-target="#modalAlterarpedido" data-whatever="<?= $pedido['idpedido'] ?>">
                                    <i class="fa fa-pencil"></i>
                                </a>
                             </td>
                             <td align="center">
                                  <form action="../model/excluir_pedidos.php" method="post">
                                    <input type="hidden" name="id" value="<?= $pedido['idpedido'] ?>">
                                      <button type="submit" class="btn btn-danger btn-sm" id="excluir">
                                          <i class="fa fa-minus"></i>
                                       </button>
                                  </form>
                             </td>
                          </tr>
                       </tbody>
                       <?php
                          }
                        }else{ echo"
                          <tbody>
                            <tr>
                              <p>Nenhum pedido foi realizado hoje.</p>
                            <tr>
                          </tbody>
                        ";
                           }
                        ?>
    				</table>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    </div>
    <!-- /.panel-body -->
</div>
<!-- /.panel -->
</div>
    <!-- /.col-lg-6 -->
</div>
<!-- /.row -->
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>

<!-- jQuery -->
<script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>