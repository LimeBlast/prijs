@extends('layouts.master')

@section('page-title', 'Login | @parent')

@section('content')

	<h1>Login</h1>

	{{ Former::open() }}

		{{ Former::email('email')->required() }}
		{{ Former::password('password')->required() }}

		{{ Former::actions()->primary_submit('Login') }}

	{{Former::close()}}

@stop