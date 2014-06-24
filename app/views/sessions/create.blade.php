@extends('layouts.master')

@section('page-title', 'Login')

@section('content')

	<h1>Login</h1>

	@if (Session::has('flash_message'))
		<div class="alert alert-warning">{{ Session::get('flash_message') }}</div>
	@endif

	{{ Former::open() }}

		{{ Former::email('email')->required() }}
		{{ Former::password('password')->required() }}

		{{ Former::actions()->primary_submit('Login') }}

	{{Former::close()}}

@stop