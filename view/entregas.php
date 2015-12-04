<?php 
  require_once("cabecalho.php"); 
  require_once("menu.php");
  require_once($_SERVER['DOCUMENT_ROOT']."/controller/conecta.php");
  require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_entregas.php");
  verificaUsuario()
?>
    <div id="wrapper">
        <div id="page-wrapper">  
            <div class="row">
              <div class="panel-group">
                 <div class="panel panel-default">
                    <div class="panel-heading">
                        Entregadores
                       <?php mostraAlerta("Success"); ?>
                       <?php mostraAlerta("Danger"); ?>
                    </div>
                    <div class="panel-body">
                       <div class="col-lg-18">
                          <div class="panel panel-primary">
                             <div class="panel-heading">
                                <a class="btn btn-success" data-toggle="modal" data-target="#modalInserirEntrega">
                                  <i class="fa fa-plus"> Incluir Entregadores</i>
                                </a>
                             </div>
                             <div class="panel-body">
                                <table class="table table-striped table-bordered table-hover" id="tabela_Entrega" width="100%" cellspacing="0">
                                   <thead>
                                      <tr>
                                         <th hidden="hidden">#</th>
                                         <th>Nome</th>
                                         <th>CPF</th>
                                         <th>Telefone</th>
                                         <th>Veículo</th>
                                         <th>Alterar</th>
                                         <th>Excluir</th>
                                      </tr>
                                   </thead>
                                   <?php
                                      $usuario  = buscaIdUsuario($conexao, usuarioLogado());
                                      $entregas = listaentregadores($conexao,$usuario['idempresa']);
                                      if(count($entregas) > 0)       {
                                      foreach ($entregas as $entregador) {
                                      ?>
                                   <tbody>
                                      <tr>
                                         <td hidden="hidden"><?= $entregador['identregador'] ?></td>
                                         <td><?= $entregador['nomeentregador'] ?></td>
                                         <td id="tabcpf"><?= $entregador['cpf'] ?></td>
                                         <td id="tabtelefone"><?= $entregador['fone'] ?></td>
                                         <td><?= $entregador['veiculo'] ?></td>
                                         <td align="center">
                                            <a class="btn btn-info btn-sm" id="btnAlterarentregador" data-toggle="modal" data-target="#modalAlterarEntregador" data-whatever="<?= $entregador['identregador'] ?>">
                                            <i class="fa fa-pencil"></i>
                                            </a>
                                         </td>
                                         <td align="center">
                                            <form action="../model/excluir_entregador.php" method="post">
                                               <input type="hidden" name="id" value="<?= $entregador['identregador'] ?>">
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
                                         <p>Nenhum Entregador cadastrado. Clique em + para adicionar um novo Entregador.</p>
                                       <tr>
                                      </tbody>
                                      ";
                                       }
                                      ?>
                                </table>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>

      <!-- Modal Inserir Preco-->
      <div class="modal fade" id="modalInserirEntrega" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content ">
            <div class="modal-header ">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Cadastrar Entregadores</h4>
            </div>
            <div class="modal-body">
              <form role="form" action="../model/valida_entregas.php" method="post">
               <div class="form-group">
                 <label>Nome Entregador</label>
                 <input class="form-control" type="text" name="nome">
               </div>
               <div class="form-group">
                 <label>CPF</label>
                 <input class="form-control" type="text" id="cpf" name="cpf">
               </div>
               <div class="form-group">
                 <label>Telefone</label>
                 <input class="form-control" type="text" id="telefone" name="telefone">
               </div>
               <div class="form-group">
                 <label>Veículo</label>
                 <input class="form-control" type="text" id="veiculo" name="veiculo">
               </div>
              <div class="form-group" align="center">
                <button  type="submit"  class="btn btn-info">Gravar</button>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal alterar Entregador-->
  <div class="modal fade" id="modalAlterarEntregador" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content ">
        <div class="modal-header ">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Alterar Entregador</h4>
        </div>
        <div id="dadosEntregador" class="modal-body">
        </div>
      </div>
    </div>
  </div>
</div>
    <script type="text/javascript">
      $('#modalAlterarEntregador').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var identregador = button.data('whatever')
          var modal = $(this)
           $.post('../model/alterar_entrega.php', { id: identregador}, function(retorno){
               //$("#modalAlterarEntregador").modal({ backdrop: 'static' }); 
               $("#dadosEntregador").html(retorno);
           });
        })
    </script>

<?php require_once("rodape.php") ?>
