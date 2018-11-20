@extends('layouts.admin')
@section('title', 'Perfil')
@section('content')
	<perfil-index :usuario="{{ $usuario }}"></perfil-index>
@endsection()