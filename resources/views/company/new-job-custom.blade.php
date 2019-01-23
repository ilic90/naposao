@extends('layouts.master')

@section('content')
<h1 class="page_title main_page_title">{{ __('translate.companies_create_custom_ad_h1') }}</h1>

<main class="main_app_container">
@include('layouts.errors')
<form action="{{ route('postNewJob') }}" method="POST" class="new_job_add_choose_form">
		{{--	<div class="new_job_add_choose_form_item new_job_add_cover_photo_section">
					
					<div class="add_cover_preview_photo none">
						<img src="" alt="">	
					</div>

					<div class="add_cover_btn_input">
						<input type="file" id="" name="">
					</div>

					<div class="add_cover_btn">
						<a href="#" class=""><i class="fa fa-plus-square" aria-hidden="true"></i> {{ __('translate.companies_create_custom_ad_add_cover') }}</a>
					</div>

					<div class="add_cover_btn add_cover_btn_upload_cancle cf none">
						<a href="#" class=""><i class="fa fa-plus-square" aria-hidden="true"></i>{{ __('translate.companies_create_custom_ad_upload_cover') }}</a>
						<a href="#" class="cancle_btn"><i class="fa fa-times-circle" aria-hidden="true"></i> {{ __('translate.companies_create_custom_ad_cancle') }}</a>
					</div>

					<div class="add_cover_btn add_cover_btn_change_remove cf none">
						<a href="#" class=""><i class="fa fa-plus-square" aria-hidden="true"></i> {{ __('translate.companies_create_custom_ad_change_cover') }}</a>
						<a href="#" class="cancle_btn"><i class="fa fa-times-circle" aria-hidden="true"></i> {{ __('translate.companies_create_custom_ad_remove_cover') }}</a>
					</div>

				</div> --}}
			<!--	<div class="new_job_add_choose_form_item">
					<p class="form_title">User <small>(responsible for this job offer and the candidates applying for the position)</small></p>
					<select name="" id="">
						<option value="">Arsa</option>
						<option value="">Sava</option>
						<option value="">Fiste</option>
					</select>
					<p style="font-size: 15px;margin-top: 10px;">(IMPORTANT: In case the account is used by more than one user from your organization, please create separate user accounts for the different users. You can do this in the section "Users" from the main menu.)</p>
				</div>-->

				<div class="new_job_add_choose_form_item">
					<p class="form_title">{{ __('translate.companies_create_ad_ref_label') }}</p>
					<input type="text" name="ref_number">
				</div>	

				<div class="new_job_add_choose_form_item">
					<p class="form_title">{{ __('translate.companies_create_ad_position_label') }}</p>
					<input type="text" name="position">
					<small>	{{ __('translate.companies_create_ad_position_description') }} <a href="#">{{ __('translate.companies_create_ad_position_here_link') }}</a>.</small>
				</div>	

				<div class="new_job_add_choose_form_item">
					<p class="form_title">{{ __('translate.companies_create_ad_description_label') }}</p>
					<textarea name="description" id="" cols="30" rows="10"></textarea>
				</div>	
				
				<div class="new_job_add_choose_form_item xxx cf">
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
					<label for="job_type" style="margin-right: 20px"><span>{{ __('translate.job_type_option_1') }}</span> <input type="radio" name="job_type" value="0"></label>
					<label for="job_type" style="margin-right: 20px"><span>{{ __('translate.job_type_option_2') }}</span> <input type="radio" name="job_type" value="1"></label>
					<label for="job_type" style="margin-right: 20px"><span>{{ __('translate.job_type_option_3') }}</span> <input type="radio" name="job_type" value="2"></label>
					<label for="job_type" style="margin-right: 20px"><span>{{ __('translate.job_type_option_4') }}</span> <input type="radio" name="job_type" value="3"></label>

					<p class="form_title" style="margin-top: 20px;">{{ __('translate.companies_create_ad_term_label') }}</p>
					<label for="term" style="margin-right: 20px"><span>{{ __('translate.companies_create_ad_term_option_1') }}</span> <input type="radio" name="term"></label>
					<label for="term" style="margin-right: 20px"><span>{{ __('translate.companies_create_ad_term_option_2') }}</span> <input type="radio" name="term"></label>

					<p class="form_title" style="margin-top: 20px;">{{ __('translate.companies_create_ad_level_label') }}</p>
					<label for="career_level" style="margin-right: 20px"><span>{{ __('translate.level_option_1') }}</span> <input type="radio" name="career_level" value="0"></label>
					<label for="career_level" style="margin-right: 20px"><span>{{ __('translate.level_option_2') }}</span> <input type="radio" name="career_level" value="1"></label>
					<label for="career_level" style="margin-right: 20px"><span>{{ __('translate.level_option_3') }}</span> <input type="radio" name="career_level" value="2"></label>

					<p class="form_title" style="margin-top: 20px;">{{ __('translate.companies_create_ad_additional_label') }}</p>
					<label for="students" style="margin-right: 20px"><span>{{ __('translate.companies_create_ad_additional_students') }}</span> <input type="checkbox" name="students" ></label>
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
					
					<p class="form_title">{{ __('translate.companies_create_ad_location_label') }} <small>{{ __('translate.companies_create_ad_location_description') }}</small>:</p>
					<select name="city" id="">
						<option value="Beograd">Beograd</option>
						<option value="Nis">Nis</option>
						<option value="Paracin">Paracin</option>
					</select>

{{--					<label for="add_options" style="margin-right: 20px;display: block;margin-top: 20px;"><input 									type="checkbox" name="add_options" id=""><span> {{ __								('translate.companies_create_custom_ad_additional_visibility') }}</span></label>

					<button class="add_more" style="margin-top: 20px;"><i class="fa fa-plus-square" aria-hidden="true"></i> {{ __('translate.companies_create_custom_ad_additional_visibility_button') }}</button>
				</div>	--}}

				<div class="new_job_add_choose_form_item">

					<p class="form_title">{{ __('translate.companies_create_ad_salary_description') }}</p>

					<select name="salary_type" id="">
						<option value="Gross">{{ __('translate.companies_create_ad_salary_type_1') }}</option>
						<option value="Net">{{ __('translate.companies_create_ad_salary_type_2') }}</option>
					</select>
					<span> {{ __('translate.from') }} </span>
					<input type="text" name="salary_from">
					<span> {{ __('translate.to') }} </span>
					<input type="text" name="salary_to">
					<select name="currency" id="">
						<option value="RSD">RSD</option>
						<option value="EU">EU</option>
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

{{-- 				<div class="new_job_add_choose_form_item">

					<p class="form_title">Questionnaire:</p>
					
					<p>	Use questionnaire to ask and receive answers to questions you have from the candidates applying to your job ad. Learn more <a href="">here</a>. Create a questionnaire <a href="">here</a></p>
					<select name="" id="">
						<option value="">xxx</option>
						<option value="">xxx</option>
						<option value="">xxx</option>
					</select>

				</div> --}}

				<div class="new_job_add_choose_form_item">

					<p class="form_title">{{ __('translate.companies_create_ad_external_link_label') }}<small>{{ __('translate.companies_create_ad_external_link_desc') }}</small>:</p>

					<label for="external_url"><input name="external_url" type="text"></label>
					<input name="ad_type" type="hidden" value="2">

					{{ csrf_field() }}
					<div class="new_job_add_choose_form_submit_btn">
						<input class="" type="submit" value="{{ __('translate.companies_create_ad_publish_button') }}">
					</div>
				</div>
	
</form>
</main>
@endsection