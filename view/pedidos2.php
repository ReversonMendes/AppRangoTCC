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
					<table id="example" class="display" width="100%"></table>
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
      if(count($pedidos) > 0)       {
      foreach ($pedidos as $pedido) {
      
      	echo '["'.$pedido["idpedido"].'", "'.$pedido["nomecliente"].'", "'.$pedido["nomeprato"].'", "'.$pedido["quantidade"].'", "'.$pedido["observacao"].'", "'.$pedido["cidade"].'", "'.$pedido["descrpagamento"].'", "'.$pedido["status"].'"],'.

      }
    }else{ echo"
      <tbody>
        <tr>
          <p>Nenhum pedido foi realizado hoje.</p>
        <tr>
      </tbody>
    ";
       }
    ?>
];
 
$(document).ready(function() {
    $('#example').DataTable( {
        data: dataSet,
        columns: [
            { title: "Idpedido" },
            { title: "Nome Cliente" },
            { title: "Cardápio" },
            { title: "Quantidade" },
            { title: "Observação" }
            { title: "Endereço" }
            { title: "Forma de Pagamento" }
            { title: "Status" }
        ]
    } );
} );
</script>

<!-- jQuery -->
<script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>