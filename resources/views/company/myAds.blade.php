@extends('layouts.master')
@section('content')
<style>
	.close_aplicants::before {
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
		color: #d22;
	}
</style>
	<h1 class="page_title main_page_title">{{ __('translate.company_ads_h1') }}</h1>

	<main class="main_app_container">
		<div class="alert alert-info" style="width:100%;padding:0;text-align:center">
			<p class="bold">{{ __('translate.ad_promotion_charged') }}</p>
		</div>

		<div class="alert alert-info" style="width:100%;padding:0;text-align:center">
			<p class="bold">{{ __('translate.ad_reinforce') }}</p>
			<ul style="list-style:none">
				<li>{{ __('translate.ad_reinforce_standard_price') }}</li>
				<li>{{ __('translate.ad_reinforce_vip_price') }}</li>
				<li>{{ __('translate.ad_reinforce_premium_price') }}</li>
			</ul>
		</div>

		<div class="job_list_filter_holder">
			<ul>
			@if(!$ads->first())
				{{ __('translate.company_ads_no_ads') }}
			@endif
			@include('layouts.errors')
			@foreach ($ads as $ad)
				<li class="job_list_filter_item cf">

					<div class="job_list_filter_item_left">
						@if($ad->ad_type == 1)
						<div class="alert alert-info" style="width:20%;padding:0;text-align:center">
							<p class="bold">Free ad</p>
						</div>
						@elseif($ad->ad_type == 2)
						<div class="alert alert-info" style="width:20%;padding:0;text-align:center">
							<p class="bold">Standard ad</p>
						</div>
						@elseif($ad->ad_type == 3)
						<div class="alert alert-info" style="width:20%;padding:0;text-align:center">
							<p class="bold">VIP ad</p>
						</div>
						@elseif($ad->ad_type == 4)
						<div class="alert alert-info" style="width:20%;padding:0;text-align:center">
							<p class="bold">Premium ad</p>
						</div>
						@endif
						<small class="date"><strong>{{ __('translate.ad_published') }}</strong> {{ $ad->created_at->toFormattedDateString() }}</small>
						<h3 class="job_list_filter_item_title bold">
							<a href="{{ route('getSpecificJob', ['jid' => $ad->id, 'cid' => $ad->company->id]) }}">{{ $ad->position }}</a>
						</h3>
						
						<div class="job_list_filter_item_info">
							<p class="location"><span class="bold">{{ __('translate.label_location') }}</span>{{ $ad->city }}</p>
							@if($ad->salary_from !== null)
								<p class="salary"><span class="bold">{{ __('translate.label_salary') }}</span>{{ __('translate.from') }} {{ $ad->salary_from }} {{ __('translate.to') }} {{ $ad->salary_to }} {{ $ad->currency }} ({{ $ad->salary_type }})</p>	
							@endif
						</div>
						<div class="job_list_filter_item_info">
							@if($ad->ad_type > 1)
								@if($ad->reinforcement_date !== null)
									<div class="alert alert-info" style="width:50%;text-align:center;padding:0">
										<p>{{ __('translate.ad_is_reinforce') }}: <strong>{{ $ad->dateFormat($ad->reinforcement_date)->toFormattedDateString() }}</strong></p>
									</div>
								@else
									<div class="alert alert-info" style="width:50%;text-align:center;padding:0">
										<p>{{ __('translate.ad_is_not_reinforced') }}</p>
									</div>
								@endif
							@else
								@if($ad->promotion_date !== null)
									<div class="alert alert-info" style="width:50%;text-align:center;padding:0">
										<p>{{ __('translate.ad_is_promoted') }}: <strong>{{ $ad->dateFormat($ad->promotion_date)->toFormattedDateString() }}</strong></p>
									</div>
								@else
									<div class="alert alert-info" style="width:50%;text-align:center;padding:0">
										<p>{{ __('translate.ad_is_not_promoted') }}</p>
									</div>
								@endif
							@endif
						</div>

					</div>

					<div class="job_list_filter_item_right">
						
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
									@if($ad->company->image)
										<img src="{{ URL::to('/public') . $ad->company->image->path }}" alt="">
									@endif
									</div>
									<input type="hidden" name="id" value="{{$ad->id}}">
								</div>

								<div class="job_container_push_right_item">
									<a href="{{ route('getCompanyProfile', ['cid' => $ad->company->id]) }}" class="job_list_filter_item_company bold">{{ $ad->company->company_name }}</a>
										
									<ul class="company_ads_list">
										<li>
											@if($ad->ad_type > 2)
												@if($ad->confidential == 0)
													<a href="{{ route('makeConfidential',['jid' => $ad->id]) }}" class="btn">{{ __('translate.change_to_confidential') }}</a>
												@elseif($ad->confidential == 1)
													<a href="{{ route('makeUnconfidential',['jid' => $ad->id]) }}" class="btn">{{ __('translate.change_to_unconfidential') }}</a>
												@endif
											@endif
										</li>
										<li>
											@if($ad->ad_type > 1)
												<a href="{{ route('reinforceJob',['jid' => $ad->id]) }}" class="btn">{{ __('translate.ad_reinforce_button') }}</a>			
											@else
												<a href="{{ route('promoteJob', ['jid' => $ad->id]) }}" class="btn">{{ __('translate.ad_promotion') }}</a>
											@endif
										</li>
										<li>
											<a href="{{ route('companyEditAd', ['jid' => $ad->id]) }}" class="btn">{{ __('translate.company_ads_edit_button') }}</a>
										</li>
										<li>
											<a href="{{ route('deleteJob',['jid' => $ad->id]) }}" class="btn">{{ __('translate.company_ads_delete_button') }}</a>
										</li>
									</ul>
								</div>
								<span><a href="{{ route('getApplicants', ['aid' => $ad->id]) }}" data-id="{{ $ad->id }}" class="applicants">{{ App\Company::countApplicants($ad->id) }}</a> {{ __('translate.company_ads_applied_for_job') }}
									<i style="display:none;position:relative;bottom: 25px;left: 25px;" class="fa fa-minus-square-o fa-3x close_aplicants" aria-hidden="true"></i>
								</span>
							</div>
					</div>	
				
				</li>
			@endforeach
			</ul>
		</div>

		<div class="pagination">

        {!! $ads->render() !!}

        </div>
	</main>

<script type="text/javascript">
	
$('.applicants').each(function(){
	var executed = false;
	$('.close_aplicants').click(function(){
	$('.list-group').remove();
	$('.close_aplicants').css('display','none');
	return executed = false;
	});
	$(this).click(function(e){
		e.preventDefault();
		var element = $(this);
		var url = element.attr('href');
		element.attr('disabled',true);
		if(!executed) {
   		return $.get(url, { '_token': $('meta[name="csrf-token"]').attr('content') }).done(function(data) {	 
				element.prepend(data); 
				element.next().css('display','inline');
				return executed = true;
		   });
		};	
	});
});
</script>
@endsection