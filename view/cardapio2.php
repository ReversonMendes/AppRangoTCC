<?php include("cabecalho.php"); ?>
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
                                      <div class="panel-heading">Cardápios
                                        <a class="btn btn-primary btn-right" data-toggle="modal" data-target="#modalInserirUsuario"> <i class="fa fa-plus-square fa-2x"></i> </a>
                                      </div>
                                      <div class="panel-body">
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
                                                <table class="table table-striped table-bordered table-hover" id='tabela_ingrediente2'>
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
                                      <p>Aqui vai ser listado em uma tabelas todos os cardapios cadastrado com rowchilds isto é quando clicar na lista abrir linhas filhas com os ingredientes </p>
                                      <div class="panel-body">
                                      </div>
                                    </div>
                                  </div>
                                  </div>
                                </div>
                            </div>
                          </div>
                      </div>
                    </div>
                    <!-- MODALSSSSSSSSSSSS -->
                      <!-- Modal Inserir Marmita-->
                            <div class="modal fade" id="modalInserirUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Cadastrar Marmita</h4>
                                  </div>
                                  <div class="modal-body">
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
                              </div>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
  </div>
<?php include("rodape.php") ?>
