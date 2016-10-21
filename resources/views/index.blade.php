@extends('layouts.master')

@section('head')
<link rel="stylesheet" type="text/css" href="css/index.css">
@stop

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-6 function-link">
			<a href="/lorem">Lorem Ipsum</a>
		</div>
		<div class="col-xs-6 function-link">
			<a href="/user">User Generator</a>
		</div>
	</div>
</div>
@stop