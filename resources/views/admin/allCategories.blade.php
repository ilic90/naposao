@extends('layouts.master')
@section('content')

<h1 class="page_title main_page_title">{{ __('translate.admin_categories_h1') }}</h1>

<main class="main_app_container">
<ul class="nav nav-tabs">
    <li role="presentation"><a href="{{ route('getAdminAds') }}">{{ __('translate.admin_menu_ads') }}</a></li>
    <li role="presentation"><a href="{{ route('getAdminCompanies') }}">{{ __('translate.admin_menu_companies') }}</a></li>
    <li role="presentation"><a href="{{ route('getAdminUsers') }}">{{ __('translate.admin_menu_users') }}</a></li>
    <li role="presentation"><a href="{{ route('getReports') }}">{{ __('translate.admin_menu_reports-ads') }}</a></li>
    <li role="presentation"><a href="{{ route('getReportsCompanies') }}">{{ __('translate.admin_menu_reports-companies') }}</a></li>
    <li role="presentation"><a href="{{ route('getAdminLanguages') }}">{{ __('translate.admin_menu_languages') }}</a></li>
    <li role="presentation"><a href="{{ route('getAdminCategories') }}">{{ __('translate.admin_menu_categories') }}</a></li>
    <li role="presentation"><a href="{{ route('getAdminInfo') }}">Site Info</a></li>
</ul>

<div class="job_list_filter_item cf">
    <form method="POST" action="{{ route('adminAddCategory') }}">
        {{ csrf_field() }}
        <div class="home_search_job_item search_location_holder">
            <div class="job_list_filter_item_left">
                <input type="text" name="category" placeholder="{{ __('translate.admin_categories_placeholder') }}">
            </div>
        </div>
        <input type="submit" value="{{ __('translate.admin_categories_add_button') }}" class="confirm_btn">
    </form>
</div>
 <div class="job_list_filter_holder">
        <ul>
        @if(count($categories) < 1)
			{{ __('translate.admin_no_results') }}
		@endif
        @foreach($categories as $category)
            <li class="job_list_filter_item cf">
				<div class="job_list_filter_item_left">
					
					<h3 class="job_list_filter_item_title bold">
						<a href="#">{{ $category->name }}</a>
					</h3>
				</div>
				<div class="job_list_filter_item_right">
					<div class="job_container_push_right cf">
						
						<a href="{{ route('adminDeleteCategory', ['catid' => $category->id]) }}"<button type="button" class="btn btn-danger delete" data-aid="{{ $category->id }}">{{ __('translate.admin_delete_button') }}</button></a>
						
					</div>
				</div>
			</li>
        @endforeach
        </ul>
    </div>

<div class="pagination">

{!! $categories->render() !!}

</div>
@include('layouts.errors')
</main>

@endsection