<template id="template-restaurar-index">
   <div>
   		<div class="container">
   			<div class="row text-center">
			   <h2 style="color:#000"> Mi perfil</h2>
   			</div>
   			<div class="row">
   				<div class="col-md-2"></div>
   				<div class="col-md-8">
   					<div class="form-group">
   						<div class="col-md-6">
   							<input class="form-control" v-model="form.number" type="text" placeholder="Número de Documento">
   						</div>
   						<div class="col-md-6">
   							<input class="form-control" v-model="form.name" type="text" placeholder="Nombres y Apellidos">
   						</div>
   						<div class="col-md-6">
	   						<input class="form-control" v-model="form.email" type="email" placeholder="Email">						
   						</div>
   						<div class="col-md-6">
	   						<input class="form-control" v-model="form.phone" type="tel" placeholder="Teléfono">						
   						</div>
   						<div class="col-md-12">
	   						<textarea class="form-control" v-model="form.address" type="text" placeholder="Dirección"></textarea>					
   						</div>
   						<div class="col-md-12">
	   						<button class="btn btn-primary btn-center" @click="_edit()">Actualizar</button>
	   						<button class="btn btn-danger btn-center" @click="_delete()">Borrar</button>
   						</div>
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
					id: "",
					number: "",
					name: "",
					email: "",
					phone: "",
					address: ""
				}
			}
		},
		methods: {
			_edit() {
			    axios.put(`perfil/${this.form.id}`, this.form)
			    .then( resp => {
			    	swal("",resp.data.text,"success")
			    })
			    .catch( erro => {
			    	swal("","Disculpe, Ha ocurrido un error","error")
			    })
			},
			_delete() {
				swal({
				  title: "¿Estás seguro que deseas borrar tu cuenta?",
				  text: "Una vez borrada, no podrás revertir esta acción!",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
				  if (willDelete) {
				    axios.delete(`perfil/`+this.form.id)
				    .then( resp => {
					    swal(resp.data.text, {
					      icon: "success",
					    });
					    window.location = resp.data.location;
				    })
				    .catch( erro => {
				    	swal("Lo sentimos! ha ocurrido un error!", {
					      icon: "error",
					    });
				    })
				  }
				});
			}
		},
		props:{
			usuario: {
				type: Array,
				default: []
			}
		},
		mounted() {
			this.form.id = this.usuario.id
			this.form.number = this.usuario.number
			this.form.name = this.usuario.name
			this.form.email = this.usuario.email
			this.form.phone = this.usuario.phone
			this.form.address = this.usuario.address
		}
	}
</script>