@extends('layouts.master')
@section('content')


	<h1 class="page_title main_page_title">{{ __('translate.ad_h1') }}</h1>

	<main class="main_app_container cf">
		@if($ad->confidential == 0)
		<div class="single_job_header">
		<span>{{ __('translate.ad_views') }} {{ $ad->page_visits }}</span>
			<h1 class="single_job_title bold">{{ $ad->position }}</h1>
			<div class="single_job_info_holder">
				<ul class="single_job_categories cf">
					<li>
						<span class="bold">{{ __('translate.ad_categories') }}</span>
					</li>
					@foreach($ad->categories as $category)
						<li>
							<a href="{{ route('getJobsByCategory', ['catid' => $category->id]) }}">{{ $category->name }}</a>
						</li>
					@endforeach
				</ul>
				@if(Session::get('user'))
					@if(!App\Favorite::isFavorite($ad->id))
						<a><i class="fa fa-star-o star" aria-hidden="true"></i></a>
					@else
						<a><i class="fa fa-star star" aria-hidden="true"></i></a>
					@endif
				@endif
				
                @if(Session::has('user'))

			        <a class="report" href="#" data-js="open">
	          			<i class="fa fa-flag" aria-hidden="true"></i><span>{{ __('translate.ad_report') }}</span>
	   				</a>

                @endif
				@if(Session::get('user'))
	                @if(Session::get('user')->is_admin)
	                	<a href="{{ route('adminEditAd', ['aid' => $ad->id]) }}" class="btn">{{ __('translate.ad_edit_button') }}</a>
	                	<a href="{{ route('getDeleteAd', ['aid' => $ad->id]) }}" class="btn">{{ __('translate.ad_delete_button') }}</a>
						@if($ad->approved == 0)
							<button type="button" data-status="1" data-aid="{{ $ad->id }}" class="btn btn-success set-active_btn">{{ __('translate.admin_activate_button') }}</button>
						@else
							<button type="button" data-status="0" data-aid="{{ $ad->id }}" class="btn btn-danger set-active_btn">{{ __('translate.admin_deactivate_button') }}</button>
						@endif
	                @else

	                @endif
	            @endif
			</div>
			
			<div class="single_job_social_net">
				<div id="social-links">
					<ul>
						{!! $share !!}
					</ul>
				</div>
			</div>
		</div>

	<div class="single_job_sidebar">
		<div class="single_job_sidebar_item">
			<small class="single_job_published_date" style="display: block;"><span class="bold">{{ __('translate.ad_published') }}</span> <span>{{ $ad->created_at->toFormattedDateString() }}</span></small>
			<small class="single_job_published_date" style="display: block;"><span class="bold">{{ __('translate.ad_expired') }}</span> <span>{{ $ad->dateFormat($ad->expiration_date)->toFormattedDateString() }}</span></small>
			<div class="single_job_main_logo">
				<a href="{{ route('getCompanyProfile', ['cid' => $ad->company->id]) }}">
					
					<img src="{{ URL::to('/public') . $ad->company->image->path }}" alt="">
					
				</a>
			</div>
			<h3 class="single_job_sidebar_item_title company_name bold">{{ __('translate.ad_company') }}</h3>
			<p>{{ $ad->company->company_name }}</p>
		</div>

		<div class="single_job_sidebar_item">
			<h3 class="single_job_sidebar_item_title bold">{{ __('translate.ad_location') }}</h3>
			<p><span>{{ $ad->city }}</span>, <span>{{ $ad->country }}</span></p>
		</div>
		@if(count($ad->languages) > 0)
		<div class="single_job_sidebar_item">
			<h3 class="single_job_sidebar_item_title bold">{{ __('translate.ad_languages') }}</h3>
			@foreach($ad->languages as $language)
			<p><span>{{ $language->language }}</span></p>
			@endforeach
		</div>
		@endif
		<div class="single_job_sidebar_item">
			<h3 class="single_job_sidebar_item_title bold">{{ __('translate.ad_job_type') }}</h3>
			@if ($ad->job_type == 0)
			    <p>{{ __('translate.job_type_option_1') }}</p>
			@elseif ($ad->job_type == 1)
			    <p>{{ __('translate.job_type_option_2') }}</p>
			@elseif ($ad->job_type == 2)
				<p>{{ __('translate.job_type_option_3') }}</p>
			@elseif ($ad->job_type == 3)
				<p>{{ __('translate.job_type_option_4') }}</p>	 
			@endif
		</div>
		@if($ad->salary_from != null)
		<div class="single_job_sidebar_item">
			<h3 class="single_job_sidebar_item_title bold">{{ __('translate.label_salary') }}</h3>
			<p><span>{{ $ad->salary_type }}</span>, {{ __('translate.from') }} <span>{{ $ad->salary_from }} {{ $ad->currency }}</span> {{ __('translate.to') }} <span>{{ $ad->salary_to }} {{ $ad->currency }}</span></p>
		</div>
		@endif
		<div class="single_job_sidebar_item">
			<h3 class="single_job_sidebar_item_title bold">{{ __('translate.ad_level') }}</h3>
			@if ($ad->career_level == 0)
			    <p>{{ __('translate.level_option_1') }}</p>
			@elseif ($ad->career_level == 1)
			    <p>{{ __('translate.level_option_2') }}</p>
			@elseif ($ad->career_level == 2)
				<p>{{ __('translate.level_option_3') }}</p>
			@endif
		</div>
		@if($ad->external_url)
		<div class="single_job_sidebar_item">
			<h3 class="single_job_sidebar_item_title bold">{{ __('translate.ad_link') }}</h3>
			<p><span><a href="{{ $ad->external_url }}">{{ $ad->external_url }}</a></span></p>
		</div>
		@endif
		<br><br>
		@if(count($similarJobs) > 0)
		<h2 style="text-align:center;color:#ff5d5c;"><strong>Similar Jobs</strong></h2>
		<ul class="home_top_jobs_grid cf">
		@foreach($similarJobs as $job)
			<li class="home_top_jobs_grid_item">

                <p class="bold home_top_jobs_grid_item_descript">
                    <a href="{{ route('getSpecificJob', ['jid' => $job->id, 'cid' => $job->company->id]) }}">{{ $job->position }}</a>
					@if($job->confidential == 0)
                    	<span style="float:right"><a href="{{ route('getCompanyProfile', ['cid' => $job->company->id]) }}">{{ $job->company->company_name }}</a></span>
					@endif
                </p>

            </li>
		@endforeach
		</ul>
		@endif
	</div>
		
		<div class="single_job_main">
			<div class="single_job_main_cover"> 
				<img src="{{URL::to('/public')}}/photos/ad_placeholder.jpg" alt="">
			</div>
			<div class="popup popUp report_popup">
				<a href="#" class="popup_close" name="close">
					<i class="fa fa-times" aria-hidden="true"></i>
				</a>
				@if(Session::get('user'))
				<div class="row text-center">
					<h2>{{ __('translate.ad_report_title') }}</h2> 
				</div>
					<form action="{{ route('reportAd', ['aid' => $ad->id,'uid' => Session::get('user')->id]) }}" method="POST" enctype="multipart/form-data">
						<div class="modal-body">
						{{ csrf_field() }}
							<ul>
								<li><input type="radio" name="text" value="Ad is misleading or incomplete">{{ __('translate.ad_report_li_1') }}</li>
								<li><input type="radio" name="text" value="Ad is insulting or inappropriate">{{ __('translate.ad_report_li_2') }}</li>
								<li><input type="radio" name="text" value="Ad is a scam">{{ __('translate.ad_report_li_3') }}</li>
							</ul>
						</div>
						<div class="modal-footer">
							<button type="btn" class="btn btn-default" data-dismiss="modal">{{ __('translate.ad_report_submit_button') }}</button>
						</div>
					</form>
				@endif
			</div>
			
			<div class="single_job_main_section">

				<div class="single_job_main_section_first">
				@if ($ad->students == 1)
					<p class="single_job_students"><span class="">{{ __('translate.ad_students') }}</span></p>
				@endif
				@if ($ad->low_experience == 1)
					<p class="single_job_students"><span class="">{{ __('translate.ad_low_experience') }}</span></p>
				@endif
				</div>

				<div class="single_job_desc">
					<h3 class="bold">{{ __('translate.ad_title') }}</h3>
					<p>{{ $ad->description }}</p>
				</div>
				
				@if(Session::get('user') != null && !Auth::check() )
					@foreach($ad->applications as $application)
						@if($application->user_id == Session::get('user')->id)
							<div class="alert alert-info">
								<p>{{ __('translate.ad_already_applied') }}</p>
							</div>
						@else
							@if($ad->external_url)
								<div class="apply_for_job_btn"><a href="{{ $ad->external_url }}" class="green_btn" target="_blank">{{ __('translate.ad_apply_button') }}</a></div>
							@else
								<div class="apply_for_job_btn"><a href="{{ route('getJobApplication', ['jid' => $ad->id, 'cid' => $ad->company->id, 'uid' => Session::get('user')->id]) }}" class="green_btn">{{ __('translate.ad_apply_button') }}</a></div>
							@endif
						@endif
					@endforeach
					@if(count($ad->applications) == 0)
						@if($ad->external_url)
							<div class="apply_for_job_btn"><a href="{{ $ad->external_url }}" class="green_btn" target="_blank">{{ __('translate.ad_apply_button') }}</a></div>
						@else
							<div class="apply_for_job_btn"><a href="{{ route('getJobApplication', ['jid' => $ad->id, 'cid' => $ad->company->id, 'uid' => Session::get('user')->id]) }}" class="green_btn">{{ __('translate.ad_apply_button') }}</a></div>
						@endif
					@endif 
				@elseif(!Auth::check())
					<div class="apply_for_job_btn"><a href="{{ route('getUserLogin') }}" class="green_btn">{{ __('translate.ad_apply_button') }}</a></div>
				@endif
			</div>
		</div>
		@elseif($ad->confidential == 1)

			<div class="single_job_header">
		<span>{{ __('translate.ad_views') }} {{ $ad->page_visits }}</span>
			<h1 class="single_job_title bold">{{ $ad->position }}</h1>
			<div class="single_job_info_holder">
				<ul class="single_job_categories cf">
					<li>
						<span class="bold">{{ __('translate.ad_categories') }}</span>
					</li>
					@foreach($ad->categories as $category)
						<li>
							<a href="{{ route('getJobsByCategory', ['catid' => $category->id]) }}">{{ $category->name }}</a>
						</li>
					@endforeach
				</ul>
				@if(Session::get('user'))
					@if(!App\Favorite::isFavorite($ad->id))
						<a><i class="fa fa-star-o star" aria-hidden="true"></i></a>
					@else
						<a><i class="fa fa-star star" aria-hidden="true"></i></a>
					@endif
				@endif
				@if(Auth::check())

			        <a class="report" data-js="open">
	          			<i class="fa fa-flag" aria-hidden="true"></i><span>{{ __('translate.ad_report') }}</span>
	   				</a>

                @elseif(Session::has('user'))

			        <a class="report" href="#" data-js="open">
	          			<i class="fa fa-flag" aria-hidden="true"></i><span>{{ __('translate.ad_report') }}</span>
	   				</a>

                @endif
				@if(Session::get('user'))
	                @if(Session::get('user')->is_admin)
	                	<a href="{{ route('adminEditAd', ['aid' => $ad->id]) }}" class="btn">{{ __('translate.ad_edit_button') }}</a>
	                	<a href="{{ route('getDeleteAd', ['aid' => $ad->id]) }}" class="btn">{{ __('translate.ad_delete_button') }}</a>
						@if($ad->approved == 0)
							<button type="button" data-status="1" data-aid="{{ $ad->id }}" class="btn btn-success set-active_btn">{{ __('translate.admin_activate_button') }}</button>
						@else
							<button type="button" data-status="0" data-aid="{{ $ad->id }}" class="btn btn-danger set-active_btn">{{ __('translate.admin_deactivate_button') }}</button>
						@endif
	                @else

	                @endif
	            @endif
			</div>
			
			<div class="single_job_social_net">
				<div id="social-links">
					<ul>
						{!! $share !!}
					</ul>
				</div>
			</div>
		</div>

	<div class="single_job_sidebar">
		<div class="single_job_sidebar_item">
			<small class="single_job_published_date" style="display: block;"><span class="bold">{{ __('translate.ad_published') }}</span> <span>{{ $ad->created_at->toFormattedDateString() }}</span></small>
			<small class="single_job_published_date" style="display: block;"><span class="bold">{{ __('translate.ad_expired') }}</span> <span>{{ $ad->dateFormat($ad->expiration_date)->toFormattedDateString() }}</span></small>
			
		</div>

		<div class="single_job_sidebar_item">
			<h3 class="single_job_sidebar_item_title bold">{{ __('translate.ad_location') }}</h3>
			<p><span>{{ $ad->city }}</span>, <span>{{ $ad->country }}</span></p>
		</div>

		<div class="single_job_sidebar_item">
			<h3 class="single_job_sidebar_item_title bold">{{ __('translate.ad_languages') }}</h3>
			@foreach($ad->languages as $language)
			<p><span>{{ $language->language }}</span></p>
			@endforeach
		</div>

		<div class="single_job_sidebar_item">
			<h3 class="single_job_sidebar_item_title bold">{{ __('translate.ad_job_type') }}</h3>
			@if ($ad->job_type == 0)
			    <p>{{ __('translate.job_type_option_1') }}</p>
			@elseif ($ad->job_type == 1)
			    <p>{{ __('translate.job_type_option_2') }}</p>
			@elseif ($ad->job_type == 2)
				<p>{{ __('translate.job_type_option_3') }}</p>
			@elseif ($ad->job_type == 3)
				<p>{{ __('translate.job_type_option_4') }}</p>	 
			@endif
		</div>
		@if($ad->salary_from != null)
		<div class="single_job_sidebar_item">
			<h3 class="single_job_sidebar_item_title bold">{{ __('translate.label_salary') }}</h3>
			<p><span>{{ $ad->salary_type }}</span>, {{ __('translate.from') }} <span>{{ $ad->salary_from }} {{ $ad->currency }}</span> {{ __('translate.to') }} <span>{{ $ad->salary_to }} {{ $ad->currency }}</span></p>
		</div>
		@endif
		<div class="single_job_sidebar_item">
			<h3 class="single_job_sidebar_item_title bold">{{ __('translate.ad_level') }}</h3>
			@if ($ad->career_level == 0)
			    <p>{{ __('translate.level_option_1') }}</p>
			@elseif ($ad->career_level == 1)
			    <p>{{ __('translate.level_option_2') }}</p>
			@elseif ($ad->career_level == 2)
				<p>{{ __('translate.level_option_3') }}</p>
			@endif
		</div>
		@if($ad->external_link)
		<div class="single_job_sidebar_item">
			<h3 class="single_job_sidebar_item_title bold">{{ __('translate.ad_link') }}</h3>
			<p><span><a href="{{ $ad->external_url }}">{{ $ad->external_url }}</a></span></p>
		</div>
		@endif
		<br><br>
		@if(count($similarJobs) > 0)
		<h2 style="text-align:center;color:#ff5d5c;"><strong>Similar Jobs</strong></h2>
		<ul class="home_top_jobs_grid cf">
		@foreach($similarJobs as $job)
			<li class="home_top_jobs_grid_item">

                <p class="bold home_top_jobs_grid_item_descript">
                    <a href="{{ route('getSpecificJob', ['jid' => $job->id, 'cid' => $job->company->id]) }}">{{ $job->position }}</a>
					@if($job->confidential == 0)
                    	<span style="float:right"><a href="{{ route('getCompanyProfile', ['cid' => $job->company->id]) }}">{{ $job->company->company_name }}</a></span>
					@endif
                </p>

            </li>
		@endforeach
		</ul>
		@endif
	</div>
		<div class="single_job_main">
			<div class="single_job_main_cover"> 
				<img src="{{URL::to('/public')}}/photos/ad_placeholder.jpg" alt="">
			</div>
			<div class="popup popUp report_popup">
				<a href="#" class="popup_close" name="close">
					<i class="fa fa-times" aria-hidden="true"></i>
				</a>
				@if(Session::get('user'))
				<div class="row text-center">
					<h2>{{ __('translate.ad_report_title') }}</h2> 
				</div>
					<form action="{{ route('reportAd', ['aid' => $ad->id,'uid' => Session::get('user')->id]) }}" method="POST" enctype="multipart/form-data">
						<div class="modal-body">
						{{ csrf_field() }}
							<ul>
								<li><input type="radio" name="text" value="Ad is misleading or incomplete">{{ __('translate.ad_report_li_1') }}</li>
								<li><input type="radio" name="text" value="Ad is insulting or inappropriate">{{ __('translate.ad_report_li_2') }}</li>
								<li><input type="radio" name="text" value="Ad is a scam">{{ __('translate.ad_report_li_3') }}</li>
							</ul>
						</div>
						<div class="modal-footer">
							<button type="btn" class="btn btn-default" data-dismiss="modal">{{ __('translate.ad_report_submit_button') }}</button>
						</div>
					</form>
				@endif
			</div>
			
			<div class="single_job_main_section">

				<div class="single_job_main_section_first">
				@if ($ad->students == 1)
					<p class="single_job_students"><span class="">{{ __('translate.ad_students') }}</span></p>
				@endif
				@if ($ad->low_experience == 1)
					<p class="single_job_students"><span class="">{{ __('translate.ad_low_experience') }}</span></p>
				@endif
				</div>

				<div class="single_job_desc">
					<h3 class="bold">{{ __('translate.ad_title') }}</h3>
					<p>{{ $ad->description }}</p>
				</div>
				
				@if(Session::get('user') != null && !Auth::check() )
					@foreach($ad->applications as $application)
					
						@if($application->user_id == Session::get('user')->id)
							<div class="alert alert-info">
								<p>You have already applied for this job</p>
							</div>
						@else
						<div class="apply_for_job_btn"><a href="{{ route('getJobApplication', ['jid' => $ad->id, 'cid' => $ad->company->id, 'uid' => Session::get('user')->id]) }}" class="green_btn">{{ __('translate.ad_apply_button') }}</a></div>
						@endif
					@endforeach
					@if(count($ad->applications) == 0)
					<div class="apply_for_job_btn"><a href="{{ route('getJobApplication', ['jid' => $ad->id, 'cid' => $ad->company->id, 'uid' => Session::get('user')->id]) }}" class="green_btn">{{ __('translate.ad_apply_button') }}</a></div>
					@endif
				@elseif(!Auth::check())
					<div class="apply_for_job_btn"><a href="{{ route('getUserLogin') }}" class="green_btn">{{ __('translate.ad_apply_button') }}</a></div>
				@endif
			</div>
		</div>

		@endif

	</main>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="{{ asset('js/share.js') }}"></script>
<script type="text/javascript">
	$('.report').click(function(){
		$('.reportModal');
	})
	$('.star').click(function(){
		var a =  $(location).attr('href');
		var id = a.match(/([\d]+)/)[0];		
		console.log(id);
		if ($(this).hasClass('fa-star-o')){
			$(this).toggleClass('fa-star-o').toggleClass('fa-star');    
		$.ajax({
				method: "POST",
				url: "/updateFavorites",
				data: {
					id:id,
					'_token': $('meta[name="csrf-token"]').attr('content')
					},
				})
			.done(function(data)
			{
					console.log(data);
			}).fail(function(err){
				console.log(err);
			})
		} else if ($(this).hasClass('fa-star')) {
					$(this).toggleClass('fa-star').toggleClass('fa-star-o');    
		$.ajax({
				method: "POST",
				url: "/removeFavorites",
				data: {
					id:id,
					'_token': $('meta[name="csrf-token"]').attr('content')
					},
				})
			.done(function(data)
			{
					console.log(data);
			}).fail(function(err){
				console.log(err);
			})
		}
	});
	function setActiveAjax() {
		$.ajax({
			       		type: "POST",
			        	url: url,
			        	async: true,
			        	data: {
			            	status: status,
			            	'_token': $('meta[name="csrf-token"]').attr('content')
			        	},
			        success: function (msg) {
			        	console.log('success');
			        }
			    });
	}
	$(document).ready(function(){
		$('.set-active_btn').click(function(e){
			e.stopPropagation();
					var status = $(this).attr('data-status');
					var aid = $(this).attr('data-aid');
					var url = "/updateAdStatus/"+aid;

					if (status === '1' && $(this).hasClass('btn-danger') === true) {
						$(this).removeClass('btn-danger').addClass('btn-success').text('Activate');
						$(this).attr('data-status', '0');
					} else {
						$(this).removeClass('btn-success').addClass('btn-danger').text('Deactivate');
						$(this).attr('data-status', '1');
					};
					setActiveAjax();
				  
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
	});
</script>

@endsection