@extends('layouts.master')

@section('content')
<h1 class="page_title main_page_title">{{ __('translate.companies_create_standard_ad_h1') }}</h1>

<main class="main_app_container">
	@include('layouts.errors')
	<form action="{{ route('postNewJob') }}" method="POST" class="new_job_add_choose_form news_job_create_form">

		<!--<div class="new_job_add_choose_form_item">
			<p class="form_title">User <small>(responsible for this job offer and the candidates applying for the position)</small></p>
			<select name="">
				<option value="">Arsa</option>
				<option value="">Sava</option>
				<option value="">Fiste</option>
			</select>
			<p style="font-size: 15px;margin-top: 10px;">(IMPORTANT: In case the account is used by more than one user from your organization, please create separate user accounts for the different users. You can do this in the section "Users" from the main menu.)</p>
		</div>-->

		<div class="new_job_add_choose_form_item">
			<p class="form_title">{{ __('translate.companies_create_ad_ref_label') }}</p>
			<input name="ref_number" type="text">
		</div>	

		<div class="new_job_add_choose_form_item">
			<p class="form_title">{{ __('translate.companies_create_ad_position_label') }}</p>
			<input name="position" type="text" class="full_width">
			<br>
			<small>	{{ __('translate.companies_create_ad_position_description') }} <a href="#">{{ __('translate.companies_create_ad_position_here_link') }}</a>.</small>
		</div>	

		<div class="new_job_add_choose_form_item">
			<p class="form_title">{{ __('translate.companies_create_ad_description_label') }}</p>
			<textarea name="description" cols="30" rows="10" class="full_width"></textarea>
		</div>	
		
		<div class="new_job_add_choose_form_item cf">
			<p class="form_title">{{ __('translate.companies_create_ad_category_label') }} <small>{{ __('translate.companies_create_ad_category_limit') }}</small>:</p>
			<select class="selectSector select_move_area" size="5">
				@foreach( App\Category::getCategories() as $category)
			     	<option selected="selected" value="{{ $category->id }}">{{ $category->name }}</option>
			    @endforeach
			</select>


			<select class="selectSectorSelected select_move_area" multiple name="categories[]" size="5">
		     	
			</select>
		</div>

		<div class="new_job_add_choose_form_item">
			<p class="form_title">{{ __('translate.companies_create_ad_job_type_label') }}</p>
			<label for="company_job_type" style="margin-right: 20px"><span>{{ __('translate.job_type_option_1') }}</span> <input type="radio" name="job_type" value="0"></label>
			<label for="job_type" style="margin-right: 20px"><span>{{ __('translate.job_type_option_2') }}</span> <input type="radio" name="job_type" value="1"></label>
			<label for="job_type" style="margin-right: 20px"><span>{{ __('translate.job_type_option_3') }}</span> <input type="radio" name="job_type" value="2"></label>
			<label for="job_type" style="margin-right: 20px"><span>{{ __('translate.job_type_option_4') }}</span> <input type="radio" name="job_type" value="3"></label>

			<p class="form_title" style="margin-top: 20px;">{{ __('translate.companies_create_ad_term_label') }}</p>
			<label for="term" style="margin-right: 20px"><span>{{ __('translate.companies_create_ad_term_option_1') }}</span> <input type="radio" name="term"></label>
			<label for="term" style="margin-right: 20px"><span>{{ __('translate.companies_create_ad_term_option_2') }}</span> <input type="radio" name="term"></label>

			<p class="form_title" style="margin-top: 20px;">{{ __('translate.companies_create_ad_level_label') }}</p>
			<label for="career_level" style="margin-right: 20px"><span>{{ __('translate.level_option_1') }}</span> <input type="radio" name="career_level" value="0"></label>
			<label for="career_level" style="margin-right: 20px"><span>{{ __('translate.level_option_2') }}</span> <input type="radio" name="career_level" value="1"></label>
			<label for="career_level" style="margin-right: 20px"><span>{{ __('translate.level_option_3') }}</span> <input type="radio" value="2" name="career_level"></label>

			<p class="form_title" style="margin-top: 20px;">{{ __('translate.companies_create_ad_additional_label') }}</p>
			<label for="students" style="margin-right: 20px"><span>{{ __('translate.companies_create_ad_additional_students') }}</span> <input type="checkbox" name="students"></label>
			<br>
			<label for="low_experience" style="margin-right: 20px"><span>{{ __('translate.companies_create_ad_additional_low_experience') }}</span> <input type="checkbox" name="low_experience"></label>

		</div>	

		<div class="new_job_add_choose_form_item">
			<p class="form_title">{{ __('translate.companies_create_ad_based_location_label') }}</p>
			<select name="country">
				<option value="Serbia">Serbia</option>
				<option value="Bulgaria">Bulgaria</option>
				<option value="Spain">Spain</option>
			</select>
			<br>
			<br>
			<p class="form_title">{{ __('translate.companies_create_ad_location_label') }} <small>{{ __('translate.companies_create_ad_location_description') }}</small>:</p>
			<select name="city">
				<option value="Beograd">Beograd</option>
				<option value="Nis">Nis</option>
				<option value="Paracin">Paracin</option>
			</select>
		</div>	

		<div class="new_job_add_choose_form_item">

			<p class="form_title">{{ __('translate.companies_create_ad_salary_description') }}</p>

			<select name="salary_type">
				<option value="Gross">{{ __('translate.companies_create_ad_salary_type_1') }}</option>
				<option value="Net">{{ __('translate.companies_create_ad_salary_type_2') }}</option>
			</select>
			<span> {{ __('translate.from') }} </span>
			<input name="salary_from" type="text">
			<span> {{ __('translate.to') }} </span>
			<input name="salary_to" type="text">
			<select name="currency">
				<option value="RSD">RSD</option>
				<option value="EUR">EU</option>
				<option value="USD">USD</option>
			</select>

		</div>		

		<div class="new_job_add_choose_form_item">

			<p class="form_title">{{ __('translate.companies_create_ad_languages_label') }}</p>
			<select name="foreign_languages">
				<option value="0">{{ __('translate.none') }}</option>
				@foreach(App\Language::getLanguages() as $language)
					<option value="{{ $language->id }}">{{ $language->language }}</option>
				@endforeach
			</select>
		</div>	

{{-- 		<div class="new_job_add_choose_form_item">

			<p class="form_title">Questionnaire:</p>
			
			<p>	Use questionnaire to ask and receive answers to questions you have from the candidates applying to your job ad. Learn more <a href="">here</a>. Create a questionnaire <a href="">here</a></p>
			<select name="questionnaire_id">
				<option value="1">Broj 1</option>
				<option value="2">Broj 2</option>
				<option value="3">Broj 3</option>
			</select>

		</div> --}}

		<div class="new_job_add_choose_form_item">

			<p class="form_title">{{ __('translate.companies_create_ad_external_link_label') }} <small>{{ __('translate.companies_create_ad_external_link_desc') }}</small>:</p>
			
			<label for="external_url"><input name="external_url" type="text"></label>
			<input name="ad_type" type="hidden" value="1">

			{{ csrf_field() }}
			<div class="new_job_add_choose_form_submit_btn">
				<input class="green_btn" type="submit" value="{{ __('translate.companies_create_ad_publish_button') }}">
			</div>
		</div>	
	</form>
</main>
@endsection