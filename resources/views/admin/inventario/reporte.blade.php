@extends('layouts.admin')
@section('title', 'Reporte Inventario')
@section('content')
	<reporte-index :movimiento="{{ $movimiento }}"></reporte-index>
@endsection()