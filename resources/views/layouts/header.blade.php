<header>
	<div id="main-navigation" >
		<nav id="nav" style="top:0">
			<ul>
				<li><a href="{{ asset('images/logos/logo.png') }}"><img src="{{ asset('images/logos/logo.png') }}" alt="ferretería de calidad en maracay" width="90px"></a></li>
				<li class="current"><a href="{{ asset('intranet/dashboard') }}" title="ferretería de calidad en maracay">Inicio</a></li>
				<li>
					<a href="#" title="herretería de calidad">Tablas<span class="caret"></span></a>
					<ul>
						<li><a href="{{ asset('intranet/productos') }}">Productos</a></li>
						<li><a href="{{ asset('intranet/categorias') }}">Categorías</a></li>
						<li><a href="{{ asset('intranet/estado') }}">Estado de pedido</a></li>
					</ul>
				</li>
				<li >
					<a href="#" title="herramientas de trabajo">Procesos
						<span class="caret"></span>
					</a>
					<ul>
						<li><a href="">Orden de compra</a></li>
						<li><a href="{{ asset('intranet/pedidos') }}">Pedido</a></li>
						<li><a href="{{ asset('intranet/requisicion') }}">Requisición</a></li>
						<li><a href="{{ asset('intranet/recepcion') }}">Recepción</a></li>
						<li><a href="{{ asset('intranet/facturacion') }}">Facturación</a></li>
					</ul>

				</li>
				<li>
					<a href="#" title="registro ferretería la campana">Listados<span class="caret"></span></a>
					<ul>
						<li><a href="{{ asset('intranet/pedidos') }}">Pedidos</a></li>
						<li><a href="{{ asset('intranet/usuarios') }}">Usuarios</a></li>
					</ul>
				</li>
				<li>
					<a href="#" title="proveedor de ferreterías y bricolaje">Mantenimiento<span class="caret"></span></a>
					<ul>
						<li><a href="{{ asset('intranet/dashboard') }}">Auditoría de sistema</a></li>
						<li><a href="{{ asset('intranet/respaldar') }}">Respaldar datos</a></li>
						<li><a href="{{ asset('intranet/restaurar') }}">Restaurar un punto</a></li>
						<li><a href="{{ asset('intranet/usuarios') }}">Usuarios</a></li>
					</ul>
				</li>
				<li><a href="{{ asset('intranet/manual') }}" title="Manual de Ayuda al Usuario">Ayuda</a></li>
				<li >
					<a href="#" title="contactar con ferreterías">YO<span class="caret"></span></a>
					<ul>
						<li><a href="{{ asset('intranet/perfil') }}">Modificar datos</a></li>
						<li><a href="{{ asset('intranet/password') }}">Cambiar contraseña</a></li>
						<li><a href="{{ asset('intranet/delete_account') }}">Eliminar cuenta</a></li>
						<li><a href="{{ asset('intranet/logout') }}">Cerrar sesión</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
</header>