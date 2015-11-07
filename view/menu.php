<!-- Navigation -->
<?php require_once($_SERVER['DOCUMENT_ROOT']."/controller/funcoes_login.php"); 
?>
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand"> MarmitApp </a>
    </div>

    <ul class="nav navbar-top-links navbar-right">
        <li>
            <a href="perfil.php" data-toggle="tooltip" data-placement="bottom" title="Perfil do Usuário"><i class="fa fa-user fa-fw"></i> <?= usuarioLogado() ?></a>
        </li>
        <li>
            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Configuração"><i class="fa fa-gear fa-fw"></i></a>
        </li>
        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
        </li>
    </ul>

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="painel.php"><i class="fa fa-dashboard fa-fw"></i> Home</a>
                </li>
                <li>
                    <a href="pedidos2.php"><i class="fa fa-list fa-fw"></i> Pedidos</a>
                </li>
                <li>
                    <a href="cardapios.php"><i class="fa fa-table fa-fw"></i> Cardápios</a>
                </li>
                <li>
                    <a href="entregas.php"><i class="fa fa-truck fa-fw"></i> Entregas</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
