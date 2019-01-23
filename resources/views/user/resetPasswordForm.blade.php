@extends('layouts.master')
@section('content')
<h1 class="page_title main_page_title">{{ __('translate.reset_password_h1') }}</h1>

<main class="main_app_container">
	<form action="{{ route('setNewPassword', ['token' => $token]) }}" method="POST" class="form_reset_password">
		<div class="form_reset_password_item">
			<input type="password" name="password" placeholder="{{ __('translate.reset_password_new_password_placeholder') }}">
		</div>
		<div class="form_reset_password_item">
			<input type="password" name="repeat_password" placeholder="{{ __('translate.reset_password_new_confirmed_password_placeholder') }}">
		</div>
		{{ csrf_field() }}

		<div class="form_reset_password_item">
			<input type="submit" value="{{ __('translate.user_profile_confirm_button') }}">
		</div>
	</form>
</main>
@endsection	