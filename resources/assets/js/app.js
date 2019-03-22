
	/**
	 * First we will load all of this project's JavaScript dependencies which
	 * includes Vue and other libraries. It is a great starting point when
	 * building robust, powerful web applications using Vue and Laravel.
	 */

	require('./bootstrap');
	window.Vue = require('vue');
	// Filters
	//import money from './filters/money'
	//import amountInLetters from './filters/amount-in-letters'
	//import asset from './filters/asset'
	//import image from './filters/image'
 	//import icons from 'glyphicons'
	import swal from 'sweetalert'
	import Chart from 'chart.js'
	
	/**
	 * Next, we will create a fresh Vue application instance and attach it to
	 * the page. Then, you may begin adding components to this application
	 * or customize the JavaScript scaffolding to fit your unique needs.
	 */
	
	//Example
	Vue.component('example-component', require('./components/ExampleComponent.vue'));
	//Index
	Vue.component('dashboard-index', require('./components/Admin/Index'));
	//Categorias
	Vue.component('categorias-index', require('./components/Admin/Categorias/IndexCategorias'));
	//Matenimiento
	Vue.component('respaldar-index', require('./components/Admin/Mantenimiento/RespaldarIndex'));
	Vue.component('restaurar-index', require('./components/Admin/Mantenimiento/RestaurarIndex'));
	Vue.component('auditoria-index', require('./components/Admin/Mantenimiento/AuditoriaIndex'));
	//Pedidos
	//Vue.component('pedidos-index', require('./components/Admin/Pedidos/IndexPedidos'));
	Vue.component('pedidos-index', require('./components/Admin/Pedidos/CreatePedidos'));
	Vue.component('pedidos-index-show', require('./components/Admin/Pedidos/ShowPedidos'));
	//Orden de compra
	Vue.component('orden-compra-index', require('./components/Admin/OrdenCompra/IndexOrdenCompra'));
	//Estado Pedidos
	Vue.component('estado-pedido-index', require('./components/Admin/EstadoPedido/IndexEstadoPedido'));
	//Perfil
	Vue.component('perfil-index', require('./components/Admin/Perfil/IndexPerfil'))
	Vue.component('password-index', require('./components/Admin/Perfil/PasswordChange'));
	//Productos
	Vue.component('productos-index', require('./components/Admin/Productos/IndexProductos'));
	//Productos
	Vue.component('proveedor-index', require('./components/Admin/Proveedor/IndexProveedor'));
	//Recepcion
	Vue.component('recepcion-index', require('./components/Admin/Recepcion/IndexRecepcion'));
	//Requisicion
	Vue.component('requisicion-index', require('./components/Admin/Requisicion/IndexRequisicion'));
	Vue.component('requisicion-index-show', require('./components/Admin/Requisicion/ShowRequisicion'));
	//Usuarios
	Vue.component('usuarios-index', require('./components/Usuarios/IndexUsuarios'));
	Vue.component('usuarios-login', require('./components/Usuarios/LoginUsuarios'));
	Vue.component('usuarios-admin', require('./components/Usuarios/AdminUsuarios'));
	//Inventario
	Vue.component('reporte-index', require('./components/Admin/Inventario/Reporte'));
	Vue.component('reporte-ajuste-index', require('./components/Admin/Inventario/ReporteAjuste'));
	Vue.component('ajuste-index', require('./components/Admin/Inventario/Ajuste'));

	//Tabla
	Vue.component('table-byte', require("./components/Admin/Table/Table"));
	Vue.component("table-row", require("./components/Admin/Table/TableRow"));
	Vue.component('table-head', require("./components/Admin/Table/TableHead"));
	Vue.component("table-cell", require("./components/Admin/Table/TableCell"));

    
	const app = new Vue({
	    el: '#app',
	    methods: {
          onComplete: function(){
              axios.post('/validate-data', this.$data.model)
                  // .then(this.onSuccess)
                  .catch(error => this.errors.record(error.response.data.errors));
           },
        }
	});
