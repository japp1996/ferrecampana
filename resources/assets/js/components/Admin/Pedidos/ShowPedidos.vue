<template id="template-pedidos-index-show">
	<div>
	    <div class="container">
	       <div class="row">
            <div class="col-sm-12 center-align">
                <h1 v-if="options == 0">Pedidos</h1>
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
		                    <a  @click="_edit(item)">
			                    <img class="img-responsive" >E		            		
			            	</a>
			            	<a @click="_delete(item.id)">
			                    <img class="img-responsive" >B
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

<script>
	export default {
		template: "#template-pedidos-index-show",
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
				    axios.delete(`pedidos/`+id)
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
				axios.get("pedidos-get")
				.then( resp => {
					this.dataTable = resp.data
				})
				.catch( erro => {

				})
			}
		},
		props: {
			pedidos: {
				type: Array,
				default: []
			}
		},
		mounted() {	
			this.dataTable = this.pedidos
		}
	}
</script>