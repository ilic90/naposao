@extends('layouts.master')
@section('content')
<h1 class="page_title main_page_title">{{ __('translate.admin_menu_users') }}</h1>

<main class="main_app_container">
	
	<ul class="users_list cf">
	@foreach ($users as $user)
		<li class="users_list_item">
			<a href="{{ route('getProfile', ['uid' => $user->id]) }}" class="users_list_item_link">	
				<div class="users_list_item_top">
					<div class="users_list_item_img">
					@if(isset($user->image->path))
						<img src="{{ URL::to('/') . $user->image->path }}" alt="">
					</div>
					@endif
				</div>

				<div class="users_list_item_bottom">
					<p class="users_list_item_name bold">{{ $user->first_name }}  {{ $user->last_name }}</p>
					<p class="users_list_item_name_place">{{ $user->country }} , {{ $user->city }} </p>
				</div>
			</a>
		</li>

	@endforeach
<!-- 
		<li class="users_list_item">
			<a href="" class="users_list_item_link">	
				<div class="users_list_item_top">
					<div class="users_list_item_img">
						<img src="https://scontent.fbeg5-1.fna.fbcdn.net/v/t1.0-9/20953777_230750804117183_627396353558770357_n.jpg?oh=94cd889be423dbf3b0b01164428885be&oe=5A655D7E" alt="">
					</div>
				</div>

				<div class="users_list_item_bottom">
					<p class="users_list_item_name bold">Dalibor Opacic</p>
					<p class="users_list_item_name_place">Srbija, Obrenovac</p>
				</div>
			</a>
		</li>

		<li class="users_list_item">
			<a href="" class="users_list_item_link">	
				<div class="users_list_item_top">
					<div class="users_list_item_img">
						<img src="https://scontent.fbeg5-1.fna.fbcdn.net/v/t1.0-9/20953777_230750804117183_627396353558770357_n.jpg?oh=94cd889be423dbf3b0b01164428885be&oe=5A655D7E" alt="">
					</div>
				</div>

				<div class="users_list_item_bottom">
					<p class="users_list_item_name bold">Dalibor Opacic</p>
					<p class="users_list_item_name_place">Srbija, Obrenovac</p>
				</div>
			</a>
		</li>

		<li class="users_list_item">
			<a href="" class="users_list_item_link">	
				<div class="users_list_item_top">
					<div class="users_list_item_img">
						<img src="https://scontent.fbeg5-1.fna.fbcdn.net/v/t1.0-9/20953777_230750804117183_627396353558770357_n.jpg?oh=94cd889be423dbf3b0b01164428885be&oe=5A655D7E" alt="">
					</div>
				</div>

				<div class="users_list_item_bottom">
					<p class="users_list_item_name bold">Dalibor Opacic</p>
					<p class="users_list_item_name_place">Srbija, Obrenovac</p>
				</div>
			</a>
		</li> -->
	</ul>

</main>
@endsection