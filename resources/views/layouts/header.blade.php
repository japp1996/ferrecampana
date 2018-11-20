<header>
	<div id="main-navigation" >
		<nav id="nav" style="top:0">
			<ul>
				<li><a href="{{ asset('images/logos/logo.png') }}"><img src="{{ asset('images/logos/logo.png') }}" alt="Ferretería de calidad en maracay" width="90px"></a></li>
				<li class="current"><a href="{{ asset('intranet/dashboard') }}" title="Ferretería de calidad en maracay">Inicio</a></li>
				<li>
					<a href="#" title="Tablas">Tablas<span class="caret"></span></a>
					<ul>
						<li><a href="{{ asset('intranet/productos') }}">Productos</a></li>
						<li><a href="{{ asset('intranet/categorias') }}">Categorías</a></li>
						<li><a href="{{ asset('intranet/estado') }}">Estado de pedido</a></li>
					</ul>
				</li>
				<li >
					<a href="#" title="Procesos">Procesos
						<span class="caret"></span>
					</a>
					<ul>
						<li><a href="{{ asset('intranet/orden') }}">Orden de compra</a></li>
						<li><a href="{{ asset('intranet/pedidos') }}">Pedido</a></li>
						<li><a href="{{ asset('intranet/requisicion') }}">Requisición</a></li>
						<li><a href="{{ asset('intranet/recepcion') }}">Recepción</a></li>
					</ul>
				</li>
				<li>
					<a href="#" title="Listados">Listados<span class="caret"></span></a>
					<ul>
						<li><a href="{{ asset('intranet/pedidos-all') }}">Pedidos</a></li>
						<li><a href="{{ asset('intranet/requisicion-all') }}">Requiscion</a></li>
						<li><a href="{{ asset('intranet/usuarios') }}">Usuarios</a></li>
					</ul>
				</li>
				<li>
					<a href="#" title="Mantenimiento">Mantenimiento<span class="caret"></span></a>
					<ul>
						<li><a href="{{ asset('intranet/dashboard') }}">Auditoría de sistema</a></li>
						<li><a href="{{ asset('intranet/respaldar') }}">Respaldar datos</a></li>
						<li><a href="{{ asset('intranet/restaurar') }}">Restaurar un punto</a></li>
						<li><a href="{{ asset('intranet/usuarios') }}">Usuarios</a></li>
					</ul>
				</li>
				<li><a href="{{ asset('intranet/manual') }}" title="Manual de Ayuda al Usuario">Ayuda</a></li>
				<li >
					<a href="#" title="Mi perfil">YO<span class="caret"></span></a>
					<ul>
						<li><a href="{{ asset('intranet/perfil') }}">Modificar datos</a></li>
						<li><a href="{{ asset('intranet/password') }}">Cambiar contraseña</a></li>
						<li><a href="{{ asset('intranet/delete_account') }}">Eliminar cuenta</a></li>
						<li><a href="{{ asset('logout') }}">Cerrar sesión</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
</header>