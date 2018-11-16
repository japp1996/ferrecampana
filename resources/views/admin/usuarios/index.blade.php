@extends('layouts.admin')
@section('title', 'Usuarios')
@section('content')
	<usuarios-admin :usuarios="{{ $usuarios }}"></usuarios-admin>
@endsection()