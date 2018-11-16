@extends('layouts.admin')
@section('title', 'Estado de Pedido')
@section('content')
	<estado-pedido-index :estado="{{ $estado }}"></estado-pedido-index>
@endsection()