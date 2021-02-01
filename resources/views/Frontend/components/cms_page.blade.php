@extends('cms::Backend.app')
@section('content')
<!-- Manufacturing -->
<div class="manfac-wrap section-padding body-pattern position-relative clearfix">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			<h2>{{$page->name}}</h2>
			{!!$page->description!!}
			
			</div>
			
		</div>
	</div>
</div>
<!-- End Manufacturing -->

@endsection