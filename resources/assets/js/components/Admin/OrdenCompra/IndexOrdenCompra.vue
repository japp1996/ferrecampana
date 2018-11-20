<template id="template-orden-compra-index">
	<div>
	    <div class="container">
	       <div class="row">
            <div class="col-sm-12 center-align">
                <h1 v-if="options == 0">Orden de Compra</h1>
                <h1 v-if="options == 1 || options == 2">{{ options == 1 ? 'Importar' : 'Actualizar'}} Requisición</h1>
            </div>
	      </div>
	      <div class="row">
	      	<div class="col-sm-12 container-btn-add" >
                <button v-if="options == 0" class="btn btn-success" @click="_add()"> Importar Requisición </button>
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
			            	<button v-if="options != 1" class="btn btn-danger" @click="_delete(item.id)">
								Borrar
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
		 </div>
		</div>
	</div>
</template>

<script>
	export default {
		template: "#template-orden-compra-index",
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
				this.dataTable = this.requisicion
			},
			_back() {
				this.options = 0
				this.dataTable = this.orden
			},
			_import(item) {
				swal({
				  title: "¿Desea importar ésta requisición?",
				  text: "Ésta acción traerá los datos de la requisición y creará una nueva Orden de compra!",
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
				    axios.delete(`orden/`+id)
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
				axios.get("orden-getr")
				.then( resp => {
					this.requisicion = resp.data
				    this.dataTable = resp.data
				})
				.catch( erro => {

				})
				.then( res => {
					console.log(res)
				})

				axios.get("orden-get")
				.then( resp => {
					this.orden = resp.data
				    this.dataTable = resp.data
				})
				.catch( erro => {

				})
				.then( res => {
					console.log(res)
				})

			}
		},
		props: {
			orden: {
				type: Array,
				default: []
			},
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