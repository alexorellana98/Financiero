<!--Preloader-->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!--/Preloader-->
    <div class="wrapper theme-1-active box-layout pimary-color-red">
        <!-- Top Menu Items -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="mobile-only-brand pull-left">
				<div class="nav-header pull-left">
					<div class="logo-wrap">
							<img class="brand-img" src="../../img/logito.png" width="35" height="35"/>
							<span class="brand-text">Financiero</span>
					</div>
				</div>	
				<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
				<a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a>
				<a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>
			</div>
			<div id="mobile_only_nav" class="mobile-only-nav pull-right">
				<ul class="nav navbar-right top-nav pull-right">
					<li class="dropdown alert-drp">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="zmdi zmdi-notifications top-nav-icon"></i><span class="top-nav-icon-badge">5</span></a>
						<ul  class="dropdown-menu alert-dropdown" data-dropdown-in="bounceIn" data-dropdown-out="bounceOut">
							<li>
								<div class="notification-box-head-wrap">
									<span class="notification-box-head pull-left inline-block">Notificaciones</span>
									<a class="txt-danger pull-right clear-notifications inline-block" href="javascript:void(0)"> Limpiar Todo </a>
									<div class="clearfix"></div>
									<hr class="light-grey-hr ma-0"/>
								</div>
							</li>
							<li>
								<div class="streamline message-nicescroll-bar">
								</div>
							</li>
							<li>
								<div class="notification-box-bottom-wrap">
									<hr class="light-grey-hr ma-0"/>
									<a class="block text-center read-all" href="javascript:void(0)"> Leer Todo</a>
									<div class="clearfix"></div>
								</div>
							</li>
						</ul>
					</li>
					<li class="dropdown auth-drp">
						<a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="../Plantilla/dist/img/user1.png" alt="user_auth" class="user-auth-img img-circle"/><span class="user-online-status"></span></a>
						<ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
							<li>
								<a href="profile.html"><i class="zmdi zmdi-account"></i><span>Perfil</span></a>
							</li>
							
							<li>
								<a href="#"><i class="zmdi zmdi-settings"></i><span>Configuración</span></a>
							</li>
							<li class="divider"></li>
							
							<li class="divider"></li>
							<li>
								<a href="#"><i class="zmdi zmdi-power"></i><span>Cerrar Sesión</span></a>
							</li>
						</ul>
					</li>
				</ul>
			</div>	
		</nav>
		<!-- /Top Menu Items -->
		
		<!-- Left Sidebar Menu -->
		<div class="fixed-sidebar-left">
			<ul class="nav navbar-nav side-nav nicescroll-bar">
				<li class="navigation-header">
					<span>Menu Principal</span> 
					<i class="zmdi zmdi-more"></i>
				</li>
                
                <li>
					<a href="../ActivoFijo/institucion.php"><div class="pull-left"><i class="fa fa-institution"></i><span class="right-nav-text"> Institución </span></div><div class="pull-right"></div><div class="clearfix"></div></a>
				</li>
				
				
				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#app_dr"><div class="pull-left"><i class="fa fa-gear"></i><span class="right-nav-text">  Activo Fijo </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="app_dr" class="collapse collapse-level-1">
						<li>
							<a  href="../ActivoFijo/gestionRegistros.php">Gestión de Registros</a>
						</li>
						<li>
							<a href="../ActivoFijo/Comprar.php">Adquisición Activo Fijo</a>
						</li>
						<li>
							<a  href="../ActivoFijo/administrarActivo.php">Administrar Activo Fijo</a>
						</li>
						<li>
							<a  href="../ActivoFijo/buscarActivo.php">Buscar Activo Fijo</a>
						</li>
					</ul>
				</li>
				
				<li>
					<a  href="javascript:void(0);" data-toggle="collapse" data-target="#form_dr"><div class="pull-left"><i class="fa  fa-dollar"></i><span class="right-nav-text">Cuentas Por Cobrar</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="form_dr" class="collapse collapse-level-1 two-col-list">
						<li>
							<a  href="../CuentasC/creditos.php">Tipo Creditos</a>
						</li>
						<li>
							<a  href="../CuentasC/RegistroCliente.php">Clientes</a>
						</li>
					</ul>
				</li>

				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#chart_dr"><div class="pull-left"><i class="fa fa-file-text-o"></i><span class="right-nav-text">  Reportes </span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="chart_dr" class="collapse collapse-level-1 two-col-list">
						<li>
							<a  href="../ActivoFijo/ReporteActivo.php">Activos</a>
						</li>
						<li>
							<a  href="../ActivoFijo/ReporteActivoInactivo.php">Activos Inactivos</a>
						</li>
						<li>
							<a href="../ActivoFijo/ReporteProveedores.php">Proveedores</a>
						</li>
						<li>
							<a href="../ActivoFijo/ReporteProveedoresInac.php">Proveedores Inactivos</a>
						</li>
						<li>
							<a href="../ActivoFijo/ReporteVentas.php">Ventas</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
		<!-- /Left Sidebar Menu -->
		
		