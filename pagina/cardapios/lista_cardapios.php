<?php include($_SERVER['DOCUMENT_ROOT']."/cabecalho.php");
      include("funcoes_cardapios.php");
 ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Lista de Cardápios</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                            <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                             <table class="table table-striped table-bordered table-hover" id="tabela_cardapios" width="100%" cellspacing="0">
                                 <thead>
                                    <tr>
                                       <th>#</th>
                                       <th>Nome</th>
                                       <th>Dia Semana</th>
                                       <th>cardapio</th>
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
                                       <td><a href="alterar_cardapio.php?id=<?=$cardapio['idcardapio']?>">Alterar</a></td>
                                    </tr>
                                 </tbody>
                                 <?php
                                    }
                                    ?>
                              </table>
                            </div>
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
    <script>
  /* Formatting function for row details - modify as you need */
    function format ( d ) {
        // `d` is the original data object for the row
        return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
            '<tr>'+
                '<td>Ingredientes:</td>'+
                '<td>colocar ingredientes</td>'+
            '</tr>'+
            '<tr>'+
                '<td>Extension number:</td>'+
                '<td>outro</td>'+
            '</tr>'+
            // '<tr>'+
            //     '<td>Extra info:</td>'+
            //     '<td>And any further details here (images etc)...</td>'+
            // '</tr>'+
        '</table>';
    }

    $(document).ready(function() {
        var table = $('#tabela_cardapios').DataTable( {
          "sDom": '<"top"i>rt<"bottom"lp><"clear">',
              "paging":   false,
              "ordering": false,
              "info":     false,
              responsive: true
        } );

        // Add event listener for opening and closing details
        $('#tabela_cardapios tbody').on('click', 'td', function () {
            var tr = $(this).closest('tr');
            var row = table.row( tr );
            console.log(row);
            if ( row.child.isShown() ) {
                // This row is already open - close it
                console.log('IF ');
                row.child.hide();
                tr.removeClass('shown');
            }
            else {
                // Open this row
                console.log('ELSE');
                row.child( format(row.data()) ).show();
                tr.addClass('shown');
            }
        } );
    } );

    </script>
<?php include($_SERVER['DOCUMENT_ROOT']."/rodape.php") ?>
