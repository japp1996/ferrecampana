<?php
	use Illuminate\Support\Facades\Auth;
	//PUBLIC
	Route::resource('/', 'HomeController');
	Route::group(['prefix' => '/'], function () {

		//Quienes Somos
		Route::get('/who', 'HomeController@who');
		//Productos
		Route::get('/products', 'HomeController@products');
		//Registro
		Route::get('/usuario', 'UsuarioController@index');
		Route::resource('/usuario', 'UsuarioController');
		//Contáctanos
		Route::get('/contact', 'HomeController@contact');
		//Login
		Route::get('/login', 'HomeController@login');
		Route::post('/login', 'Auth\LoginController@login');

		//Olvido contraseña
		Route::get('forgot/password', 'HomeController@forgotPassword');
	});
	//Route::get('/', function (){return view('welcome')});

	//INTRANET

	Route::group(['prefix' => 'intranet', 'namespace' => 'Admin', 'middleware' => 'intranet' ], function(){
		//Inicio
		Route::get('dashboard', 'DashboardController@index');
		//Productos
		Route::resource('productos', 'ProductoController');
		Route::get('productos-all','ProductoController@get');
		//Categorias
		Route::resource('categorias', 'CategoriaController');
		Route::get('categorias-all','CategoriaController@get');
		//Usuarios
		Route::resource('usuarios', 'UsuarioController');
		//Pedido
		Route::resource('pedidos', 'PedidoController');
		//Pedido
		Route::resource('estado', 'EstadoPedidoController');
		Route::get('estado-all', 'EstadoPedidoController@get');
		//Requisicion
		Route::resource('requisicion', 'RequisicionController');
		//Recepcion
		Route::resource('recepcion', 'RecepcionController');
		//Mantenimiento
		Route::resource('mantenimiento', 'MantenimientoController');
		//Perfil
		Route::resource('perfil', 'PerfilController');
		//Factura
		Route::resource('facturacion', 'FacturaController');

	});
	
		