@extends('layouts.master')
@extends('layouts.lorem')

@section('head')
<link rel="stylesheet" type="text/css" href="css/lorem.css">
@stop

@section('content')
<form action="/lorem" method="POST">
	{{ csrf_field() }}
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="input-group input-group-lg">
			      <span class="input-group-btn">
			        <button class="btn dark btn-secondary" name="loremType" value="sentences" type="submit">Generate sentences!</button>
			      </span>
			      <input type="number" name="count" class="form-control dark" placeholder="How much Lorem?">
			      <span class="input-group-btn">
			        <button class="btn dark btn-secondary" name="loremType" value="paragraphs" type="submit">Generate paragraphs!</button>
			      </span>
			    </div>
			</div>
		</div>

		@if(count($errors) > 0)
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
</form>

	@if(! empty($lorem))
		<div class="row">
			@foreach ($lorem as $loremItem)
				<div class="col-md-12 lorem-block">
					{{ $loremItem }}
				</div>
			@endforeach
		</div>
	@endif
	</div>
@stop

