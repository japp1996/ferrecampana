@extends('layouts.admin')
@section('title', 'Orden de Compra')
@section('content')
	<orden-compra-index :proveedores="{{$proveedores}}" :orden="{{ $orden }}" :requisicion="{{ $requisicion }}"></orden-compra-index>
@endsection()