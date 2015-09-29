<?php include("cabecalho.php");
   include($_SERVER['DOCUMENT_ROOT']."/controller/conecta.php");
   require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_usuario.php");
   require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_empresa.php");
   require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_login.php");
   require_once("mostra_alerta.php")
?>
<div id="page-wrapper">
   <div class="row">
      <div class="col-lg-12">
         <h2 class="page-heading">Perfil</h2>
            <?php mostraAlerta("Danger"); ?>
            <?php mostraAlerta("Success"); ?>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-12">
       <div class="panel-group">
       <?php
           $usuariologado = buscaIdUsuario($conexao,usuarioLogado());
            $usuario = buscaUsuarios($conexao, $usuariologado["idusuario"]);
            $empresa = buscaEmpresa($conexao, $usuario['idempresa']);
        ?>
        <div class="panel panel-info">
          <div class="panel-heading">Meus dados</div>
          <div class="panel-body">
            <form role="form" action="../model/valida_usuario.php" method="post">
                 <div class="form-group">
                       <input type="hidden" name="id" value="<?=$usuario['idusuario']?>">
                 </div>
                <div class="col-lg-4">
                    <div class="form-group">
                       <label>Nome completo</label>
                       <input class="form-control" type="text" name="nome" value="<?=$usuario['nome']?>" required>
                    </div>
                    <div class="form-group">
                       <label>Email</label>
                       <input class="form-control" type="email" name="email" value="<?=$usuario['email']?>" required placeholder="Informe um endereço de Email válido">
                    </div>
                    <div class="form-group">
                       <label>Data nascimento</label>
                       <input class="form-control" type="date" name="datanascimento" value="<?=$usuario['dtnascimento']?>" id="campodata"required placeholder="yyyy-MM-dd">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                       <label>Usuário</label>
                       <input class="form-control" type="text" name="usuario" value="<?=$usuario['usuario']?>" required >
                    </div>
                    <div class="form-group">
                       <label>Senha</label>
                       <input class="form-control" type="password" name="senha" value="" required>
                    </div>
                    <div class="form-group">
                      <button  href="cad_usuarios.php"  class="btn btn-info">Gravar</button>
                    </div>
                </div>
             </form>
              <div class="col-lg-4">
               <div class="light-well">
                  <img alt=""  src="#" class="img-circle">
                  <div class="form-group">
                      <label>File input</label>
                      <input type="file">
                  </div>
               </div>
            </div>
             </div>
          </div>
        </div>
        <div class="panel panel-info">
          <div class="panel-heading">Dados da minha empresa</div>
          <div class="panel-body">
             <form role="form" action="../model/valida_empresa.php" method="post">
                    <div class="form-group">
                       <input type="hidden" name="idempresa" value="<?=$empresa['idempresa']?>">
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Nome</label>
                            <input class="form-control" type="text" name="razao" value="<?=$empresa['razaosocial']?>">
                        </div>
                        <div class="form-group">
                            <label>Nome Fantasia</label>
                            <input class="form-control" type="text" name="fantasia" value="<?=$empresa['nomefantasia']?>">
                        </div>
                        <div class="form-group">
                            <label>CNPJ</label>
                            <input class="form-control" type="text" name="cnpj" value="<?=$empresa['cnpj']?>">
                        </div>
                        <div class="form-group">
                            <label>Endereço</label>
                            <input class="form-control" type="text" name="endereco" value="<?=$empresa['endereco']?>">
                        </div>                    
                  </div>
                  <div class="col-lg-6">
                        <div class="form-group">
                            <label>Número</label>
                            <input class="form-control" type="text" name="numero" value="<?=$empresa['numero']?>">
                        </div>
                        <div class="form-group">
                            <label>CEP</label>
                            <input class="form-control" type="text" name="cep" value="<?=$empresa['cep']?>">
                        </div>
                        <div class="form-group">
                            <label>Telefone</label>
                            <input class="form-control" type="tel" name="telefone" value="<?=$empresa['fone']?>">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="email" name="email"  placeholder="Informe um endereço de Email válido" value="<?=$empresa['email']?>">
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-info">Gravar</button>
                        </div>
                  </div>
              </form>
          </div>
        </div>
        <div class="panel panel-danger">
          <div class="panel-heading">Outra coisa</div>
          <div class="panel-body">
            <label>Deletar a conta</label>
            <button type="submit" class="btn btn-danger" name="alterar">Excluir minha conta</button>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
<?php include("rodape.php") ?>
