<?php 
    require_once("cabecalho.php");
    require_once("menu.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/controller/conecta.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_cardapios.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_pedidos.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_login.php");
    verificaUsuario() 
 ?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <?php mostraAlerta("Danger"); ?>
                    <?php mostraAlerta("Success"); ?>
                    <?php 
                        // Apresenta para selecionar o cardapio para publicar
                        $usuario  = buscaIdUsuario($conexao, usuarioLogado());
                        $publicado = ValidaPublicacao($conexao,$usuario["idempresa"]);
                        $pendentes = buscaPedidosPendente($conexao,$usuario["idempresa"]);
                        $entregas = buscaPedidosEntrega($conexao,$usuario["idempresa"]);
                        if ( $publicado['total'] <= 0) {
                        echo '<div id="danger-alert" class="alert alert-info alert-dismissable">
                        <h4 style="margin-bottom: 0px; font-size: 16px;"> 
                        <span style="line-height: 20px;">Seu cardápio ainda <b> não foi publicado.
                        <a href="#" onclick="publicar()">CLIQUE AQUI</a> </b> para publicá-lo.
                        </span> </h4> </div>';
                    } 
                    ?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <?php if( $publicado['total'] <= 0) { 
                                          echo '<i class="fa fa-lock fa-3x"></i>';
                                            }else{
                                           echo '<i class="fa fa-unlock fa-3x"></i>';
                                            }
                                    ?>
                                    
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                    <?php if( $publicado['total'] <= 0) { 
                                            echo "Fechado";
                                          }else{
                                                echo "Aberto";
                                          }
                                    ?>
                                    </div>
                                    <div>
                                    <?php if( $publicado['total'] <= 0) { 
                                        echo "Não Publicado";
                                        }else{
                                         echo $publicado['total']." Cardápio Publicado";
                                        }
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#" onclick="publicar()">
                            <div class="panel-footer">
                                <span class="pull-left">
                                    <?php if( $publicado['total'] <= 0) { 
                                        echo " Ver cardápio para publicar";
                                        }else{
                                            echo "Ver cardápio publicado!";
                                        }
                                    ?>
                                </span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo($pendentes['total']) ?></div>
                                    <div>Pedidos Pendentes!</div>
                                </div>
                            </div>
                        </div>
                        <a href="pedidos.php">
                            <div class="panel-footer">
                                <span class="pull-left">Ver pedidos</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo($entregas['total']) ?></div>
                                    <div>Pedidos em Entrega!</div>
                                </div>
                            </div>
                        </div>
                        <a href="pedidos.php">
                            <div class="panel-footer">
                                <span class="pull-left">Ver detalhes</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-close fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Fechar</div>
                                    <div>Não receber pedidos</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Não receber mais pedidos.</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
<!--             <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Area Chart Example
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#">Action</a>
                                        </li>
                                        <li><a href="#">Another action</a>
                                        </li>
                                        <li><a href="#">Something else here</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="morris-area-chart"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div> -->
                    <!-- /.panel -->

            <!-- Modal alterar Cardapio-->
              <div class="modal fade" id="modalPublicarCardapio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content ">
                    <div class="modal-header ">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Publicar Cardápio de Marmita do dia de Hoje</h4>
                    </div>
                    <div id="dadosCardapio" class="modal-body">
                    </div>
                  </div>
                </div>
              </div>

 <script type="text/javascript">
 function publicar(){
      $('#modalPublicarCardapio').on('show.bs.modal', function (event) {
           $.post('../model/lista_cardapio_publicar.php', {acao:'publicar'}, function(retorno){
               $("#dadosCardapio").html(retorno);
           });
        }); 
      $('#modalPublicarCardapio').modal('show')
    };
// $(function() {
//     Morris.Area({
//         element: 'morris-area-chart',
//         data: [{
//             period: '2010 Q1',
//             iphone: 2666,
//             ipad: null,
//             itouch: 2647
//         }, {
//             period: '2010 Q2',
//             iphone: 2778,
//             ipad: 2294,
//             itouch: 2441
//         }, {
//             period: '2010 Q3',
//             iphone: 4912,
//             ipad: 1969,
//             itouch: 2501
//         }, {
//             period: '2010 Q4',
//             iphone: 3767,
//             ipad: 3597,
//             itouch: 5689
//         }, {
//             period: '2011 Q1',
//             iphone: 6810,
//             ipad: 1914,
//             itouch: 2293
//         }, {
//             period: '2011 Q2',
//             iphone: 5670,
//             ipad: 4293,
//             itouch: 1881
//         }, {
//             period: '2011 Q3',
//             iphone: 4820,
//             ipad: 3795,
//             itouch: 1588
//         }, {
//             period: '2011 Q4',
//             iphone: 15073,
//             ipad: 5967,
//             itouch: 5175
//         }, {
//             period: '2012 Q1',
//             iphone: 10687,
//             ipad: 4460,
//             itouch: 2028
//         }, {
//             period: '2012 Q2',
//             iphone: 8432,
//             ipad: 5713,
//             itouch: 1791
//         }],
//         xkey: 'period',
//         ykeys: ['iphone', 'ipad', 'itouch'],
//         labels: ['iPhone', 'iPad', 'iPod Touch'],
//         pointSize: 2,
//         hideHover: 'auto',
//         resize: true
//     });
//});
</script>

<?php require_once("rodape.php") ?>
