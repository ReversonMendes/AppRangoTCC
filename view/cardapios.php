<?php 
  include("cabecalho.php"); 
  include($_SERVER['DOCUMENT_ROOT']."/controller/conecta.php");
  include($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_cardapios.php");
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
                                  <div class="col-lg-4">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">Marmita</div>
                                        <div class="panel-body">
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
                                                            <th>&nbsp;</th>
                                                            <th>Ingredientes</th>
                                                            <th>&nbsp;</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                                <button type="button" class="btn btn-primary"  id='incluir' value='incluir' onclick='adiciona_ingrediente()'>Incluir</button>
                                            </div>
                                            <div class="form-group" align="center">
                                              <button  type="submit"  class="btn btn-info">Gravar</button>
                                            </div>
                                          </form>
                                        </div>
                                      </div>
                                  </div>
                                  <div class="col-lg-8">
                                    <div class="panel panel-primary">
                                      <div class="panel-heading">Cardápios</div>
                                      <div class="panel-body">
                                        <table class="table table-striped table-bordered table-hover" id="tabela_usuario" width="100%" cellspacing="0">
                                           <thead>
                                              <tr>
                                                 <th>#</th>
                                                 <th>Nome Prato</th>
                                                 <th>Dia Semana</th>
                                                 <th>Data Alteração</th>
                                                 <th>Ativo</th>
                                                 <th>Alterar</th>
                                              </tr>
                                           </thead>
                                           <?php
                                              $cardapios = listaCardapios($conexao);
                                              foreach ($cardapios as $cardapio) {
                                              ?>
                                           <tbody>
                                              <tr>
                                                 <td><?= $cardapio['idcardapio'] ?></td>
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
                                                   <button type="button" class="btn btn-info lg">
                                                    Alterar
                                                   </button>
                                                 </td>
                                              </tr>
                                           </tbody>
                                           <?php
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
<!--                       <div id="preco" class="tab-pane fade">
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
                      </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
<?php include("rodape.php") ?>
