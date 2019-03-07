<template id="template-productos-index">
	<div class="container-fluid">
	    <div class="container">
	      <div class="row">
            <div class="col-sm-12 center-align">
                <h1 v-if="options == 0">Productos</h1>
                <h1 v-if="options == 1 || options == 2">{{ options == 1 ? 'Agregar' : 'Actualizar'}} Producto</h1>
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
			        <table-row slot="table-head" slot-scope="{ item }">
			            <table-head>Producto</table-head>
			            <table-head>Categoria</table-head>
			            <table-head>Unidad</table-head>
			            <table-head>Existencia</table-head>
			            <table-head>Precio</table-head>
			            <table-head>Acciones</table-head>
			        </table-row>

			        <table-row slot="table-row" slot-scope="{ item }">
			            <table-cell>{{ item.name }}</table-cell>
			            <table-cell>{{ item.descripcion_categoria }}</table-cell>
			            <table-cell>{{ item.unity }}</table-cell>
			            <table-cell>{{ item.stock }}</table-cell>
			            <table-cell>{{ item.price }}</table-cell>
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
			 	<div class="col-sm-3 form-group">
				  <label class="control-label" for="name">Nombre del producto</label>
				  <input type="text" class="form-control" id="name" v-model="form.name">
				</div>
				<div class="col-sm-3 form-group">
				  <label class="control-label" for="code">Código del producto</label>
				  <input type="text" class="form-control" id="code" v-model="form.code" >
				</div>
				<div class="col-sm-3 form-group" >
				  <label class="control-label" for="stock">Existencia</label>
				  <input type="text" class="form-control" id="stock" v-model="form.stock">
				</div>
				<div class="col-sm-3 form-group">
				  <label class="control-label" for="unity">Unidad</label>
				  <input type="text" class="form-control" id="unity" v-model="form.unity" >
				</div>
				<div class="col-sm-4 form-group">
					<label class="control-label" for="categoria">Categoría</label>
					<select class="form-control" v-model="form.id_categoria" id="categoria" name="categoria">
					  <option value="">Seleccione</option>
					  <option v-for="categoria in categoriasP" v-bind:value="categoria.code" >
					  {{ categoria.descripcion_categoria }}
					  </option>
					</select>
				</div>
				<div class="col-sm-4 form-group">
					<label class="control-label" for="proveedor">Proveedores</label>
					<select class="form-control" v-model="form.id_proveedor" id="proveedor" name="proveedor">
					  <option value="">Seleccione</option>
					  <option v-for="(proveedor, i) in proveedorP" :key="i" value="proveedor.id">
					  {{ proveedor.name }}
					  </option>
					</select>
				</div>
				<div class="form-group col-sm-4">
				  <label class="control-label" for="price">Precio</label>
				  <input type="text" class="form-control" name="price" id="price" v-model="form.price" >
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
	//import ProductForm from './ProductForm';
	//import ProductEdit from './ProductEdit';
	export default {
		template: "#template-productos-index",
		data() {
			return {
				options: 0,
				reg: 0,
				urlBase: urlBase,
	            form: {
	            	id: "",
	            	code: "",
	            	name: "",
	            	stock: "",
	            	id_categoria: "",
	            	id_proveedor: "",
	            	unity: "",
	            	price: ""
	            },
	            categoriasP: [],
	            proveedorP: [],
	            dataTable: [],
	            filters: []
			}
		},
		props: {
			productos: {
				type: Array,
				default: []
			},
			proveedor: {
				type: Array,
				default: []
			},
			categorias: {
				type: Array,
				default: []
			},
			url: {
				type: String,
				default: "" 
			}
		},
		methods: {
			_add() {
				this.options = 1
				this.reg = 0
				this.form = {
	            	id: "",
	            	code: "",
	            	name: "",
	            	stock: "",
	            	id_categoria: "",
	            	id_proveedor: "",
	            	unity: "",
	            	price: ""
	            }
			},
			_create() {
				axios.post(this.urlBase+`intranet/productos/`, this.form)
				.then( resp => {
					this._showAlert(resp.data.text, "success")
					this.options = 0
				})
				.catch(error => {
					this._showAlert(error.data.error, "error")
				})
			},
			_view(item) {

			},
			_edit(item) {
				this.form.id = item.id
				this.form.code = item.code
				this.form.name = item.name
				this.form.stock = item.stock
				this.form.unity = item.unity
				this.form.id_categoria = item.codecat
				this.form.price = item.price
				this.reg = 1
				this.options = 2
			},
			_updated(){
				axios.put(`intranet/productos/` + this.form.id, this.form)
				.then( resp => {
					this._showAlert(resp.data.text, "success")
					this.options = 0
				})
				.catch(error => {
					this._showAlert(error.data.error, "error")
				})
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
				    axios.delete(`productos/`+id)
				    .then( resp => {
					    swal(resp.data.text, {
					      icon: "success",
					    });
				    })
				    .catch( erro => {
				    	swal("Lo sentimos! ha ocurrido un error!", {
					      icon: "error",
					    });
				    })
				  }
				});
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
			this.dataTable = this.productos
			this.categoriasP = this.categorias
			this.proveedorP = this.proveedor
		}
	}
</script>