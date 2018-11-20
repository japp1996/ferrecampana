@extends('layouts.admin')
@section('title', 'Requisicion')
@section('content')
	<requisicion-index-show :requisicion="{{ $requisicion }}"></requisicion-index-show>
@endsection()