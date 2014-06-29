<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>
		@section('page-title')
			Prijs (Dutch for Prize)
		@show
	</title>

	<link href="/assets/stylesheets/frontend.css" rel="stylesheet">
</head>

<body>

@include('layouts.partials.navbar')

<div class="container">
	@include('layouts.partials.notifications')
	@yield('content')
</div>

<script src="/assets/javascript/frontend.js"></script>

</body>
</html>
