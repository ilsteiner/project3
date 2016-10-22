@extends('layouts.master')

@section('head')
<link rel="stylesheet" type="text/css" href="css/user.css">
@stop

@section('content')
<div class="container">
	@foreach($users as $user)
		<div class="col-md-6">
			<div class="well well-lg user-well">
				<div class="row">
					@if($user["avatar"])
						<div class="col-md-2">
							{{-- <img class="avatar" src="{{ $user["avatar"] }}"> --}}
							{{ $user["avatar"] }}
						</div>
					@endif

					<div class="name col-md-10">
						{{ $user["name"] }}
					</div>
				</div>

				@if($user["username"])
					<div class="row">
						<div class="col-md-12">
							<span class="user-label">
								Username:
							</span>
							{{ $user["username"] }}
						</div>
					</div>
				@endif

				@if($user["password"])
					<div class="row">
						<div class="col-md-12">
							<span class="user-label">
								Password:
							</span>
							{{ $user["password"] }}
						</div>
					</div>
				@endif

				@if($user["agent"])
					<div class="row">
						<div class="col-md-12">
							<span class="user-label">
								User Agent:
							</span>
							{{ $user["agent"] }}
						</div>
					</div>
				@endif

				@if($user["birthday"])
					<div class="row">
						<div class="col-md-12">
							<span class="user-label">
								Birthday:
							</span>
							{{ $user["birthday"] }}
						</div>
					</div>
				@endif

				@if($user["age"])
					<div class="row">
						<div class="col-md-12">
							<span class="user-label">
								Age:
							</span>
							{{ $user["age"] }}
						</div>
					</div>
				@endif
			</div>
		</div>
	@endforeach
</div>
@stop