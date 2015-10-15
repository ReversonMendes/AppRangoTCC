<?php 
  require_once("cabecalho.php"); 
  require_once("menu.php");
  require_once($_SERVER['DOCUMENT_ROOT']."/controller/conecta.php");
  require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_cardapios.php");
?>
    <div id="wrapper">
        <div id="page-wrapper">  
            <div class="row">
                <div class="col-lg-12">
                <!-- Tab-->
                   <ul class="nav nav-tabs">
                      <li class="active"><a data-toggle="tab" href="#marmita">Marmitas</a></li>
                      <li><a data-toggle="tab" href="#preco">Preços</a></li>
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
                                          <i class="fa fa-plus"></i>
                                        </a>
                                      </div>
                                      <div class="panel-body">

                                        <table class="table table-striped table-bordered table-hover" id="tabela_usuario" width="100%" cellspacing="0">
                                           <thead>
                                              <tr>
                                                 <th hidden="hidden">#</th>
                                                 <th>Nome Prato</th>
                                                 <th>Dia Semana</th>
                                                 <th>Data de Alteração</th>
                                                 <th>Ativo</th>
                                                 <th>Alterar</th>
                                                 <th>Excluir</th>
                                              </tr>
                                           </thead>
                                           <?php
                                              $cardapios = listaCardapios($conexao);
                                              if(count($cardapios) > 0)       {
                                              foreach ($cardapios as $cardapio) {
                                              ?>
                                           <tbody>
                                              <tr>
                                                 <td hidden="hidden"><?= $cardapio['idcardapio'] ?></td>
                                                 <td><?= $cardapio['nomeprato'] ?></td>
                                                 <td><?= $cardapio['diasemana'] ?></td>
                                                 <td><?= $cardapio['dtalteracao'] ?></td>
                                                 <td><?php if($cardapio['flaginativo']){ ?>
                                                       Inativo
                                                    <?php
                                                       } else {
                                                    ?>
                                                       Ativo
                                                    <?php
                                                      }
                                                     ?>
                                                 </td>
                                                 <td align="center">
                                                    <a class="btn btn-info lg" data-toggle="modal" data-target="#modalAlterarCardapio">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                 </td>
                                                 <td align="center">
                                                    <a class="btn btn-danger lg">
                                                         <i class="fa fa-minus"></i>
                                                    </a>
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
                      <!--Tab 2-->
                      <div id="preco" class="tab-pane fade">
                          <div class="panel panel-primary">
                                <div class="panel-heading">Forma de pagamento</div>
                                <div class="panel-body">
                                  <div class="col-lg-6">
                                      ------------

                                          3
                                      ------------
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
                          <h4 class="modal-title" id="myModalLabel">Cadastrar Cardápio de Marmita</h4>
                        </div>
                            <div class="modal-body">
                              <form role="form" action="../model/valida_cardapios.php" method="post">
                                <?php
                                   $id = $cardapio['idcardapio'];
                                   $idempresa = $cardapio['idempresa'];
                                   $cardapioAlt = buscaCardapios($conexao, $id,$idempresa);
                                   $ingredientesAlt = buscaIngredientes($conexao, $id,$idempresa);
                                   $ativo = $cardapioAlt['flaginativo' ] ? "checked = 'checked'" : "";
                                ?>
                              <div class="form-group">
                                  <input type="hidden" name="id" value="<?=$cardapioAlt['idcardapio']?>">
                               </div>
                               <div class="form-group">
                                 <label>Nome do prato</label>
                                 <input class="form-control" type="text" name="nomeprato" value="<?=$cardapioAlt['nomeprato']?>" required>
                               </div>
                               <div class="form-group">
                                  <label>Dia da Semana</label>
                                  <select class="form-control" name="diasemana">
                                      <option value="segunda" selected= "<?=$cardapioAlt['diasemana']?> == segunda ? 'selected' : ''">Segunda-feira</option>
                                      <option value="terca"   selected= "<?=$cardapioAlt['diasemana']?> == terca ? 'selected' : ''">Terça-feira</option>
                                      <option value="quarta"  selected= "<?=$cardapioAlt['diasemana']?> == quarta ? 'selected' : ''">Quarta-feira</option>
                                      <option value="quinta"  selected= "<?=$cardapioAlt['diasemana']?> == quinta ? 'selected' : ''" >Quinta-feira</option>
                                      <option value="sexta"   selected= "<?=$cardapioAlt['diasemana']?> == sexta ? 'selected' : ''" >Sexta-feira</option>
                                      <option value="sabado"  selected= "<?=$cardapioAlt['diasemana']?> == sabado ? 'selected' : ''">Sábado</option>
                                      <option value="domingo" selected= "<?=$cardapioAlt['diasemana']?> == domingo ? 'selected' : ''">Domingo</option>
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
                                              <a class='btn btn-danger' id='excluir' value='excluir' onclick='deleta_ingrediente("+totals+")'><i class='fa fa-minus'></i></a>
                                          </td>
                                        </tr>
                                        <?php }?>
                                      </tbody>
                                  </table>
                                  <a class="btn btn-success" id='incluir' value='incluir' onclick='adiciona_ingredientealt(<?=$key?>)'>
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

                </div>
            </div>
        </div>
    </div>
  </div>
<?php require_once("rodape.php") ?>
