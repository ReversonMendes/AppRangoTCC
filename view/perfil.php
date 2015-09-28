<?php include("cabecalho.php");
   require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_usuario.php");
?>

<div id="page-wrapper">
   <div class="row">
      <div class="col-lg-6">
         <h2 class="page-heading">Perfil</h2>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-12">
       <div class="panel-group">
        <div class="panel panel-primary">
          <div class="panel-heading">Meus dados</div>
          <div class="panel-body">
            <form role="form" action="/pagina/usuarios/valida_alteracao_usuario.php" method="post">
                 <div class="form-group">
                       <input type="hidden" name="id" value="<?=$usuarioalt['idusuario']?>">
                 </div>
                <div class="col-lg-6">
                    <div class="form-group">
                       <label>Nome completo</label>
                       <input class="form-control" type="text" name="nome" value="<?=$usuarioalt['nome']?>" required>
                    </div>
                    <div class="form-group">
                       <label>Email</label>
                       <input class="form-control" type="email" name="email" value="<?=$usuarioalt['email']?>" required placeholder="Enter a valid email address">
                    </div>
                    <div class="form-group">
                       <label>Data nascimento</label>
                       <input class="form-control" type="date" name="datanascimento" value="<?=$usuarioalt['dtnascimento']?>" id="campodata"required placeholder="yyyy-MM-dd">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                       <label>Usuário</label>
                       <input class="form-control" type="text" name="usuario" value="<?=$usuarioalt['usuario']?>" required >
                    </div>
                    <div class="form-group">
                       <label>Senha</label>
                       <input class="form-control" type="password" name="senha" value="" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-success" name="alterar">Alterar</button>
                    <button  href="cad_usuarios.php"  class="btn btn-info">Cancelar</button>
                  </div>
                </div>
             </form>
          </div>
        </div>
        <div class="panel panel-primary">
          <div class="panel-heading">Dados da minha empresa</div>
          <div class="panel-body">
             <form role="form" action="../model/valida_empresa.php" method="post">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Nome</label>
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
                    
                  </div>
                  <div class="col-lg-6">
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
                            <input class="form-control" type="tel" name="telefone">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="email" name="email" required placeholder="Informe um endereço de Email válido">
                        </div>
                    </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">Avançar</button>
                      </div>
              </form>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">Outra coisa</div>
          <div class="panel-body">Panel Content</div>
        </div>
      </div>
      </div>
    </div>
  </div>
<?php include("rodape.php") ?>
