<template id="template-proveedor-index">
		<div class="container-fluid">
	    <div class="container">
	      <div class="row">
            <div class="col-sm-12 center-align">
                <h1 v-if="options == 0">Proveedor</h1>
                <h1 v-if="options == 1 || options == 2">{{ options == 1 ? 'Agregar' : 'Actualizar'}} Proveedor</h1>
            </div>
	      </div>
	      <div class="row">	      	
            <div class="col-sm-12 container-btn-add" >
                <button v-if="options == 0" class="btn btn-success" @click="_add()"> Agregar nuevo </button>
                <!--button v-if="options == 0" class="btn btn-success" ><a href="productos/excel" target="_blank"> Exportar EXCEL </a></button>
                <button v-if="options == 0" class="btn btn-danger" ><a href="productos/pdf" target="_blank"> Exportar PDF </a></button-->
                <button v-if="options == 1 || options == 2" class="btn btn-success" @click="options = 0">Volver</button>
            </div>
            <div class="col-sm-12 col-md-12">
	         <div class="datagrid" v-if="options == 0">
				<table-byte :set-table="dataTable" :filters="['name']">
			        <table-row slot="table-head">
			            <table-head>ID</table-head>
			            <table-head>Nombre del proveedor</table-head>
			            <table-head>Status</table-head>
			            <table-head>Acciones</table-head>
			        </table-row>

			        <table-row slot="table-row" slot-scope="{ item }">
			            <table-cell>{{ item.id }}</table-cell>
			            <table-cell>{{ item.name }}</table-cell>
			            <table-cell>{{ item.status == 1 ? 'Activo' : 'Inactivo' }}</table-cell>
			            <table-cell>
			            	<a  @click="_edit(item)">
			                    <img src="http://localhost:8080/ferrecampana/public/images/icons/edit.png" width="30px" style="display:inline-block" class="img-responsive" >	            		
			            	</a>
			            	<a @click="_delete(item.id)">
			                    <img src="http://localhost:8080/ferrecampana/public/images/icons/delete.png" width="30px" style="display:inline-block" class="img-responsive" >
		                    </a>
			            </table-cell>
			        </table-row>

			        <table-row slot="empty-rows">
			            <table-cell colspan="6">
			                No se encontraron registros.
			            </table-cell>
			        </table-row>
			    </table-byte>
			 </div>
			 <div class="" v-if="options == 1 || options == 2">
			 	<div class="col-sm-4 form-group has-feedback">
				  <label class="control-label" for="name">Nombre</label>
				  <input type="text" class="form-control" id="name" v-model="form.name" aria-describedby="inputSuccess2Status">
				  <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
				  <span id="inputSuccess2Status" class="sr-only">(success)</span>
				</div>
				<div class="col-sm-4 form-group has-feedback">
				  <label class="control-label" for="dni">R.I.F:</label>
				  <input type="text" class="form-control" id="dni" v-model="form.dni" aria-describedby="inputWarning2Status">
				  <span class="glyphicon glyphicon-warning-sign form-control-feedback" aria-hidden="true"></span>
				  <span id="inputWarning2Status" class="sr-only">(warning)</span>
				</div>
				<div class="col-sm-4 form-group has-feedback">
				  <label class="control-label" for="description">Descripción</label>
				  <input type="text" class="form-control" id="description" v-model="form.description" aria-describedby="inputWarning2Status">
				  <span class="glyphicon glyphicon-warning-sign form-control-feedback" aria-hidden="true"></span>
				  <span id="inputWarning2Status" class="sr-only">(warning)</span>
				</div>
				<div class="col-sm-4 form-group has-feedback">
				  <label class="control-label" for="contact_name">Nombre de contacto</label>
				  <input type="text" class="form-control" id="contact_name" v-model="form.contact_name" aria-describedby="inputWarning2Status">
				  <span class="glyphicon glyphicon-warning-sign form-control-feedback" aria-hidden="true"></span>
				  <span id="inputWarning2Status" class="sr-only">(warning)</span>
				</div>
				<div class="col-sm-4 form-group has-feedback">
				  <label class="control-label" for="address">Dirección</label>
				  <input type="text" class="form-control" id="address" v-model="form.address" aria-describedby="inputWarning2Status">
				  <span class="glyphicon glyphicon-warning-sign form-control-feedback" aria-hidden="true"></span>
				  <span id="inputWarning2Status" class="sr-only">(warning)</span>
				</div>
				<div class="col-sm-4 form-group has-feedback">
				  <label class="control-label" for="phone">Teléfono</label>
				  <input type="text" class="form-control" id="phone" v-model="form.phone" aria-describedby="inputWarning2Status">
				  <span class="glyphicon glyphicon-warning-sign form-control-feedback" aria-hidden="true"></span>
				  <span id="inputWarning2Status" class="sr-only">(warning)</span>
				</div>
				<div class="form-group">
					<p class="text-center">
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
		template: "#template-proveedor-index",
		data(){
			return {
				options: 0,
				reg: 0,
				form: {
					id: "",
					dni: "",
					name: "",
					contact_name: "",
					description: "",
					phone: "",
					email: "",
					address: ""
				},
				dataTable: []
			}
		},
		methods: {
			_add() {
				this.form.id = ""
				this.form.dni = ""
				this.form.name = ""
				this.form.contact_name = ""
				this.form.description = ""
				this.form.phone = ""
				this.form.email = ""
				this.form.address = ""
				this.options = 1
				this.reg = 0
			},
			_edit(item) {
				this.form.id = item.id
				this.form.dni = item.dni
				this.form.name = item.name
				this.form.contact_name = item.contact_name
				this.form.description = item.description
				this.form.phone = item.phone
				this.form.email = item.email
				this.form.address = item.address
				this.options = 2
				this.reg = 1
			},
			_create() {
				axios.post("", this.form)
				.then( resp => {
					this._showAlert(resp.data.text, "success")
					this.options = 0
					this.dataTable.push(this.form)
				})
				.catch(error => {
					
					this._showAlert(error.data.error, "error")
				})
			},
			_updated() {
				let index = this.dataTable.findIndex(e => {
	                return e.id == this.form.id
	            })

				let formData = new FormData;
				formData.append('id', this.form.id)
				formData.append('dni', this.form.dni)
				formData.append('name', this.form.name)
				formData.append('description', this.form.description)
				formData.append('phone', this.form.phone)
				formData.append('email', this.form.email)
				formData.append('contact_name', this.form.contact_name)
				formData.append('address', this.form.address)
				formData.append('_method', 'PUT')


				axios.post("intranet/proveedores/" + this.form.id, formData)
				.then( resp => {
					this._showAlert(resp.data.text, "success")
					this.dataTable[index] = this.form
					this.options = 0
				})
				.catch(error => {
					this._showAlert(error.data.error, "error")
				})
			},
			_delete(id) {

				let index = this.dataTable.findIndex(e => {
	                return e.id == id
	            })

				axios.delete("intranet/proveedores/" + this.form.id)
				.then(resp => {
					this._showAlert(resp.data.text, "success")
					this.options = 0
					this.dataTable.splice(index, 1)
				})
				.catch(erro => {
					this._showAlert(erro.data.error, "success")
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
		props: {
			proveedores: {
				type: Array,
				default: []
			},
		},
		mounted() {
			this.dataTable = this.proveedores
		}
	}
</script>