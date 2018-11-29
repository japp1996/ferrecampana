<?php
	use Auth;

	//PUBLIC
	Route::resource('/', 'HomeController');
	
	//Quienes Somos
	Route::get('/who', 'HomeController@who');
	//Productos
	Route::get('/products', 'HomeController@products');
	//Registro
	Route::get('/usuario', 'UsuarioController@index');
	Route::post('/usuario', 'UsuarioController@store');
	//Contáctanos
	Route::get('/contact', 'HomeController@contact');
	//Login
	Route::get('/login', 'HomeController@login');
	Route::post('/login', 'Auth\LoginController@login');
	Route::get('/logout', 'Auth\LoginController@logout');

	//Olvido contraseña
	Route::get('forgot/password', 'HomeController@forgotPassword');
	//Route::get('/', function (){return view('welcome')});
	
	//INTRANET

	Route::group(['prefix' => 'intranet', 'namespace' => 'Admin', 'middleware' => 'guest'], function(){
		//Inicio
		Route::get('dashboard', 'DashboardController@index');
		//Productos
		Route::resource('productos', 'ProductoController');
		Route::get('productos-all','ProductoController@get');
		Route::get('productos-excel', 'ProductoController@excel');
		//Categorias
		Route::resource('categorias', 'CategoriaController');
		Route::get('categorias-all','CategoriaController@get');
		//Usuarios
		Route::resource('usuarios', 'UsuarioController');
		//Pedido
		Route::resource('pedidos', 'PedidoController');
		Route::get('pedidos-all', 'PedidoController@show');
		Route::get('pedidos-get', 'PedidoController@get');
		//Estados
		Route::resource('estado', 'EstadoPedidoController');
		Route::get('estado-all', 'EstadoPedidoController@get');
		//Requisicion
		Route::resource('requisicion', 'RequisicionController');
		Route::get('requisicion-all', 'RequisicionController@show');
		Route::get('requisicion-get', 'RequisicionController@get');
		//Orden de compra
		Route::resource('orden', 'OrdenCompraController');
		Route::get('orden-all', 'OrdenCompraController@show');
		Route::get('orden-get', 'OrdenCompraController@get');
		Route::get('orden-getr', 'OrdenCompraController@getr');
		//Recepcion
		Route::resource('recepcion', 'RecepcionController');
		Route::get('recepcion-all', 'RecepcionController@show');
		Route::get('recepcion-get', 'RecepcionController@get');
		Route::get('recepcion-getr', 'RecepcionController@getr');
		//Mantenimiento
		Route::resource('mantenimiento', 'MantenimientoController');
		Route::resource('respaldar', 'BackupController');
		Route::resource('restaurar', 'RestoreController');
		Route::get('auditoria', 'MantenimientoController@audit');
		//Perfil
		Route::resource('perfil', 'PerfilController');
		Route::resource('password', 'PasswordController');

		//Factura
		Route::resource('facturacion', 'FacturaController');
	});