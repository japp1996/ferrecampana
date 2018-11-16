@extends('layouts.welcome')
@section('title', 'Contácto')
@section('content')
	<section class="block1 background">
	<div class="container">
		<h1 class="with-hr-right text-right"></h1>
	</div>
	</section>

	<section class="section-top-grey block2">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-8 col-md-offset-2 bigpadding goup block3">
				<h2 class="with-hr-center">Contáctanos</h2>
				<p class="text-center">Envíanos tus datos, consultas e inquietudes y nos pondremos en contacto contigo.</p>
				<span id="errores" class="col-xs-12 col-sm-12 alert alert-danger" style="display:none;"></span>
				<div class="row">
					<form onSubmit="return validarForm();" action="" class="form01" id="formulario" name="formulario" method="post" >

						<input type="hidden" name="form" id="form" value="form" />
						<input type="hidden" name="url" id="url" value="contacto-ok.html" />
						<input type="hidden" name="subject" id="subject" value="Envío de formulario de contacto Ferretería la campana" />

						<ul>
							<li class="col-xs-12 col-sm-12"><input name="Nombre" type="text" id="Nombre" placeholder="Nombre*" required/></li>
							<li class="col-xs-12 col-sm-12 col-md-6"><input name="Telefono" type="tel" id="Telefono" placeholder="Teléfono*" required/></li>
							<li class="col-xs-12 col-sm-12 col-md-6"><input name="Email" type="email" id="Email" placeholder="Correo*" required/></li>
							<li class="col-xs-12 col-sm-12"> <textarea name="Comentarios" id="Comentarios" placeholder="Comentarios*" required></textarea> </li>
							<li class="col-xs-12 col-sm-12"><input class="termsConditions" type="checkbox" name="terms" id="validateCheck" ><label  for='validateCheck'><span></span><a href="legal.html">Acepto términos y condiciones</a></label></li>
							
							<li class="col-xs-12 col-sm-12">
								<input type="hidden" name="iso_idioma" id="iso_idioma" value="es" />
								<div class="text-center"><input value="Enviar" class="btn btn-submit btn-lg submit" name="button" type="submit" id="button"></div>
							</li>
						</ul>
					</form>
				</div>

			</div>
		</div>
	</div>
	</section>

	<section class="mapcontent map nopadding">
		<div class="map" id="map_canvas"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3926.1704808996246!2d-67.6008704860991!3d10.247830692681521!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e803c993c6bf457%3A0x35d78e8515908545!2sFerreter%C3%ADa+La+Campana!5e0!3m2!1sen!2sve!4v1528002237224" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe></div>
	</section>
@endsection