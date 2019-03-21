<template id="template-auditoria-index">
	<div>
	    <div class="container">
	      <div class="row">
            <div class="col-sm-12 center-align">
                <h1>Auditoria de usuarios</h1>
            </div>
	      </div>
	      <div class="row">	      	
	        <div class="col-md-12">
		         <div class="datagrid">
					<table-byte :set-table="dataTable" :filters="['accion']">
				        <table-row slot="table-head">
				            <table-head>N°</table-head>
				            <table-head>Usuario</table-head>
				            <table-head>Accion</table-head>
				            <table-head>Rama</table-head>
				            <table-head>Detalle</table-head>
				            <table-head>Fecha</table-head>
				        </table-row>

				        <table-row slot="table-row" slot-scope="{ item }">
				            <table-cell>{{ item.id }}</table-cell>
				            <table-cell>{{ item.user }}</table-cell>
				            <table-cell>{{ item.operacion }}</table-cell>
				            <table-cell>{{ item.rama }}</table-cell>
				            <table-cell>{{ item.detalles_operacion }}</table-cell>
				            <table-cell>{{ item.created_at }}</table-cell>
				        </table-row>

				        <table-row slot="empty-rows">
				            <table-cell colspan="6">
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
		template: "#template-auditoria-index",
		data() {
			return {
				dataTable: [],
				filters: []
			}
		},
		props: {
			auditoria: {
				type: Array,
				default: []
			}
		},
		mounted() {
			this.dataTable = this.auditoria
		}
	}	
</script>