@extends('layouts.admin')
@section('title', 'Reporte Ajuste Inventario')
@section('content')
	<reporte-ajuste-index :productos="{{$productos}}"></reporte-ajuste-index>
@endsection()