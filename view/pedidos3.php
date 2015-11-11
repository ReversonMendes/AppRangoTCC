<?php 
  require_once("cabecalho.php"); 
  require_once("menu.php");
  require_once($_SERVER['DOCUMENT_ROOT']."/controller/conecta.php");
  require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_pedidos.php");
  require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_login.php");
?>
<div id="page-wrapper">
    <div class="row">
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-18">
            <div class="panel panel-default">
                <div class="panel-heading">
                   Pedidos
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css">
					        <table id="example" class="display" width="100%">     
                  </table>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    </div>
    <!-- /.panel-body -->
</div>
<!-- /.panel -->
</div>
    <!-- /.col-lg-6 -->
</div>
<!-- /.row -->
</div>

<script type="text/javascript">
var dataSet = [
<?php
  $usuario  = buscaIdUsuario($conexao, usuarioLogado());
  $pedidos = listaPedidos($conexao,$usuario["idempresa"]);
 
  foreach ($pedidos as $pedido) {
  	echo '["'.$pedido["idpedido"].'", "'.$pedido["nomecliente"].'", "'.$pedido["nomeprato"].'", "'.$pedido["quantidade"].'", "'.$pedido["observacao"].'", "'.$pedido["cidade"].'", "'.$pedido["descrpagamento"].'", "'.$pedido["status"].'"],';
  }
?>

];

$(document).ready(function() {
    $('#example').DataTable( {
                "oTableTools": {
            "sSwfPath": "../../js/DataTables-1.9.4/extras/TableTools/media/swf/copy_csv_xls_pdf.swf",
            "aButtons": [
                {
                    "sExtends": "xls",
                    "sButtonText": "Exportar para Excel",
                    "sTitle": "Usuarios",
                    "mColumns": [0, 1, 2, 3]
                },
                {
                    "sExtends": "pdf",
                    "sButtonText": "Exportar para PDF",
                    "sTitle": "Usuarios",
                    "sPdfOrientation": "landscape",
                    "mColumns": [0, 1, 2, 3]
                }
            ]
        },
        "oLanguage": {
            "sLengthMenu": "Mostrar _MENU_ registros por página",
            "sZeroRecords": "Nenhum registro encontrado",
            "sInfo": "Mostrando _START_ / _END_ de _TOTAL_ registro(s)",
            "sInfoEmpty": "Mostrando 0 / 0 de 0 registros",
            "sInfoFiltered": "(filtrado de _MAX_ registros)",
            "sSearch": "Pesquisar: ",
            "oPaginate": {
                "sFirst": "Início",
                "sPrevious": "Anterior",
                "sNext": "Próximo",
                "sLast": "Último"
            }
        },
        data: dataSet,
        columns: [
            { title: "#" },
            { title: "Nome Cliente" },
            { title: "Cardápio" },
            { title: "Quantidade" },
            { title: "Observação" },
            { title: "Endereço" },
            { title: "Forma de Pagamento" },
            { title: "Status" }

        ],
        "aoColumnDefs": [
            {"sType": "num-html", "aTargets": [0]}

        ]
    } );
} );

</script>

<!-- jQuery -->
<script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.10/js/dataTables.bootstrap.min.js"></script>
