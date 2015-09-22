<?php
   include($_SERVER['DOCUMENT_ROOT']."/cabecalho.php");
   include("funcoes_usuario.php");
?>

<div id="page-wrapper">
   <div class="row">
      <div class="col-lg-6">
         <h2 class="page-header">Cadastro de Usuário</h2>
      </div>
      <!-- /.col-lg-12 -->
   </div>
   <!-- /.row -->
   <div class="row">
      <div class="col-lg-12">
         <div class="panel panel-default">
           <?php mostraAlerta("success"); ?>
           <?php mostraAlerta("danger"); ?>
            <div class="panel-heading">
               <strong>Alterando Usuário</strong>
            </div>
            <div class="panel-body">
            <?php
               $id = $_GET['id'];
               $usuario = buscaUsuarios($conexao, $id);
               $ativo = $usuario['flaginativo'] ? "checked = 'checked'" : "";
            ?>
              <div class="row">
                  <div class="col-lg-4">
                     <form role="form" action="/pagina/usuarios/valida_alteracao_usuario.php" method="post">
                     <div class="form-group">
                           <input type="hidden" name="id" value="<?=$usuario['idusuario']?>">
                     </div>
                     <div class="form-group">
                       <div class="input-group">
                         <span class="input-group-addon">
                           <input type="checkbox" name="ativo" <?=$ativo?> value="true">
                         </span>
                         <input type="text" class="form-control" value="Inativar usuário"  disabled>
                       </div>
                      </div>
                        <div class="form-group">
                           <label>Nome completo</label>
                           <input class="form-control" type="text" name="nome" value="<?=$usuario['nome']?>" required>
                        </div>
                        <div class="form-group">
                           <label>Email</label>
                           <input class="form-control" type="email" name="email" value="<?=$usuario['email']?>" required placeholder="Enter a valid email address">
                        </div>
                        <div class="form-group">
                           <label>Data nascimento</label>
                           <input class="form-control" type="date" name="datanascimento" value="<?=$usuario['dtnascimento']?>" id="campodata"required placeholder="yyyy-MM-dd">
                        </div>
                        <div class="form-group">
                           <label>Usuário</label>
                           <input class="form-control" type="text" name="usuario" value="<?=$usuario['usuario']?>" required >
                        </div>
                        <div class="form-group">
                           <label>Senha</label>
                           <input class="form-control" type="password" name="senha" value="" required>
                        </div>
                        <button type="submit" class="btn btn-success" name="alterar">Alterar</button>
                        <button  href="cad_usuarios.php"  class="btn btn-info">Cancelar</button>
                     </form>
                  </div>
                  <!-- /.panel-body -->
               </div>
               <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
         </div>
         <!-- /.row -->
      </div>
      <!-- /#page-wrapper -->
   </div>
</div>
<?php include($_SERVER['DOCUMENT_ROOT']."/rodape.php") ?>
