<?php require_once("cabecalho.php");
   require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_usuario.php");
?>

<div id="page-wrapper">
   <div class="row">
      <div class="col-lg-6">
         <h2 class="page-heading">Cadastro de Usuário</h2>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-12">
         <div class="panel panel-default">
           <?php mostraAlerta("Success"); ?>
           <?php mostraAlerta("Danger"); ?>
                        <div class="panel-heading">
                           <a class="btn btn-primary btn-right" data-toggle="modal" data-target="#modalInserirUsuario"> <i class="fa fa-plus-square fa-2x"></i> </a>
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
                                       <th>datanascimento</th>
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
                                       <td><?= $usuario['datanascimento'] ?></td>
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
                                       <td align="center">
                                         <button type="button" class="btn btn-info lg" data-toggle="modal" data-target="#modelalterarusuario">
                                          Alterar
                                         </button>
                                         <!-- <a href="alterar_usuario.php?id=<?=$usuarioalt['idusuario']?>"><i class="fa fa-edit fa-fw"></i> </a> -->
                                       </td>
                                    </tr>
                                 </tbody>
                                 <?php
                                    }
                                    ?>
                              </table>
                           </div>
                           <!-- Modal Inserir usuário-->
                            <div class="modal fade" id="modalInserirUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Cadastrar usuário</h4>
                                  </div>
                                  <div class="modal-body">
                                    <form role="form" action="/pagina/usuarios/valida_usuario.php" method="post">
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
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Salvar</button>
                                    <button type="reset" class="btn btn-info">Cancelar</button>
                                  </div>
                                </form>
                                </div>
                              </div>
                            </div>
                            <!-- Modal Alterar usuário-->
                            <div class="modal fade" id="modelalterarusuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Alterar usuário</h4>
                                  </div>
                                  <div class="modal-body">
                                    <form role="form" action="/pagina/usuarios/valida_alteracao_usuario.php" method="post">
                                      <?php
                                         $id = $usuario['idusuario'];
                                         $usuarioalt = buscaUsuarios($conexao, $id);
                                         $ativo = $usuarioalt['flaginativo'] ? "checked = 'checked'" : "";
                                      ?>
                                       <div class="form-group">
                                             <input type="hidden" name="id" value="<?=$usuarioalt['idusuario']?>">
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
                                          <div class="form-group">
                                             <label>Usuário</label>
                                             <input class="form-control" type="text" name="usuario" value="<?=$usuarioalt['usuario']?>" required >
                                          </div>
                                          <div class="form-group">
                                             <label>Senha</label>
                                             <input class="form-control" type="password" name="senha" value="" required>
                                          </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="submit" class="btn btn-success" name="alterar">Alterar</button>
                                          <button  href="cad_usuarios.php"  class="btn btn-info">Cancelar</button>
                                        </div>
                                   </form>
                                </div>
                              </div>
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
            <script>
               $(document).ready(function() {
                   $('#tabela_usuario').DataTable({
                           "paging":   false,
                           "ordering": false,
                           "info":     false,
                           responsive: true,
                           //"scrollY":        "200px",
                           "scrollCollapse": true
                   });
               });
            </script>
<?php require_once("rodape.php") ?>
