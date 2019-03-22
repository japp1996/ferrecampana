<template id="template-reporte-index">
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
                    <h1>Reporte de Inventario</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="datagrid">
                        <table-byte :set-table="dataTable">
                            <table-row slot="table-head">
                                <table-head></table-head>
                                <table-head>Producto</table-head>
                                <table-head>Entrada</table-head>
                                <table-head>Salida</table-head>
                                <table-head>Fecha</table-head>
                            </table-row>

                            <table-row slot="table-row" slot-scope="{ item }">
                                <table-cell>{{ item.code }}</table-cell>
                                <table-cell> {{ item.producto.name }} </table-cell>
                                <table-cell> {{ item.tipo_movimiento == '1' ? item.cantidad : ''}} </table-cell>
                                <table-cell>{{ item.tipo_movimiento == '2' ? item.cantidad : ''}}</table-cell>
                                <table-cell>{{ item.created_at }}</table-cell>
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
    props: {

    },
    template: "#template-reporte-index" ,
    data() {
        return {
            dataTable: [],
            stock: 0
        }
    },
    methods: {
        _getStock(it){
            return this.stock = it.tipo_movimiento == 1 ? this.stock + it.cantidad : this.stock -it.cantidad
        }
    },
    props: {
        movimiento: []
    },
    mounted() {
        this.dataTable = this.movimiento
    }
}
</script>
