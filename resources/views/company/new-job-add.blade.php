@extends('layouts.master')

@section('content')
<h1 class="page_title main_page_title">{{ __('translate.companies_new_job_h1') }}</h1>

		<main class="main_app_container">

		@include('layouts.errors')
			
			<div class="new_job_ad_packege_holder cf">
				<div class="new_job_ad_packege_item">
					<div class="new_job_ad_packege_item_title">{{ __('translate.companies_new_job_basic_title') }}</div>
					<div class="new_job_ad_packege_item_price">
						<p>{{ __('translate.companies_new_job_basic_price') }}</p>
					</div>
					<div class="new_job_ad_packege_item_desc">
						<p>{{ __('translate.companies_new_job_basic_description') }}</p>
					</div>
					<div class="new_job_ad_packege_item_selcet_btn">
						<a href="{{ route('addNewJobStandard') }}">{{ __('translate.companies_new_job_select_button') }}</a>
					</div>
				</div>

				<div class="new_job_ad_packege_item">
					<div class="new_job_ad_packege_item_title">{{ __('translate.companies_new_job_standard_title') }}</div>
					<div class="new_job_ad_packege_item_price">
						<p>2.500</p>
						<small>({{ __('translate.companies_new_job_price_description') }})</small>
					</div>
					<div class="new_job_ad_packege_item_desc">
						<p>{{ __('translate.companies_new_job_standard_description') }}</p>
					</div>
					<div class="new_job_ad_packege_item_selcet_btn">
						<a href="{{ route('addNewJobCustom') }}">{{ __('translate.companies_new_job_select_button') }}</a>
					</div>
				</div>

				<div class="new_job_ad_packege_item">
					<div class="new_job_ad_packege_item_title">{{ __('translate.companies_new_job_premium_title') }}</div>
					<div class="new_job_ad_packege_item_price">
						<p>10.000</p>
						<small>({{ __('translate.companies_new_job_price_description') }})</small>
					</div>
					<div class="new_job_ad_packege_item_desc">
						<p>{{ __('translate.companies_new_job_premium_description') }}</p>
					</div>
					<div class="new_job_ad_packege_item_selcet_btn">
						<a href="{{ route('addNewJobVIP') }}">{{ __('translate.companies_new_job_select_button') }}</a>
					</div>
				</div>

				<div class="new_job_ad_packege_item">
					<div class="new_job_ad_packege_item_title">{{ __('translate.companies_new_job_diamond_title') }}</div>
					<div class="new_job_ad_packege_item_price">
						<p>20.000</p>
						<small>({{ __('translate.companies_new_job_price_description') }})</small>
					</div>
					<div class="new_job_ad_packege_item_desc">
						<p>{{ __('translate.companies_new_job_diamond_description') }}</p>
					</div>
					<div class="new_job_ad_packege_item_selcet_btn">
						<a href="{{ route('addNewJobPremium') }}">{{ __('translate.companies_new_job_select_button') }}</a>
					</div>
				</div>
			</div>
			<!-- Popup custom job ad design -->
			<div class="custom_job_ad_popup">
				<a href="#" class="popup_close">
					<i class="fa fa-times" aria-hidden="true"></i>
				</a>
				<form action="" method="">
					<textarea name="" id="" cols="30" rows="10" style="width: 100%;margin-top: 10px;" placeholder="Notes about fully customized design:*"></textarea>
					<input type="submit" value="Send">
				</form>
			</div>
			
			<!-- Prva Forma -->
			
			<!-- Druga forma -->
			
			<!-- Pomereno na route -->

		</main>
@endsection