@extends('layouts.admin')
@section('title', 'Pedidos')
@section('content')
	<pedidos-index-show :pedidos="{{ $pedidos }}"></pedidos-index-show>
@endsection()
