<template id="template-ajuste-index">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 center-align">
                    <h1 >Ajuste de Inventario</h1>
                </div>
            </div>
            <table-byte v-if="!ajust" :set-table="dataTable" :filters="['name']">
                <table-row slot="table-head">
                    <table-head>Producto</table-head>
                    <table-head>Categoria</table-head>
                    <table-head>Unidad</table-head>
                    <table-head>Existencia</table-head>
                    <table-head>Acciones</table-head>
                </table-row>

                <table-row slot="table-row" slot-scope="{ item }">
                    <table-cell>{{ item.name }}</table-cell>
                    <table-cell>{{ item.descripcion_categoria }}</table-cell>
                    <table-cell>{{ item.unity }}</table-cell>
                    <table-cell>{{ item.stock }}</table-cell>
                    <table-cell>
                        <a  @click="_select(item)">
                            <img src="http://localhost:8080/ferrecampana/public/images/icons/edit.png" width="30px" style="display:inline-block" class="img-responsive" >	            		
                        </a>
                    </table-cell>
                </table-row>

                <table-row slot="empty-rows">
                    <table-cell colspan="6">
                        No se encontraron registros.
                    </table-cell>
                </table-row>
            </table-byte>
            <div class="row">

                <div class="" v-if="ajust">
                    <div class="form-group col-sm-12">
					    <p class="">
                            <button class="btn btn-success btn-lg" @click="_back">
                                Volver
                            </button>
					    </p>
                    </div>
                    <div class="form-group center text-center">
                        <p>{{item.name}}</p>
                        <p><b> Disponible:</b> {{item.stock}}</p>
                        <p><b>Categoria:</b>  {{item.descripcion_categoria}}</p>
                        <p><b>Unidad:</b> {{item.unity}}</p>
                    </div>
                    <div class="col-sm-2 col-sm-offset-5 form-group has-feedback">
                        <label class="control-label" for="cantidad">Cantidad</label>
                        <input type="text" class="form-control" id="cantidad" v-model="form.cantidad" aria-describedby="inputSuccess2Status">
                        <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                        <span id="inputSuccess2Status" class="sr-only">(success)</span>
                    </div>
                    <div class="form-group col-sm-12">
					    <p class="text-center">
                            <button class="btn btn-success btn-lg" @click="_ajust">
                                Ajustar
                            </button>
					    </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    template: "#template-ajuste-index" ,
    props: {
        productos: {
            type: Array,
            default: []
        }
    },
    methods: {
        _back() {
            ajust = false
            this.form = {}
        },
        _select(item) {
            this.ajust = true
            this.form.producto_id = item.id
            this.item = item
        },
        _ajust() {
            axios.post('intranet/ajuste', this.form)
            .then(res=> {
                if (res.data.result) {
                    swal('Ajuste realizado satisfactoriamente')
                    this.ajust = false
                }
                axios.post('intranet/ajuste_get')
                .then(res=>{
                    this.dataTable = res.data.productos
                })
                .catch(err=>{
                    let msg = "Disculpe ha ocurrido un error"
                    swal(msg, '', "error")
                })
                this.form = {}
            })
            .catch(err=> {
                let msg = "Disculpe ha ocurrido un error"
                if (err.response.status == 422) {
                    msg = err.response.data.error
                } 
                swal(msg, '', "error")
            })
        }
    },
    data(){ 
        return {
            dataTable: [],
            ajust: false,
            form: {},
            item: {}
        }
    },
    mounted() {
        this.dataTable = this.productos
    }

}
</script>
