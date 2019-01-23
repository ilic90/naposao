@extends('layouts.master')

@section('content')

<h1 class="page_title main_page_title">{{ __('translate.company_edit_h1') }}</h1>

<main class="main_app_container">
		<div class="login_register_container">
				<form action="{{ route('postEditCompanyAdmin') }}" method="POST" id="company_reg_form" class="login_reg_form company_registration_form" enctype="multipart/form-data">
					<input type="hidden" value="{{ $cid }}" name="cid">
					<div class="login_reg_form_item">
						<p class="form_title">{{ __('translate.companies_register_country_label') }}</p>
						<select name="country">
						    <option selected="selected" value="{{$company->country}}">{{$company->country}}</option>
							<option value="Serbia">{{ __('translate.companies_register_country_option_1') }}</option>
							<option value="Bulgaria">{{ __('translate.companies_register_country_option_2') }}</option>
						</select>
					</div>

					<!-- Second Part Companies Registration -->
					<div class="">

						<div class="login_reg_form_item">
							<p class="form_title" style="margin-top: 20px;">{{ __('translate.companies_register_company_name_label') }}</p>
							<div class="required_field">
								<input name="company_name" type="text" value="{{$company->company_name}}" required>
							</div>
						</div>

						<div class="login_reg_form_item form_smaller_text">
							<p class="form_title">{{ __('translate.companies_register_business_sector_label') }}</p>
							<select class="selectSector select_move_area" size="5" >
							@foreach( App\Category::getCategories() as $category)
								@if (!in_array($category->id, App\Category::getCategoriesByCompany($cid)))
									<option value="{{$category->id}}">{{ $category->name }}</option>
								@endif
                            @endforeach
							</select>
						
							<select multiple name="sectors[]" class="selectSectorSelected select_move_area" size="5">
							@foreach( App\Category::getCategories() as $category)
								@if (in_array($category->id, App\Category::getCategoriesByCompany($cid)))
								<option value="{{$category->id}}" selected>{{ $category->name }}</option>
								@endif
							@endforeach
							</select>
							<input type="hidden"  name="categoriesArray" value="" class="categoriesArray" multiple>
							<p class="form_title">{{ __('translate.companies_register_company_website_label') }}</p>
							<div class="required_field">
								<input name="company_website" type="text" value="{{$company->company_website}}">
							</div>

							<p class="form_title">{{ __('translate.companies_register_company_phone_label') }}</p>
							<div class="required_field">
								<input name="company_phone" type="text" value="{{$company->company_phone}}">
							</div>

							<p class="form_title">{{ __('translate.companies_register_company_address_label') }}</p>
							<div class="required_field">
								<input name="company_address" type="text" value="{{$company->company_address}}" required>
							</div>
							<p class="form_title">{{ __('translate.companies_register_step_3_employees_label') }}</p>
							<div class="required_field">
								<input name="number_of_employees" type="text" value="{{$businesscard->number_of_employees}}">
							</div>
						</div>
						<div class="company_profile_edit_item">
			
							<div class="small_subtitle">
						   		<h3>{{ __('translate.company_edit_about_title') }}</h3>
						   	</div>

						  	<p class="bold">{{ $company->company_name }}</p>

						  	<small style="margin-bottom: 5px;display: inline-block;">{{ __('translate.company_edit_about_string') }}</small>
								<div class="edit_profile_textarea">
							  		<textarea name="about_us" id="about_us_text" cols="40" rows="4">{{$company->about_us}}</textarea>
							  	</div>
							<div class="small_subtitle">
						   		<h3>{{ __('translate.company_edit_career_title') }}</h3>
						   	</div>

						  	<small style="margin-bottom: 5px;display: inline-block;">{{ __('translate.company_edit_career_string') }}</small>
						 		<div class="edit_profile_textarea">
				  					<textarea name="career" id="career" cols="40" rows="4">{{$company->career}}</textarea>
			  				</div>
					  	</div>
						{{ csrf_field() }}
						<div class="login_reg_form_item login_reg_form_submit">
							<input type="submit" value="{{ __('translate.company_edit_update_button') }}">
						</div>
					</div>
				</form>

				<script>
					$('#company_reg_form').validate();
				</script>
			</div>

</main>
@endsection