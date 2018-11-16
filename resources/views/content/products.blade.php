@extends('layouts.welcome')
@section('title', 'Productos')
@section('content')
	<section class="block1 background">
		<div class="container">
			<h1 class="with-hr-right text-right" style="color:#fff">Nuestros productos</h1>
			<div class="text-right"><p class="subtitle"></p></div>
		</div>
	</section>
	<section class="block2 section-top-grey">
		<div class="container">
			<div class="promoslist goup row">
				<ul>
					<li class="col-xs-12 col-sm-12 col-md-6">
						<div class="contenttext sameheight_products">
							<div class="innercontenttext">
								<h3 class="title">VERANO FERRECAMPANA 2018</h3>
								<div class="textintro">Valida hasta: 24 de Junio 2018</div>
								<a href="{{ asset('downloads/verano-ferbric-2018.pdf') }}" class="btn btn-link">
									<span class="icon-download">Descargar folleto</span>
								</a>
							</div>
						</div>
						<div class="contentfoto sameheight_products">
							<img src="{{ asset('images/promociones/th_crop_1527241635verano-ferbric-2018.jpg') }}" alt="VERANO FERRECAMPANA 2018" class="img-responsive center-block" />
						</div>
					</li>

					<li class="col-xs-12 col-sm-12 col-md-6">
						<div class="contenttext sameheight_products">
							<div class="innercontenttext">
								<h3 class="title">PRIMAVERA FERRECAMPANA 2018</h3>
								<div class="textintro">Valida hasta: 15 de Julio 2018</div>
								<a href="{{ asset('downloads/primavera-ferbric-2018.pdf') }} " class="btn btn-link">
									<span class="icon-download">Descargar folleto</span>
								</a>
							</div>
						</div>
						<div class="contentfoto sameheight_products">
							<img src="{{ asset('images/promociones/th_crop_1521110485primavera-ferbric-2018.jpg') }} " alt="PRIMAVERA FERRECAMPANA 2018" class="img-responsive center-block" />
						</div>
					</li>		
				</ul>
			</div>
		</div>
	</section>
	<section class="home-ventajas">

	</section>
@endsection()