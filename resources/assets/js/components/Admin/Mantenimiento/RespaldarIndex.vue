<template id="template-respaldar-index">
   <div>
   		<div class="container">
   			<div class="row text-center">
			   <h2 style="color:#000"> Respaldar Datos</h2>
   			</div>
   			<div class="row">
   				<div class="col-md-4"></div>
   				<div class="col-md-4">
   					<div class="form-group">
   						<input class="form-control" type="text" v-model="form.server" placeholder="Servidor">
   						<input class="form-control" type="text" v-model="form.user" placeholder="Usuario">
   						<input class="form-control" type="password" v-model="form.password" placeholder="Contraseña">
   						<input class="form-control" type="text" v-model="form.database" placeholder="Base de Datos">
   						<button class="btn btn-primary btn-center" @click="_backup()">Respaldar</button>
   					</div>
   				</div>
   			</div>
   		</div>
   </div>
</template>

<script>
	export default {
		template: "#template-respaldar-index",
		data() {
			return {
				form: {
					server: "",
					user: "",
					password: "",
					database: ""
				}
			}
		},
		methods: {
			_backup() {
				axios.post("",this.form)
				.then(resp => {
					swal("",resp.data.text,"success")
					this.form = {
						server: "",
						user: "",
						password: "",
						database: ""
					}
				})
				.catch(erro => {
					swal("","Disculpe, ha ocurrido un error","warning")
				})
			}
		},
		props:{

		},
		mounted() {

		}
	}
</script>