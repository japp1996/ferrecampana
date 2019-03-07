@extends('layouts.admin')
@section('title', 'Proveedores')
@section('content')
	<proveedor-index :proveedores=" {{ $proveedores }}"></proveedor-index>
@endsection()