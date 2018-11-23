@extends('layouts.admin')
@section('title', 'Pedidos')
@section('content')
	<pedidos-index :categorias="{{ $categorias }}" :productos="{{ $productos }}"></pedidos-index>
@endsection()