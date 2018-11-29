<header>
	<div id="main-navigation" >
		<nav id="nav" style="top:0">
			<ul>
				<li><a href="{{ asset('images/logos/logo.png') }}"><img src="{{ asset('images/logos/logo.png') }}" alt="Ferretería de calidad en maracay" width="90px"></a></li>
				
				@if($current == 'dash')
				<li class="current">
				@else
				<li >
				@endif
					<a href="{{ asset('intranet/dashboard') }}" title="Ferretería de calidad en maracay">Inicio</a>
				</li>
				@if($current == 'table')
				<li class="current">
				@else
				<li>
				@endif
					@if (Auth::user()->level != 'CLI')
					<a href="#" title="Tablas">Tablas<span class="caret"></span></a>
					<ul>
						<li><a href="{{ asset('intranet/productos') }}">Productos</a></li>
						<li><a href="{{ asset('intranet/categorias') }}">Categorías</a></li>
						<li><a href="{{ asset('intranet/estado') }}">Estado de pedido</a></li>
					</ul>
					@endif
				</li>
				@if($current == 'process')
				<li class="current">
				@else
				<li >
				@endif
					<a href="#" title="Procesos">Procesos
						<span class="caret"></span>
					</a>
					<ul>
						<li><a href="{{ asset('intranet/pedidos') }}">Pedido</a></li>
						@if (Auth::user()->level != 'CLI')
						<li><a href="{{ asset('intranet/requisicion') }}">Requisición</a></li>
						<li><a href="{{ asset('intranet/orden') }}">Orden de compra</a></li>
						<li><a href="{{ asset('intranet/recepcion') }}">Recepción</a></li>
						@endif
					</ul>
				</li>
				@if($current == 'list')
				<li class="current">
				@else
				<li>
				@endif
					<a href="#" title="Listados">Listados<span class="caret"></span></a>
					<ul>
						<li><a href="{{ asset('intranet/pedidos-all') }}">Pedidos</a></li>
						@if (Auth::user()->level != 'CLI')
						<li><a href="{{ asset('intranet/requisicion-all') }}">Requiscion</a></li>
						<li><a href="{{ asset('intranet/usuarios') }}">Usuarios</a></li>
						@endif
					</ul>
				</li>
				@if (Auth::user()->level == 'ADM')
					@if($current == 'mant')
					<li class="current">
					@else
					<li>
					@endif
					<a href="#" title="Mantenimiento">Mantenimiento<span class="caret"></span></a>
					<ul>
						<li><a href="{{ asset('intranet/auditoria') }}">Auditoría de sistema</a></li>
						<li><a href="{{ asset('intranet/respaldar') }}">Respaldar datos</a></li>
						<li><a href="{{ asset('intranet/restaurar') }}">Restaurar un punto</a></li>
						<li><a href="{{ asset('intranet/usuarios') }}">Usuarios</a></li>
					</ul>
				</li>
				@endif

				<li><a href="{{ asset('intranet/manual') }}" title="Manual de Ayuda al Usuario">Ayuda</a></li>
				@if($current == 'yo')
				<li class="current">
				@else
				<li>
				@endif
					<a href="#" title="Mi perfil">YO<span class="caret"></span></a>
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