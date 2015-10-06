<?php include("cabecalho.php"); ?>
    <div id="wrapper">
        <div id="page-wrapper">
           <div class="row">
              <div class="col-lg-12">
                 <h2 class="page-heading">Cardápios</h2>
              </div>
           </div>   
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel-group">
                    <div class="panel panel-default">
                       <?php mostraAlerta("Success"); ?>
                       <?php mostraAlerta("Danger"); ?>
                        <div class="panel-heading">
                            Cardápios de Marmitas
                        </div>
                        <div class="panel-body">
                        <div class="col-lg-6">
                           <div class="panel-group">
                            <div class="panel panel-info">
                              <div class="panel-heading">Marmita</div>
                              <div class="panel-body">
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
                              </div>
                              </div>
                            <div class="panel panel-info">
                              <div class="panel-heading">Preços</div>
                              <div class="panel-body">
                              ----------------------


                                        2


                              -----------------------
                              </div>
                            </div>
                            <div class="panel panel-info">
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
                        <div class="col-lg-6">
                            <div class="panel panel-info">
                                <div class="panel-heading">Ingredientes</div>
                                    <div class="panel-body">
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
                                            <input class="form-control" type="hidden" name="total">
                                           <button type="button" class="btn btn-info"  id='incluir' value='incluir' onclick='adiciona_ingrediente()'>Incluir</button>
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
<!--                         <div class="panel-body">
                            <div class="row">
                            <div class="col-lg-6">
                            <div class="panel-group">
                            <div class="panel panel-info">
                              <div class="panel-heading">Meus dados</div>
                              <div class="panel-body">
                                <form role="form" action="/pagina/cardapios/valida_cardapios.php" method="post">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">Gravar</button>
                                            <button type="reset" class="btn btn-info">Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="col-lg-6">
                                 <div class="panel panel-info">
                                  <div class="panel-heading">Dados da minha empresa</div>
                                  <div class="panel-body">                                    
                                    </div>
                                 </form>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

<?php include("rodape.php") ?>
