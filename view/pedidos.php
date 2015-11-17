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
                <form method="post" action="exemplo.html" id="frm-filtro">
                  <?php mostraAlerta("Success"); ?>
                  <?php mostraAlerta("Danger"); ?>
                    <p>
                      <label for="pesquisar">Pesquisar</label>
                      <input type="text" id="pesquisar" name="pesquisar" size="40" />
                    </p>
                  </form>
                     <table class="table table-striped table-bordered table-hover" id="tabela_pedido"  width="100%" cellspacing="0" class="display">
                       <thead>
                          <tr>
                             <!-- <th>&nbsp;</th> -->
                             <th>Idpedido</th>
                             <th>Nome Cliente</th>
                             <th>Cardápio</th>
                             <th>QTD</th>
                             <th>Observação</th>
                             <th>Endereço</th>
                             <th>Pagamento</th>
                             <th>Status</th>
                             <th>Alterar</th>
                             <th>Imprimir</th>
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
                             <!-- <td><input type="checkbox" value="<?=$key?>" name="marcar[]" /></td> -->
                             <td><?= $pedido['idpedido'] ?></td>
                             <td><?= $pedido['nomecliente'] ?></td>
                             <td><?= substr($pedido['nomeprato'],0,20).'...' ?></td>
                             <td><?= $pedido['quantidade'] ?></td>
                             <td><?= substr($pedido['observacao'],0,20).'...' ?></td>
                             <td><?= substr($pedido['cidade'].',Bairro:'.$pedido['bairro'].', Rua:'.$pedido['rua'].', '.$pedido['numero'].','.$pedido['complemento'], 0, 20).'...' ?> </td>
                             <td><?= $pedido['descrpagamento'] ?></td>
                             <td><?php
                                switch ($pedido['status']) {
                                    case "P":
                                        echo "Pendente";
                                        break;
                                    case "A":
                                        echo "Aceito";
                                        break;
                                    case "F":
                                        echo "Finalizado";
                                        break;
                                    case "E":
                                        echo "Entrega";
                                        break;
                                    case "R":
                                        echo "Recusado";
                                        break;
                                    default:
                                        echo "Não informado";
                                }
                             ?></td>
                             <td align="center">
                                <a class="btn btn-info btn-sm" id="btnAlterarpedido" data-toggle="modal" data-target="#modalAlterarpedido" data-whatever="<?= $pedido['idpedido'] ?>">
                                    <i class="fa fa-pencil"></i>
                                </a>
                             </td>
                             <td align="center">
                                  <form action="../model/imprimir_pedidos.php" method="post">
                                    <input type="hidden" name="id" value="<?= $pedido['idpedido'] ?>">
                                      <button type="submit" class="btn btn-sm" id="imprimir">
                                          <i class="fa  fa-print"></i>
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
                    <div class="pagination-page"></div>
                </div>
                <!-- /.panel-body -->
                  <!-- Modal alterar Cardapio-->
                  <div class="modal fade" id="modalAlterarpedido" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content ">
                        <div class="modal-header ">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel">Alterar pedidos de Marmita</h4>
                        </div>
                        <div id="dadosPedido" class="modal-body">
                        </div>
                      </div>
                    </div>
                  </div>

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
 $(function(){
      
     
      $('form').submit(function(e){ e.preventDefault(); });
      
      $('#pesquisar').keydown(function(){
        var encontrou = false;
        var termo = $(this).val().toLowerCase();
        $('table > tbody > tr').each(function(){
          $(this).find('td').each(function(){
            if($(this).text().toLowerCase().indexOf(termo) > -1) encontrou = true;
          });
          if(!encontrou) $(this).hide();
          else $(this).show();
          encontrou = false;
        });
      });

        // Paginação de 10 items
        var items = $("table tbody tr");

        var numItems = items.length;
        var perPage = 10;

        // mostrar apenas os 2 primeiros itens (ou " primeiro ") inicialmente per_page
        items.slice(perPage).hide();

        // agora configurar o  pagination
        $(".pagination-page").pagination({
            items: numItems,
            itemsOnPage: perPage,
            cssStyle: "compact-theme",
            onPageClick: function(pageNumber) {
                var showFrom = perPage * (pageNumber - 1);
                var showTo = showFrom + perPage;

                items.hide() 
                     .slice(showFrom, showTo).show();
            }
        });

        //Modal alterar pedido
        $('#modalAlterarpedido').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var idpedido = button.data('whatever')
          var modal = $(this)
           $.post('../model/alterar_pedido.php', { id: idpedido}, function(retorno){
               $("#dadosPedido").html(retorno);
           });
        })
      //colorir a tabela
      $('#tabela_pedido').find('tr').each(function(indice){
          console.log($(this).children().eq(7).text());
          switch($(this).children().eq(7).text())
          {
           
          case 'Pendente':
          $(this).prop('class','info');
          break;
           
          case 'Entrega':
          $(this).prop('class','warning');
          break;
           
          case 'Aceito':
          case 'Finalizado':
          $(this).prop('class','success');
          break;
           
          case 'Recusado':
          $(this).prop('class','danger');
          break;
           
          };
      });

    });
    </script>

   

   