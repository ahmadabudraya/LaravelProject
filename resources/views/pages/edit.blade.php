@extends('layout.master')

@section('content')

<form  enctype="multipart/form-data" style="margin-top: 100px;" method="post" action="/profile/{{ $user->id }}">
  {{ csrf_field() }}
  {{ method_field('PATCH') }}
  	
  	<div class="form-row form-group">
  		<div class="col">
  			<label>First Name</label>
  			<input type="text" name="fname" class="form-control" value="{{ $user->fname }}">
  		</div>
		<div class="col">
			<label>Last Name</label>
			<input type="text" name="lname" class="form-control" value="{{ $user->lname }}">
		</div>
	</div>
	<div class="form-group form-row">
		<div class="col">
			<label for="basic-url">Your vanity URL</label>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon3">http://example.com/profile/</span>
				</div>
				<input type="text" name="username" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="{{ $user->username }}">
			</div>
		</div>
		<div class="col">
			<label>Phone Number:</label>
			<input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
		</div>
	</div>
	
	<div class="form-group">
		<label>Website/Link (optional):</label>
		<input type="text" name="website" class="form-control" value="{{ $user->website }}">
	</div>
	<div class="form-group form-row">
		<div class="col">
			<label>Country : </label>
			<select name="location" class="form-control">
				@foreach($countries as $country)
					@if($user->location == $country)
						<option selected>{{ $country }}</option>
					@else
						<option>{{ $country }}</option>
					@endif
				@endforeach
			</select>
		</div>
		<div class="col">
			<label>Upload profile picture:</label>
			<input type="file" name="image" class="form-control" value="/storage/images/{{ $user->image }}">
		</div>
	</div>
	<input type="submit" value="Edit" name="subEdit" class="btn btn-primary">
</form>

@endsection