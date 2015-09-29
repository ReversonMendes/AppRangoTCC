<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php"> MarmitApp </a>
    </div>
    <!-- /.navbar-header -->
    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="perfil.php"><i class="fa fa-user fa-fw"></i> Perfil do Usuário</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Configuração</a>
                </li>
                <li class="divider"></li>
                <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="painel.php"><i class="fa fa-dashboard fa-fw"></i> Home</a>
                </li>
                <li>
                    <a href="pedidos.php"><i class="fa fa-list fa-fw"></i> Pedidos</a>
                </li>
                <li>
                    <a href="cardapios.php"><i class="fa fa-table fa-fw"></i> Cardápios</a>
                </li>
                <li>
                    <a href="entregas.php"><i class="fa fa-truck fa-fw"></i> Entregas</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-edit fa-fw"></i>Cadastros<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="cardapios.php"> Cardápios</a>
                        </li>
                        <li>
                            <a href="empresa.php"> Empresa</a>
                        </li>
                        <li>
                            <a href="usuarios.php"> Usuário</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
