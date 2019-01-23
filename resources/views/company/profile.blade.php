@extends('layouts.master')
@section('content')
	<h1 class="page_title main_page_title">{{ __('translate.company_profile_h1') }}</h1>

	<div class="main_app_container">
	@include('layouts.errors')
	<div class="single_job_header company_view_holder">
		@if(Auth::check() && Auth::user()->id == $company->id)
		
			<a href="{{ route('getEditCompany', ['cid' => Auth::user()->id]) }}" class="btn_edit_profile">{{ __('translate.company_profile_edit_profile_button') }} <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
			@if($company->promotion == null)
				<a href="{{ route('promoteCompany', ['cid' => Auth::user()->id]) }}" class="btn btn-success set-active">Promote company</a>
				<p>{{ __('translate.company_promotion_charge') }}</p>
			@elseif($company->promotion != null)
				<p>{{ __('translate.company_promotion_until') }} {{ $company->dateFormat($company->promotion)->toFormattedDateString() }}</p>
			@endif
		@endif
		@if(Session::get('user'))
	        @if(Session::get('user')->is_admin)
	        	<a href="{{ route('getEditCompanyAdmin', ['cid' => $company->id]) }}" class="btn">{{ __('translate.company_profile_admin_edit_button') }}</a>
	        	<a href="{{ route('deleteCompany', ['cid' => $company->id]) }}" class="btn">{{ __('translate.company_profile_admin_delete_button') }}</a>
				@if($company->active == 0)
					<a href="{{ route('adminActivateCompany', ['cid' => $company->id]) }}"><button type="button" data-status="1" data-aid="{{ $company->id }}" class="btn btn-success set-active">{{ __('translate.company_profile_admin_activate_button') }}</button></a>
				@else
					<a href="{{ route('adminDeactivateCompany', ['cid' => $company->id]) }}"><button type="button" data-status="0" data-aid="{{ $company->id }}" class="btn btn-danger set-active">{{ __('translate.company_profile_admin_deactivate_button') }}</button></a>
				@endif
				@else
	        @endif
        @endif

		<!-- Report company -->
		
		
			


@if(Session::has('user'))

<a class="report" href="#" data-js="open">
	  <i class="fa fa-flag" aria-hidden="true"></i><span>{{ __('translate.ad_report') }}</span>
   </a>

@endif
</div>
<!-- End report -->
		
		<div class="company_profile_view_holder cf">	
			<div class="company_profile_view_side cf">
				<div class="company_profile_view_side_logo">
					<div class="company_profile_logo_holder">
						<img src="{{ URL::to('/public') . $logo }}" alt="">
					</div>
					@if((Auth::check() && Auth::user()->id == $company->id) || (Auth::check() && Auth::user()->is_admin))
					
					<div class="update_logo_holder">
						<a href="{{ route('imageCrop') }}" class="btn_edit_profile">{{ __('translate.company_profile_update_logo_button') }} <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

						<div class="login_reg_form_item login_reg_form_submit">
						</div>
					</div>
					
					@endif
				</div>
				<div class="company_profile_view_side_info">
					<div class="company_profile_view_jobs_title">
						<p class="bold" style="background: transparent; padding: 0;">{{ __('translate.company_profile_info') }}</p>
					</div>
					<p class="bold">{{ $company->company_name }}</p>
					<p class="bold"><a href="http://{{ $company->company_website }}" class="profile_link">{{ $company->company_website }}</a></p>
					<p class=""><span class="bold">{{ __('translate.company_profile_location') }}</span> {{$company->country}}<span>, <span>{{$company->company_address}}</span></p>
					<p><span class="bold">{{ __('translate.company_profile_phone') }}</span> <span>{{$company->company_phone}}</span></p>
					<p><span class="bold">{{ __('translate.company_profile_employees') }}</span> <span>{{ $businessCard['number_of_employees_worldwide'] }}</span></p>
				</div>
				<div class="company_profile_view_jobs">
					<div class="company_profile_view_jobs_title">
						<p class="bold">{{ __('translate.company_profile_all_jobs') }} <span>{{ $company->company_name }}</span></p>
					</div>
					<ul>
						@foreach ($ads as $ad)
						<li class="company_profile_view_jobs_item">
							<a href="{{ route('getSpecificJob', ['jid' => $ad->id, 'cid' => $company->id]) }}" class="company_profile_view_jobs_item_link">
								<p class="">{{ $ad->position }}</p>
								<p class=""><span>{{ $ad->country }}</span>, <span>{{ $ad->city }}</span></p>
							</a>
						</li>
						@endforeach
					</ul>
				</div>
			</div>

			<div class="company_profile_view_main">
				<div class="company_profile_view_cover">
					<!-- <img style="width: 100%;" src="https://scontent.fbeg4-1.fna.fbcdn.net/v/t31.0-8/19702672_1617343671610432_6250076273563742580_o.jpg?oh=cd246e4b52bd4d88c2054c4ce088c5a4&oe=5A8552D0" alt=""> -->
					
					<img src="{{ URL::to('/public') . $cover }}" alt="">
				</div>

				<div>
					@if((Auth::check() && Auth::user()->id == $company->id) || (Auth::check() && Auth::user()->is_admin))
						{{Form::open(array('route' => 'updateCover','method'=>'POST', 'files'=>true))}}
						<input type="hidden" value="{{ $cid }}" name="cid">
							<a class="btn_edit_profile update_cover_btn">{{ __('translate.company_profile_update_cover_button') }} <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
							<input type="file" name="company_cover" id="company_cover">
							{{ csrf_field() }}
							<div class="login_reg_form_item login_reg_form_submit">
								<input type="submit" value="{{ __('translate.company_edit_update_button') }}" id="company_cover_submit">
							</div>
						{{Form::close()}}
					@endif
				</div>

				<div class="company_profile_view_main_item">
					<div class="company_profile_view_main_title"><p class="bold">{{ __('translate.company_profile_about_title') }}</p></div>
					<div class="company_profile_view_main_text">
						<p>{{$company->about_us}}</p>
					</div>
				</div>

				<div class="company_profile_view_main_item">
					<div class="company_profile_view_main_title"><p class="bold">{{ __('translate.company_profile_careers_title') }}</p></div>
					<div class="company_profile_view_main_text">
						<p>{{$company->career}}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="popup popUp report_popup">
				<a href="#" class="popup_close" name="close">
					<i class="fa fa-times" aria-hidden="true"></i>
				</a>
				@if(Session::get('user'))
				<div class="row text-center">
					<h2>Report Company</h2> 
				</div>
					<form action="{{ route('reportCompany', ['cid' => $company->id,'uid' => Session::get('user')->id]) }}" method="POST" enctype="multipart/form-data">
						<div class="modal-body">
						{{ csrf_field() }}

							<ul>
								<li><input type="radio" name="text" value="This company is fake">The company is fake</li>
								<li><input type="radio" name="text" value="The company does not have any job ads">The company does not have any job ads </li>
								<li><input type="radio" name="text" value="Company ads are a scam">Company ads are a scam</li>
							</ul>
						</div>
						<div class="modal-footer">
							<button type="btn" class="btn btn-default" data-dismiss="modal">{{ __('translate.ad_report_submit_button') }}</button>
						</div>
					</form>
			</div>
			@endif
	<script> 
	$('.report').click(function(){
		$('.reportModal');
	})
	$('#company_logo').change(function(){
		if ($('#company_logo')[0].files.length !== 0) {
		$('#company_logo_submit').css('display','block');
	}
	});

	$('#company_cover').change(function(){
		if ($('#company_cover')[0].files.length !== 0) {
		$('#company_cover_submit').css('display','block');
	}
	});

	$('.set-active').click(function(){
			var status = $(this).attr('data-status');
			var aid = $(this).attr('data-aid');
			var url = "/updateCompanyStatus/"+aid;

			if ($(this).attr('data-status') == '1') {
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