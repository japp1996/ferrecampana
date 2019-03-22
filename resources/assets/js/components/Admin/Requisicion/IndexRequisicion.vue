<template id="template-pedidos-index">
	<div class="generalContent">
	    <div class="container">
	    	<div class="row">
	    		<div class="col-md-12">	
					<div class="row">
						<div class="col-md-2">
							<div class="row">
								<div class="col-md-12">
									<div id="grid-selector">
									     Total de Resultados: {{ dataTable.length }} 
									</div> 
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div id="sidebar">
										<h3>Lista</h3>
										<button v-if="carrito.length > 0" @click="_spliceAll()" class="btn btn-xs">Vaciar lista</button>
									    <div id="cart">
									    	<span class="empty" v-if="carrito.length == 0">No hay nada añadido.</span>  
									    	<ul v-if="carrito.length > 0" class="list-group">
											  <li class="list-group-item" v-for="(cart, i) in carrito" :key="i">
											    <!--span class="badge" v-on:click="_splice(i)">X</span-->
											    <span class="badge">{{ cart.cantidad }}</span>
											    {{ cart.name }}
											  </li>
											</ul>
											<button type="button" @click="_create()" class="btn btn-primary" v-if="carrito.length > 0">Crear Requisicion</button>     
									    </div>
									    
									    <h3>CATEGORIAS</h3>
								    	<ul>
								        	<li v-for="(item, i) in dataCategory" :key="i" @click="category(item.code)" ><a><span></span>{{ item.descripcion_categoria }}</a></li>
								        </ul>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-10">
							<div class="row">
								<!--div class="col-md-4" v-for="(item, i) in dataProducts" v-if="i/pagination.perPage <= pagination.currentPage && i/pagination.perPage > pagination.currentPage-1">
									<div class="make3D">
							            <div class="product-front">
							                <div class="shadow"></div>
							                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/5.jpg" width="100%" alt="" />
							                <div class="image_overlay"></div>
							                <div class="btn btn-success" @click="_addCart(item, i)">Añadir al carrito</div>
							                <select class="form-control" v-model="item.cantidad" id="">
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
								</div-->
								<div class="col-md-12">
						         <div class="datagrid" v-if="options == 0 || options == 1">
									<table-byte :set-table="dataTable" :filters="['name','descripcion_categoria']">
								        <table-row slot="table-head">
								            <table-head>Producto</table-head>
								            <table-head>Categoria</table-head>
								            <table-head>Existencia</table-head>
								            <table-head>Unidad</table-head>
								            <table-head>Precio</table-head>
								            <table-head>Agregar</table-head>
								            <table-head>Cantidad</table-head>
								        
								        </table-row>

								        <table-row slot="table-row" slot-scope="{ item }">
								            <table-cell>{{ item.name }}</table-cell>
								            <table-cell>{{ item.descripcion_categoria }}</table-cell>
								            <table-cell>{{ item.stock }}</table-cell>
								            <table-cell>{{ item.unity }}</table-cell>
								            <table-cell>{{ item.price }} Bs.</table-cell>
								             <table-cell ><input v-if="item.added == 1" type="text" v-model="item.cantidad" class="form-control" placeholder=""></table-cell>
								            <table-cell>
							                    <input type="button" v-if="item.added == 1 || item.stock_max >= item.stock" :disabled="item.cantidad > 0 ? disabled : ''" :class="item.stock_min >= item.stock ? 'btn btn-danger' : 'btn btn-success'" @click="_addReq(item)" value="Solicitar">
								            </table-cell>
								           
								        </table-row>

								        <table-row slot="empty-rows">
								            <table-cell colspan="6">
								                No se encontraron registros.
								            </table-cell>
								        </table-row>
								    </table-byte>
								 </div>
								</div>

							</div>
							<div class="row">
								<!--nav aria-label="Page navigation">
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
				</div>
	    	</div>
		</div>
</div>
</template>

<script>
	export default {
		template: "#template-pedidos-index",
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
			requisicion: {
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
			_addReq(item, i) {
				if (item.cantidad == 0 || item.cantidad == "") {
					swal("","Debe seleccionar una cantidad ","info")
					return false;
				}
				if (item.cantidad < 0) {
					swal("","No puede pedir productos con valor negativo ","warning")
					return false;
				}
				console.log(item)
				this.carrito.push({
					id_producto: item.id,
					name: item.name,
					cantidad: item.cantidad,
				})
			},
			_spliceAll() {
				this.carrito = []
				this.dataTable.forEach((el) => {
					el.added = 1
					el.cantidad = ""
				})
			},
			_splice(i) {
				this.carrito.splice(i,1)
			},
			_create() {
				axios.post("intranet/requisicion",this.carrito)
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
			this.dataTable = this.productos
			this.dataTable.forEach((el) => {
				el.added = 1;
			})
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