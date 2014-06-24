@extends('layouts.master')

@section('page-title', "{$user->username} | @parent")

@section('content')

	<h1>{{{ $user->username }}} <small>{{{ $user->profile->location }}}</small></h1>

	<div class="panel panel-default">
		<div class="panel-heading">
			<h2 class="panel-title"><span class="glyphicon glyphicon-user"></span> Bio</h2>
		</div>
		<div class="panel-body">
			<p>{{ nl2br(e($user->profile->bio)) }}</p>
		</div>
	</div>

	@if ($user->isCurrent())
		{{ link_to_route('profiles.edit', 'Edit Profile', Auth::user()->username, ['class' => 'btn btn-default']); }}
	@endif

@stop