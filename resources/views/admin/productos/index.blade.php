@extends('layouts.admin')
@section('title', 'Productos')
@section('content')
	<productos-index :productos="{{ $productos }}" :categorias="{{ $categorias }}">
		
	</productos-index>
@endsection()