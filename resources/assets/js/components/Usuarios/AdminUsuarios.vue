<template id="template-usuarios-index">
	<div class="generalContent">
	    <div class="container">
	      <div class="row">
	        <div class="col-md-12">
	         <div class="datagrid">
				<table-byte :set-table="dataTable" :filters="['name']">
			        <table-row slot="table-head" slot-scope="{ item }">
			            <table-head>No. Documento</table-head>
			            <table-head>Usuario</table-head>
			            <table-head>Email</table-head>
			            <table-head>Acciones</table-head>
			        </table-row>

			        <table-row slot="table-row" slot-scope="{ item }">
			            <table-cell>{{ item.tipodoc + item.number }}</table-cell>
			            <table-cell>{{ item.name }}</table-cell>
			            <table-cell>{{ item.email }}</table-cell>
			            <table-cell>
		                    <i class="text-primary " @click="_view(item)"></i>
		                    <i class="text-primary " @click="_edit(item)"></i>
		                    <i class="text-primary " @click="_confirm(item, 'delete')"></i>
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
		template: "#template-usuarios-index",
		data() {
			return {
				options: 0,
				form: {},
				dataTable: [],
				filters: []
			}
		},
		props: {
			usuarios: {
				type: Array,
				default: []
			}
		},
		methods: {

		},
		mounted() {
			this.dataTable = this.usuarios
		}
	}
</script>