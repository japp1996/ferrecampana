@extends('layouts.admin')
@section('title', 'Categorias')
@section('content')
	<categorias-index :categorias="{{ $categorias }}"></categorias-index>
@endsection()