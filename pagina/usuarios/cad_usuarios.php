<?php include($_SERVER['DOCUMENT_ROOT']."/cabecalho.php");
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
               <strong>Dados pessoais</strong>
            </div>
            <div class="panel-body">
               <div class="row">
                  <div class="col-lg-4">
                     <form role="form" action="/pagina/usuarios/valida_usuario.php" method="post">
                       <!-- <div class="form-group">
                         <div class="input-group">
                           <span class="input-group-addon">
                             <input type="checkbox"  name="admin" id="admin">
                           </span>
                           <input type="text" class="form-control" value="Administrador"  disabled>
                         </div>
                     </div> -->
                        <div class="form-group">
                           <label>Nome completo</label>
                           <input class="form-control" type="text" name="nome" required>
                        </div>
                        <div class="form-group">
                           <label>Email</label>
                           <input class="form-control" type="email" name="email" required placeholder="Enter a valid email address">
                        </div>
                        <div class="form-group">
                           <label>Data nascimento</label>
                           <input class="form-control" type="date" name="datanascimento" id="campodata"required placeholder="yyyy-MM-dd">
                        </div>
                        <div class="form-group">
                           <label>Usuário</label>
                           <input class="form-control" type="text" name="usuario"required >
                        </div>
                        <div class="form-group">
                           <label>Senha</label>
                           <input class="form-control" type="password" name="senha" required>
                        </div>
                        <button type="submit" class="btn btn-success">Salvar</button>
                        <button type="reset" class="btn btn-info">Cancelar</button>
                     </form>
                  </div>
                  <div class="col-lg-8">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           Lista de Usuários
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <div class="dataTable_wrapper">
                              <table class="table table-striped table-bordered table-hover" id="tabela_usuario" width="100%" cellspacing="0">
                                 <thead>
                                    <tr>
                                       <th>#</th>
                                       <th>Nome</th>
                                       <th>Email</th>
                                       <th>Usuario</th>
                                       <th>Ativo</th>
                                       <th>Alterar</th>
                                    </tr>
                                 </thead>
                                 <?php
                                    $usuarios = listaUsuarios($conexao);
                                    foreach ($usuarios as $usuario) {
                                    ?>
                                 <tbody>
                                    <tr>
                                       <td><?= $usuario['idusuario'] ?></td>
                                       <td><?= $usuario['nome'] ?></td>
                                       <td><?= $usuario['email'] ?></td>
                                       <td><?= $usuario['usuario'] ?></td>
                                       <td><?php if($usuario['flaginativo']){ ?>
                                             Inativo
                                          <?php
                                             } else {
                                          ?>
                                             Ativo
                                          <?php
                                            }
                                           ?>
                                       </td>
                                       <td><a href="alterar_usuario.php?id=<?=$usuario['idusuario']?>"><i class="fa fa-edit fa-fw"></i> </a></td>
                                    </tr>
                                 </tbody>
                                 <?php
                                    }
                                    ?>
                              </table>
                           </div>
                           <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                     </div>
                     <!-- /.panel -->
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
<script>
   $(document).ready(function() {
       $('#tabela_usuario').DataTable({
           "sDom": '<"top"i>rt<"bottom"lp><"clear">',
               "paging":   false,
               "ordering": false,
               "info":     false,
               responsive: true,
               //"scrollY":        "200px",
               "scrollCollapse": true
       });
   });
</script>
<?php include($_SERVER['DOCUMENT_ROOT']."/rodape.php") ?>
