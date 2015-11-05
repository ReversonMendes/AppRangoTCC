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
                    DataTables Advanced Tables
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                     <table class="table table-striped table-bordered table-hover" id="tabela_pedido" width="100%" cellspacing="0" class="display">
                       <thead>
                          <tr>
                             <th><input type="checkbox" value="1" id="marcar-todos" name="marcar-todos" /></th>
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
<!-- //  idpedido,nomecliente,idcardapio,quantidade,observacao,cidade,bairro,numero,idformapagamento,status -->
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
                              <p>Nenhum cárdapio cadastrado. Clique em + para adicionar um novo cárdapio.</p>
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
<script>
  $(document).ready( function () {
    $('#tabela_pedido').DataTable({
        "scrollY":        "500px",
        "scrollCollapse": true,
        "paging":         false,
        columnDefs: [ {
            targets: [ 0 ],
            orderData: [ 0, 1 ]
        }, {
            targets: [ 1 ],
            orderData: [ 1, 0 ]
        }, {
            targets: [ 4 ],
            orderData: [ 4, 0 ]
        } ]

    } );
} );
</script>

   
