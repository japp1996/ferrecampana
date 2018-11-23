<template id="template-password-index">
	<div>
   		<div class="container">
   			<div class="row text-center">
			   <h2 style="color:#000"> Contraseña</h2>
   			</div>
   			<div class="row">
   				<div class="col-md-2"></div>
   				<div class="col-md-8">
   					<div class="form-group">
   						<div class="col-md-6">
   							<input class="form-control" v-model="form.password" type="password" placeholder="Contraseña">
   						</div>
   						<div class="col-md-6">
   							<input class="form-control" v-model="form.password2" type="password" placeholder="Repetir Contraseña">
   						</div>
   						<div class="col-md-12">
	   						<button class="btn btn-primary btn-center" @click="_edit()">Modificar</button>
   						</div>
   					</div>
   				</div>
   			</div>
   		</div>
   </div>
</template>

<script>
	export default {
		template: "#template-password-index",
		data() {
			return {
				form: {
					id: "",
					password: "",
					password2: ""
				}
			}
		},
		methods: {
			_edit() {
				if(this.form.password != this.form.password2 ) {
					swal("", "Las contraseñas deben cohincidir", "info")
					return
				}
				if (this.form.password == "" || this.form.password2 == "") {
					swal("", "Las contraseñas no deben estar vacías", "info")
				}
				swal({
				  title: "¿Estás seguro que deseas cambiar tu contraseña?",
				  text: "",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((accept) => {
				  if (accept) {
				    axios.put(`password/${this.id}`, this.form)
					.then(resp => {
						swal('',resp.data.text,'success')
					})
					.catch(erro => {
						swal('','Disculpe, ha ocurrido un error','error')
					})
				  }
				});
			}
		},
		props: {
			
		}
	}
</script>