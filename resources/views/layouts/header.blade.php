<header>
	<div id="main-navigation" >
		<nav id="nav" style="top:0">
			<ul>
				<li><a href="{{ asset('intranet/') }}"><img src="{{ asset('images/logos/logo.png') }}" alt="Ferretería de calidad en maracay" width="90px"></a></li>
			
				<li >
					<a href="{{ asset('intranet/dashboard') }}" title="Ferretería de calidad en maracay">Inicio</a>
				</li>
				
				@if (Auth::user()->level == 'ADM')
					<li>
					<a href="#" title="Mantenimiento">Mantenimiento<span class="caret"></span></a>
					<ul>
						<li><a href="{{ asset('intranet/categorias') }}">Categorías</a></li>
						<li><a href="{{ asset('intranet/estado') }}">Estados de pedidos</a></li>
						<li><a href="{{ asset('intranet/auditoria') }}">Auditoría de sistema</a></li>
						<li><a href="{{ asset('intranet/respaldar') }}">Respaldar datos</a></li>
						<!--li><a href="{{ asset('intranet/restaurar') }}">Restaurar un punto</a></li-->
						<li><a href="{{ asset('intranet/usuarios') }}">Usuarios</a></li>
					</ul>
				</li>
				@endif
				<li>
					<a href="#" title="Compras">Compras <span class="caret"></span></a>
					<ul>
						<li><a href="{{ asset('intranet/proveedores') }}">Proveedores</a></li>
						<li><a href="{{ asset('intranet/orden') }}">Orden de compra</a></li>
						<li><a href="{{ asset('intranet/requisicion') }}">Requisición</a></li>
					</ul>
				</li>

				<li>
					<a href="#">Inventario <span class="caret"></span></a>
					<ul>
						<li><a href="{{ asset('intranet/productos') }}">Productos</a></li>
						<li><a href="{{ asset('intranet/recepcion') }}">Recepción</a></li>
						<li><a href="{{ asset('') }}"> Ajuste de Inventario </a></li>
						<li><a href="{{ asset('') }}"> Reporte Ajuste de Inventario</a></li>
						<li><a href="{{ asset('') }}"> Reporte de Inventario</a></li>
					</ul>
				</li>

				<li>
					@if (Auth::user()->level != 'CLI')
					<a href="#" title="Clientes">Clientes<span class="caret"></span></a>
					<ul>
						<li><a href="{{ asset('intranet/clientes') }}"> Clientes</a></li>
					</ul>
					@endif
				</li>

				<li >
					<a href="#" title="Procesos">Ventas
						<span class="caret"></span>
					</a>
					<ul>
						<li><a href="{{ asset('intranet/pedidos') }}">Pedido</a></li>
						@if (Auth::user()->level != 'CLI')
						
						@endif
					</ul>
				</li>

				<li>
					<a href="#" title="Listados">Listados<span class="caret"></span></a>
					<ul>
						<li><a href="{{ asset('intranet/pedidos-all') }}">Pedidos</a></li>
						@if (Auth::user()->level != 'CLI')
						<li><a href="{{ asset('intranet/requisicion-all') }}">Requiscion</a></li>
						<li><a href="{{ asset('intranet/usuarios') }}">Usuarios</a></li>
						@endif
					</ul>
				</li>

				<!--li><a href="" target="_blank" title="Manual de Ayuda al Usuario">Ayuda</a></li-->
				<li>
					<a href="#" title="Mi perfil">{{ Auth::user()->name}}<span class="caret"></span></a>
					<ul>
						<li><a href="{{ asset('intranet/perfil') }}">Modificar datos</a></li>
						<li><a href="{{ asset('intranet/password') }}">Cambiar contraseña</a></li>
						<li><a href="{{ asset('logout') }}">Cerrar sesión</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
</header>