@extends('layouts.admin')
@section('title', 'Requisición')
@section('content')
	<requisicion-index :categorias="{{ $categorias }}" :requisicion="{{ $requisicion }}" :productos="{{ $productos }}"></requisicion-index>
@endsection()