<div id="main-navbar" class="navbar navbar-inverse" role="navigation">
    <!-- Main menu toggle -->
    <button type="button" id="main-menu-toggle"><i class="navbar-icon fa fa-bars icon"></i><span class="hide-menu-text">HIDE MENU</span></button>
    <div class="navbar-inner">
        <!-- Main navbar header -->
        <div class="navbar-header">
            <!-- Logo -->
            <a href="<?php echo $basehttp ?>/presupuestos/" class="navbar-brand"><div><img alt="Pixel Admin" src="<?php echo $basehttp ?>/assets/images/pixel-admin/main-navbar-logo.png"></div>Presupuestos</a>
            <!-- Main navbar toggle -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar-collapse"><i class="navbar-icon fa fa-bars"></i></button>
        </div> <!-- / .navbar-header -->
        <div id="main-navbar-collapse" class="collapse navbar-collapse main-navbar-collapse">
            <div>
                <ul class="nav navbar-nav">
                    <li><a href="nuevo">ELABORAR PRESUPUESTO</a></li>
                    <li><a href="listado">LISTADO DE PRESUPUESTOS</a></li>
                    <li><a href="configuracion">CONFIGURACION</a></li>
                    <li><a href="tareas">TAREAS PROGRAMADAS</a></li>
                    <li><a href="cron">CRON</a></li>
                    <li><a href="desconectar">DESCONECTAR</a></li>
                </ul> <!-- / .navbar-nav -->
				<ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo $basehttp ?>">VISTA GENERAL</a></li>
                </ul>
            </div>
        </div> <!-- / #main-navbar-collapse -->
    </div> <!-- / .navbar-inner -->
</div> <!-- / #main-navbar -->
<!-- /2. $END_MAIN_NAVIGATION -->