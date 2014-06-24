@extends('layout')

@section('content')

	<h1>Register</h1>

	{{ Former::open() }}

		{{ Former::text('username')->required() }}
		{{ Former::email('email')->required() }}
		{{ Former::password('password')->required() }}
		{{ Former::password('password_confirmation')->required() }}

		{{ Former::actions()->large_primary_submit('Submit')->large_inverse_reset('Reset') }}

	{{Former::close()}}

@stop