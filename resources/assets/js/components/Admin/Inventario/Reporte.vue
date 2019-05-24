<template id="template-reporte-ajuste-index">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 center-align">
                    <h1 >Reporte de Inventario</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 form-group">
					<label class="control-label" for="categoria">Producto</label>
					<select class="form-control" v-model="form.producto_id" id="producto_id" name="producto_id">
					  <option v-if="productos.length > 0" value="">Seleccione</option>
                      <option v-else value="" selected> No han habido ajustes con ningun articulo.</option>
					  <option v-for="producto in productos" :key="producto.id" :value="producto.id">{{producto.name}}</option>
					</select>
				</div>
                <div class="col-sm-2 form-group">
					<p>
						<button class="btn btn-success btn-lg" @click="_query">
							Consultar
						</button>				
					</p>
				</div>
            </div>
            <table-byte :set-table="dataTable" :filters="['name']">
                <table-row slot="table-head">
                    <table-head>Producto</table-head>
                    <table-head>Entrada</table-head>
                    <table-head>Salida</table-head>
                    <table-head>Fecha</table-head>
                </table-row>

                <table-row slot="table-row" slot-scope="{ item }">
                    <table-cell>{{ item.producto.name }}</table-cell>
                    <table-cell v-if="item.tipo_movimiento  == '1' || item.tipo_movimiento  == '3'">{{ item.cantidad }}</table-cell>
                    <table-cell v-else></table-cell>
                    <table-cell v-if="item.tipo_movimiento  == '2' || item.tipo_movimiento == '4'">{{ item.cantidad }}</table-cell>
                    <table-cell v-else></table-cell>                    
                    <table-cell>{{ item.created_at }}</table-cell>
                </table-row>

                <table-row slot="empty-rows">
                    <table-cell colspan="6">
                        No se encontraron registros.
                    </table-cell>
                </table-row>
                <table-row v-if="dataTable.length > 0">
                    <table-cell colspan="6">
                        No se encontraron registros.
                    </table-cell>
                </table-row>
            </table-byte>
        </div>
    </div>
</template>

<script>
export default {
    template: "#template-reporte-ajuste-index" ,
    props: {
        productos: {
            type: Array,
            default: []
        }
    },
    methods: {
        _query() {
            if (this.form.producto_id == "") {
                swal("Por favor, Seleccione un producto.");
            }

            axios.post('intranet/inventario', this.form)
            .then(res=>{

                if (res.data.data == "") {
                    swal("No existen movimientos para este producto.")
                }
                this.dataTable = res.data.data
            })
            .catch(err=>{
                let msg = "Disculpe ha ocurrido un error"
                if (err.response.status == 422) {
                    msg = err.response.data.error
                } 
                swal(msg, '', "error")
            })
        }
    },
    data() {
        return {
            dataTable: [],
            form: {
                producto_id: ""
            },
            products: []
        }
    },
    mounted(){
        this.products = this.productos
    }
}
</script>
