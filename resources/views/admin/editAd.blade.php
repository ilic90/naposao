@extends('layouts.master')

@section('content')
<h1 class="page_title main_page_title">{{ __('translate.admin_edit_ad_h1') }}</h1>

<main class="main_app_container">
	<form action="{{ route('postAdminEditAd') }}" method="POST" class="new_job_add_choose_form">
		<input type="hidden" value="{{ $ad->id }}" name="aid">

		<!-- <div class="new_job_add_choose_form_item">
			<p class="form_title">User <small>(responsible for this job offer and the candidates applying for the position)</small></p>
			<select name="">
				<option value="">Arsa</option>
				<option value="">Sava</option>
				<option value="">Fiste</option>
			</select>
			<p style="font-size: 15px;margin-top: 10px;">(IMPORTANT: In case the account is used by more than one user from your organization, please create separate user accounts for the different users. You can do this in the section "Users" from the main menu.)</p>
		</div>

		<div class="new_job_add_choose_form_item">
			<p class="form_title">Ref.No:</p>
			<input name="ref_number" type="text">
		</div>	 -->

		<div class="new_job_add_choose_form_item">
			<p class="form_title">{{ __('translate.companies_register_person_position_label') }}</p>
			<input name="position" type="text" value="{{ $ad->position }}">
		</div>	

		<div class="new_job_add_choose_form_item">
			<p class="form_title">{{ __('translate.companies_create_ad_description_label') }}</p>
			<textarea name="description" cols="30" rows="10">{{ $ad->description }}</textarea>
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
            @if ($ad->job_type == 0)
            <label for="job_type" style="margin-right: 20px"><span>{{ __('translate.job_type_option_1') }}</span> <input type="radio" name="job_type" value="0" checked="checked"></label>
            <label for="job_type" style="margin-right: 20px"><span>{{ __('translate.job_type_option_2') }}</span> <input type="radio" name="job_type" value="1"></label>
            <label for="job_type" style="margin-right: 20px"><span>{{ __('translate.job_type_option_3') }}</span> <input type="radio" name="job_type" value="2"></label>
            <label for="job_type" style="margin-right: 20px"><span>{{ __('translate.job_type_option_4') }}</span> <input type="radio" name="job_type" value="3"></label>
            @elseif ($ad->job_type == 1)
            <label for="job_type" style="margin-right: 20px"><span>{{ __('translate.job_type_option_1') }}</span> <input type="radio" name="job_type" value="0"></label>
            <label for="job_type" style="margin-right: 20px"><span>{{ __('translate.job_type_option_2') }}</span> <input type="radio" name="job_type" value="1" checked="checked"></label>
            <label for="job_type" style="margin-right: 20px"><span>{{ __('translate.job_type_option_3') }}</span> <input type="radio" name="job_type" value="2"></label>
            <label for="job_type" style="margin-right: 20px"><span>{{ __('translate.job_type_option_4') }}</span> <input type="radio" name="job_type" value="3"></label>            
            @elseif ($ad->job_type == 2)
            <label for="job_type" style="margin-right: 20px"><span>{{ __('translate.job_type_option_1') }}</span> <input type="radio" name="job_type" value="0"></label>
            <label for="job_type" style="margin-right: 20px"><span>{{ __('translate.job_type_option_2') }}</span> <input type="radio" name="job_type" value="1"></label>
            <label for="job_type" style="margin-right: 20px"><span>{{ __('translate.job_type_option_3') }}</span> <input type="radio" name="job_type" value="2" checked="checked"></label>
            <label for="job_type" style="margin-right: 20px"><span>{{ __('translate.job_type_option_4') }}</span> <input type="radio" name="job_type" value="3"></label>
            @elseif ($ad->job_type == 3)
            <label for="job_type" style="margin-right: 20px"><span>{{ __('translate.job_type_option_1') }}</span> <input type="radio" name="job_type" value="0"></label>
            <label for="job_type" style="margin-right: 20px"><span>{{ __('translate.job_type_option_2') }}</span> <input type="radio" name="job_type" value="1"></label>
            <label for="job_type" style="margin-right: 20px"><span>{{ __('translate.job_type_option_3') }}</span> <input type="radio" name="job_type" value="2"></label>
            <label for="job_type" style="margin-right: 20px"><span>{{ __('translate.job_type_option_4') }}</span> <input type="radio" name="job_type" value="3" checked="checked"></label>
            @else
            <label for="job_type" style="margin-right: 20px"><span>{{ __('translate.job_type_option_1') }}</span> <input type="radio" name="job_type" value="0"></label>
            <label for="job_type" style="margin-right: 20px"><span>{{ __('translate.job_type_option_2') }}</span> <input type="radio" name="job_type" value="1"></label>
            <label for="job_type" style="margin-right: 20px"><span>{{ __('translate.job_type_option_3') }}</span> <input type="radio" name="job_type" value="2"></label>
            <label for="job_type" style="margin-right: 20px"><span>{{ __('translate.job_type_option_4') }}</span> <input type="radio" name="job_type" value="3"></label>
            @endif


			<!-- <p class="form_title" style="margin-top: 20px;">Term:</p>
			<label for="term" style="margin-right: 20px"><span>Permanent</span> <input type="checkbox" name="term"></label>
			<label for="term" style="margin-right: 20px"><span>Part time</span> <input type="checkbox" name="term"></label> -->

			<p class="form_title" style="margin-top: 20px;">{{ __('translate.companies_create_ad_level_label') }}</p>
            @if ($ad->career_level==0)
			<label for="career_level" style="margin-right: 20px"><span>{{ __('translate.level_option_1') }}</span> <input type="radio" name="career_level" value="0" checked="checked"></label>
            <label for="career_level" style="margin-right: 20px"><span>{{ __('translate.level_option_2') }}</span> <input type="radio" name="career_level" value="1"></label>
			<label for="career_level" style="margin-right: 20px"><span>{{ __('translate.level_option_3') }}</span> <input type="radio" value="2" name="career_level"></label>
            @elseif ($ad->career_level==1)
            <label for="career_level" style="margin-right: 20px"><span>{{ __('translate.level_option_1') }}</span> <input type="radio" name="career_level" value="0"></label>
			<label for="career_level" style="margin-right: 20px"><span>{{ __('translate.level_option_2') }}</span> <input type="radio" name="career_level" value="1" checked="checked"></label>
			<label for="career_level" style="margin-right: 20px"><span>{{ __('translate.level_option_3') }}</span> <input type="radio" value="2" name="career_level"></label>          
            @elseif ($ad->career_level==2)
            <label for="career_level" style="margin-right: 20px"><span>{{ __('translate.level_option_1') }}</span> <input type="radio" name="career_level" value="0"></label>
			<label for="career_level" style="margin-right: 20px"><span>{{ __('translate.level_option_2') }}</span> <input type="radio" name="career_level" value="1"></label>
			<label for="career_level" style="margin-right: 20px"><span>{{ __('translate.level_option_3') }}</span> <input type="radio" value="2" name="career_level" checked="checked"></label>
            @else
            <label for="career_level" style="margin-right: 20px"><span>{{ __('translate.level_option_1') }}</span> <input type="radio" name="career_level" value="0"></label>
			<label for="career_level" style="margin-right: 20px"><span>{{ __('translate.level_option_2') }}</span> <input type="radio" name="career_level" value="1"></label>
			<label for="career_level" style="margin-right: 20px"><span>{{ __('translate.level_option_3') }}</span> <input type="radio" value="2" name="career_level"></label>
            @endif

			<p class="form_title" style="margin-top: 20px;">{{ __('translate.companies_create_ad_additional_label') }}</p>
            @if ($ad->students == 1)
			<label for="students" style="margin-right: 20px"><span>{{ __('translate.companies_create_ad_additional_students') }}</span> <input type="checkbox" name="students" checked></label>
            @else
            <label for="students" style="margin-right: 20px"><span>{{ __('translate.companies_create_ad_additional_students') }}</span> <input type="checkbox" name="students"></label>
			@endif
			<br>
            @if ($ad->low_experience == 1)
			<label for="low_experience" style="margin-right: 20px"><span>{{ __('translate.companies_create_ad_additional_low_experience') }}</span> <input type="checkbox" name="low_experience" checked></label>
            @else
			<label for="low_experience" style="margin-right: 20px"><span>{{ __('translate.companies_create_ad_additional_low_experience') }}</span> <input type="checkbox" name="low_experience"></label>
			@endif

		</div>	

		<div class="new_job_add_choose_form_item">
			<p class="form_title">{{ __('translate.companies_create_ad_based_location_label') }}</p>
            <input name="country" type="text" value="{{ $ad->country }}">
			<!-- <select name="country">
				<option value="Serbia">Serbia</option>
				<option value="Bulgaria">Bulgaria</option>
				<option value="Spain">Spain</option>
			</select> -->
			
			<p class="form_title">{{ __('translate.companies_create_ad_location_label') }} <small>{{ __('translate.companies_create_ad_location_description') }}</small>:</p>
            <input name="city" type="text" value="{{ $ad->city }}">


			<!-- <select name="city">
				<option value="Beograd">Beograd</option>
				<option value="Nis">Nis</option>
				<option value="Paracin">Paracin</option>
			</select> -->
		</div>	

		<div class="new_job_add_choose_form_item">

			<p class="form_title">{{ __('translate.companies_create_ad_salary_description') }}</p>

			<select name="salary_type">
                @if($ad->salary_type=="Gross")
				<option value="Gross" selected>{{ __('translate.companies_create_ad_salary_type_1') }}</option>
				<option value="Net">{{ __('translate.companies_create_ad_salary_type_2') }}</option>
                @elseif($ad->salary_type=="Net")
                <option value="Gross">{{ __('translate.companies_create_ad_salary_type_1') }}</option>
				<option value="Net" selected>{{ __('translate.companies_create_ad_salary_type_2') }}</option>
                @else                
                <option value="Gross">{{ __('translate.companies_create_ad_salary_type_1') }}</option>
				<option value="Net">{{ __('translate.companies_create_ad_salary_type_2') }}</option>
                @endif
			</select>
			<span> {{ __('translate.from') }} </span>
			<input name="salary_from" type="text" value="{{ $ad->salary_from }}">
			<span> {{ __('translate.to') }} </span>
			<input name="salary_to" type="text" value="{{ $ad->salary_to }}">
			<select name="currency">
            @if($ad->currency=="RSD")
				<option value="RSD" selected>RSD</option>
                <option value="EUR">EU</option>
				<option value="USD">USD</option>
            @elseif($ad->currency=="EU")
                <option value="RSD">RSD</option>
				<option value="EUR" selected>EU</option>
            @elseif($ad->currency=="USD")
                <option value="RSD">RSD</option>
				<option value="EUR">EU</option>
				<option value="USD" selected>USD</option>
            @else				
                <option value="RSD">RSD</option>
				<option value="EUR">EU</option>
				<option value="USD">USD</option>
			@endif
			</select>

		</div>		

		<div class="new_job_add_choose_form_item">

			<p class="form_title">{{ __('translate.companies_create_ad_languages_label') }}</p>
			<select name="foreign_languages">
				<option value="Null">{{ __('translate.none') }}</option>
				@foreach(App\Language::getLanguages() as $language)
					<option value="{{ $language->language }}">{{ $language->language }}</option>
				@endforeach
			</select>
		</div>	

		<div class="new_job_add_choose_form_item">

			<p class="form_title">{{ __('translate.companies_create_ad_external_link_label') }}</p>
			
			<label for="external_url"><input name="external_url" type="text" value="{{ $ad->external_url }}"></label>
			<input name="ad_type" type="hidden" value="1">

			{{ csrf_field() }}
			<div class="new_job_add_choose_form_submit_btn">
				<input type="submit" value="{{ __('translate.companies_create_ad_publish_button') }}">
			</div>
		</div>	
	</form>
</main>
@endsection