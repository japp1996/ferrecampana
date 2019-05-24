@extends('layouts.admin')
@section('title', 'Ajuste')
@section('content')
	<ajuste-index :productos="{{$productos}}"></ajuste-index>
@endsection()