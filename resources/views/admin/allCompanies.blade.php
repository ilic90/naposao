@extends('layouts.master')

@section('content')
	<h1 class="page_title main_page_title">{{ __('translate.admin_companies_h1') }}</h1>

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
		<ul class="list_of_companies">
		@foreach($companies as $company)
			<li class="list_of_companies_item cf">
				<p class="list_of_companies_item_logo">
					<img src="{{ URL::to('/') . $company['image']['path'] }}" alt="">
				</p>

				<p class="list_of_companies_item_companies_phone">{{ $company->company_name }}</p>

				<p class="list_of_companies_item_companies_phone">{{ $company->first_name }} {{ $company->last_name }}</p>

				<p class="list_of_companies_item_companies_phone"><i class="fa fa-phone-square" aria-hidden="true"></i>{{ $company->business_phone }}</p>

				<a href="{{ route('getEditCompanyAdmin', ['cid' => $company->id]) }}" class="list_of_companies_modify list_of_companies_item_btn"><i class="fa fa-pencil-square" aria-hidden="true"></i><span>{{ __('translate.admin_companies_modify_button') }}</span></a>

				<a href="{{ route('getCompanyProfile', ['cid' => $company->id]) }}" class="list_of_companies_details list_of_companies_item_btn"><i class="fa fa-ellipsis-v" aria-hidden="true"></i><span>{{ __('translate.admin_companies_details_button') }}</span></a>

				@if($company->blocked === 0)
					<a href="{{ route('updateCompanyStatus', ['cid' => $company->id, 'stat' => 1]) }}" class="list_of_companies_details list_of_companies_item_btn block"><i class="fa fa-ellipsis-v" aria-hidden="true" data-status="1"></i><span>{{ __('translate.admin_companies_block_button') }}</span></a>
				@else
					<a href="{{ route('updateCompanyStatus', ['cid' => $company->id, 'stat' => 0]) }}" class="list_of_companies_details list_of_companies_item_btn block"><i class="fa fa-ellipsis-v" aria-hidden="true" data-status="0"></i><span>{{ __('translate.admin_companies_unblock_button') }}</span></a>
				@endif

				<a href="{{ route('deleteCompany', ['cid' => $company->id]) }}" class="list_of_companies_delete list_of_companies_item_btn"><i class="fa fa-trash-o" aria-hidden="true"></i><span>{{ __('translate.admin_delete_button') }}</span></a>
			</li>
		@endforeach
		<div class="pagination">

			{!! $companies->render() !!}

		</div>
		</ul>
	</main>
@endsection