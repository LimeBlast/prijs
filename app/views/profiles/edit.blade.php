@extends('layouts.master')

@section('page-title', "Edit {$user->username} | @parent")

@section('content')

	<h1>Edit {{ $user->username }}</h1>

	{{ Former::open()->route('profiles.update', $user->username)->method('PATCH') }}

		{{ Former::populate($user->profile) }}

		{{ Former::text('location') }}
		{{ Former::textarea('bio') }}

		{{ Former::actions()->primary_submit('Update profile')->inverse_reset('Reset') }}

	{{ Former::close() }}

@stop