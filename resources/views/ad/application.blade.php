@extends('layouts.master')

@section('content')
<style type="text/css">
.choose_file{
	display:none;
}
.choose_cv{
	display:none;
}
#info{
	display:none;
}
</style>

<h1 class="page_title main_page_title">{{ __('translate.ad_application_h1') }}</h1>

<main class="main_app_container">
@include('layouts.errors')
	<div class="alert alert-info" id="info">
		<p >Your CV is attached</p>
	</div>
	@if(count($cvs) > 0)
	<button class="btn_attach_cv blue_btn" id="cv">Attach CV from naposao</button>
	@endif
	<button class="btn_attach_cv blue_btn" id="file">Attach CV from your computer</button>
	
	<div class="choose_file">
	{{Form::open(array('route' => 'postJobApplication','method'=>'POST', 'files'=>true))}}
		<textarea name="text"   cols="30" rows="10" class="apply_for_job_text" placeholder="{{ __('translate.ad_application_letter_placeholder') }}"></textarea>
		<input type="hidden" name="user_id" value="{{ Session::get('user')->id }}">
		<input type="hidden" name="ad_id" value="{{ $jid }}">
		<input type="hidden" name="company_id" value="{{ $cid }}">
		<input type="hidden" name="first_name" value="{{ Session::get('user')->first_name }}">
		<input type="hidden" name="last_name" value="{{ Session::get('user')->last_name }}">

		<div class="apply_for_job_file_upload_holder">
			<div class="aplly_for_job_cv_upload">
				<input type="file" name="file_input" accept="application/pdf" />
				<div class="btn_mask">Upload CV</div>
			</div>

			<div class="choose_your_cover_letter">
				@if(count($coverLetters) > 0)
					<h3>Your cover letters</h3>
					<ul>
					@foreach($coverLetters as $coverLetter)

					<li class="cover">Letter for: <a href="#">{{ $coverLetter->ad->position }}</a><input type="hidden" value="{{ $coverLetter->text }}"></li>

					@endforeach
					@else
					<h4>You don't have cover letters</h4>
					@endif
					</ul>
			</div>
		
			{{ csrf_field() }}
			<input type="submit" value="{{ __('translate.ad_apply_button') }}" class="apply_for_job_submit confirm_btn">
		</div>
		{{Form::close()}}
	</div>
	@if(count($cvs) > 0)
	<div class="choose_cv">
		<form action="{{ route('postJobApplication') }}" method="POST">
			<textarea name="text"  cols="30" rows="10" class="apply_for_job_text text" placeholder="{{ __('translate.ad_application_letter_placeholder') }}"></textarea>
			<input type="hidden" name="user_id" value="{{ Session::get('user')->id }}">
			<input type="hidden" name="ad_id" value="{{ $jid }}">
			<input type="hidden" name="company_id" value="{{ $cid }}">
			<input type="hidden" name="first_name" value="{{ Session::get('user')->first_name }}">
			<input type="hidden" name="last_name" value="{{ Session::get('user')->last_name }}">
			<input type="hidden" name="cv_id" value="" id="cvid">
			<div class="apply_for_job_file_upload_holder">
				@if(count($cvs) > 0)
				<div class="choose_your_cover_letter">
					<h3>Your CV's</h3>
					<ul class="your_cv_holder">
				@foreach($cvs as $cv)
					<li class="cv_id"><a href="#" class="btn green_btn">Attach {{ $cv->title }}</a><input type="hidden" value="{{ $cv->cvFile->id }}"></li>
					<li><a href="{{ URL::to('/public').$cv->cvFile->path }}" target="__blank" class="btn grey_btn">View CV</a></li>

				@endforeach
				@else
					<h4>You don't have any CV's</h4>
				@endif
					</ul>
				</div>
			
				@if(count($coverLetters) > 0)
				<div class="choose_your_cover_letter">
					<h3>Your cover letters</h3>
					<ul>
				@foreach($coverLetters as $coverLetter)

					<li class="cover">Letter for: <a href="#">{{ $coverLetter->ad->position }}</a><input type="hidden" value="{{ $coverLetter->text }}"></li>

				@endforeach
				@else
					<h4>You don't have cover letters</h4>
				@endif
					</ul>
				</div>
			
			{{ csrf_field() }}
			<input type="submit" value="{{ __('translate.ad_apply_button') }}" class="apply_for_job_submit confirm_btn">
			</div>
		</form>
		
	</div>
	@endif
	
</main>

<script type="text/javascript">

$("#cv").click(function(){
    $(".choose_cv").show();
	$(".choose_file").hide();
	$("#cv").hide();
	$("#file").show();
});
$("#file").click(function(){
    $(".choose_file").show();
	$(".choose_cv").hide();
	$("#file").hide();
	$("#cv").show();
});

$(".cv_id a").click(function(){
	// console.log($(this).next("input[type='hidden']").val());
	$('#cvid').val($(this).next("input[type='hidden']").val());
	$("#info").show();
});

$(".cover a").click(function(){
	$('.apply_for_job_text').val($(this).next("input[type='hidden']").val());
});

</script>

@endsection
