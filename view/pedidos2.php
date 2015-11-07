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


					<br>
					<br>
					<br>
					<br>
					

                	<table id="example2" cellspacing="0" width="100%">
                       <thead>
                          <tr>
                             <th>&nbsp;</th>
                             <th>Idpedido</th>
                             <th>Nome Cliente</th>
                             <th>Cardápio</th>
                             <th>Quantidade</th>
                             <th>Observação</th>
                             <th>Endereço</th>
                             <th>Forma de Pagamento</th>
                             <th>Status</th>
                             <th>Alterar</th>
                             <th>Excluir</th>
                          </tr>
                       </thead>

                       <?php
                          $usuario  = buscaIdUsuario($conexao, usuarioLogado());
                          $pedidos = listaPedidos($conexao,$usuario["idempresa"]);
                          if(count($pedidos) > 0)       {
                          foreach ($pedidos as $pedido) {
                          ?>
                       <tbody>
                          <tr>
                             <td><input type="checkbox" value="<?=$key?>" name="marcar[]" /></td>
                             <td><?= $pedido['idpedido'] ?></td>
                             <td><?= $pedido['nomecliente'] ?></td>
                             <td><?= $pedido['nomeprato'] ?></td>
                             <td><?= $pedido['quantidade'] ?></td>
                             <td><?= $pedido['observacao'] ?></td>
                             <td><?= $pedido['cidade'] ?>, Bairro: <?= $pedido['bairro'] ?>, Rua:<?= $pedido['rua'] ?>, <?= $pedido['numero'] ?>, <?= $pedido['complemento'] ?> </td>
                             <td><?= $pedido['descrpagamento'] ?></td>
                             <td><?= $pedido['status'] ?></td>
                             <td align="center">
                                <a class="btn btn-info btn-sm" id="btnAlterarpedido" data-toggle="modal" data-target="#modalAlterarpedido" data-whatever="<?= $pedido['idpedido'] ?>">
                                    <i class="fa fa-pencil"></i>
                                </a>
                             </td>
                             <td align="center">
                                  <form action="../model/excluir_pedidos.php" method="post">
                                    <input type="hidden" name="id" value="<?= $pedido['idpedido'] ?>">
                                      <button type="submit" class="btn btn-danger btn-sm" id="excluir">
                                          <i class="fa fa-minus"></i>
                                       </button>
                                  </form>
                             </td>
                          </tr>
                       </tbody>
                       <?php
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
    [ "Tiger Nixon", "System Architect", "Edinburgh", "5421", "2011/04/25", "$320,800" ],
    [ "Garrett Winters", "Accountant", "Tokyo", "8422", "2011/07/25", "$170,750" ],
    [ "Ashton Cox", "Junior Technical Author", "San Francisco", "1562", "2009/01/12", "$86,000" ],
    [ "Cedric Kelly", "Senior Javascript Developer", "Edinburgh", "6224", "2012/03/29", "$433,060" ],
    [ "Airi Satou", "Accountant", "Tokyo", "5407", "2008/11/28", "$162,700" ],
    [ "Brielle Williamson", "Integration Specialist", "New York", "4804", "2012/12/02", "$372,000" ],
    [ "Herrod Chandler", "Sales Assistant", "San Francisco", "9608", "2012/08/06", "$137,500" ],
    [ "Rhona Davidson", "Integration Specialist", "Tokyo", "6200", "2010/10/14", "$327,900" ],
    [ "Colleen Hurst", "Javascript Developer", "San Francisco", "2360", "2009/09/15", "$205,500" ],
    [ "Sonya Frost", "Software Engineer", "Edinburgh", "1667", "2008/12/13", "$103,600" ],
    [ "Jena Gaines", "Office Manager", "London", "3814", "2008/12/19", "$90,560" ],
    [ "Quinn Flynn", "Support Lead", "Edinburgh", "9497", "2013/03/03", "$342,000" ],
    [ "Charde Marshall", "Regional Director", "San Francisco", "6741", "2008/10/16", "$470,600" ],
    [ "Haley Kennedy", "Senior Marketing Designer", "London", "3597", "2012/12/18", "$313,500" ],
    [ "Tatyana Fitzpatrick", "Regional Director", "London", "1965", "2010/03/17", "$385,750" ],
    [ "Michael Silva", "Marketing Designer", "London", "1581", "2012/11/27", "$198,500" ],
    [ "Paul Byrd", "Chief Financial Officer (CFO)", "New York", "3059", "2010/06/09", "$725,000" ],
    [ "Gloria Little", "Systems Administrator", "New York", "1721", "2009/04/10", "$237,500" ],
    [ "Bradley Greer", "Software Engineer", "London", "2558", "2012/10/13", "$132,000" ],
    [ "Dai Rios", "Personnel Lead", "Edinburgh", "2290", "2012/09/26", "$217,500" ],
    [ "Jenette Caldwell", "Development Lead", "New York", "1937", "2011/09/03", "$345,000" ],
    [ "Yuri Berry", "Chief Marketing Officer (CMO)", "New York", "6154", "2009/06/25", "$675,000" ],
    [ "Caesar Vance", "Pre-Sales Support", "New York", "8330", "2011/12/12", "$106,450" ],
    [ "Doris Wilder", "Sales Assistant", "Sidney", "3023", "2010/09/20", "$85,600" ],
    [ "Angelica Ramos", "Chief Executive Officer (CEO)", "London", "5797", "2009/10/09", "$1,200,000" ],
    [ "Gavin Joyce", "Developer", "Edinburgh", "8822", "2010/12/22", "$92,575" ],
    [ "Jennifer Chang", "Regional Director", "Singapore", "9239", "2010/11/14", "$357,650" ],
    [ "Brenden Wagner", "Software Engineer", "San Francisco", "1314", "2011/06/07", "$206,850" ],
    [ "Fiona Green", "Chief Operating Officer (COO)", "San Francisco", "2947", "2010/03/11", "$850,000" ],
    [ "Shou Itou", "Regional Marketing", "Tokyo", "8899", "2011/08/14", "$163,000" ],
    [ "Michelle House", "Integration Specialist", "Sidney", "2769", "2011/06/02", "$95,400" ],
    [ "Suki Burks", "Developer", "London", "6832", "2009/10/22", "$114,500" ],
    [ "Prescott Bartlett", "Technical Author", "London", "3606", "2011/05/07", "$145,000" ],
    [ "Gavin Cortez", "Team Leader", "San Francisco", "2860", "2008/10/26", "$235,500" ],
    [ "Martena Mccray", "Post-Sales support", "Edinburgh", "8240", "2011/03/09", "$324,050" ],
    [ "Unity Butler", "Marketing Designer", "San Francisco", "5384", "2009/12/09", "$85,675" ]
];
 
$(document).ready(function() {
    $('#example').DataTable( {
        data: dataSet,
        columns: [
            { title: "Name" },
            { title: "Position" },
            { title: "Office" },
            { title: "Extn." },
            { title: "Start date" },
            { title: "Salary" }
        ]
    } );
} );
</script>

<!-- jQuery -->
<script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>