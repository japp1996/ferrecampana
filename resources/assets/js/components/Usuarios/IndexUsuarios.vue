<template id="template-usuarios-index">
	<section id="formulario">
		<div class="container">
			<div class="row">
				<h2 class="with-hr-center" style="color:#000">Create una cuenta</h2>
				<div class="text-center"><p class="subtitle">Una vez completado el registro podrá ingresar al Sistema de pedidos de<br /> Ferretería la Campana, consulte nuestros productos y aparte los que necesite.</p></div>
				<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
					<div class="row">
						<form onSubmit="return validarForm();" action="" class="form01" id="formulario" name="formulario" method="post" >
							
							<input type="hidden" name="form" id="form" value="form" />
							<input type="hidden" name="url" id="url" value="contacto-ok.html" />
							<input type="hidden" name="subject" id="subject" value="Envío de formulario de contacto Ferretería la Campana"/>
							<ul>
								<li class="col-xs-12 col-sm-12 col-md-6">
									<label>Tipo de documento*</label>
									<select v-model="form.tipodoc" name="tipodedoc" type="text" id="tipodedoc">
										<option value="V">V - Venezolano</option>
										<option value="E">E - Extranjero</option>
										<option value="J">J - Jurídico</option>
										<option value="G">G - Gubernamental</option>
									</select>
								</li>

								<li class="col-xs-12 col-sm-12 col-md-6"><input v-model="form.number" name="cedula" type="text" id="cedula" placeholder="Número de documento*" required/></li>

								<li class="col-xs-12 col-sm-12 col-md-6"><input v-model="form.name" name="nombre" type="text" id="nombre" placeholder="Nombre o Razon Social*" required/></li>

								<li class="col-xs-12 col-sm-12 col-md-6"><input v-model="form.password" name="contrasena" type="password" id="contrasena" placeholder="Contraseña*" required/></li>

								<li class="col-xs-12 col-sm-12 col-md-6"><input v-model="form.password2" name="repcontrasena" type="password" id="repcontrasena" placeholder="Repita la Contraseña*" required/></li>

								<li class="col-xs-12 col-sm-12 col-md-6"><input v-model="form.email" name="email" type="email" id="email" placeholder="correo*" required/></li>

								<li class="col-xs-12 col-sm-12 col-md-6"><input v-model="form.phone" name="telefono" type="tel" id="telefono" placeholder="Teléfono*" required/></li>

								<li class="col-xs-12 col-sm-12"><textarea v-model="form.address" name="direccion" type="tel" id="direccion" placeholder="Dirección*" required/></textarea></li>

								<li class="col-xs-12 col-sm-12 col-md-12"><input v-model="form.date" name="fechanac" type="date" id="fechanac" placeholder="fecha*" required/></li>
								
								<li class="col-xs-12 col-sm-12">
									<input type="hidden" name="iso_idioma" id="iso_idioma" value="es" />
									<div class="text-center"><input value="Enviar" class="btn btn-submit btn-lg" @click="ajax()" name="button" type="button" id="button"></div>
								</li>
							</ul>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

<script>
	export default {
		template: "#template-usuarios-index",
		data() {
			return {
				form: {
					tipodoc: "",
					number: "",
					name: "",
					password: "",
					password2: "",
					email: "",
					phone: "",
					address: "",
					date: ""
				}
			}
		},
		props: {

		},
		methods: {
			ajax() {
				let formData = new FormData();
           		formData.append("tipodoc", this.form.tipodoc);
           		formData.append("number", this.form.number);
           		formData.append("name", this.form.name);
           		formData.append("password", this.form.password);
           		formData.append("password2", this.form.password2);
           		formData.append("email", this.form.email);
           		formData.append("phone", this.form.phone);
           		formData.append("address", this.form.address);
           		formData.append("date", this.form.date);
				
				axios.post("", formData)
			  	.then( response => {
			  		console.log(response)
			    	swal({
						text: response,
						title: "Ok",
						timer: 3000,
						icon: "success",
						button: false
					})
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
		},
		mounted() {
			//swal('hi','hio','success')
		}
	}
</script>