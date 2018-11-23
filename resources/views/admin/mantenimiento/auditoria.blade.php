@extends('layouts.admin')
@section('title', 'Auditoria')
@section('content')
  <auditoria-index :auditoria="{{ $auditoria }}"></auditoria-index>
@endsection()