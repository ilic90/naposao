@extends('layouts.master')
@section('content')
<h1 class="page_title main_page_title">{{ __('translate.users_login_form_h1') }}</h1>
<main class="main_app_container">
<div class="login_register_container">
	<form action="{{ route('postUserLogin') }}" method="POST" class="login_reg_form">
		<div class="login_reg_form_item">
			
				<h4 style="text-align: center; margin-bottom: 15px;color: #ff5c5c;">@include('layouts.errors')</h4>
			
			<label for="">{{ __('translate.users_login_form_email_label') }}</label>
			<input name="email" type="text">
		</div>

		<div class="login_reg_form_item">
			<label for="">{{ __('translate.users_login_form_password_label') }}</label>
			<input type="password" name="password">
		</div>
		{{ csrf_field() }}
		<div class="login_reg_form_item login_reg_form_submit">
			<input type="submit" value="{{ __('translate.users_login_form_login_button') }}">
		</div>
		
		<div class="forgot_pass_link">
			<a href="{{ route('getResetPasswordEmail') }}" class="">{{ __('translate.users_login_form_forgot_pass_link') }}</a> 	
		</div>
		
		<a href=" {{ route('getUserRegister') }} " class="login_reg_form_change_option blue_btn">{{ __('translate.users_login_form_create_account_button') }}</a>
	</form>
</div>

</main>
@endsection