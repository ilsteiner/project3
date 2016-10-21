@extends('layouts.master')

@section('head')
{{-- <link rel="stylesheet" type="text/css" href="css/user.css"> --}}
<link rel="stylesheet" type="text/css" href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">
@stop

@section('content')
<form action="/user" method="POST" class="form-horizontal">
	{{ csrf_field() }}
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="form-group">	
					<input type="number" name="count" class="form-control dark" placeholder="How many users?">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="radio">
					<label class="radio inline">
						<input type="radio" id="human" name="userType" class="form-control dark" value="human" checked>
						Human name
					</label>
				</div>

				<div class="radio">
					<label class="radio inline">
						<input type="radio" id="animal" name="userType" class="form-control dark" value="animal">
						Animal name
					</label>
				</div>

				<div class="radio">
					<label class="radio inline">
						<input type="radio" id="video" name="userType" class="form-control dark" value="video">
						Video game name
					</label>
				</div>
			</div>
			<div class="col-md-3">
				<div class="radio">
					<label class="radio inline">
						<input type="radio" id="male" name="sex" class="form-control dark" value="male">
						Male
					</label>
				</div>

				<div class="radio">
					<label class="radio inline">
						<input type="radio" id="female" name="sex" class="form-control dark" value="female">
						Female
					</label>
				</div>

				<div class="radio">
					<label class="radio inline">
						<input type="radio" id="both" name="sex" class="form-control dark" value="both" checked>
						Both
					</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="checkbox">
					<label class="checkbox inline">
						<input type="checkbox" data-toggle="toggle" data-on="Include" data-off="Exclude" data-onstyle="success" class="form-control dark" name="options[]" value="agent">
						User agent
					</label>
				</div>
				<div class="checkbox">
					<label class="checkbox inline">
						<input type="checkbox" data-toggle="toggle" data-on="Include" data-off="Exclude" data-onstyle="success" class="form-control dark" name="options[]" value="avatar">
						Avatar
					</label>
				</div>
				<div class="checkbox">
					<label class="checkbox inline">
						<input type="checkbox" data-toggle="toggle" data-on="Include" data-off="Exclude" data-onstyle="success" class="form-control dark" name="options[]" value="birthday">
						Birthday
					</label>
				</div>
			</div>

			<div class="col-md-6">
				<div class="checkbox">
					<label class="checkbox inline">
						<input type="checkbox" data-toggle="toggle" data-on="Include" data-off="Exclude" data-onstyle="success" class="form-control dark" name="options[]" value="age">
						Age
					</label>
				</div>
				<div class="checkbox">
					<label class="checkbox inline">
						<input type="checkbox" data-toggle="toggle" data-on="Include" data-off="Exclude" data-onstyle="success" class="form-control dark" name="options[]" value="username">
						Username
					</label>
				</div>
				<div class="checkbox">
					<label class="checkbox inline">
						<input type="checkbox" data-toggle="toggle" data-on="Include" data-off="Exclude" data-onstyle="success" class="form-control dark" name="options[]" value="password">
						Password
					</label>
				</div>
			</div>
		</div>

		@if(!empty($errors))
		<div class="row">
		@foreach ($errors->all() as $error)
			<div class="col-xs-12">
				<div class="alert alert-danger" role="alert">
				  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				  <span class="sr-only">Error:</span>
				  {{ $error }}
				</div>
			</div>
		@endforeach
		</div>
		@endif
		<div class="row">
			<div class="col-md-12">
				<button type="submit" class="btn btn-block">Get users!</button>
			</div>
		</div>
	</div>
</form>
@stop

@section('body')
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@stop