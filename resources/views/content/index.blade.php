@extends('layouts.welcome')
@section('title', 'Bienvenido')
@section('content')
	<!-- Carrousel -->
	<div class="owl-container clearfix">
		<div class="owl-carousel mainslider-full" id="owl-home">
			<div class="item">
				<a href="#">
					<img src="{{ asset('pics_fotosslide/1/esslide1.jpg') }}" alt="">
				</a>
				<div class="claim-container container">
					<div class="inner-claim-container">
						<em class="h1like">
							<span>Venta de productos de ferretería,<br/> bricolaje, jardín, menaje, hogar y<br/> material de construcción</span>
						</em>
						<div class="text">
							<span></span>
						</div>
					</div>
				</div>
			</div>
			<div class="item">
				<a href="#"
				>
					<img src="{{ asset('pics_fotosslide/1/esslider2.jpg')}}" alt="">
				</a>
				<div class="claim-container container">
					<div class="inner-claim-container">
						<em class="h1like">
							<span>Venta de productos de ferretería,<br/> bricolaje, jardín, menaje, hogar y<br/> material de construcción</span>
						</em>
						<div class="text">
							<span></span>
						</div>
					</div>
				</div>
			</div>	
		</div><!-- End carrousel -->
	</div><!-- Content -->
	<section class="block2 section-top-grey section-bottom-grey" style="padding: 10px 0 10px 0"></section>
	<section class="block1">
		<div class="container">
			<h2 class="with-hr-center" style="color:#fff;">¿Porqué Nosotros?</h2>
			<div class="block-third">
				<div class="third">
					<span class="icon-user"></span>
					<h3>Ahorras tiempo al hacer tus pedidos</h3>
					<p>Con tan sólo un click tu pedido será apartado y deberás retirarlo en menos de 24 horas.</p>				<!--a href="servicios-cadena-ferreterias.html" title="productos bricolaje para particulares y profesionales" class="btn btn-default btn-lg">Ver más</a-->
				</div>
				<div class="third third-big">
					<span class="icon-nail"></span>
					<h3>Puedes acceder con un dispositivo conectado a internet</h3>
					<p>Sin limitaciones. Desde una computadora, teléfono o tablet podrá ingresar al sistema . </p>				<!--a href="servicios-cadena-ferreterias.html" title="cadena de tiendas en ferretería" class="btn btn-default btn-lg">Ver más</a-->
				</div>
				<div class="third">
					<span class="icon-hammer"></span>
					<h3>Evita el viaje hasta nuestra tienda</h3>
					<p>Muchos de nosotros vivimos en las ocupacione de la vida diaria y para ayudate te permitimos que sepas si tienes tu artículo para evitarte pérdida de tiempo.</p>				<!--a href="servicios-cadena-ferreterias.html" title="venta productos ferretería" class="btn btn-default btn-lg">Ver más</a-->
				</div>
			</div>
		</div>
	</section>

	<section class="section-top-white">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-5">
					<img src="{{ asset('images/branding/home-about-us.jpg') }}" alt="profesionales del bricolaje" class="img-responsive center-block">
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-1">
					<h1 class="with-hr-left text-left">Tu mejor ferretería</h1>
					<p class="subtitle">Ferretería la Campana, C.A. es una tiendas dedicadas a la venta de productos de ferretería, artículos para el hogar, jardín, material de construcción y suministros.</p>
					<p>Nuestra misión: Dar el mejor servicio mediante la atención cordial a los clientes. Nos adaptamos a las necesidades y expectativas de los mismos con unos precios muy competitivos, aportando como valor añadido una cercanía y proximidad Real al cliente y una calidad en productos. </p>				<!--a href="quienes-somos.html" title="ferbric, profesionales del bricolaje" class="btn btn-submit btn-lg">Ver más</a-->
				</div>
				
			</div>
			
		</div>
	</section>
	<section class="home-ventajas">
		<div class="container">
			<h2 class="with-hr-center">Nuestras ventajas</h2>
			<div class="text-center"><p class="subtitle">La Ferreteria la campana es una tienda dedicada a la venta de productos de ferretería</p></div>
			<div class="row">
				<div class="ventaja col-xs-12 col-sm-12 col-md-6">
					<span class="icon-reseller"></span>
					<h3>Acuerdos con proveedores</h3>
					<p>Tenemos acuerdos con los mejores proveedores del sector, consiguiendo los mejores precios para ti.</p>			
				</div>
				<div class="ventaja col-xs-12 col-sm-12 col-md-6">
					<span class="icon-box"></span>
					<h3>Consejo y apoyo a nuestros asociados</h3>
					<p>Tenemos una red de promotores que cubre todo el territorio nacional, junto con el soporte de los profesionales de nuestra Central.</p>			
				</div>
			</div>
		</div>
	</section>
@endsection()
@section('script')
	<script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script>
      $(document).ready(function(){
		
        $('#owl-home').owlCarousel({
          items: 1,
          loop: true,
          autoplay: true,
          autoplayTimeout: 3000,
          nav: false,
          dots: false,
          navText: ["",""]
        })
      });
    </script>
@endsection()