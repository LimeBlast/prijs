@extends('layouts.master')

@section('page-title', 'Register | @parent')

@section('content')

	<h1>Register</h1>

	{{ Former::open() }}

		<fieldset>
			{{ Former::legend('Details')}}
			{{ Former::text('username')->required() }}
			{{ Former::email('email')->required() }}
			{{ Former::password('password')->required() }}
			{{ Former::password('password_confirmation')->required() }}
		</fieldset>

		<fieldset>
			{{ Former::legend('Profile')}}
			{{ Former::text('profile.location')->name('profile[location]')->label('Location') }}
			{{ Former::textarea('profile.bio')->name('profile[bio]')->label('Bio') }}
		</fieldset>

		{{ Former::actions()->primary_submit('Submit')->inverse_reset('Reset') }}

	{{Former::close()}}

@stop