@extends('layouts.master')

@section('content')

	<h1 class="page_title main_page_title">{{ __('translate.cv_h1') }}</h1>

	<main class="main_app_container">
	
		<a href="{{ route('createCV') }}"><button type="button" class="confirm_btn">{{ __('translate.create_cv_button') }}</button></a>
	@if($cvs)
		<ul class="applicants_for_job_list">
		@foreach($cvs as $cv)
			<li class="applicants_for_job_item">
			
				<h3 class="bold">{{ $cv->title }}</h3>

				<div class="your_cv_item">
					<div class="your_cv_crud_btn">
						<a href="{{ route('getCVhtml',['cvid' => $cv->id]) }}" target="_blank">
							<span type="button" class="btn btn-primary">{{ __('translate.preview_button') }}</span>
						</a>
						<a href="{{ route('editCV', ['cvid' => $cv->id]) }}">
							<span type="button" class="btn btn-warning">{{ __('translate.admin_edit_button') }}</span>
						</a>
						<a href="{{ route('deleteCV',['cvid' => $cv->id]) }}">
							<span type="button" class="btn btn-danger delete">{{ __('translate.admin_delete_button') }}</span>
						</a>
					</div>

					<div class="your_cv_publish_date">

						<span class="applications_date_for_job"><span class="bold">{{ __('translate.admin_users_created') }}</span> {{ $cv->created_at->toFormattedDateString() }}</span>

					</div>
					
				</div>

			</li>
		@endforeach
		</ul>
	@endif
	</main>

@endsection