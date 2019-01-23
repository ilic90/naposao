@extends('layouts.master')

@section('content')
		<main class="main_app_container">
		
			<div class="upload_profile_photo_holder company_reg_step_2 cf">	
				<div class="upload_profile_photo_holder_text">
					<p class="bold">{{ __('translate.companies_register_step_2_string') }}</p>

					<ul style="padding-left: 40px;margin-top: 15px;">
						<li>{{ __('translate.companies_register_step_2_li_1') }}</li>
						<li>{{ __('translate.companies_register_step_2_li_2') }}</li>
						<li>{{ __('translate.companies_register_step_2_li_3') }}</li>
					</ul>					
				</div>

				<div class="upload_profile_photo">
					<p class="" style="margin-bottom: 15px;">{{ __('translate.companies_register_step_2_logo_formats') }}</p>
					{{Form::open(array('route' => 'getCompanyRegisterStep2','method'=>'POST', 'files'=>true))}}
						<input type="file" name="company_logo">
						<input type="hidden" name="id" value="{{$id}}">
						{{ csrf_field() }}
						<input type="submit" value="{{ __('translate.companies_register_step_2_upload_button') }}" class="green_btn">
					</form>
				</div>
			</div>

			<div class="skip_btn_holder">
				<a href="{{ route('getCompanyRegisterStep3',['cid' => $id]) }}">{{ __('translate.companies_register_step_2_skip_link') }}</a>
			</div>
			
		</main>

@endsection