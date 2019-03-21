<template id="template-requisicion-index-show">
	<div>
	    <div class="container">
			<div id="myModal" class="modal_ferre">
			  <!-- Modal content -->
			  <div class="modal-content">
			  	<div class="modal-header">
				  <span class="close">&times;</span>
				    <h3>Detalles del Pedido</h3>
				 </div>
				 <div class="modal-body" id="modal-body">
				    
				 </div>
			  </div>

			</div>
	       <div class="row">
            <div class="col-sm-12 center-align">
                <h1 v-if="options == 0">Requisición</h1>
                <h1 v-if="options == 1 || options == 2">{{ options == 1 ? 'Agregar' : 'Actualizar'}} Pedidos</h1>
            </div>
	      </div>
	      <div class="row">
	      	<div class="col-sm-12 container-btn-add" >
                <button v-if="options == 1 || options == 2" class="btn btn-success" @click="options = 0">Volver</button>
            </div>
	        <div class="col-md-12">
	         <div class="datagrid" v-if="options == 0">
				<table-byte :set-table="dataTable" :filters="['usuario.name']">
			        <table-row slot="table-head">
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
		                    <a @click="_delete(item.id)">
			                    <img src="http://localhost:8080/ferrecampana/public/images/icons/delete.png" class="img-responsive" width="30px" style="display:inline-block">
		                    </a>
		                    <a @click="_see(item)" :id="'myBtn'+item.id">
			                    <img src="http://localhost:8080/ferrecampana/public/images/icons/see.png" class="img-responsive" width="30px" style="display:inline-block">
		                    </a>
			            </table-cell>
			        </table-row>

			        <table-row slot="empty-rows">
			            <table-cell colspan="4">
			                No se encontraron registros.
			            </table-cell>
			        </table-row>
			    </table-byte>
			 </div>
			<div class="" v-if="options == 1 || options == 2">
			 	<div class="form-group has-feedback" :class="form.code == '' ? 'has-error' : 'has-success'">
				  <label class="control-label" for="code">Código de categoría</label>
				  <input type="text" class="form-control" id="code" v-model="form.code" aria-describedby="inputSuccess2Status">
				  <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
				  <span id="inputSuccess2Status" class="sr-only">(success)</span>
				</div>
				<div class="form-group has-feedback" :class="form.descripcion == '' ? 'has-error' : 'has-success'">
				  <label class="control-label" for="name">Nombre de la categoría</label>
				  <input type="text" class="form-control" id="name" v-model="form.descripcion" aria-describedby="inputWarning2Status">
				  <span class="glyphicon glyphicon-warning-sign form-control-feedback" aria-hidden="true"></span>
				  <span id="inputWarning2Status" class="sr-only">(warning)</span>
				</div>
				<div class="form-group">
					<p>
						<button v-if="reg == 1" class="btn btn-success btn-lg" @click="_updated()">
							Actualizar
						</button>						
					</p>
				</div>
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
		template: "#template-requisicion-index-show",
		data() {
			return {
				options: 0,
				form: {},
				dataTable: [],
				filters: []	
			}
		},
		methods: {
			_edit(item) {

			},
			_see(item) {
				console.log(item)
				var modal = document.getElementById('myModal');
				// Get the button that opens the modal
				var btn = document.getElementById("myBtn"+item.id);
				// Get the <span> element that closes the modal
				var span = document.getElementsByClassName("close")[0];
				// When the user clicks on the button, open the modal 
				btn.onclick = function() {
				    document.getElementById("modal-body").innerHTML = "";
				    item.detalles.forEach((el) => {
							console.log(el)
				    	document.getElementById("modal-body").innerHTML += "<p>Producto: " + el.id + " Cantidad: " + el.cantidad_requisicion + " Precio: " + el.productos.price + "</p>";
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
				    axios.delete(`intranet/requisicion/`+id)
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
				axios.get("intranet/requisicion-get")
				.then( resp => {
					this.dataTable = resp.data
				})
				.catch( erro => {

				})
			}
		},
		props: {
			requisicion: {
				type: Array,
				default: []
			}
		},
		mounted() {	
			this.dataTable = this.requisicion
		}
	}
</script>