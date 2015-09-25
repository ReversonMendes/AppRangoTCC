<?php include("cabecalho.php"); ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page-header">Cadastro de Empresa</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Dados da empresa
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="/pagina/empresa/valida_empresa.php" method="post">
                                        <div class="form-group">
                                            <label>Razão Social</label>
                                            <input class="form-control" type="text" name="razao">
                                        </div>
                                        <div class="form-group">
                                            <label>Nome Fantasia</label>
                                            <input class="form-control" type="text" name="fantasia">
                                        </div>
                                        <div class="form-group">
                                            <label>CNPJ</label>
                                            <input class="form-control" type="text" name="cnpj">
                                        </div>
                                        <div class="form-group">
                                            <label>Endereço</label>
                                            <input class="form-control" type="text" name="endereco">
                                        </div>
                                        <div class="form-group">
                                            <label>Bairro</label>
                                            <input class="form-control" type="text" name="bairro">
                                        </div>
                                        <div class="form-group">
                                            <label>Número</label>
                                            <input class="form-control" type="text" name="numero">
                                        </div>
                                        <div class="form-group">
                                            <label>CEP</label>
                                            <input class="form-control" type="text" name="cep">
                                        </div>
                                        <div class="form-group">
                                            <label>Telefone</label>
                                            <input class="form-control" type="text" name="telefone">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" type="email" name="email">
                                        </div>
                                        <button type="submit" class="btn btn-success">Gravar</button>
                                        <button type="reset" class="btn btn-info">Limpar</button>
                                    </form>
                                </div>
                                <div class="col-lg-6">
                                    <h3>Logo</h3>
                                    <form role="form">
                                        <div class="form-group">
                                        <div class="row">
                                          <div class="col-xs-6 col-md-3">
                                            <a href="#" class="thumbnail">
                                              <img src="logo.jpg" alt="Smiley face" height="171" width="180">
                                            </a>
                                          </div>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label>File input</label>
                                            <input type="file">
                                        </div>
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include($_SERVER['DOCUMENT_ROOT']."/rodape.php") ?>
