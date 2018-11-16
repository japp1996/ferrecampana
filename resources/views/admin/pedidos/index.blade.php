@extends('layouts.admin')
@section('title', 'Pedidos')
@section('content')
	<pedidos-index :categorias="{{ $categorias }}" :pedidos="{{ $pedidos }}" :productos="{{ $productos }}"></pedidos-index>
@endsection()