@extends('layouts.master')
@section('content')
<h1 class="page_title main_page_title">{{ $user[0]->first_name }} {{ $user[0]->last_name }} {{ __('translate.user_menu_profile') }}</h1>

<main class="main_app_container">
	<div class="user_profile_content cf">
		<div class="user_profile_main">
			<div class="user_profile_main_header">
				<div class="user_profile_image user_profile_item">
					<div class="user_profile_image_holder">
						<span>
						@if(isset($user[0]->image->path))
							<img src="{{ URL::to('/') . $user[0]->image->path }}" alt="">
						@endif
						</span>
					</div>
				</div>

				<div class="user_profile_name_holder user_profile_item">
					<p class="user_profile_name">
					<span>{{ $user[0]->first_name }} {{ $user[0]->last_name }}</span>
					</p>
				</div>

			</div>
		</div>

		<div class="user_profile_sidebar">
			<div class="user_profile_sidebar_item">
				<p class="bold">{{ __('translate.user_profile_email_label') }}</p>
				<span>{{ $user[0]->email }}</span>
			</div>

			<div class="user_profile_sidebar_item">
				<p class="bold">{{ __('translate.user_profile_gender_label') }}</p>
				<span>{{ $user[0]->gender }}</span>
			</div>
			@if($user[0]->phone)
			<div class="user_profile_sidebar_item">
				<p class="bold">{{ __('translate.user_profile_phone_label') }}</p>
				<span id="phone_span">{{ $user[0]->phone }}</span>
			</div>
			@endif
			</div>
		</div>
	</div>
</main>
@endsection