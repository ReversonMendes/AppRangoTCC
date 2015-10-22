<?php 
  require_once("cabecalho.php"); 
  require_once("menu.php");
  require_once($_SERVER['DOCUMENT_ROOT']."/controller/conecta.php");
  require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_precos.php");
  require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_formapagamento.php");
  setlocale(LC_MONETARY,"pt_BR", "ptb");
?>
    <div id="wrapper">
        <div id="page-wrapper">  
            <div class="row">
                <div class="col-lg-12">
                <!-- Tab-->
                   <ul class="nav nav-tabs">
                      <li><a  href="cardapios.php">Marmitas</a></li>
                      <li class="active"><a data-toggle="tab" href="#precos">Preços</a></li>
                    </ul>
                <!--Conteudo dos Tab-->
                    <div class="tab-content">
                    <!--Tab 2 -->
						<div id="precos" class="tab-pane fade in active">
						   <div class="col-lg-18">
						      <div class="panel-group">
						         <div class="panel panel-default">
						            <div class="panel-heading">
						               <?php mostraAlerta("Success"); ?>
						               <?php mostraAlerta("Danger"); ?>
						            </div>
						            <div class="panel-body">
						               <div class="col-lg-18">
						                  <div class="panel panel-primary">
						                     <div class="panel-heading">
						                        <a class="btn btn-success" data-toggle="modal" data-target="#modalInserirPreco">
						                          <i class="fa fa-plus"> Incluir Preços</i>
						                        </a>
                                    <a class="btn btn-success" data-toggle="modal" data-target="#modalInserirformapgt">
                                      <i class="fa fa-plus"> Incluir Formas de Pagamento</i>
                                    </a>
						                     </div>
						                     <div class="panel-body">
						                        <table class="table table-striped table-bordered table-hover" id="tabela_Preco" width="100%" cellspacing="0">
						                           <thead>
						                              <tr>
						                                 <th hidden="hidden">#</th>
						                                 <th>Tamanho</th>
						                                 <th>Peso</th>
						                                 <th>Gramatura</th>
						                                 <th>Valor</th>
						                                 <th>Data Alteração</th>
						                                 <th>Alterar</th>
						                                 <th>Excluir</th>
						                              </tr>
						                           </thead>
						                           <?php
                                          $usuario  = buscaIdUsuario($conexao, usuarioLogado());
						                              $precos = listaPrecos($conexao,$usuario['idempresa']);
						                              if(count($precos) > 0)       {
						                              foreach ($precos as $Preco) {
						                              ?>
						                           <tbody>
						                              <tr>
						                                 <td hidden="hidden"><?= $Preco['idpreco'] ?></td>
						                                 <td><?= $Preco['tamanho'] ?></td>
						                                 <td><?= $Preco['peso'] ?> Kg</td>
						                                 <td><?= $Preco['gramatura'] ?></td>
						                                 <td><?= money_format('%n', $Preco['valor']); ?></td>
						                                 <td><?=  date_format(date_create($Preco['dtalteracao']), 'd/m/Y H:i:s');  ?></td>
						                                 <td align="center">
						                                    <a class="btn btn-info btn-sm" id="btnAlterarPreco" data-toggle="modal" data-target="#modalAlterarPreco" data-whatever="<?= $Preco['idpreco'] ?>">
						                                    <i class="fa fa-pencil"></i>
						                                    </a>
						                                 </td>
						                                 <td align="center">
						                                    <form action="../model/excluir_precos.php" method="post">
						                                       <input type="hidden" name="id" value="<?= $Preco['idpreco'] ?>">
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
						                                  <p>Nenhum preço cadastrado. Clique em + para adicionar um novo preço.</p>
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
                  <div class="modal fade" id="modalInserirPreco" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content ">
                        <div class="modal-header ">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel">Cadastrar preços de Marmita</h4>
                        </div>
                            <div class="modal-body">
                              <form role="form" action="../model/valida_precos.php" method="post">
                                <div class="form-group">
                                  <label>tamanho</label>
                                  <select class="form-control" name="tamanho">
                                      <option value="P">P (Pequena)</option>
                                      <option value="M">M (Média)</option>
                                      <option value="G">G (Grande)</option>
                                      <option value="GG">GG (Gigante)</option>
                                  </select>
                              	</div>
                               <div class="form-group">
                                 <label>Gramatura</label>
                                 <input class="form-control" type="text" name="gramatura">
                               </div>
                               <div class="form-group">
                                 <label>Peso</label>
                                 <input class="form-control" type="text" id="peso" name="peso">
                               </div>
                               <div class="form-group">
                                 <label>Valor</label>
                                 <input class="form-control" type="text" id="valor" name="valor">
                               </div>
                              <div class="form-group" align="center">
                                <button  type="submit"  class="btn btn-info">Gravar</button>
                              </div>
                            </form>
                        </div>
                      </div>
                    </div>
                    <?php require_once("rodape.php") ?>
                  </div>

                  <!-- Modal alterar Preco-->
                  <div class="modal fade" id="modalAlterarPreco" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content ">
                        <div class="modal-header ">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel">Alterar preço de Marmita</h4>
                        </div>
                        <div id="dadosPreco" class="modal-body">
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Modal Inserir/Alterar Forma de pagamento-->
                  <div class="modal fade" id="modalInserirformapgt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content ">
                        <div class="modal-header ">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel">Cadastrar Formas de pagamento</h4>
                        </div>
                            <div class="modal-body">
                              <form role="form" action="../model/valida_formapagamento.php" method="post">
                               <div class="form-group">
                                 <label>Descrição da forma de pagamento</label>
                                 <input class="form-control" type="text" name="descrpagamento" placeholder="Ex: Dinheiro" >
                               </div>
                              <div class="form-group" align="center">
                                <button  type="submit"  class="btn btn-info">Gravar</button>
                              </div>
                            </form>
                            <table class="table table-striped table-bordered table-hover" width="100%" cellspacing="0">
                               <thead>
                                  <tr>
                                     <th hidden="hidden">#</th>
                                     <th>Descrição</th>
                                     <th>Excluir</th>
                                  </tr>
                               </thead>
                               <?php
                                  $usuario  = buscaIdUsuario($conexao, usuarioLogado());
                                  $formas = listaFormaPagamento($conexao,$usuario['idempresa']);
                                  if(count($formas) > 0)       {
                                  foreach ($formas as $forma) {
                                  ?>
                               <tbody>
                                  <tr>
                                     <td hidden="hidden"><?= $forma['idformapagamento'] ?></td>
                                     <td><?= $forma['descrpagamento'] ?></td>
                                     <td align="center">
                                        <form action="../model/excluir_formapagamento.php" method="post">
                                           <input type="hidden" name="id" value="<?= $forma['idformapagamento'] ?>">
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
                                      <p>Nenhuma forma de pagamento cadastrada.</p>
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

    <script type="text/javascript">
      $('#modalAlterarPreco').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var idpreco = button.data('whatever')
          var modal = $(this)
           $.post('../model/alterar_preco.php', { id: idpreco}, function(retorno){
               //$("#modalAlterarPreco").modal({ backdrop: 'static' }); 
               $("#dadosPreco").html(retorno);
           });
        })
    </script>

<?php require_once("rodape.php") ?>
