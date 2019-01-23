@extends('layouts.master')
@section('content')
<h1 class="page_title main_page_title">{{ __('translate.reset_password_h1') }}</h1>

<main class="main_app_container">
	<form action="{{ route('sendResetPasswordEmail') }}" method="POST" class="form_reset_password">
		<div class="form_reset_password_item">
			<input type="email" name="email" placeholder="{{ __('translate.reset_password_email_placeholder') }}">
		</div>
		{{ csrf_field() }}
		<div class="form_reset_password_item">
			<input type="submit" value="{{ __('translate.user_profile_confirm_button') }}">
		</div>
	</form>
</main>
@endsection	