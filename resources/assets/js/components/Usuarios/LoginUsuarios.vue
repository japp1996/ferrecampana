<template id="template-usuarios-login">
	<div id="wrapper" >
	    <div id="content">
			<div class="login-panel">
                <h2 class="" style="color:#000">Iniciar Sesión</h2>
                <hr style="margin: 1px 0 1px 0">
				<form>
					<ul>
						<li class="full"><input name="email" v-model="form.email" type="text" id="email" maxlength="50" size="50" placeholder="Email:"></li>
						<li class="full"><input name="password" v-model="form.password" type="password" id="password" maxlength="15" size="15" placeholder="Contraseña:"></li>

                        <li class="full"><div class="alert alert-danger" id="errores" style="display:none;"></div></li>
						<li class="full"><input value="Entrar" type="button" @click="ajax()" class="btn btn-default"></li>
                        <li class="full"><br><p class="text-center"><a href="">¿Olvidaste tu Contraseña?</a></p></li>
                    </ul>
				</form>
			</div>
		</div>
	</div>	
</template>

<script>
	export default {
		template: "#template-usuarios-login",
		data() {
			return {
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
				
				axios.post("", formData)
			  	.then( response => {
			  		if(response.data.result){
						window.location = response.data.location
			  		} else {
    					swal({
							text: response.data.error,
							title: "Error",
							timer: 2500,
							icon: "error",
							button: false
						})			  			
			  		}

			  	})
			  	.catch(error => {
					swal({
						text: error.response.data.error,
						title: "Atención",
						timer: 2500,
						icon: "warning",
						button: false
					})  
			  	})
			}
		}
	}
</script>