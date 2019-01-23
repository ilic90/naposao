@extends('layouts.master')

@section('content')

    <h1 class="page_title main_page_title">{{ __('translate.create_cv_h1') }}</h1>

    <main class="main_app_container">
		@include('layouts.errors')
        <div class="login_register_container"> 

            <form action="{{ route('storeCV') }}" method="GET" class="login_reg_form">

                <div class="create_cv_holder">

					<div class="create_cv_item">
                    	<p>{{ __('translate.cv_title_label') }}</p>
						<input name="title" type="text">
					</div>

                    <h2 class="cv_title">{{ __('translate.cv_personal_details') }}</h2>
                    
					<div class="create_cv_item">
						<div class="create_cv_sub_item">
	                    	<p class="create_cv_label">{{ __('translate.companies_register_first_name_label') }}</p>
							<input name="first_name" value="{{ $user->first_name }}" type="text">
						</div>

						<div class="create_cv_sub_item">
							<p class="create_cv_label">{{ __('translate.companies_register_last_name_label') }}</p>
							<input name="last_name" value="{{ $user->last_name }}" type="text">
				   		 </div>

						<div class="create_cv_sub_item">
							<p class="create_cv_label">{{ __('translate.cv_email_label') }}<p>
							<input name="email" value="{{ $user->email }}" type="text">
						</div>

						<div class="create_cv_sub_item">
							<p class="create_cv_label">{{ __('translate.user_profile_phone_label') }}</p>
							<input name="phone" value="{{ $user->phone }}" type="text">
						</div>

						<div class="create_cv_sub_item">
							<p class="">{{ __('translate.cv_post_address_label') }}</p>
							<input name="post_address" type="text">
						</div>

						<div class="create_cv_sub_item">
							<p class="create_cv_label">{{ __('translate.cv_gender_label') }}</p>
							<label>{{ __('translate.users_register_gender_radio_male') }}<input type="radio" value="Male" name="gender"></label>
							<label>{{ __('translate.users_register_gender_radio_female') }}<input type="radio" value="Female" name="gender"></label>
						</div>

						<div class="create_cv_sub_item">
							<p class="create_cv_label">{{ __('translate.user_profile_bday_label') }} </p>
							<input name="birthdate" type="date">
						</div>
					
						<div class="create_cv_sub_item">
							<p class="create_cv_label">{{ __('translate.cv_citizenship_label') }}</p> 
							<input name="citizenship" type="text">

							<p class="create_cv_label">{{ __('translate.user_profile_country_label') }}</p>
							<input name="country" type="text"></p>
				    
                    		<p class="create_cv_label">{{ __('translate.cv_city_label') }}</p>
							<input name="city" type="text" required></p>
						</div>

				    </div>

                    
					<div class="create_cv_item">
						<h2 class="cv_title">{{ __('translate.admin_menu_languages') }}</h2>

						<div class="create_cv_sub_item">
							<p class="create_cv_label">{{ __('translate.cv_native_language_label') }}</p>
							<select name="native_language">
								<option value="">{{ __('translate.cv_choose') }}</option>
									@foreach($languages as $language)
									<option value="{{ $language->language }}">{{ $language->language }}</option>
									@endforeach
							</select>
						
							<p class="create_cv_label">{{ __('translate.filters_foreign_languages_label') }}:</p>
							<select name="foreign_languages">
								<option value="">{{ __('translate.cv_choose') }}</option>
									@foreach($languages as $language)
									<option value="{{ $language->language }}">{{ $language->language }}</option>
									@endforeach
							</select>
						</div>

						<h2 class="cv_title">{{ __('translate.cv_skills') }}</h2>
					
						<div class="create_cv_sub_item">
							<p class="create_cv_label">{{ __('translate.cv_computer_skills') }}</p>
							<textarea name="computer_skills" rows="3" cols="50"></textarea>

							<p class="create_cv_label">{{ __('translate.cv_skills') }}:</p>
							<textarea name="skills" rows="3" cols="50"></textarea>

							<p class="create_cv_label">{{ __('translate.cv_driving_license') }}</p>
							<select name="driving_licence">
								<option value="none">{{ __('translate.cv_none') }}</option>
								<option value="A">A</option>
								<option value="B">B</option>
								<option value="C">C</option>
								<option value="D">D</option>
								<option value="BE">BE</option>
								<option value="CE">CE</option>
								<option value="DE">DE</option>
								<option value="T tb">T tb</option>
								<option value="T tm">T tm</option>
								<option value="T ct">T ct</option>
								<option value="M">M</option>
							</select>
						</div>
					</div>
					<input type="hidden" name="user_id" value="{{ $user->id }}">

					{{ csrf_field() }}
            		<div class="login_reg_form_item login_reg_form_submit" style="margin-top: 20px;">
						<input type="submit" value="{{ __('translate.user_profile_save_button') }}">
					</div>

				</div>
            </form>

        </div>

    </main>

@endsection