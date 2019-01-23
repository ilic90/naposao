@extends('layouts.master')
@section('content')
<h1 class="page_title main_page_title">{{ __('translate.users_register_h1') }}</h1>

<main class="main_app_container">
	@include('layouts.errors')
	<div class="login_register_container">
		@if(session('error'))
			<h4>{{ session('error') }}</h4>
		@endif
		<form action="{{ route('postUserRegister') }}" method="POST" class="login_reg_form">
			<div class="login_reg_form_item">
				<p class="form_title">{{ __('translate.users_register_first_name_label') }}</p>
				<input type="text" name="first_name">
			</div>

			<div class="login_reg_form_item">
				<p class="form_title">{{ __('translate.users_register_last_name_label') }}</p>
				<input type="text" name="last_name">
			</div>

			<div class="login_reg_form_item">
				<p class="form_title">{{ __('translate.users_register_gender_label') }}</p>
				<label>{{ __('translate.users_register_gender_radio_male') }}<input type="radio" value="Male" name="gender"></label>
				<label>{{ __('translate.users_register_gender_radio_female') }}<input type="radio" value="Female" name="gender"></label>
			</div>

			<div class="login_reg_form_item" style="border-bottom: 1px solid #ddd;margin-bottom: 10px;">
				<small style="border-top: 1px solid #ddd;display: block;padding-top: 10px;margin-bottom: 10px;">{{ __('translate.users_register_small_text') }}</small>
				<p class="form_title">{{ __('translate.users_register_email_label') }}</p>
				<input type="email" name="email">

				<p class="form_title">{{ __('translate.users_register_confirm_email_label') }}</p>
				<input type="email" name="confirm_email">
			</div>

			<div class="login_reg_form_item">
				<p class="form_title">{{ __('translate.users_register_password_label') }}</p>
				<input type="password" name="password">

				<p class="form_title">{{ __('translate.users_register_confirm_password_label') }}</p>
				<input type="password" name="confirm_password">
			</div>

			<div class="login_reg_form_item">
				<label for="terms_and_conditions">
					<input required type="checkbox" id="terms_and_conditions" name="terms_and_conditions" style="display: inline-block;width: auto;margin-right: 5px;"> 
					<span style="font-size: 15px;" class="bold">{{ __('translate.users_register_terms') }} <a href="#">{{ __('translate.users_register_terms_link') }}</a></span>
				</label>
			</div>

			<div class="g-recaptcha " data-sitekey="6Lf-7zkUAAAAAMG-uwcu-4ezYwYzyqyLUdDUJaYl"></div>
			{{ csrf_field() }}
			<div class="login_reg_form_item login_reg_form_submit" style="margin-top: 20px;">
				<input type="submit" value="{{ __('translate.users_register_button') }}">
			</div>
		</form>
	</div>

</main>
@endsection