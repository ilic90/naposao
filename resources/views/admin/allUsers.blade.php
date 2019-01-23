@extends('layouts.master')
@section('content')

    <h1 class="page_title main_page_title">{{ __('translate.admin_users_h1') }}</h1>

    <main class="main_app_container">
    <ul class="nav nav-tabs">
		<li role="presentation"><a href="{{ route('getAdminAds') }}">{{ __('translate.admin_menu_ads') }}</a></li>
    	<li role="presentation"><a href="{{ route('getAdminCompanies') }}">{{ __('translate.admin_menu_companies') }}</a></li>
    	<li role="presentation"><a href="{{ route('getAdminUsers') }}">{{ __('translate.admin_menu_users') }}</a></li>
    	<li role="presentation"><a href="{{ route('getReports') }}">{{ __('translate.admin_menu_reports-ads') }}</a></li>
    	<li role="presentation"><a href="{{ route('getReportsCompanies') }}">{{ __('translate.admin_menu_reports-companies') }}</a></li>
    	<li role="presentation"><a href="{{ route('getAdminLanguages') }}">{{ __('translate.admin_menu_languages') }}</a></li>
    	<li role="presentation"><a href="{{ route('getAdminCategories') }}">{{ __('translate.admin_menu_categories') }}</a></li>
		<li role="presentation"><a href="{{ route('getAdminInfo') }}">Site Info</a></li>
    </ul>

    <div class="job_list_filter_holder">
        <ul>
        @if(count($users) < 1)
			{{ __('translate.admin_no_results') }}
		@endif
        @foreach($users as $user)
            <li class="job_list_filter_item cf">
				<div class="job_list_filter_item_left">
					<small class="date">Id: <h4>{{ $user->id }} </h4> {{ __('translate.admin_users_created') }} {{ $user->created_at->toFormattedDateString() }}</small>
					<h3 class="job_list_filter_item_title bold">
						<a href="{{ route('getProfile', ['uid' => $user->id]) }}">{{ $user->first_name }} {{ $user->last_name }}</a>
					</h3>
				</div>
				<div class="job_list_filter_item_right">
					<div class="job_container_push_right cf">
						<div class="job_container_push_right_item">
							<div class="job_list_filter_item_logo">
								@if($user->image)
									<img src="{{ URL::to('/') . $user->image->path }}" alt="">
								@endif
							</div>
						</div>
						@if($user->active == 0)
							<button type="button" data-status="1" data-uid="{{ $user->id }}" class="btn btn-success set-active">{{ __('translate.admin_activate_button') }}</button>
						@else
							<button type="button" data-status="0" data-uid="{{ $user->id }}" class="btn btn-danger set-active">{{ __('translate.admin_deactivate_button') }}</button>
						@endif
						<a href="{{ route('adminDeleteUser', ['uid' => $user->id]) }}"><button type="button" class="btn btn-danger delete" data-aid="{{ $user->id }}">{{ __('translate.admin_delete_button') }}</button></a>
					</div>
				</div>
			</li>
        @endforeach
        </ul>
    </div>
    <div class="pagination">

		{!! $users->render() !!}

	</div>
    </main>
	<script type="text/javascript">
		$('.set-active').click(function(){
			var status = $(this).attr('data-status');
			var uid = $(this).attr('data-uid');
			var url = "/updateUserStatus/"+uid;
		

		    $.ajax({
	       		type: "POST",
	        	url: url,
	        	async: true,
	        	data: {
	            	status: status,
	            	'_token': $('meta[name="csrf-token"]').attr('content')
	        	},
	        success: function (msg) {
	        	location.reload();
	        	console.log('success');
	        }
	    });
	})
    </script>

@endsection