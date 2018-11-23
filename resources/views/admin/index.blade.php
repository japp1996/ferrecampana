@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
	<dashboard-index :pedido="{{ $pedido }}" :requi="{{$requi}}" :recep="{{$recep}}" :oc="{{$oc}}" :respaldo="{{$respaldo}}" :restauracion="{{$restauracion}}" :registros="{{$registros}}" :actualizacion="{{ $actualizacion }}" :borrado="{{ $borrado }}"></dashboard-index>
@endsection()