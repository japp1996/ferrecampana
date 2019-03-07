<template id="template-recepcion-index">
	<div>
	    <div class="container">
	    	<div id="myModal" class="modal_ferre">
			  <!-- Modal content -->
			  <div class="modal-content">
			  	<div class="modal-header">
				  <span class="close">&times;</span>
				    <h3>Detalles</h3>
				 </div>
				 <div class="modal-body" id="modal-body">
				    
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
			        <table-row slot="table-head" slot-scope="{ item }">
			            <table-head>No.</table-head>
			            <table-head>Cliente</table-head>
			            <table-head>Fecha</table-head>
			            <table-head>Acciones</table-head>
			        </table-row>

			        <table-row slot="table-row" slot-scope="{ item }">
			            <table-cell>{{ item.id }}</table-cell>
			            <table-cell>{{ item.usuario.name }}</table-cell>
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
				form: {},
				dataTable: [],
				filters: [],
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
			_see(item) {
				var modal = document.getElementById('myModal');
				// Get the button that opens the modal
				var btn = document.getElementById("myBtn"+item.id);
				// Get the <span> element that closes the modal
				var span = document.getElementsByClassName("close")[0];
				// When the user clicks on the button, open the modal 
				btn.onclick = function() {
				    document.getElementById("modal-body").innerHTML = "";
				    item.detalles.forEach((el) => {
				    	document.getElementById("modal-body").innerHTML += "<p>Producto: " + el.id + " Cantidad: " + el.cantidad +"</p>";
				    })
				    modal.style.display = "block";			    
				}
				// When the user clicks on <span> (x), close the modal
				span.onclick = function() {
				    modal.style.display = "none";
				}
				// When the user clicks anywhere outside of the modal, close it
				window.onclick = function(event) {
				    if (event.target == modal) {
				        modal.style.display = "none";
				    }
				}
			},
			_import(item) {
				swal({
				  title: "¿Desea importar ésta orden de compra?",
				  text: "Ésta acción traerá los datos de la orden de compra y creará una nueva Recepción!",
				  icon: "info",
				  buttons: true,
				  dangerMode: true,
				})
				.then((importar) => {
				  if (importar) {
				    axios.post("", item)
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
				    axios.delete(`recepcion/`+id)
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
				axios.get("recepcion-getr")
				.then( resp => {
					this.orden = resp.data
				    this.dataTable = resp.data
				})
				.catch( erro => {

				})
				axios.get("recepcion-get")
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