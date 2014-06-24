@extends('layouts.master')

@section('page-title', 'Register | @parent')

@section('content')

	<h1>Register</h1>

	{{ Former::open() }}

		{{ Former::text('username')->required() }}
		{{ Former::email('email')->required() }}
		{{ Former::password('password')->required() }}
		{{ Former::password('password_confirmation')->required() }}

		{{ Former::actions()->primary_submit('Submit')->inverse_reset('Reset') }}

	{{Former::close()}}

@stop