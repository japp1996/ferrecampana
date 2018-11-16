<template id="template-pedidos-index">
	<div class="generalContent">
	    <div class="container">
	    	<div class="row">
	    		<div id="grid-selector">
					     Showing 1–9 of 48 results 
					</div>  
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
				        	<li v-for="item in dataCategory"><a href=""><span></span>{{ item.descripcion_categoria }}</a></li>
				        </ul>
					</div>
		      	</div>
		        <div v-for="item in dataProducts" class="col-md-3">
				    <div class="make3D">
			            <div class="product-front">
			                <div class="shadow"></div>
			                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/5.jpg" width="100%" alt="" />
			                <div class="image_overlay"></div>
			                <div class="btn btn-success" @click="_addCart(item)">Añadir al carrito</div>
			                <select class="form-control" id="">
			                	<option value="">Seleccione la cantidad</option>
			                	<option :value="n" v-for="n in item.stock">{{ n }}</option>
			                </select>
			                <div class="stats">        	
			                    <div class="stats-container">
			                        <strong>{{ item.price }}</strong>
			                        <span class="product_name"> {{ item.name }}</span>    
			                        <p>Summer dress</p>
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
				      <a href="#" aria-label="Previous">
				        <span aria-hidden="true">&laquo;</span>
				      </a>
				    </li>
				    <li><a href="#">1</a></li>
				    <li><a href="#">2</a></li>
				    <li><a href="#">3</a></li>
				    <li><a href="#">4</a></li>
				    <li><a href="#">5</a></li>
				    <li>
				      <a href="#" aria-label="Next">
				        <span aria-hidden="true">&raquo;</span>
				      </a>
				    </li>
				  </ul>
				</nav>
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
				pagination: {},
				form: {},
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
			_addCart(item) {
				this.carrito.push({
					id_producto: item.id,
					name: item.name,
					//cantidad: item.cantidad,
					id_estado: 3
				})
				console.log(this.carrito)
			},
			_addQuanty(i,q) {
				this.dataProducts[i].splice(i,0,q)
			},
			_splice(i) {
				this.carrito.splice(i,1)
			},
			_create() {
				axios.post("",this.carrito)
				.then(resp => {
					console.log("ggggg")
				})
				.catch(erro => {
					swal("",erro.data.text,"warning")
				})
			}
		},
		mounted() {
			this.dataProducts = this.productos
			this.dataCategory = this.categorias
		}
	}
</script>