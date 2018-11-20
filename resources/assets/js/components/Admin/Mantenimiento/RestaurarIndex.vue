<template id="template-restaurar-index">
   <div>
   		<div class="container">
   			<div class="row text-center">
			   <h2 style="color:#000"> Restaurar Datos</h2>
   			</div>
   			<div class="row">
   				<div class="col-md-4"></div>
   				<div class="col-md-4">
   					<div class="form-group">
   						<input class="form-control" type="text" placeholder="Servidor">
   						<input class="form-control" type="text" placeholder="Usuario">
   						<input class="form-control" type="password" placeholder="Contraseña">
   						<label for="" class="form-control">Archivo SQL</label>
   						<input class="form-control" id="file" v-model="form.database" name="file" type="file" placeholder="Base de Datos">
   						<button class="btn btn-primary btn-center">Respaldar</button>
   					</div>
   				</div>
   			</div>
   		</div>
   </div>
</template>

<script>
	export default {
		template: "#template-retaurar-index",
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
			_restore() {
				console.log(this.form.database)
				
				var formData = new FormData();
				formData.append("server", this.form.server);
				formData.append("user", this.form.user);		
				formData.append("password", this.form.password);
				formData.append("database", this.form.database);
				var imagefile = document.querySelector('#file');
				formData.append("image", imagefile.files[0]);

			    axios.post('', formData, {
			        headers: {
			          'Content-Type': 'multipart/form-data'
			        }
			    })
			    .then( resp => {

			    })
			    .catch( erro => {

			    })
			}
		},
		props:{

		},
		mounted() {

		}
	}
</script>