<template id="template-estado-pedido-index">
	<div>
	    <div class="container">
	      <div class="row">
            <div class="col-sm-12 center-align">
                <h1 v-if="options == 0">Estados de los pedidos</h1>
                <h1 v-if="options == 1 || options == 2">{{ options == 1 ? 'Agregar' : 'Actualizar'}} Estado</h1>
            </div>
	      </div>
	      <div class="row">	      	
            <div class="col-sm-12 container-btn-add" >
                <button v-if="options == 0" class="btn btn-success" @click="_add()"> Agregar nuevo </button>                            
                <button v-if="options == 1 || options == 2" class="btn btn-success" @click="options = 0">Volver</button>
            </div>
	        <div class="col-md-12">
	         <div class="datagrid" v-if="options == 0">
				<table-byte :set-table="dataTable" :filters="['descripcion_estado']">
			        <table-row slot="table-head" slot-scope="{ item }">
			            <table-head>Estados de Pedidos</table-head>
			            <table-head>Acciones</table-head>
			        </table-row>

			        <table-row slot="table-row" slot-scope="{ item }">
			            <table-cell>{{ item.descripcion_estado }}</table-cell>
			            <table-cell>
		                    <a  @click="_edit(item)">
			                    <img src="http://localhost:8080/ferrecampana/public/images/icons/edit.png" width="30px" style="display:inline-block"  class="img-responsive" >            		
			            	</a>
			            	<a @click="_delete(item.id)">
			                    <img src="http://localhost:8080/ferrecampana/public/images/icons/delete.png" width="30px" style="display:inline-block" class="img-responsive" >
		                    </a>
			            </table-cell>
			        </table-row>

			        <table-row slot="empty-rows">
			            <table-cell colspan="3">
			                No se encontraron registros.
			            </table-cell>
			        </table-row>
			    </table-byte>
			 </div>
			 	<div class="" v-if="options == 1 || options == 2">
					<div class="form-group has-feedback" :class="form.descripcion_estado == '' ? 'has-error' : 'has-success'">
					  <label class="control-label" for="name">Nombre del estado</label>
					  <input type="text" class="form-control" id="name" v-model="form.descripcion_estado" aria-describedby="inputWarning2Status">
					  <span class="glyphicon glyphicon-warning-sign form-control-feedback" aria-hidden="true"></span>
					  <span id="inputWarning2Status" class="sr-only">(warning)</span>
					</div>
					<div class="form-group">
						<p>
							<button v-if="reg == 0" class="btn btn-success btn-lg" @click="_create()">
								Crear
							</button>
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

<script>
	export default {
		template: "#template-estado-pedido-index",
		data() {
			return {
				options: 0,
				reg: 0,
				form: {
					id: "",
					descripcion_estado: ""
				},
				dataTable: [],
				filters: []
			}
		},
		props: {
			estado: {
				type: Array,
				default: []
			}
		},
		methods: {
			_add() {
				this.options = 1
				this.reg = 0
				this.form = {
	            	id: "",
					descripcion_estado: ""
	            }
			},
			_create() {
				axios.post("", this.form)
				.then( resp => {
					this._showAlert(resp.data.text, "success")
					this.options = 0
					this._reloadTable()
				})
				.catch(error => {
					this._showAlert(error.data.error, "error")
				})
			},
			_edit(item) {
				this.form.id = item.id
				this.form.descripcion_estado = item.descripcion_estado
				this.reg = 1
				this.options = 2
			},
			_updated(){
				axios.put(`estado/${this.form.id}`, this.form)
				.then( resp => {
					this._showAlert(resp.data.text, "success")
					this.options = 0
					this._reloadTable()
				})
				.catch(error => {
					this._showAlert(error.data.error, "error")
				})
			},
			_delete(id){
				swal({
				  title: "¿Estás seguro?",
				  text: "Una vez borrado, no podrás revertir esta acción!",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
				  if (willDelete) {
				    axios.delete(`estado/`+id)
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
			_create() {
				axios.post("", this.form)
				.then( resp => {
					this._showAlert(resp.data.text, "success")
					this.options = 0
					this._reloadTable()
				})
				.catch(error => {
					this._showAlert(error.data.error, "error")
				})
			},
			_reloadTable() {
				axios.get("estado-all")
				.then( resp => {
					this.dataTable = resp.data
				})
				.catch( erro => {

				})
			},
			_showAlert(text, type) {
		        swal({
		            title: "",
		            text: text,
		            timer: 2500,
		            showConfirmButton: false,
		            type: type
		        })
		    }
		},
		mounted() {
			this.dataTable = this.estado
		}
	}	
</script>