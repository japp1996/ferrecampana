<template id="template-usuarios-login">
	<section id="formulario">
		<div class="container">
			<div class="row">
				<div id="wrapper" >
				    <div id="content">
						<div class="login-panel">
			                <h2 class="with-hr-center" style="color:#000">Iniciar Sesión</h2>
			                <hr style="margin: 1px 0 1px 0">
			                <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1">
								<div class="row">
									<form>
										<ul>
											<li class="full"><input name="email" v-model="form.email" type="text" id="email" maxlength="50" size="50" placeholder="Email:"></li>
											<li class="full"><input name="password" v-model="form.password" type="password" id="password" maxlength="15" size="15" placeholder="Contraseña:"></li>

					                        <li class="full"><div class="alert alert-danger" id="errores" style="display:none;"></div></li>
											<li class="full"><input value="Entrar" type="button" @click="ajax()" class="btn btn-default"></li>
					                        <!--li class="full"><br><p class="text-center"><a href="">¿Olvidaste tu Contraseña?</a></p></li-->
					                    </ul>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

<script>
	export default {
		template: "#template-usuarios-login",
		data() {
			return {
				url: urlBase,
				form: {
					email: "",
					password: ""
				}
			}
		},
		methods: {
			ajax(){
				let formData = new FormData();
           		formData.append("email", this.form.email);
           		formData.append("password", this.form.password);
				
				axios.post("login", formData)
			  	.then( response => {
			  		if(response.data.result){
						window.location = response.data.location
			  		} else {
    					swal("Error", response.data.error ,"error",)			  			
			  		}

			  	})
			  	.catch( error => {
			  		let message = "Disculpe, ha ocurrido un error";
			  		//if (error.response.status == 422) {
			  			//message = error.response.data.error;
			  		//}
					swal("Atención", message, "warning")
			  	})
			}
		}
	}
</script>