
	/**
	 * First we will load all of this project's JavaScript dependencies which
	 * includes Vue and other libraries. It is a great starting point when
	 * building robust, powerful web applications using Vue and Laravel.
	 */

	//require('./bootstrap');

	window.Vue = require('vue');
	window.axios = require('axios');
	// Filters
	//import money from './filters/money'
	//import amountInLetters from './filters/amount-in-letters'
	//import asset from './filters/asset'
	//import image from './filters/image'
 
	import swal from 'sweetalert'
	import date from './filters/date'
	import icons from 'glyphicons'
	/**
	 * Next, we will create a fresh Vue application instance and attach it to
	 * the page. Then, you may begin adding components to this application
	 * or customize the JavaScript scaffolding to fit your unique needs.
	 */
	Vue.use(date)
	//Example
	Vue.component('example-component', require('./components/ExampleComponent.vue'));
	//Index
	Vue.component('dashboard-index', require('./components/Admin/Index'));
	//Categorias
	Vue.component('categorias-index', require('./components/Admin/Categorias/IndexCategorias'));
	//Matenimiento
	Vue.component('respaldar-index', require('./components/Admin/Mantenimiento/RespaldarIndex'));
	Vue.component('restaurar-index', require('./components/Admin/Mantenimiento/RestaurarIndex'));
	//Pedidos
	Vue.component('pedidos-index', require('./components/Admin/Pedidos/IndexPedidos'));
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
	//Recepcion
	Vue.component('recepcion-index', require('./components/Admin/Recepcion/IndexRecepcion'));
	//Requisicion
	Vue.component('requisicion-index', require('./components/Admin/Requisicion/IndexRequisicion'));
	Vue.component('requisicion-index-show', require('./components/Admin/Requisicion/ShowRequisicion'));
	//Usuarios
	Vue.component('usuarios-index', require('./components/Usuarios/IndexUsuarios'));
	Vue.component('usuarios-login', require('./components/Usuarios/LoginUsuarios'));
	Vue.component('usuarios-admin', require('./components/Usuarios/AdminUsuarios'));
		
	//Tabla
	Vue.component('table-byte', require("./components/Admin/Table/Table"));
	Vue.component("table-row", require("./components/Admin/Table/TableRow"));
	Vue.component('table-head', require("./components/Admin/Table/TableHead"));
	Vue.component("table-cell", require("./components/Admin/Table/TableCell"));


 	window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

    let token = document.head.querySelector('meta[name="csrf-token"]');
 	if (token) {
        window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
    } else {
        console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
    }
    class Errors {
        constructor() {
            this.errors = {};
        }

        get(field) {
            if (this.errors[field]) {
                return this.errors[field][0];
            }
        }

        record(errors) {
            this.errors = errors;
        }

        clear(field) {
            delete this.errors[field];
        }

        has(field) {
            return this.errors.hasOwnProperty(field);
        }

        any() {
            return Object.keys(this.errors).length > 0;
        }
    }


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
