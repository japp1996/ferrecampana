@extends('layouts.admin')
@section('title', 'Productos')
@section('content')
	<productos-index :productos="{{ $productos }}" :proveedor="{{ $proveedores }}" :categorias="{{ $categorias }}">
		
	</productos-index>
@endsection()