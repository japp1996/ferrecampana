<template id="template-recepcion-index">
	<div>
	    <div class="container">
	    	<div id="myModal" :style="this.modal ? 'display:block' : 'display:none'" class="modal_ferre">
			  	<!-- Modal content -->
			  	<div class="modal-content">
						<div class="modal-header">
							<span class="close" v-on:click="modal = false">&times;</span>
								<h3>Detalles</h3>
						</div>
						<div class="modal-body" id="modal-body">
								<table v-if="options != 0">
									<thead>
										<tr>
											<th>Ch</th>	
											<th>Producto</th>
											<th>Cantidad solicitada</th>
											<th>Cantidad Recibida</th>
											<th>Accion</th>
										</tr>
									</thead>
									<tbody>
										<tr v-for="(producto,i) in form.detalles" :key="i">
											<td><input type="checkbox" name="" id=""></td>
											<td>{{producto.productos.name}}</td>
											<td>{{producto.cantidad}}</td>
											<td><input type="text" v-model="producto.cantidad_recibida" value="" class="form-control" placeholder="Cantidad Recibida"></td>
											<td><button :disabled="producto.cantidad_recibida > producto.cantidad || producto.cantidad_recibida == ''" @click="receiveProduct(producto,i)" class="btn btn-primary">Recibir</button></td>
										</tr>
									</tbody>
								</table>
								<button v-if="options != 0" class="btn btn-success" @click="_do()"> Recepcionar Productos </button>
								<template v-if="options == 0">
									<p v-for="(detail, index) in details.detalles" :key="index" >
										Producto: {{ detail.productos.name}} | Cantidad: {{ detail.cantidad }}
									</p>
								</template>
						</div>
					</div>
				</div>
	      <div class="row">
					<div class="col-sm-12 center-align">
						<h1 v-if="options == 0">Recepción</h1>
						<h1 v-if="options == 1 || options == 2">{{ options == 1 ? 'Importar' : 'Actualizar'}} Orden de compra</h1>
					</div>
	      </div>
	      <div class="row">
	      	<div class="col-sm-12 container-btn-add" >
						<button v-if="options == 0" class="btn btn-success" @click="_add()"> Importar Orden de compra </button>
						<button v-if="options == 1 || options == 2" class="btn btn-success" @click="_back()">Volver</button>
					</div>
	        <div class="col-md-12">
	         <div class="datagrid" v-if="options == 0 || options == 1">
							<table-byte :set-table="dataTable" :filters="['usuario.name']">
										<table-row slot="table-head">
												<table-head>No.</table-head>
												<table-head>Cliente</table-head>
												<table-head>Proveedor</table-head>
												<table-head>Fecha</table-head>
												<table-head>Acciones</table-head>
										</table-row>

										<table-row slot="table-row" slot-scope="{ item }">
												<table-cell>{{ item.id }}</table-cell>
												<table-cell>{{ item.usuario.name }}</table-cell>
												<table-cell>{{ item.proveedor != null ? item.proveedor.contact_name : 'SIN PROVEEDOR' }}</table-cell>
												<table-cell>{{ item.created_at }}</table-cell>
												<table-cell>
															<button v-if="options == 1" class="btn btn-success" @click="_import(item)">
											Importar
										</button>
										<button v-if="options != 1" :id="'myBtn'+item.id" class="btn btn-danger" @click="_see(item)">
											Ver detalles
										</button>
													<!--button v-if="options != 1" class="btn btn-danger" @click="_delete(item.id)">
											Borrar
										</button-->
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
		 		</div>
			</div>
	</div>
</template>
<style>
	.modal_ferre {
	    display: none; /* Hidden by default */
	    position: fixed; /* Stay in place */
	    z-index: 1; /* Sit on top */
	    left: 0;
	    top: 0;
	    width: 100%; /* Full width */
	    height: 100%; /* Full height */
	    overflow: auto; /* Enable scroll if needed */
	    background-color: rgb(0,0,0); /* Fallback color */
	    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
	}

	/* Modal Content/Box */
	.modal-content {
	    background-color: #fefefe;
	    margin: 15% auto; /* 15% from the top and centered */
	    padding: 20px;
	    border: 1px solid #888;
	    width: 80%; /* Could be more or less, depending on screen size */
	}

	/* The Close Button */
	.close {
	    color: #aaa;
	    float: right;
	    font-size: 28px;
	    font-weight: bold;
	}

	.close:hover,
	.close:focus {
	    color: black;
	    text-decoration: none;
	    cursor: pointer;
	}
</style>
<script>
	export default {
		template: "#template-recepcion-index",
		data() {
			return {
				options: 1,
				form: {

				},
				dataTable: [],
				filters: [],
				modal: false,
				import: [],
				details:[]
			}
		},
		methods: {
			_add() {
				this.options = 1
				this.reg = 0
				this.dataTable = this.orden
			},
			_back() {
				this.options = 0
				this.dataTable = this.recepcion
			},
			receiveProduct(product, index) {
				if (product.cantidad_recibida == "" || product.cantidad_recibida == undefined) {
					swal("Ingrese la cantidad")
					return false;
				}
				this.import.push(product)
				this.form.detalles.splice(index, 1)
			},
			_see(item) {
				this.modal = true
				this.details = item
				
				/*item.detalles.forEach((el) => {
					document.getElementById("modal-body").innerHTML += "<p>Producto: " + el.id + " Cantidad: " + el.cantidad +"</p>";
				})*/				
			},
			_import(item) {
				this.modal = true
				this.form = item
			},
			_do() {
				if (this.import.length == 0) {
					swal("Debe recibir al menos un producto")
					return false
				}

				this.form.detalles = this.import
				
				swal({
				  title: "¿Desea importar ésta orden de compra?",
				  text: "Ésta acción traerá los datos de la orden de compra y creará una nueva Recepción!",
				  icon: "info",
				  buttons: true,
				  dangerMode: true,
				})
				.then((importar) => {
				  if (importar) {
				    axios.post("intranet/recepcion", this.form)
				    .then( resp => {
					    swal(resp.data.text, {
					      icon: "success",
					    });
					    this._reloadTable()
					    this.options = 0
				    })
				    .catch( erro => {
				    	swal("Lo sentimos! ha ocurrido un error!", {
					      icon: "error",
					    });
				    })
				  }
				});
			},
			_delete(id) {
				swal({
				  title: "¿Estás seguro?",
				  text: "Una vez borrado, no podrás revertir esta acción!",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
				  if (willDelete) {
				    axios.delete(`intranet/recepcion/`+id)
				    .then( resp => {
					    swal(resp.data.text, {
					      icon: "success",
					    });
					    this._reloadTable()
				    })
				    .catch( erro => {
				    	swal("Lo sentimos! ha ocurrido un error!", {
					      icon: "error",
					    });
				    })
				  }
				});
			},
			_reloadTable() {
				axios.get("intranet/recepcion-getr")
				.then( resp => {
					this.orden = resp.data
				    this.dataTable = resp.data
				})
				.catch( erro => {

				})
				axios.get("intranet/recepcion-get")
				.then( resp => {
					this.recepcion = resp.data
				    this.dataTable = resp.data
				})
				.catch( erro => {

				})

			}
		},
		props: {
			recepcion: {
				type: Array,
				default: []
			},
			orden: {
				type: Array,
				default: []
			}
		},
		mounted() {	
			this.dataTable = this.orden

		}
	}
</script>