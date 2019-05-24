@extends('layouts.admin')
@section('title', 'Reporte Inventario')
@section('content')
	<reporte-index :productos="{{ $productos }}"></reporte-index>
@endsection()