<?php 
  require_once("cabecalho.php"); 
  require_once("menu.php");
  require_once($_SERVER['DOCUMENT_ROOT']."/controller/conecta.php");
  require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_cardapios.php");
  require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_login.php");
?>
    <div id="wrapper">
        <div id="page-wrapper">  
            <div class="row">
                <div class="col-lg-12">
                <!-- Tab-->
                   <ul class="nav nav-tabs">
                      <li class="active"><a data-toggle="tab" href="#marmita">Marmitas</a></li>
                      <li><a  href="precos.php">Preços</a></li>
                    </ul>
                <!--Conteudo dos Tab-->
                    <div class="tab-content">
                    <!--Tab 1 -->
                      <div id="marmita" class="tab-pane fade in active">
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
                                        <a class="btn btn-success" data-toggle="modal" data-target="#modalInserirCardapio">
                                          <i class="fa fa-plus"> Incluir Cadápios de Marmitas</i>
                                        </a>
                                      </div>
                                      <div class="panel-body">

                                        <table class="table table-striped table-bordered table-hover" id="tabela_cardapio" width="100%" cellspacing="0">
                                           <thead>
                                              <tr>
                                                 <th hidden="hidden">#</th>
                                                 <th>Nome Prato</th>
                                                 <th>Dia Semana</th>
                                                 <th>Data de Alteração</th>
                                                 <th>Status</th>
                                                 <th>Alterar</th>
                                                 <th>Excluir</th>
                                              </tr>
                                           </thead>
                                           <?php
                                              $usuario  = buscaIdUsuario($conexao, usuarioLogado());
                                              $cardapios = listaCardapios($conexao,$usuario["idempresa"]);
                                              if(count($cardapios) > 0)       {
                                              foreach ($cardapios as $cardapio) {
                                              ?>
                                           <tbody>
                                              <tr>
                                                 <td hidden="hidden"><?= $cardapio['idcardapio'] ?></td>
                                                 <td><?= $cardapio['nomeprato'] ?></td>
                                                 <td><?= $cardapio['diasemana'] ?></td>
                                                 <td><?=  date_format(date_create($cardapio['dtalteracao']), 'd/m/Y H:i:s');  ?></td>
                                                 <td><?php if($cardapio['flagativo']){ ?>
                                                       Plublicado
                                                    <?php
                                                       } else {
                                                    ?>
                                                       Não Publicado
                                                    <?php
                                                      }
                                                     ?>
                                                 </td>
                                                 <td align="center">
                                                    <a class="btn btn-info btn-sm" id="btnAlterarCardapio" data-toggle="modal" data-target="#modalAlterarCardapio" data-whatever="<?= $cardapio['idcardapio'] ?>">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                 </td>
                                                 <td align="center">
                                                      <form action="../model/excluir_cardapios.php" method="post">
                                                        <input type="hidden" name="id" value="<?= $cardapio['idcardapio'] ?>">
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
                                      </div>
                                    </div>
                                  </div>
                                  </div>
                                </div>
                            </div>
                      </div>

                  <!-- Modal Inserir Cardapio-->
                  <div class="modal fade" id="modalInserirCardapio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content ">
                        <div class="modal-header ">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel">Cadastrar Cardápio de Marmita</h4>
                        </div>
                            <div class="modal-body">
                              <form role="form" action="../model/valida_cardapios.php" method="post">
                               <div class="form-group">
                                 <label>Nome do prato</label>
                                 <input class="form-control" type="text" name="nomeprato" required>
                               </div>
                               <div class="form-group">
                                  <label>Dia da Semana</label>
                                  <select class="form-control" name="diasemana">
                                      <option value="segunda">Segunda-feira</option>
                                      <option value="terca">Terça-feira</option>
                                      <option value="quarta">Quarta-feira</option>
                                      <option value="quinta">Quinta-feira</option>
                                      <option value="sexta">Sexta-feira</option>
                                      <option value="sabado">Sábado</option>
                                      <option value="domingo">Domingo</option>
                                  </select>
                              </div>
                              <div class="table-responsive">
                                  <table class="table table-striped table-bordered table-hover" id='tabela_ingrediente'>
                                      <thead>
                                          <tr>
                                              <th>Ingredientes</th>
                                              <th>&nbsp;</th>
                                          </tr>
                                          <tr>
                                            <td>
                                                <input class="form-control" name="ingrediente[1]" required="" type="text">
                                            </td>
                                            <td align="center">
                                                <a class="btn btn-danger" id="excluiringr" value="excluir" onclick="deleta_ingrediente(1)">
                                                  <i class="fa fa-minus"></i>
                                                </a>
                                            </td>
                                          </tr>
                                      </thead>
                                      <tbody>
                                      </tbody>
                                  </table>
                                    <a class="btn btn-success" id='incluir' value='incluir' onclick='adiciona_ingrediente()'>
                                          <i class="fa fa-plus"></i>
                                    </a>
                              </div>
                              <div class="form-group" align="center">
                                <button  type="submit"  class="btn btn-info">Gravar</button>
                              </div>
                            </form>
                        </div>
                      </div>
                    </div>
                  </div>

                   <!-- Modal alterar Cardapio-->
                  <div class="modal fade" id="modalAlterarCardapio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content ">
                        <div class="modal-header ">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel">Alterar Cardápio de Marmita</h4>
                        </div>
                        <div id="dadosCardapio" class="modal-body">
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
      $('#modalAlterarCardapio').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var idcardapio = button.data('whatever')
          var modal = $(this)
           $.post('../model/alterar_cardapio.php', { id: idcardapio}, function(retorno){
               //$("#modalAlterarCardapio").modal({ backdrop: 'static' }); 
               $("#dadosCardapio").html(retorno);
           });
        })
    </script>
<?php require_once("rodape.php") ?>
