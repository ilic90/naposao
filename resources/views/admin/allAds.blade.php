@extends('layouts.master')
@section('content')
	<h1 class="page_title main_page_title">{{ __('translate.admin_ads_h1') }}</h1>

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
			@if(!$ads->first())
				{{ __('translate.admin_no_results') }}
			@endif
			@foreach ($ads as $ad)
				<li class="job_list_filter_item cf">
					<div class="job_list_filter_item_left">
						<small class="date">Id: <h4>{{ $ad->id }} </h4> {{ __('translate.admin_ads_created') }} {{ $ad->created_at->toFormattedDateString()}}</small>
						<h3 class="job_list_filter_item_title bold">
							<a href="{{ route('getSpecificJob', ['jid' => $ad->id, 'cid' => $ad->company->id]) }}">{{ $ad->position }}</a>
						</h3>
					</div>
					<div class="job_list_filter_item_right">
						<div class="job_container_push_right cf">
							<div class="job_container_push_right_item">
								<div class="job_list_filter_item_logo">
								@if($ad->company->image)
									<img src="{{ URL::to('/') . $ad->company->image->path }}" alt="">
								@endif
								</div>
								<input type="hidden" name="id" value="{{$ad->id}}">
							</div>
							<div class="job_container_push_right_item">
								<a href="{{ route('getCompanyProfile', ['cid' => $ad->company->id]) }}" class="job_list_filter_item_company bold">{{ $ad->company->company_name }}</a>
								<ul class="company_ads_list">
								</ul>
							</div>
							@if($ad->approved == 0)
								<button type="button" data-status="1" data-aid="{{ $ad->id }}" class="btn btn-success set-active">{{ __('translate.admin_activate_button') }}</button>
							@else
								<button type="button" data-status="0" data-aid="{{ $ad->id }}" class="btn btn-danger set-active">{{ __('translate.admin_deactivate_button') }}</button>
							@endif
							<button type="button" class="btn btn-danger delete" data-aid="{{ $ad->id }}">{{ __('translate.admin_delete_button') }}</button>
							<a href="{{ route('adminEditAd', ['aid' => $ad->id]) }}"><button type="button" class="btn btn edit" data-aid="{{ $ad->id }}">{{ __('translate.admin_edit_button') }}</button></a>
						</div>
					</div>
				</li>
			@endforeach
			</ul>
		</div>

		<div class="pagination">

        {!! $ads->links() !!}

        </div>
	</main>
	<script type="text/javascript">
		$('.set-active').click(function(){
			var status = $(this).attr('data-status');
			var aid = $(this).attr('data-aid');
			var url = "/updateAdStatus/"+aid;
			if ($(this).attr('data-status') === '1') {
				$(this).removeClass('btn-danger').addClass('btn-success').text('Activate');
				$(this).attr('data-status', '0');
			} else {
				$(this).removeClass('btn-success').addClass('btn-danger').text('Deactivate');
				$(this).attr('data-status', '1');
			}

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
	//Obrisati element posle brisanja iz baze
	$('.delete').click(function(e){
        var aid = $(this).attr('data-aid');
        var url = "/deleteAd/"+aid;
        $(e.target).parent().closest("li").remove();
        $.ajax({
            type: "POST",
            url: url,
            async: true,
            data: {

               '_token': $('meta[name="csrf-token"]').attr('content')
           },
       success: function (msg) {
           console.log('success');
           }
       });
    })

    </script>
@endsection