<template id="template-requisicion-index">
	<div class="generalContent">
	    <div class="container">
	    	<div class="row">
	    		<div id="grid-selector">
					     Total de Resultados: {{ dataProducts.length }} 
				</div> 
				<div class="col-md-3"> Buscar <input type="search" placeholder="Nombre de Producto" class="form-control"></div> 
	    	</div>
	      <div class="row">
	      	<div class="col-md-3">
	      		<div id="sidebar">
					<h3>CARRITO</h3>
				    <div id="cart">
				    	<span class="empty" v-if="carrito.length == 0">No hay nada añadido.</span>  
				    	<ul v-if="carrito.length > 0" class="list-group">
						  <li class="list-group-item" v-for="(cart, i) in carrito">
						    <span class="badge" v-on:click="_splice(i)">X</span>
						    {{ cart.name }}
						  </li>
						</ul>
						<button type="button" @click="_create()" class="btn btn-primary" v-if="carrito.length > 0">Crear Pedido</button>     
				    </div>
				    
				    <h3>CATEGORIAS</h3>
				    	<ul>
				        	<li v-for="item in dataCategory" @click="category(item.code)"><a><span></span>{{ item.descripcion_categoria }}</a></li>
				        </ul>
					</div>
		      	</div>
		       <div class="col-md-9">
		         <div class="datagrid" v-if="options == 0 || options == 1">
					<table-byte :set-table="dataTable" :filters="['productos.name']">
				        <table-row slot="table-head" slot-scope="{ item }">
				            <table-head>No.</table-head>
				            <table-head>Cliente</table-head>
				            <table-head>Fecha</table-head>
				            <table-head>Acciones</table-head>
				        </table-row>

				        <table-row slot="table-row" slot-scope="{ item }">
				            <table-cell>{{ item.name }}</table-cell>
				            <table-cell>{{ item.descripcion_categoria }}</table-cell>
				            <table-cell>{{ item.stock }}</table-cell>
				            <table-cell>{{ item.unity }}</table-cell>
				            <table-cell>{{ item.price }}</table-cell>
				            <table-cell>
			                    <button v-if="options == 1" class="btn btn-success" @click="addCart(item, i)">
									Añadir al carrito
								</button>
				            </table-cell>
				        </table-row>

				        <table-row slot="empty-rows">
				            <table-cell colspan="4">
				                No se encontraron registros.
				            </table-cell>
				        </table-row>
				    </table-byte>
				 </div>
				</div>

		        <!--div v-for="(item, i) in dataProducts" v-if="i/pagination.perPage <= pagination.currentPage && i/pagination.perPage > pagination.currentPage-1 && item.code == categoria" class="col-md-3">
				    <div class="make3D">
			            <div class="product-front">
			                <div class="shadow"></div>
			                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/5.jpg" width="100%" alt="" />
			                <div class="image_overlay"></div>
			                <div class="btn btn-success" @click="_addCart(item, i)">Añadir al carrito</div>
			                <select class="form-control" v-model="item.cantidad" id="">
			                	<option value="">Seleccione la cantidad</option>
			                	<option :value="n" v-for="n in item.stock">{{ n }}</option>
			                </select>
			                <div class="stats">        	
			                    <div class="stats-container">
			                        <span class="product_name"> {{ item.name }}</span>    
			                        <p><strong>{{ item.price }}</strong></p>
			                        <div class="product-options">
			                        <strong>{{ item.descripcion_categoria }}</strong>
			                    </div>                       
			                    </div>                         
			                </div>
			            </div>
			        </div>
			    </div>
			    <nav aria-label="Page navigation">
				  <ul class="pagination">
				    <li>
				      <a @click="to()" aria-label="Previous">
				        <span aria-hidden="true">&laquo;</span>
				      </a>
				    </li>
				    <li @click="currentPage(page)" v-for="page in pagination.paginate" :class="page == pagination.currentPage ? 'active' : ''"><a @click="currentPage(page)">{{ page }}</a></li>
				    <li>
				      <a @click="lastPage()" aria-label="Next">
				        <span aria-hidden="true">&raquo;</span>
				      </a>
				    </li>
				  </ul>
				</nav-->
		</div>
	</div>
</div>
</template>

<script>
	export default {
		template: "#template-requisicion-index",
		data() {
			return {
				options: 0,
				pagination: {
					total: 0,
					perPage: 6,
					currentPage: 1,
					lastPage: 0,
					to: 1,
					paginate: 0
				},
				form: {},
				categoria: "ASF",
				carrito: [],
				dataProducts: [],
				dataCategory: [],
				dataTable: [],
				filters: []
			}
		},
		props: {
			pedidos: {
				type: Array,
				default: []
			},
			productos: {
				type: Array,
				default: []
			},
			categorias: {
				type: Array,
				default: []
			}
		},
		methods: {
			_addCart(item, i) {
				console.log(item)
				this.carrito.push({
					id_producto: item.id,
					name: item.name,
					cantidad: item.cantidad,
					precio: item.price * item.cantidad
				})
			},
			_splice(i) {
				this.carrito.splice(i,1)
			},
			_create() {
				axios.post("",this.carrito)
				.then(resp => {
					swal("",resp.data.text,"success")
					this.carrito = []
				})
				.catch(erro => {
					swal("","Disculpe, ha ocurrido un error","warning")
				})
			},
			currentPage(page) {
				this.pagination.currentPage = page
			},
			lastPage() {
				this.pagination.currentPage = this.pagination.lastPage
			},
			to() {
				this.pagination.currentPage = 1
			},
			category(code) {
				this.categoria = code
			}
		},
		mounted() {
			this.dataProducts = this.productos
			//this.dataProducts.forEach(function(el){
			//	el.cantidad = 0
			//})
			//this.pagination.total = this.dataProducts.length
			//this.pagination.lastPage = parseInt(this.pagination.total/this.pagination.perPage)
			//this.pagination.paginate = parseInt(this.pagination.total/this.pagination.perPage)
			this.dataCategory = this.categorias
		}
	}
</script>