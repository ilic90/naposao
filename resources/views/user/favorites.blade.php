@extends('layouts.master')
@section('content')
	<h1 class="page_title main_page_title">{{ __('translate.user_favorites_h1') }}</h1>

	<main class="main_app_container">
		


	<div class="job_list_filter_holder">
			<ul>
			@if(!$ads->first())
				{{ __('translate.user_favorites_no_favorites') }}
			@endif
			@foreach ($ads as $ad)
				@if($ad->confidential == 0)
				<li class="job_list_filter_item cf">

					<div class="job_list_filter_item_left">

						<small class="date">{{ $ad->created_at->toFormattedDateString() }}</small>
						<h3 class="job_list_filter_item_title bold">
							<a href="{{ route('getSpecificJob', ['jid' => $ad->id, 'cid' => $ad->company->id]) }}">{{ $ad->position }}</a>
						</h3>
						
						<div class="job_list_filter_item_info">
							<p class="location"><span class="bold">{{ __('translate.label_location') }}</span>{{ $ad->city }}</p>
							@if($ad->salary_from)
							<p class="salary"><span class="bold">{{ __('translate.label_salary') }}</span>{{ __('translate.from') }} {{ $ad->salary_from }} {{ __('translate.to') }} {{ $ad->salary_to }} {{ $ad->currency }} ({{ $ad->salary_type }})</p>	
							@endif
						</div>
						
					</div>

					<div class="job_list_filter_item_right">
						
						<div class="job_list_filter_item_right_section">

							<ul class="job_list_filter_info">
								@if ($ad->career_level == 0)
								    <li>{{ __('translate.level_option_1') }}</li>
								@elseif ($ad->career_level == 1)
								    <li>{{ __('translate.level_option_2') }}</li>
								@elseif ($ad->career_level == 2)
									<li>{{ __('translate.level_option_3') }}</li>
								@else
								 
								@endif
								@if ($ad->students == 1)
									<li class="single_job_students"><span class="">{{ __('translate.students_welcome') }}</span></li>
								@endif
								@if ($ad->low_experience == 1)
									<li class="single_job_students"><span class="">{{ __('translate.low_experience_welcome') }}</span></li>
								@endif
							</ul>

							<div class="job_container_push_right cf">
								<div class="job_container_push_right_item">
									<div class="job_list_filter_item_logo">
										<img src="{{ URL::to('/public') . $ad->company->image->path }}" alt="">
									</div>
								</div>


								<div class="job_container_push_right_item">
									<a href="{{ route('getCompanyProfile', ['cid' => $ad->company->id]) }}" class="job_list_filter_item_company bold">{{ $ad->company->company_name }}</a>
									<ul class="company_ads_list">
										<li>
											<a><i class="fa fa-star star" aria-hidden="true"></i></a>
										</li>
									</ul>
								</div>

							</div>

						</div>	
					</div>
				</li>
				@elseif($ad->confidential == 1)
					<li class="job_list_filter_item cf">

					<div class="job_list_filter_item_left">

						<small class="date">{{ $ad->created_at->toFormattedDateString() }}</small>
						<h3 class="job_list_filter_item_title bold">
							<a href="{{ route('getSpecificJob', ['jid' => $ad->id, 'cid' => $ad->company->id]) }}">{{ $ad->position }}</a>
						</h3>
						
						<div class="job_list_filter_item_info">
							<p class="location"><span class="bold">{{ __('translate.label_location') }}</span>{{ $ad->city }}</p>
							@if($ad->salary_from)
							<p class="salary"><span class="bold">{{ __('translate.label_salary') }}</span>{{ __('translate.from') }} {{ $ad->salary_from }} {{ __('translate.to') }} {{ $ad->salary_to }} {{ $ad->currency }} ({{ $ad->salary_type }})</p>	
							@endif
						</div>
						
					</div>

					<div class="job_list_filter_item_right">
						
						<div class="job_list_filter_item_right_section">

							<ul class="job_list_filter_info">
								@if ($ad->career_level == 0)
								    <li>{{ __('translate.level_option_1') }}</li>
								@elseif ($ad->career_level == 1)
								    <li>{{ __('translate.level_option_2') }}</li>
								@elseif ($ad->career_level == 2)
									<li>{{ __('translate.level_option_3') }}</li>
								@else
								 
								@endif
								@if ($ad->students == 1)
									<li class="single_job_students"><span class="">{{ __('translate.students_welcome') }}</span></li>
								@endif
								@if ($ad->low_experience == 1)
									<li class="single_job_students"><span class="">{{ __('translate.low_experience_welcome') }}</span></li>
								@endif
							</ul>

							<div class="job_container_push_right cf">
								<div class="job_container_push_right_item">
									<p>{{ __('translate.confidential_ad') }}</p>
								</div>
								<div class="job_container_push_right_item">
									<ul class="company_ads_list">
										<li>
											<a><i class="fa fa-star star" aria-hidden="true"></i></a>
										</li>
									</ul>
								</div>

							</div>

						</div>	
					</div>
				</li>
				@endif
			@endforeach
			</ul>
		</div>
		<div class="pagination">

        {!! $ads->links() !!}

        </div>
				
	</main>

<script type="text/javascript">
	$('.star').click(function(){
		var a = $(this).parent().parent().parent().parent().parent().parent().parent().parent().children('.job_list_filter_item_left').children('h3').children().attr('href');
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

</script>
@endsection