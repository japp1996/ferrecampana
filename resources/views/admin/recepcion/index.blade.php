@extends('layouts.admin')
@section('title', 'Recepción')
@section('content')
	<recepcion-index :orden="{{ $orden }}" :recepcion="{{ $recepcion }}"></recepcion-index>
@endsection()