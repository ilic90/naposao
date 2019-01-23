@extends('layouts.master')

@section('content')

    <h1 class="page_title main_page_title">{{ __('translate.cv_edit_h1') }}</h1>

    <main class="main_app_container edit_your_cv_holder">
        @include('layouts.errors')
        <div class="login_register_container">

            <form method="POST" class="login_reg_form edit_cv_form">

                <div class="login_reg_form_item">

                    <h3>{{ __('translate.cv_title_label') }} <span id="cv_title_span">{{ $cv->title }}</span>
                        <a class="cv_edit_link" id="cv_title">	
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </h3>
                    <div class="edit_info_window"  id="cv_title_input" style="display:none">
                        <input name="title" value="{{ $cv->title }}" type="text">
                        <button class="confirm_edit_btn blue_btn" id="cv_title_btn"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </div>
                    <h3>{{ __('translate.cv_personal_details') }}</h3>


                    <p class="form_title"><strong>{{ __('translate.companies_register_first_name_label') }}</strong> <span id="first_name_span">{{ $cv->first_name }}</span>
                        <a class="cv_edit_link" id="first_name">	
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </p>
                    <div class="edit_info_window"  id="first_name_input" style="display:none">
                        <input name="first_name" value="{{ $cv->first_name }}" type="text">
                        <button class="confirm_edit_btn blue_btn" id="first_name_btn"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </div>

                    <p class="form_title"><strong>{{ __('translate.companies_register_last_name_label') }}</strong> <span id="last_name_span">{{ $cv->last_name }}</span>
                        <a class="cv_edit_link" id="last_name">	
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </p>
                    <div class="edit_info_window"  id="last_name_input" style="display:none">
                        <input name="last_name" value="{{ $cv->last_name }}" type="text">
                        <button class="confirm_edit_btn blue_btn" id="last_name_btn"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </div>
                    <hr>
                    
                    <p class="form_title"><strong>{{ __('translate.cv_email_label') }}</strong> <span id="email_span">{{ $cv->email }}</span>
                        <a class="cv_edit_link" id="email">	
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </p>
                    <div class="edit_info_window"  id="email_input" style="display:none">
                        <input name="email" value="{{ $cv->email }}" type="text">
                        <button class="confirm_edit_btn blue_btn" id="email_btn"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </div> 
                                       
                    <p class="form_title"><strong>{{ __('translate.user_profile_phone_label') }}</strong> <span id="phone_span">{{ $cv->phone }}</span>
                        <a class="cv_edit_link" id="phone">	
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </p>
                    <div class="edit_info_window"  id="phone_input" style="display:none">
                        <input name="phone" value="{{ $cv->phone }}" type="text">
                        <button class="confirm_edit_btn blue_btn" id="phone_btn"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </div>
                                        
                    <p class="form_title"><strong>{{ __('translate.cv_post_address_label') }}</strong> <span id="post_address_span">{{ $cv->post_address }}</span>
                        <a class="cv_edit_link" id="post_address">	
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </p>
                    <div class="edit_info_window"  id="post_address_input" style="display:none">
                        <input name="post_address" value="{{ $cv->post_address }}" type="text">
                        <button class="confirm_edit_btn blue_btn" id="post_address_btn"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </div>                   
                    <hr>

                    <p class="form_title"><strong>{{ __('translate.cv_gender_label') }} </strong><span id="gender_span">{{ $cv->gender }}</span>
                        <a class="cv_edit_link" id="gender">	
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </p>
                    <div class="edit_info_window"  id="gender_input" style="display:none">
                        <label for="male">
                            <input type="radio" value="Male" id="male" name="gender" style="width: auto;margin-right: 5px;">
                            <span style="font-size: 15px;">Male</span>
                        </label>
                        <label for="female">
                            <input type="radio" value="Female" id="female" name="gender" style="width: auto;margin-right: 5px;">
                            <span style="font-size: 15px;">Female</span>
                        </label>
                        <button class="confirm_edit_btn blue_btn" id="gender_btn"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </div>
<!--
                    <p class="form_title"><strong>{{ __('translate.cv_gender_label') }} </strong></p>
                    @if($cv->gender === 'Male')
					<label>{{ __('translate.users_register_gender_radio_male') }}<input type="radio" value="Male" name="gender" checked></label>
					<label>{{ __('translate.users_register_gender_radio_female') }}<input type="radio" value="Female" name="gender"></label>
                    @elseif($cv->gender === 'Female')
                    <label>{{ __('translate.users_register_gender_radio_male') }}<input type="radio" value="Male" name="gender"></label>
					<label>{{ __('translate.users_register_gender_radio_female') }}<input type="radio" value="Female" name="gender" checked></label>
                    @endif
-->
                    <p class="form_title"><strong>{{ __('translate.user_profile_bday_label') }}</strong> <span id="birthdate_span">{{ $cv->birthdate }}</span>
                        <a class="cv_edit_link" id="birthdate">	
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </p>
                    <div class="edit_info_window"  id="birthdate_input" style="display:none">
                        <input name="birthdate" value="{{ $cv->birthdate }}" type="date">
                        <button class="confirm_edit_btn blue_btn" id="birthdate_btn"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </div> 
                    
                    <p class="form_title"><strong>{{ __('translate.cv_citizenship_label') }}</strong> <span id="citizenship_span">{{ $cv->citizenship }}</span>
                        <a class="cv_edit_link" id="citizenship">	
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </p>
                    <div class="edit_info_window"  id="citizenship_input" style="display:none">
                        <input name="citizenship" value="{{ $cv->citizenship }}" type="text">
                        <button class="confirm_edit_btn blue_btn" id="citizenship_btn"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </div>                    
                    <hr>
                    
                    <p class="form_title"><strong>{{ __('translate.user_profile_country_label') }}</strong> <span id="country_span">{{ $cv->country }}</span>
                        <a class="cv_edit_link" id="country">	
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </p>
                    <div class="edit_info_window"  id="country_input" style="display:none">
                        <input name="country" value="{{ $cv->country }}" type="text">
                        <button class="confirm_edit_btn blue_btn" id="country_btn"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </div>
                    
                    <p class="form_title"><strong>{{ __('translate.cv_city_label') }}</strong> <span id="city_span">{{ $cv->city }}</span>
                        <a class="cv_edit_link" id="city">	
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </p>
                    <div class="edit_info_window"  id="city_input" style="display:none">
                        <input name="city" value="{{ $cv->city }}" type="text">
                        <button class="confirm_edit_btn blue_btn" id="city_btn"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </div>
                    <h3>{{ __('translate.admin_menu_languages') }}</h3>

                    <p class="form_title"><strong>{{ __('translate.cv_native_language_label') }} </strong><span id="native_language_span">{{ $cv->native_language }}</span>
                        <a class="cv_edit_link" id="native_language">	
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </p>
                    <div class="edit_info_window"  id="native_language_input" style="display:none">
                        <select name="native_language">
                        @foreach($languages as $language)
                            <option value="{{ $language->language }}">{{ $language->language }}</option>
                        @endforeach
                        </select>
                        <button class="confirm_edit_btn blue_btn" id="native_language_btn"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </div>

                    <p class="form_title"><strong>{{ __('translate.filters_foreign_languages_label') }}: </strong><span id="foreign_languages_span">{{ $cv->foreign_languages }}</span>
                        <a class="cv_edit_link" id="foreign_languages">	
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </p>
                    <div class="edit_info_window"  id="foreign_languages_input" style="display:none">
                        <select name="foreign_languages">
                        @foreach($languages as $language)
                            <option value="{{ $language->language }}">{{ $language->language }}</option>
                        @endforeach
                        </select>
                        <button class="confirm_edit_btn blue_btn" id="foreign_languages_btn"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </div>

                    <h3>{{ __('translate.cv_skills') }}</h3>
                    
                    <p class="form_title"><strong>{{ __('translate.cv_computer_skills') }} </strong><span id="computer_skills_span">{{ $cv->computer_skills }}</span>
                        <a class="cv_edit_link" id="computer_skills">	
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </p>
                    <div class="edit_info_window"  id="computer_skills_input" style="display:none">
                        <textarea name="computer_skills" rows="3" cols="50">{{ $cv->computer_skills }}</textarea>
                        <button class="confirm_edit_btn blue_btn" id="computer_skills_btn"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </div>

                    <p class="form_title"><strong>{{ __('translate.cv_skills') }}: </strong><span id="skills_span">{{ $cv->skills }}</span>
                        <a class="cv_edit_link" id="skills">	
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </p>
                    <div class="edit_info_window"  id="skills_input" style="display:none">
                        <textarea name="skills" rows="3" cols="50">{{ $cv->skills }}</textarea>
                        <button class="confirm_edit_btn blue_btn" id="skills_btn"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </div>

                    <p class="form_title"><strong>{{ __('translate.cv_driving_license') }} </strong><span id="driving_licence_span">{{ $cv->driving_licence }}</span>
                        <a class="cv_edit_link" id="driving_licence">	
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </p>
                    <div class="edit_info_window"  id="driving_licence_input" style="display:none">
                        <select name="driving_licence">
                            <option value="none">None</option>
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
                        <button class="confirm_edit_btn blue_btn" id="driving_licence_btn"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </div>
                    <div id="cv_id">
                        <input type="hidden" name="id" value="{{ $cv->id }}">
                    </div>
                    {{ csrf_field() }}

                </div>

            </form>
            <div class="login_reg_form">
                <h3>{{ __('translate.cv_edit_education') }}</h3>
            </div>
          
            @foreach($cv->education as $education)
            <form method="POST" class="login_reg_form">
                
                <div class="login_reg_form_item education_form">
           
                    <p class="form_title"><strong>{{ __('translate.user_new_job_from_year') }}* </strong><span class="education_year_from_span" id="education_year_from_span_{{$education->id}}">{{ $education->year_from }} </span>
                        <a class="cv_edit_link education_year_from" id="education_year_from_{{$education->id}}">	
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <span class="education_month_from_span" id="education_month_from_span_{{$education->id}}">{{ $education->month_from }}</span>
                        <a class="cv_edit_link education_month_from" id="education_month_from_{{$education->id}}">	
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </p>
                    <div class="edit_info_window education_year_from_input"  id="education_year_from_input_{{$education->id}}" style="display:none">
                        <select name="year_from" class="education_job_years_from" required>
					            <script>
					                var year = 2018;
					                while(year > 1930) {
						                $('.education_job_years_from').append(`<option value="`+ year +`">`+ year-- +`</option>`); 
					                }
					            </script>
					    </select>
                        <button class="confirm_edit_btn blue_btn education_year_from_btn" id="education_year_from_btn_{{$education->id}}"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </div>

                    <div class="edit_info_window education_month_from_input"  id="education_month_from_input_{{$education->id}}" style="display:none">
                        <select name="month_from" id="month_from" required>
							<option value="January">{{ __('translate.january') }}</option>
							<option value="February">{{ __('translate.february') }}</option>
							<option value="March">{{ __('translate.march') }}</option>
							<option value="April">{{ __('translate.april') }}</option>
							<option value="May">{{ __('translate.may') }}</option>
							<option value="June">{{ __('translate.june') }}</option>
							<option value="July">{{ __('translate.july') }}</option>
							<option value="August">{{ __('translate.august') }}</option>
							<option value="September">{{ __('translate.september') }}</option>
							<option value="October">{{ __('translate.october') }}</option>
							<option value="November">{{ __('translate.november') }}</option>
							<option value="December">{{ __('translate.december') }}</option>
						</select>
                        <button class="confirm_edit_btn blue_btn education_month_from_btn" id="education_month_from_btn_{{$education->id}}"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </div>

                    <p class="form_title"><strong>{{ __('translate.user_new_job_to_year') }}* </strong><span class="education_year_to_span" id="education_year_to_span_{{$education->id}}">{{ $education->year_to }} </span>
                        <a class="cv_edit_link education_year_to" id="education_year_to_{{$education->id}}">	
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <span class="education_month_to_span" id="education_month_to_span_{{$education->id}}">{{ $education->month_to }}</span>
                        <a class="cv_edit_link education_month_to" id="education_month_to_{{$education->id}}">	
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </p>
                    <div class="edit_info_window education_year_to_input"  id="education_year_to_input_{{$education->id}}" style="display:none">
                        <select name="year_to" class="education_job_years_to" required>
					            <script>
					                var year = 2018;
					                while(year > 1930) {
						                $('.education_job_years_to').append(`<option value="`+ year +`">`+ year-- +`</option>`); 
					                }
					            </script>
					    </select>
                        <button class="confirm_edit_btn blue_btn education_year_to_btn" id="education_year_to_btn_{{$education->id}}"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </div>

                    <div class="edit_info_window education_month_to_input"  id="education_month_to_input_{{$education->id}}" style="display:none">
                        <select name="month_to" id="month_to" >
							<option value="January">{{ __('translate.january') }}</option>
							<option value="February">{{ __('translate.february') }}</option>
							<option value="March">{{ __('translate.march') }}</option>
							<option value="April">{{ __('translate.april') }}</option>
							<option value="May">{{ __('translate.may') }}</option>
							<option value="June">{{ __('translate.june') }}</option>
							<option value="July">{{ __('translate.july') }}</option>
							<option value="August">{{ __('translate.august') }}</option>
							<option value="September">{{ __('translate.september') }}</option>
							<option value="October">{{ __('translate.october') }}</option>
							<option value="November">{{ __('translate.november') }}</option>
							<option value="December">{{ __('translate.december') }}</option>
						</select>
                        <button class="confirm_edit_btn blue_btn education_month_to_btn" id="education_month_to_btn_{{$education->id}}"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </div>

                    <p class="form_title"><strong>{{ __('translate.cv_step_2_school') }}* </strong><span class="school_span" id="school_span_{{$education->id}}">{{ $education->school }}</span>
                        <a class="cv_edit_link school" id="school_{{$education->id}}">	
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </p>
                    <div class="edit_info_window school_input"  id="school_input_{{$education->id}}" style="display:none">
                        <input name="school" value="{{ $education->school }}" type="text">
                        <button class="confirm_edit_btn blue_btn school_btn" id="school_btn_{{$education->id}}"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </div>

                    <p class="form_title"><strong>{{ __('translate.label_location') }}* </strong><span class="location_span" id="location_span_{{$education->id}}">{{ $education->location }}</span>
                        <a class="cv_edit_link location" id="location_{{$education->id}}">	
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </p>
                    <div class="edit_info_window location_input"  id="location_input_{{$education->id}}" style="display:none">
                        <input name="location" value="{{ $education->location }}" type="text">
                        <button class="confirm_edit_btn blue_btn location_btn" id="location_btn_{{$education->id}}"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </div>

			        <hr>

			        <p class="form_title"><strong>{{ __('translate.filters_level_label') }}:* </strong><span class="level_span" id="level_span_{{$education->id}}">{{ $education->level }}</span>
                        <a class="cv_edit_link level" id="level_{{$education->id}}">	
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </p>
                    <div class="edit_info_window level_input"  id="level_input_{{$education->id}}" style="display:none">
                        <select name="level">
                            <option value="Secondary school">{{ __('translate.cv_step_2_secondary_school') }}</option>
                            <option value="Professional">{{ __('translate.cv_step_2_professional') }}</option>
                            <option value="College">{{ __('translate.cv_step_2_college') }}</option>
                            <option value="Bachelor's degree">{{ __('translate.cv_step_2_bachelor') }}</option>
                            <option value="Master's degree">{{ __('translate.cv_step_2_master') }}</option>
                            <option value="Doctorate">{{ __('translate.cv_step_2_doctorate') }}</option>
                        </select>
                        <button class="confirm_edit_btn blue_btn level_btn" id="level_btn_{{$education->id}}"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </div>

			        <p class="form_title"><strong>{{ __('translate.cv_step_2_description') }} </strong><span class="description_span" id="description_span_{{$education->id}}">{{ $education->description }}</span>
                        <a class="cv_edit_link description" id="description_{{$education->id}}">	
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </p>
                    <div class="edit_info_window description_input"  id="description_input_{{$education->id}}" style="display:none">
                        <textarea name="description" rows="3" cols="50">{{ $education->description }}</textarea>
                        <button class="confirm_edit_btn blue_btn description_btn" id="description_btn_{{$education->id}}"><i class="fa fa-check" aria-hidden="true"></i></button>       
                    </div>

                    
                        <input type="hidden" name="id" class="ed_id" value="{{ $education->id }}">
                        <div id="ed_id_{{$education->id}}" >
                        </div>
                    {{ csrf_field() }}
                    
                    <a href="{{ route('removeEducation',['eid' => $education->id]) }}">
                        <div class="login_reg_form_item login_reg_form_submit" style="margin-top: 20px;">
                            <button type="button" class="btn btn-danger delete" style="width:100%;">Remove education</button>
                        </div>    
                    </a>               

                </div>

            </form>
            
            
            @endforeach  
            
            <div class="login_reg_form">
                <h3>{{ __('translate.cv_add_education') }}</h3>
            </div>

            <form action="{{ route('addEducation') }}" method="GET" class="login_reg_form">

                <div class="login_reg_form_item">

                    <div class="popup_new_job_user_form_item cf">
                        <div class="user_from_to_period">
                            <p class="form_title">{{ __('translate.user_new_job_from_year') }}</p>
                            <select name="year_from" id="add_education_job_years_from" required>
					            <option value="">{{ __('translate.user_new_job_choose_year') }}</option>
					            <script>
					                var year = 2018;
					                while(year > 1930) {
						                $('#add_education_job_years_from').append(`<option value="`+ year +`">`+ year-- +`</option>`); 
					                }
					            </script>
					        </select>
                            <div class="user_from_to_period_item">
						        <select name="month_from" id="month_from" required>
							        <option value="">{{ __('translate.user_new_job_choose_month') }}</option>
							        <option value="January">{{ __('translate.january') }}</option>
							        <option value="February">{{ __('translate.february') }}</option>
							        <option value="March">{{ __('translate.march') }}</option>
							        <option value="April">{{ __('translate.april') }}</option>
							        <option value="May">{{ __('translate.may') }}</option>
							        <option value="June">{{ __('translate.june') }}</option>
							        <option value="July">{{ __('translate.july') }}</option>
							        <option value="August">{{ __('translate.august') }}</option>
							        <option value="September">{{ __('translate.september') }}</option>
							        <option value="October">{{ __('translate.october') }}</option>
							        <option value="November">{{ __('translate.november') }}</option>
							        <option value="December">{{ __('translate.december') }}</option>
						        </select>
					        </div>
                        </div>

                        <div class="user_from_to_period">
                            <p class="form_title">{{ __('translate.user_new_job_to_year') }}</p>
                            <select name="year_to" id="add_education_job_years_to" required>
					            <option value="">{{ __('translate.user_new_job_choose_year') }}</option>
					            <script>
						            var year = 2018;
						            while(year > 1930) {
							            $('#add_education_job_years_to').append(`<option value="`+ year +`">`+ year-- +`</option>`); 
						            }
						        </script>
					        </select>
                            <div class="user_from_to_period_item">
						        <select name="month_to" id="month_from" required>
							        <option value="">{{ __('translate.user_new_job_choose_month') }}</option>
							        <option value="January">{{ __('translate.january') }}</option>
							        <option value="February">{{ __('translate.february') }}</option>
							        <option value="March">{{ __('translate.march') }}</option>
							        <option value="April">{{ __('translate.april') }}</option>
							        <option value="May">{{ __('translate.may') }}</option>
							        <option value="June">{{ __('translate.june') }}</option>
							        <option value="July">{{ __('translate.july') }}</option>
							        <option value="August">{{ __('translate.august') }}</option>
							        <option value="September">{{ __('translate.september') }}</option>
							        <option value="October">{{ __('translate.october') }}</option>
							        <option value="November">{{ __('translate.november') }}</option>
							        <option value="December">{{ __('translate.december') }}</option>
						        </select>
					        </div>
                        </div>
                    </div>

			        <p class="form_title"><strong>{{ __('translate.cv_step_2_school') }}* </strong><input name="school" type="text" required></p>

			        <p class="form_title"><strong>{{ __('translate.label_location') }}* </strong><input name="location" type="text" required></p>
			        <hr>

			        <p class="form_title"><strong>{{ __('translate.filters_level_label') }}:* </strong></p>
			        <select name="level">
				        <option value="">{{ __('translate.cv_choose') }}</option>
				        <option value="Secondary school">{{ __('translate.cv_step_2_secondary_school') }}</option>
				        <option value="Professional">{{ __('translate.cv_step_2_professional') }}</option>
				        <option value="College">{{ __('translate.cv_step_2_college') }}</option>
				        <option value="Bachelor's degree">{{ __('translate.cv_step_2_bachelor') }}</option>
				        <option value="Master's degree">{{ __('translate.cv_step_2_master') }}</option>
				        <option value="Doctorate">{{ __('translate.cv_step_2_doctorate') }}</option>
			        </select>

			        <p class="form_title"><strong>{{ __('translate.cv_step_2_description') }}</strong></p>
                    <textarea name="description" rows="3" cols="50"></textarea>

                    <input type="hidden" name="cv_id" value="{{ $cv->id }}">

                    {{ csrf_field() }}
                    <div class="login_reg_form_item login_reg_form_submit" style="margin-top: 20px;">
				        <input type="submit" value="{{ __('translate.cv_add_education') }}">
			        </div>

                </div>

            </form>

            
            <div class="login_reg_form">
                <h3>{{ __('translate.cv_edit_work_experience') }}</h3>
            </div>
            
            @foreach($cv->workHistory as $workHistory)
            <form method="POST" class="login_reg_form">

                <div class="login_reg_form_item">   

                    <p class="form_title"><strong>{{ __('translate.user_new_job_from_year') }}* </strong>
                        <span class="workHistory_year_from_span" id="workHistory_year_from_span_{{ $workHistory->id }}">{{ $workHistory->year_from }}</span>
                        <a class="cv_edit_link workHistory_year_from" id="workHistory_year_from_{{ $workHistory->id }}">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <span class="workHistory_month_from_span" id="workHistory_month_from_span_{{ $workHistory->id }}">{{ $workHistory->month_from }}</span>
                        <a class="cv_edit_link workHistory_month_from" id="workHistory_month_from_{{ $workHistory->id }}">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </p>
                    <div class="edit_info_window workHistory_year_from_input"  id="workHistory_year_from_input_{{$workHistory->id}}" style="display:none">
                        <select name="year_from" class="work_job_years_from" required>
                            <script>
                                var year = 2018;
                                while(year > 1930) {
                                    $('.work_job_years_from').append(`<option value="`+ year +`">`+ year-- +`</option>`); 
                                }
                            </script>
                        </select>
                        <button class="confirm_edit_btn blue_btn workHistory_year_from_btn" id="workHistory_year_from_btn_{{$workHistory->id}}"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </div>
                    <div class="edit_info_window workHistory_month_from_input"  id="workHistory_month_from_input_{{$workHistory->id}}" style="display:none">
                        <select name="month_from" id="month_from" required>
                            <option value="January">{{ __('translate.january') }}</option>
                            <option value="February">{{ __('translate.february') }}</option>
                            <option value="March">{{ __('translate.march') }}</option>
                            <option value="April">{{ __('translate.april') }}</option>
                            <option value="May">{{ __('translate.may') }}</option>
                            <option value="June">{{ __('translate.june') }}</option>
                            <option value="July">{{ __('translate.july') }}</option>
                            <option value="August">{{ __('translate.august') }}</option>
                            <option value="September">{{ __('translate.september') }}</option>
                            <option value="October">{{ __('translate.october') }}</option>
                            <option value="November">{{ __('translate.november') }}</option>
                            <option value="December">{{ __('translate.december') }}</option>
                        </select>
                        <button class="confirm_edit_btn blue_btn workHistory_month_from_btn" id="workHistory_month_from_btn_{{$workHistory->id}}"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </div>

                    <p class="form_title"><strong>{{ __('translate.user_new_job_to_year') }}* </strong>
                        <span class="workHistory_year_to_span" id="workHistory_year_to_span_{{ $workHistory->id }}">{{ $workHistory->year_to }}</span>
                        <a class="cv_edit_link workHistory_year_to" id="workHistory_year_to_{{ $workHistory->id }}">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <span class="workHistory_month_to_span" id="workHistory_month_to_span_{{ $workHistory->id }}">{{ $workHistory->month_to }}</span>
                        <a class="cv_edit_link workHistory_month_to" id="workHistory_month_to_{{ $workHistory->id }}">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </p>
                    <div class="edit_info_window workHistory_year_to_input"  id="workHistory_year_to_input_{{$workHistory->id}}" style="display:none">
                        <select name="year_to" class="work_job_years_to" required>
                            <script>
                                var year = 2018;
                                while(year > 1930) {
                                    $('.work_job_years_to').append(`<option value="`+ year +`">`+ year-- +`</option>`); 
                                }
                            </script>
                        </select>
                        <button class="confirm_edit_btn blue_btn workHistory_year_to_btn" id="workHistory_year_to_btn_{{$workHistory->id}}"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </div>
                    <div class="edit_info_window workHistory_month_to_input"  id="workHistory_month_to_input_{{$workHistory->id}}" style="display:none">
                        <select name="month_to" id="month_to" required>
                            <option value="January">{{ __('translate.january') }}</option>
                            <option value="February">{{ __('translate.february') }}</option>
                            <option value="March">{{ __('translate.march') }}</option>
                            <option value="April">{{ __('translate.april') }}</option>
                            <option value="May">{{ __('translate.may') }}</option>
                            <option value="June">{{ __('translate.june') }}</option>
                            <option value="July">{{ __('translate.july') }}</option>
                            <option value="August">{{ __('translate.august') }}</option>
                            <option value="September">{{ __('translate.september') }}</option>
                            <option value="October">{{ __('translate.october') }}</option>
                            <option value="November">{{ __('translate.november') }}</option>
                            <option value="December">{{ __('translate.december') }}</option>
                        </select>
                        <button class="confirm_edit_btn blue_btn workHistory_month_to_btn" id="workHistory_month_to_btn_{{$workHistory->id}}"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </div>

                    <p class="form_title"><strong>{{ __('translate.companies_register_person_position_label') }}* </strong>
                        <span class="position_span" id="position_span_{{ $workHistory->id }}">{{ $workHistory->position }}</span>
                        <a class="cv_edit_link position" id="position_{{ $workHistory->id }}">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </p>
                    <div class="edit_info_window position_input"  id="position_input_{{$workHistory->id}}" style="display:none">
                        <input name="position" value="{{ $workHistory->position }}" type="text">
                        <button class="confirm_edit_btn blue_btn position_btn" id="position_btn_{{$workHistory->id}}"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </div>
                    <hr>
                    <p class="form_title"><strong>{{ __('translate.cv_step_3_company') }}* </strong>
                        <span class="company_name_span" id="company_name_span_{{ $workHistory->id }}">{{ $workHistory->company_name }}</span>
                        <a class="cv_edit_link company_name" id="company_name_{{ $workHistory->id }}">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </p>
                    <div class="edit_info_window company_name_input"  id="company_name_input_{{$workHistory->id}}" style="display:none">
                        <input name="company_name" value="{{ $workHistory->company_name }}" type="text">
                        <button class="confirm_edit_btn blue_btn company_name_btn" id="company_name_btn_{{$workHistory->id}}"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </div>

                    <p class="form_title"><strong>{{ __('translate.companies_register_business_sector_label') }}* </strong>
                        <span class="business_sector_span" id="business_sector_span_{{ $workHistory->id }}">{{ $workHistory->business_sector }}</span>
                        <a class="cv_edit_link business_sector" id="business_sector_{{ $workHistory->id }}">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </p>
                    <div class="edit_info_window business_sector_input"  id="business_sector_input_{{$workHistory->id}}" style="display:none">
                        <select name="business_sector">
                        @foreach($categories as $category)
                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                        @endforeach
                        </select>
                        <button class="confirm_edit_btn blue_btn business_sector_btn" id="business_sector_btn_{{$workHistory->id}}"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </div>

                    <p class="form_title"><strong>{{ __('translate.label_location') }}* </strong>
                        <span class="wh_location_span" id="wh_location_span_{{ $workHistory->id }}">{{ $workHistory->location }}</span>
                        <a class="cv_edit_link wh_location" id="wh_location_{{ $workHistory->id }}">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </p>
                    <div class="edit_info_window wh_location_input"  id="wh_location_input_{{$workHistory->id}}" style="display:none">
                        <input name="location" value="{{ $workHistory->location }}" type="text" required>
                        <button class="confirm_edit_btn blue_btn wh_location_btn" id="wh_location_btn_{{$workHistory->id}}"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </div>

                    <p class="form_title"><strong>{{ __('translate.cv_step_3_description') }}</strong> <small>{{ __('translate.cv_step_3_main_activites') }}</small><strong> : </strong>
                        <span class="wh_description_span" id="wh_description_span_{{ $workHistory->id }}">{{ $workHistory->description }}</span>
                        <a class="cv_edit_link wh_description" id="wh_description_{{ $workHistory->id }}">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </p>
                    <div class="edit_info_window wh_description_input"  id="wh_description_input_{{$workHistory->id}}" style="display:none">
                        <textarea name="description" rows="3" cols="50">{{ $workHistory->description }}</textarea>
                        <button class="confirm_edit_btn blue_btn wh_description_btn" id="wh_description_btn_{{$workHistory->id}}"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </div>

                    <input type="hidden" name="id" class="wh_id" value="{{ $workHistory->id }}">
           
                    {{ csrf_field() }}

                    <a href="{{ route('removeWorkHistory',['whid' => $workHistory->id]) }}">
                    <div class="login_reg_form_item login_reg_form_submit" style="margin-top: 20px;">
                        <button type="button" class="btn btn-danger delete" style="width:100%;">Remove work experience</button>
                    </div>    
                    </a>  

                </div>

            </form>
            @endforeach

            <div class="login_reg_form">
                <h3>{{ __('translate.cv_add_work_experience') }}</h3>
            </div>

            <form action="{{ route('addWorkHistory') }}" method="GET" class="login_reg_form">

                <div class="login_reg_form_item">

                     <div class="popup_new_job_user_form_item cf">
                        <div class="user_from_to_period">
                            <p class="form_title">{{ __('translate.user_new_job_from_year') }}</p>
                            <select name="year_from" id="add_work_job_years_from" required>
                                <option value="">{{ __('translate.user_new_job_choose_year') }}</option>
                                <script>
                                    var year = 2018;
                                    while(year > 1930) {
                                    $('#add_work_job_years_from').append(`<option value="`+ year +`">`+ year-- +`</option>`); 
                                    }
                                </script>
                            </select>
                            <div class="user_from_to_period_item">
                                <select name="month_from" id="month_from" required>
                                    <option value="">{{ __('translate.user_new_job_choose_month') }}</option>
                                    <option value="January">{{ __('translate.january') }}</option>
                                    <option value="February">{{ __('translate.february') }}</option>
                                    <option value="March">{{ __('translate.march') }}</option>
                                    <option value="April">{{ __('translate.april') }}</option>
                                    <option value="May">{{ __('translate.may') }}</option>
                                    <option value="June">{{ __('translate.june') }}</option>
                                    <option value="July">{{ __('translate.july') }}</option>
                                    <option value="August">{{ __('translate.august') }}</option>
                                    <option value="September">{{ __('translate.september') }}</option>
                                    <option value="October">{{ __('translate.october') }}</option>
                                    <option value="November">{{ __('translate.november') }}</option>
                                    <option value="December">{{ __('translate.december') }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="user_from_to_period">
                            <p class="form_title">{{ __('translate.user_new_job_to_year') }}</p>
                            <select name="year_to" id="add_work_job_years_to" required>
                                <option value="">{{ __('translate.user_new_job_choose_year') }}</option>
                                <script>
                                    var year = 2018;
                                    while(year > 1930) {
                                        $('#add_work_job_years_to').append(`<option value="`+ year +`">`+ year-- +`</option>`); 
                                    }
                                </script>
                            </select>
                            <div class="user_from_to_period_item">
                                <select name="month_to" id="month_to" required>
                                    <option value="">{{ __('translate.user_new_job_choose_month') }}</option>
                                    <option value="January">{{ __('translate.january') }}</option>
                                    <option value="February">{{ __('translate.february') }}</option>
                                    <option value="March">{{ __('translate.march') }}</option>
                                    <option value="April">{{ __('translate.april') }}</option>
                                    <option value="May">{{ __('translate.may') }}</option>
                                    <option value="June">{{ __('translate.june') }}</option>
                                    <option value="July">{{ __('translate.july') }}</option>
                                    <option value="August">{{ __('translate.august') }}</option>
                                    <option value="September">{{ __('translate.september') }}</option>
                                    <option value="October">{{ __('translate.october') }}</option>
                                    <option value="November">{{ __('translate.november') }}</option>
                                    <option value="December">{{ __('translate.december') }}</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <p class="form_title"><strong>{{ __('translate.companies_register_person_position_label') }}* </strong><input name="position" type="text"></p>
                    <hr>
                    <p class="form_title"><strong>{{ __('translate.cv_step_3_company') }}* </strong><input name="company_name" type="text"></p>

                    <p class="form_title"><strong>{{ __('translate.companies_register_business_sector_label') }}* </strong></p>
                    <select name="business_sector">
                    @foreach($categories as $category)
                        <option value="{{ $category->name }}">{{ $category->name }}</option>
                    @endforeach
                    </select>

                    <p class="form_title"><strong>{{ __('translate.label_location') }}* </strong><input name="location" type="text" required></p>

                    <p class="form_title"><strong>{{ __('translate.cv_step_3_description') }}</strong> <small>{{ __('translate.cv_step_3_main_activites') }}</small><strong> : </strong></p>
                    <textarea name="description" rows="3" cols="50"></textarea>

                    <input type="hidden" name="cv_id" value="{{ $cv->id }}">
           
                    {{ csrf_field() }}
                    <div class="login_reg_form_item login_reg_form_submit" style="margin-top: 20px;">
                        <input type="submit" value="{{ __('translate.cv_add_work_experience') }}">
                    </div>
                        
                </div>
                <div class="login_reg_form_item login_reg_form_submit" style="margin-top: 20px;">
                    <a href="{{ route('updatePdf', ['cvid' => $cv->id]) }}"><button type="button" class="blue_btn" style="width:100%;">{{ __('translate.finish') }}</button></a>
                </div>
            </form>
        
        </div>

    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js" integrity="sha384-FzT3vTVGXqf7wRfy8k4BiyzvbNfeYjK+frTVqZeNDFl8woCbF0CYG6g2fMEFFo/i" crossorigin="anonymous"></script>
    <script>

         $(document).click(function() {
            // dugme da se pojavljuje i nestaje
            $('.confirm_edit_btn').css('display','none');
        });

        $('.login_register_container').click(function(e){
			e.stopPropagation();
		});

        $('.cv_edit_link').click(function(e){
	 		e.stopPropagation();
	 	});

        $(".edit_info_window input").focus(function(e) {
       	    $(this).next().css('display','inline');
                e.stopPropagation(); // if you click on the div itself it will cancel the click event.
        });

        $('.edit_info_window textarea').focus(function(e){
       	e.stopPropagation();
       		$(this).next().css('display','inline-block');
       	});

    // CV

    // cv title
         $(document).ready(function(){
		
            if ($('#cv_title_span').text() == "") {
                $('#cv_title_input').css('display','block');
                $('#cv_title').css('display','none');
                $('#cv_title_btn').css('display','none');
            };
        });
 	
        $('#cv_title').click(function(){
			$(this).css('display', 'none');
			var cv_title_span = $('#cv_title_span').text();
			$('#cv_title_span').css('display','none');
			$('#cv_title_input').fadeIn('200');
			$('#cv_title_input input').val(cv_title_span).focus();
		});

        $('#cv_title_input button').click(function(e){
				e.preventDefault();
				$('#cv_title').css('display', 'inline');
				$('#cv_title_span').css('display','inline');
				$('#cv_title_input').css('display','none');
				var title = $('#cv_title_input input').val();
				$('#cv_title_span').html(title);
                var id = $('#cv_id input').val();
				$.ajax({
					  method: "POST",
					  url: "/updateCV",
					  data: {
					  	title:title,
                        id:id,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			});
    //cv first name
         $(document).ready(function(){
		
            if ($('#first_name_span').text() == "") {
                $('#first_name_input').css('display','block');
                $('#first_name').css('display','none');
                $('#first_name_btn').css('display','none');
            };
        });

        $('#first_name').click(function(){
			$(this).css('display', 'none');
			var first_name_span = $('#first_name_span').text();
			$('#first_name_span').css('display','none');
			$('#first_name_input').fadeToggle('200');
			$('#first_name_input input').val(first_name_span).focus();
		});

        $('#first_name_input button').click(function(e){
				e.preventDefault();
				$('#first_name').css('display', 'inline');
				$('#first_name_span').css('display','inline');
				$('#first_name_input').css('display','none');
				var first_name = $('#first_name_input input').val();
				$('#first_name_span').html(first_name);
                var id = $('#cv_id input').val();
				$.ajax({
					  method: "POST",
					  url: "/updateCV",
					  data: {
					  	first_name:first_name,
                        id:id,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			});
    //cv last name
        $(document).ready(function(){
            
            if ($('#last_name_span').text() == "") {
                $('#last_name_input').css('display','block');
                $('#last_name').css('display','none');
                $('#last_name_btn').css('display','none');
            };
        });

        $('#last_name').click(function(){
            $(this).css('display', 'none');
            var last_name_span = $('#last_name_span').text();
            $('#last_name_span').css('display','none');
            $('#last_name_input').fadeToggle('200');
            $('#last_name_input input').val(last_name_span).focus();
        });

        $('#last_name_input button').click(function(e){
				e.preventDefault();
				$('#last_name').css('display', 'inline');
				$('#last_name_span').css('display','inline');
				$('#last_name_input').css('display','none');
				var last_name = $('#last_name_input input').val();
				$('#last_name_span').html(last_name);
                var id = $('#cv_id input').val();
				$.ajax({
					  method: "POST",
					  url: "/updateCV",
					  data: {
					  	last_name:last_name,
                        id:id,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			});
    //cv email
        $(document).ready(function(){
            
            if ($('#email_span').text() == "") {
                $('#email_input').css('display','block');
                $('#email').css('display','none');
                $('#email_btn').css('display','none');
            };
        });

        $('#email').click(function(){
            $(this).css('display', 'none');
            var email_span = $('#email_span').text();
            $('#email_span').css('display','none');
            $('#email_input').fadeToggle('200');
            $('#email_input input').val(email_span).focus();
        });

        $('#email_input button').click(function(e){
				e.preventDefault();
				$('#email').css('display', 'inline');
				$('#email_span').css('display','inline');
				$('#email_input').css('display','none');
				var email = $('#email_input input').val();
				$('#email_span').html(email);
                var id = $('#cv_id input').val();
				$.ajax({
					  method: "POST",
					  url: "/updateCV",
					  data: {
					  	email:email,
                        id:id,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			});
    //cv phone
        $(document).ready(function(){
            
            if ($('#phone_span').text() == "") {
                $('#phone_input').css('display','block');
                $('#phone').css('display','none');
                $('#phone_btn').css('display','none');
            };
        });

        $('#phone').click(function(){
            $(this).css('display', 'none');
            var phone_span = $('#phone_span').text();
            $('#phone_span').css('display','none');
            $('#phone_input').fadeToggle('200');
            $('#phone_input input').val(phone_span).focus();
        });

        $('#phone_input button').click(function(e){
				e.preventDefault();
				$('#phone').css('display', 'inline');
				$('#phone_span').css('display','inline');
				$('#phone_input').css('display','none');
				var phone = $('#phone_input input').val();
				$('#phone_span').html(phone);
                var id = $('#cv_id input').val();
				$.ajax({
					  method: "POST",
					  url: "/updateCV",
					  data: {
					  	phone:phone,
                        id:id,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			});
    //cv post address
        $(document).ready(function(){
            
            if ($('#post_address_span').text() == "") {
                $('#post_address_input').css('display','block');
                $('#post_address').css('display','none');
                $('#post_address_btn').css('display','none');
            };
        });

        $('#post_address').click(function(){
            $(this).css('display', 'none');
            var post_address_span = $('#post_address_span').text();
            $('#post_address_span').css('display','none');
            $('#post_address_input').fadeToggle('200');
            $('#post_address_input input').val(post_address_span).focus();
        });

        $('#post_address_input button').click(function(e){
				e.preventDefault();
				$('#post_address').css('display', 'inline');
				$('#post_address_span').css('display','inline');
				$('#post_address_input').css('display','none');
				var post_address = $('#post_address_input input').val();
				$('#post_address_span').html(post_address);
                var id = $('#cv_id input').val();
				$.ajax({
					  method: "POST",
					  url: "/updateCV",
					  data: {
					  	post_address:post_address,
                        id:id,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			});
    //cv gender
        $(document).ready(function(){
            
            if ($('#gender_span').text() == "") {
                $('#gender_input').css('display','block');
                $('#gender').css('display','none');
                $('#gender_btn').css('display','none');
            };
        });

        $('#gender').click(function(){
            $(this).css('display', 'none');
            var gender_span = $('#gender_span').text();
            $('#gender_span').css('display','none');
            $('#gender_input').fadeToggle('200');
            if(gender_span == 'Male'){
                $('#male').val(gender_span).focus().attr('checked', true);
            }else if(gender_span == 'Female'){
                $('#female').val(gender_span).focus().attr('checked', true);
            }
        });
        
        $('#male').click(function(){
            $('#male').attr('checked', true);
            $('#female').attr('checked', false);
        });
        $('#female').click(function(){
            $('#female').attr('checked', true);
            $('#male').attr('checked', false);
        });
        
         $('#gender_input button').click(function(e){
				e.preventDefault();
				$('#gender').css('display', 'inline');
				$('#gender_span').css('display','inline');
				$('#gender_input').css('display','none');
                var gender = $("#gender_input input[type='radio']:checked").val();
				$('#gender_span').html(gender);
                var id = $('#cv_id input').val();
				$.ajax({
					  method: "POST",
					  url: "/updateCV",
					  data: {
					  	gender:gender,
                        id:id,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					}) 
			});
    //cv birthdate
        $(document).ready(function(){
            
            if ($('#birthdate_span').text() == "") {
                $('#birthdate_input').css('display','block');
                $('#birthdate').css('display','none');
                $('#birthdate_btn').css('display','none');
            };
        });

        $('#birthdate').click(function(){
            $(this).css('display', 'none');
            var birthdate_span = $('#birthdate_span').text();
            $('#birthdate_span').css('display','none');
            $('#birthdate_input').fadeToggle('200');
            $('#birthdate_input input').val(birthdate_span).focus();
        });

        $('#birthdate_input button').click(function(e){
				e.preventDefault();
				$('#birthdate').css('display', 'inline');
				$('#birthdate_span').css('display','inline');
				$('#birthdate_input').css('display','none');
				var birthdate = $('#birthdate_input input').val();
				$('#birthdate_span').html(birthdate);
                var id = $('#cv_id input').val();
				$.ajax({
					  method: "POST",
					  url: "/updateCV",
					  data: {
					  	birthdate:birthdate,
                        id:id,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			});
    //cv citizenship
        $(document).ready(function(){
            
            if ($('#citizenship_span').text() == "") {
                $('#citizenship_input').css('display','block');
                $('#citizenship').css('display','none');
                $('#citizenship_btn').css('display','none');
            };
        });

        $('#citizenship').click(function(){
            $(this).css('display', 'none');
            var citizenship_span = $('#citizenship_span').text();
            $('#citizenship_span').css('display','none');
            $('#citizenship_input').fadeToggle('200');
            $('#citizenship_input input').val(citizenship_span).focus();
        });

        $('#citizenship_input button').click(function(e){
				e.preventDefault();
				$('#citizenship').css('display', 'inline');
				$('#citizenship_span').css('display','inline');
				$('#citizenship_input').css('display','none');
				var citizenship = $('#citizenship_input input').val();
				$('#citizenship_span').html(citizenship);
                var id = $('#cv_id input').val();
				$.ajax({
					  method: "POST",
					  url: "/updateCV",
					  data: {
					  	citizenship:citizenship,
                        id:id,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			});
    //cv country
        $(document).ready(function(){
            
            if ($('#country_span').text() == "") {
                $('#country_input').css('display','block');
                $('#country').css('display','none');
                $('#country_btn').css('display','none');
            };
        });

        $('#country').click(function(){
            $(this).css('display', 'none');
            var country_span = $('#country_span').text();
            $('#country_span').css('display','none');
            $('#country_input').fadeToggle('200');
            $('#country_input input').val(country_span).focus();
        });

        $('#country_input button').click(function(e){
				e.preventDefault();
				$('#country').css('display', 'inline');
				$('#country_span').css('display','inline');
				$('#country_input').css('display','none');
				var country = $('#country_input input').val();
				$('#country_span').html(country);
                var id = $('#cv_id input').val();
				$.ajax({
					  method: "POST",
					  url: "/updateCV",
					  data: {
					  	country:country,
                        id:id,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			});
    //cv city
        $(document).ready(function(){
            
            if ($('#city_span').text() == "") {
                $('#city_input').css('display','block');
                $('#city').css('display','none');
                $('#city_btn').css('display','none');
            };
        });

        $('#city').click(function(){
            $(this).css('display', 'none');
            var city_span = $('#city_span').text();
            $('#city_span').css('display','none');
            $('#city_input').fadeToggle('200');
            $('#city_input input').val(city_span).focus();
        });

        $('#city_input button').click(function(e){
				e.preventDefault();
				$('#city').css('display', 'inline');
				$('#city_span').css('display','inline');
				$('#city_input').css('display','none');
				var city = $('#city_input input').val();
				$('#city_span').html(city);
                var id = $('#cv_id input').val();
				$.ajax({
					  method: "POST",
					  url: "/updateCV",
					  data: {
					  	city:city,
                        id:id,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			});
    //cv native language
        $(document).ready(function(){
            
            if ($('#native_language_span').text() == "") {
                $('#native_language_input').css('display','block');
                $('#native_language').css('display','none');
                $('#native_language_btn').css('display','none');
            };
        });

        $('#native_language').click(function(){
            $(this).css('display', 'none');
            var native_language_span = $('#native_language_span').text();
            $('#native_language_span').css('display','none');
            $('#native_language_input').fadeToggle('200');
            $('#native_language_input select').val(native_language_span).focus();
        });

        $('#native_language_input button').click(function(e){
				e.preventDefault();
				$('#native_language').css('display', 'inline');
				$('#native_language_span').css('display','inline');
				$('#native_language_input').css('display','none');
				var native_language = $('#native_language_input select').val();
				$('#native_language_span').html(native_language);
                var id = $('#cv_id input').val();
				$.ajax({
					  method: "POST",
					  url: "/updateCV",
					  data: {
					  	native_language:native_language,
                        id:id,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			});
    //cv foreign languages
        $(document).ready(function(){
            
            if ($('#foreign_languages_span').text() == "") {
                $('#foreign_languages_input').css('display','block');
                $('#foreign_languages').css('display','none');
                $('#foreign_languages_btn').css('display','none');
            };
        });

        $('#foreign_languages').click(function(){
            $(this).css('display', 'none');
            var foreign_languages_span = $('#foreign_languages_span').text();
            $('#foreign_languages_span').css('display','none');
            $('#foreign_languages_input').fadeToggle('200');
            $('#foreign_languages_input select').val(foreign_languages_span).focus();
        });

        $('#foreign_languages_input button').click(function(e){
				e.preventDefault();
				$('#foreign_languages').css('display', 'inline');
				$('#foreign_languages_span').css('display','inline');
				$('#foreign_languages_input').css('display','none');
				var foreign_languages = $('#foreign_languages_input select').val();
				$('#foreign_languages_span').html(foreign_languages);
                var id = $('#cv_id input').val();
				$.ajax({
					  method: "POST",
					  url: "/updateCV",
					  data: {
					  	foreign_languages:foreign_languages,
                        id:id,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			});
    //cv skills
        $(document).ready(function(){
            
            if ($('#skills_span').text() == "") {
                $('#skills_input').css('display','block');
                $('#skills').css('display','none');
                $('#skills_btn').css('display','none');
            };
        });

        $('#skills').click(function(){
            $(this).css('display', 'none');
            var skills_span = $('#skills_span').text();
            $('#skills_span').css('display','none');
            $('#skills_input').fadeToggle('200');
            $('#skills_input textarea').val(skills_span).focus();
        });

        $('#skills_input button').click(function(e){
				e.preventDefault();
				$('#skills').css('display', 'inline');
				$('#skills_span').css('display','inline');
				$('#skills_input').css('display','none');
				var skills = $('#skills_input textarea').val();
				$('#skills_span').html(skills);
                var id = $('#cv_id input').val();
				$.ajax({
					  method: "POST",
					  url: "/updateCV",
					  data: {
					  	skills:skills,
                        id:id,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			});
    //cv computer skills
        $(document).ready(function(){
            
            if ($('#computer_skills_span').text() == "") {
                $('#computer_skills_input').css('display','block');
                $('#computer_skills').css('display','none');
                $('#computer_skills_btn').css('display','none');
            };
        });

        $('#computer_skills').click(function(){
            $(this).css('display', 'none');
            var computer_skills_span = $('#computer_skills_span').text();
            $('#computer_skills_span').css('display','none');
            $('#computer_skills_input').fadeToggle('200');
            $('#computer_skills_input textarea').val(computer_skills_span).focus();
        });

        $('#computer_skills_input button').click(function(e){
				e.preventDefault();
				$('#computer_skills').css('display', 'inline');
				$('#computer_skills_span').css('display','inline');
				$('#computer_skills_input').css('display','none');
				var computer_skills = $('#computer_skills_input textarea').val();
				$('#computer_skills_span').html(computer_skills);
                var id = $('#cv_id input').val();
				$.ajax({
					  method: "POST",
					  url: "/updateCV",
					  data: {
					  	computer_skills:computer_skills,
                        id:id,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			});
    //cv driving license
        $(document).ready(function(){
            
            if ($('#driving_licence_span').text() == "") {
                $('#driving_licence_input').css('display','block');
                $('#driving_licence').css('display','none');
                $('#driving_licence_btn').css('display','none');
            };
        });

        $('#driving_licence').click(function(){
            $(this).css('display', 'none');
            var driving_licence_span = $('#driving_licence_span').text();
            $('#driving_licence_span').css('display','none');
            $('#driving_licence_input').fadeToggle('200');
            $('#driving_licence_input select').val(driving_licence_span).focus();
        });

        $('#driving_licence_input button').click(function(e){
				e.preventDefault();
				$('#driving_licence').css('display', 'inline');
				$('#driving_licence_span').css('display','inline');
				$('#driving_licence_input').css('display','none');
				var driving_licence = $('#driving_licence_input select').val();
				$('#driving_licence_span').html(driving_licence);
                var id = $('#cv_id input').val();
				$.ajax({
					  method: "POST",
					  url: "/updateCV",
					  data: {
					  	driving_licence:driving_licence,
                        id:id,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			});

    // EDUCATION

    //year from 
       /* $('.education_form').click(function(){
            var ed_id = $(this).children('.ed_id').val();
            console.log(ed_id);
        });    */
        $(document).ready(function(){
            
            if ($('.education_year_from_span').text() == "") {
                $('.education_year_from_input').css('display','block');
                $('.education_year_from').css('display','none');
                $('.education_year_from_btn').css('display','none');
            };
        });

        $('.education_year_from').click(function(){
            var edit_id = $(this).attr('id');
            $(this).css('display', 'none');
            var education_year_from_span = $('#'+edit_id).prev().text();
            $('#'+edit_id).prev().css('display','none');
            $('#'+edit_id).parent().next().fadeToggle('200');
            var input_id = $('#'+edit_id).parent().next().attr('id');
            $("#"+input_id+" select").val(education_year_from_span).focus();
        });
        
        $('.education_year_from_btn').click(function(e){
				e.preventDefault();
                var button_id = $(this).attr('id');
                $('#'+button_id).parent().prev().children('.education_year_from').css('display', 'inline');
                $('#'+button_id).parent().prev().children('.education_year_from_span').css('display', 'inline');
                $('#'+button_id).parent().css('display','none');
                var year_from = $('#'+button_id).parent().children('select').val();
                $('#'+button_id).parent().prev().children('.education_year_from_span').html(year_from);
                var id = $('#'+button_id).parent().parent().children('.ed_id').val();
				$.ajax({
					  method: "POST",
					  url: "/editEducation",
					  data: {
					  	year_from:year_from,
                        id:id,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			});
    //month from 
        $(document).ready(function(){
            
            if ($('.education_month_from_span').text() == "") {
                $('.education_month_from_input').css('display','block');
                $('.education_month_from').css('display','none');
                $('.education_month_from_btn').css('display','none');
            };
        });

        $('.education_month_from').click(function(){
            var edit_id = $(this).attr('id');
            $(this).css('display', 'none');
            var education_month_from_span = $('#'+edit_id).prev().text();
            $('#'+edit_id).prev().css('display','none');
            $('#'+edit_id).parent().parent().children('.education_month_from_input').fadeToggle('200');
            var input_id = $('#'+edit_id).parent().parent().children('.education_month_from_input').attr('id');
            $("#"+input_id+" select").val(education_month_from_span).focus();
        });
        
        $('.education_month_from_btn').click(function(e){
				e.preventDefault();
                var button_id = $(this).attr('id');
                $('#'+button_id).parent().parent().children().children('.education_month_from').css('display', 'inline');
                $('#'+button_id).parent().parent().children().children('.education_month_from_span').css('display', 'inline');
                $('#'+button_id).parent().css('display','none');
                var month_from = $('#'+button_id).parent().children('select').val();
                $('#'+button_id).parent().parent().children().children('.education_month_from_span').html(month_from);
                var id = $('#'+button_id).parent().parent().children('.ed_id').val();
				$.ajax({
					  method: "POST",
					  url: "/editEducation",
					  data: {
					  	month_from:month_from,
                        id:id,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			});
    //year to 
        $(document).ready(function(){
            
            if ($('.education_year_to_span').text() == "") {
                $('.education_year_to_input').css('display','block');
                $('.education_year_to').css('display','none');
                $('.education_year_to_btn').css('display','none');
            };
        });

        $('.education_year_to').click(function(){
            var edit_id = $(this).attr('id');
            $(this).css('display', 'none');
            var education_year_to_span = $('#'+edit_id).prev().text();
            $('#'+edit_id).prev().css('display','none');
            $('#'+edit_id).parent().next().fadeToggle('200');
            var input_id = $('#'+edit_id).parent().next().attr('id');
            $("#"+input_id+" select").val(education_year_to_span).focus();
        });
        
        $('.education_year_to_btn').click(function(e){
				e.preventDefault();
                var button_id = $(this).attr('id');
                $('#'+button_id).parent().prev().children('.education_year_to').css('display', 'inline');
                $('#'+button_id).parent().prev().children('.education_year_to_span').css('display', 'inline');
                $('#'+button_id).parent().css('display','none');
                var year_to = $('#'+button_id).parent().children('select').val();
                $('#'+button_id).parent().prev().children('.education_year_to_span').html(year_to);
                var id = $('#'+button_id).parent().parent().children('.ed_id').val();
				$.ajax({
					  method: "POST",
					  url: "/editEducation",
					  data: {
					  	year_to:year_to,
                        id:id,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			});
    //month to 
        $(document).ready(function(){
            
            if ($('.education_month_to_span').text() == "") {
                $('.education_month_to_input').css('display','block');
                $('.education_month_to').css('display','none');
                $('.education_month_to_btn').css('display','none');
            };
        });

        $('.education_month_to').click(function(){
            var edit_id = $(this).attr('id');
            $(this).css('display', 'none');
            var education_month_to_span = $('#'+edit_id).prev().text();
            $('#'+edit_id).prev().css('display','none');
            $('#'+edit_id).parent().parent().children('.education_month_to_input').fadeToggle('200');
            var input_id = $('#'+edit_id).parent().parent().children('.education_month_to_input').attr('id');
            $("#"+input_id+" select").val(education_month_to_span).focus();
        });
        
        $('.education_month_to_btn').click(function(e){
				e.preventDefault();
                var button_id = $(this).attr('id');
                $('#'+button_id).parent().parent().children().children('.education_month_to').css('display', 'inline');
                $('#'+button_id).parent().parent().children().children('.education_month_to_span').css('display', 'inline');
                $('#'+button_id).parent().css('display','none');
                var month_to = $('#'+button_id).parent().children('select').val();
                $('#'+button_id).parent().parent().children().children('.education_month_to_span').html(month_to);
                var id = $('#'+button_id).parent().parent().children('.ed_id').val();
				$.ajax({
					  method: "POST",
					  url: "/editEducation",
					  data: {
					  	month_to:month_to,
                        id:id,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			});

    // school
        $(document).ready(function(){
            
            if ($('.school_span').text() == "") {
                $('.school_input').css('display','block');
                $('.school').css('display','none');
                $('.school_btn').css('display','none');
            };
        });

        $('.school').click(function(){
            var edit_id = $(this).attr('id');
            $(this).css('display', 'none');
            var school_span = $('#'+edit_id).prev().text();
            $('#'+edit_id).prev().css('display','none');
            $('#'+edit_id).parent().next().fadeToggle('200');
            var input_id = $('#'+edit_id).parent().next().attr('id');
            $('#'+input_id).val(school_span).focus();
        });

        $('.school_input button').click(function(e){
				e.preventDefault();
                var button_id = $(this).attr('id');
                $('#'+button_id).parent().prev().children('.school').css('display', 'inline');
                $('#'+button_id).parent().prev().children('.school_span').css('display', 'inline');
                $('#'+button_id).parent().css('display','none');
				var school = $('#'+button_id).parent().children('input').val();
				$('#'+button_id).parent().prev().children('.school_span').html(school);
                var id = $('#'+button_id).parent().parent().children('.ed_id').val();
				$.ajax({
					  method: "POST",
					  url: "/editEducation",
					  data: {
					  	school:school,
                        id:id,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			});
    // location
        $(document).ready(function(){
            
            if ($('.location_span').text() == "") {
                $('.location_input').css('display','block');
                $('.location').css('display','none');
                $('.location_btn').css('display','none');
            };
        });

        $('.location').click(function(){
            var edit_id = $(this).attr('id');
            $(this).css('display', 'none');
            var location_span = $('#'+edit_id).prev().text();
            $('#'+edit_id).prev().css('display','none');
            $('#'+edit_id).parent().next().fadeToggle('200');
            var input_id = $('#'+edit_id).parent().next().attr('id');
            $('#'+input_id).val(location_span).focus();
        });

        $('.location_input button').click(function(e){
				e.preventDefault();
                var button_id = $(this).attr('id');
                $('#'+button_id).parent().prev().children('.location').css('display', 'inline');
                $('#'+button_id).parent().prev().children('.location_span').css('display', 'inline');
                $('#'+button_id).parent().css('display','none');
				var location = $('#'+button_id).parent().children('input').val();
				$('#'+button_id).parent().prev().children('.location_span').html(location);
                var id = $('#'+button_id).parent().parent().children('.ed_id').val();
				$.ajax({
					  method: "POST",
					  url: "/editEducation",
					  data: {
					  	location:location,
                        id:id,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			});
    //level
        $(document).ready(function(){
            
            if ($('.level_span').text() == "") {
                $('.level_input').css('display','block');
                $('.level').css('display','none');
                $('.level_btn').css('display','none');
            };
        });

        $('.level').click(function(){
            var edit_id = $(this).attr('id');
            $(this).css('display', 'none');
            var level_span = $('#'+edit_id).prev().text();
            $('#'+edit_id).prev().css('display','none');
            $('#'+edit_id).parent().next().fadeToggle('200');
            var input_id = $('#'+edit_id).parent().next().attr('id');
            $('#'+input_id).val(level_span).focus();
        });

        $('.level_input button').click(function(e){
				e.preventDefault();
                var button_id = $(this).attr('id');
                $('#'+button_id).parent().prev().children('.level').css('display', 'inline');
                $('#'+button_id).parent().prev().children('.level_span').css('display', 'inline');
                $('#'+button_id).parent().css('display','none');
				var level = $('#'+button_id).parent().children('select').val();
				$('#'+button_id).parent().prev().children('.level_span').html(level);
                var id = $('#'+button_id).parent().parent().children('.ed_id').val();
				$.ajax({
					  method: "POST",
					  url: "/editEducation",
					  data: {
					  	level:level,
                        id:id,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			});
    //description
        $(document).ready(function(){
            
            if ($('.description_span').text() == "") {
                $('.description_input').css('display','block');
                $('.description').css('display','none');
                $('.description_btn').css('display','none');
            };
        });

        $('.description').click(function(){
            var edit_id = $(this).attr('id');
            $(this).css('display', 'none');
            var description_span = $('#'+edit_id).prev().text();
            $('#'+edit_id).prev().css('display','none');
            $('#'+edit_id).parent().next().fadeToggle('200');
            var input_id = $('#'+edit_id).parent().next().attr('id');
            $('#'+input_id).val(description_span).focus();
        });

        $('.description_input button').click(function(e){
				e.preventDefault();
                var button_id = $(this).attr('id');
                $('#'+button_id).parent().prev().children('.description').css('display', 'inline');
                $('#'+button_id).parent().prev().children('.description_span').css('display', 'inline');
                $('#'+button_id).parent().css('display','none');
				var description = $('#'+button_id).parent().children('textarea').val();
				$('#'+button_id).parent().prev().children('.description_span').html(description);
                var id = $('#'+button_id).parent().parent().children('.ed_id').val();
				$.ajax({
					  method: "POST",
					  url: "/editEducation",
					  data: {
					  	description:description,
                        id:id,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			});

    //WORK HISTORY
    
    //year from workHistory
        $(document).ready(function(){
            
            if ($('.workHistory_year_from_span').text() == "") {
                $('.workHistory_year_from_input').css('display','block');
                $('.workHistory_year_from').css('display','none');
                $('.workHistory_year_from_btn').css('display','none');
            };
        });

        $('.workHistory_year_from').click(function(){
            var edit_id = $(this).attr('id');
            $(this).css('display', 'none');
            var workHistory_year_from_span = $('#'+edit_id).prev().text();
            $('#'+edit_id).prev().css('display','none');
            $('#'+edit_id).parent().next().fadeToggle('200');
            var input_id = $('#'+edit_id).parent().next().attr('id');
            $("#"+input_id+" select").val(workHistory_year_from_span).focus();
        });
        
        $('.workHistory_year_from_btn').click(function(e){
				e.preventDefault();
                var button_id = $(this).attr('id');
                $('#'+button_id).parent().prev().children('.workHistory_year_from').css('display', 'inline');
                $('#'+button_id).parent().prev().children('.workHistory_year_from_span').css('display', 'inline');
                $('#'+button_id).parent().css('display','none');
                var year_from = $('#'+button_id).parent().children('select').val();
                $('#'+button_id).parent().prev().children('.workHistory_year_from_span').html(year_from);
                var id = $('#'+button_id).parent().parent().children('.wh_id').val();
				$.ajax({
					  method: "POST",
					  url: "/editWorkHistory",
					  data: {
					  	year_from:year_from,
                        id:id,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			});
    //month from
        $(document).ready(function(){
            
            if ($('.workHistory_month_from_span').text() == "") {
                $('.workHistory_month_from_input').css('display','block');
                $('.workHistory_month_from').css('display','none');
                $('.workHistory_month_from_btn').css('display','none');
            };
        });

        $('.workHistory_month_from').click(function(){
            var edit_id = $(this).attr('id');
            $(this).css('display', 'none');
            var workHistory_month_from_span = $('#'+edit_id).prev().text();
            $('#'+edit_id).prev().css('display','none');
            $('#'+edit_id).parent().parent().children('.workHistory_month_from_input').fadeToggle('200');
            var input_id = $('#'+edit_id).parent().parent().children('.workHistory_month_from_input').attr('id');
            $("#"+input_id+" select").val(workHistory_month_from_span).focus();
        });
        
        $('.workHistory_month_from_btn').click(function(e){
				e.preventDefault();
                var button_id = $(this).attr('id');
                $('#'+button_id).parent().parent().children().children('.workHistory_month_from').css('display', 'inline');
                $('#'+button_id).parent().parent().children().children('.workHistory_month_from_span').css('display', 'inline');
                $('#'+button_id).parent().css('display','none');
                var month_from = $('#'+button_id).parent().children('select').val();
                $('#'+button_id).parent().parent().children().children('.workHistory_month_from_span').html(month_from);
                var id = $('#'+button_id).parent().parent().children('.wh_id').val();
				$.ajax({
					  method: "POST",
					  url: "/editWorkHistory",
					  data: {
					  	month_from:month_from,
                        id:id,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			});
    //year to
        $(document).ready(function(){
            
            if ($('.workHistory_year_to_span').text() == "") {
                $('.workHistory_year_to_input').css('display','block');
                $('.workHistory_year_to').css('display','none');
                $('.workHistory_year_to_btn').css('display','none');
            };
        });

        $('.workHistory_year_to').click(function(){
            var edit_id = $(this).attr('id');
            $(this).css('display', 'none');
            var workHistory_year_to_span = $('#'+edit_id).prev().text();
            $('#'+edit_id).prev().css('display','none');
            $('#'+edit_id).parent().next().fadeToggle('200');
            var input_id = $('#'+edit_id).parent().next().attr('id');
            $("#"+input_id+" select").val(workHistory_year_to_span).focus();
        });
        
        $('.workHistory_year_to_btn').click(function(e){
				e.preventDefault();
                var button_id = $(this).attr('id');
                $('#'+button_id).parent().prev().children('.workHistory_year_to').css('display', 'inline');
                $('#'+button_id).parent().prev().children('.workHistory_year_to_span').css('display', 'inline');
                $('#'+button_id).parent().css('display','none');
                var year_to = $('#'+button_id).parent().children('select').val();
                $('#'+button_id).parent().prev().children('.workHistory_year_to_span').html(year_to);
                var id = $('#'+button_id).parent().parent().children('.wh_id').val();
				$.ajax({
					  method: "POST",
					  url: "/editWorkHistory",
					  data: {
					  	year_to:year_to,
                        id:id,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			});
    //month to
        $(document).ready(function(){
            
            if ($('.workHistory_month_to_span').text() == "") {
                $('.workHistory_month_to_input').css('display','block');
                $('.workHistory_month_to').css('display','none');
                $('.workHistory_month_to_btn').css('display','none');
            };
        });

        $('.workHistory_month_to').click(function(){
            var edit_id = $(this).attr('id');
            $(this).css('display', 'none');
            var workHistory_month_to_span = $('#'+edit_id).prev().text();
            $('#'+edit_id).prev().css('display','none');
            $('#'+edit_id).parent().parent().children('.workHistory_month_to_input').fadeToggle('200');
            var input_id = $('#'+edit_id).parent().parent().children('.workHistory_month_to_input').attr('id');
            $("#"+input_id+" select").val(workHistory_month_to_span).focus();
        });
        
        $('.workHistory_month_to_btn').click(function(e){
				e.preventDefault();
                var button_id = $(this).attr('id');
                $('#'+button_id).parent().parent().children().children('.workHistory_month_to').css('display', 'inline');
                $('#'+button_id).parent().parent().children().children('.workHistory_month_to_span').css('display', 'inline');
                $('#'+button_id).parent().css('display','none');
                var month_to = $('#'+button_id).parent().children('select').val();
                $('#'+button_id).parent().parent().children().children('.workHistory_month_to_span').html(month_to);
                var id = $('#'+button_id).parent().parent().children('.wh_id').val();
				$.ajax({
					  method: "POST",
					  url: "/editWorkHistory",
					  data: {
					  	month_to:month_to,
                        id:id,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			});
    //position
        $(document).ready(function(){
            
            if ($('.position_span').text() == "") {
                $('.position_input').css('display','block');
                $('.position').css('display','none');
                $('.position_btn').css('display','none');
            };
        });

        $('.position').click(function(){
            var edit_id = $(this).attr('id');
            $(this).css('display', 'none');
            var position_span = $('#'+edit_id).prev().text();
            $('#'+edit_id).prev().css('display','none');
            $('#'+edit_id).parent().next().fadeToggle('200');
            var input_id = $('#'+edit_id).parent().next().attr('id');
            $('#'+input_id).val(position_span).focus();
        });

        $('.position_input button').click(function(e){
				e.preventDefault();
                var button_id = $(this).attr('id');
                $('#'+button_id).parent().prev().children('.position').css('display', 'inline');
                $('#'+button_id).parent().prev().children('.position_span').css('display', 'inline');
                $('#'+button_id).parent().css('display','none');
				var position = $('#'+button_id).parent().children('input').val();
				$('#'+button_id).parent().prev().children('.position_span').html(position);
                var id = $('#'+button_id).parent().parent().children('.wh_id').val();
				$.ajax({
					  method: "POST",
					  url: "/editWorkHistory",
					  data: {
					  	position:position,
                        id:id,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			});
    //company name company_name
        $(document).ready(function(){
            
            if ($('.company_name_span').text() == "") {
                $('.company_name_input').css('display','block');
                $('.company_name').css('display','none');
                $('.company_name_btn').css('display','none');
            };
        });

        $('.company_name').click(function(){
            var edit_id = $(this).attr('id');
            $(this).css('display', 'none');
            var company_name_span = $('#'+edit_id).prev().text();
            $('#'+edit_id).prev().css('display','none');
            $('#'+edit_id).parent().next().fadeToggle('200');
            var input_id = $('#'+edit_id).parent().next().attr('id');
            $('#'+input_id).val(company_name_span).focus();
        });

        $('.company_name_input button').click(function(e){
				e.preventDefault();
                var button_id = $(this).attr('id');
                $('#'+button_id).parent().prev().children('.company_name').css('display', 'inline');
                $('#'+button_id).parent().prev().children('.company_name_span').css('display', 'inline');
                $('#'+button_id).parent().css('display','none');
				var company_name = $('#'+button_id).parent().children('input').val();
				$('#'+button_id).parent().prev().children('.company_name_span').html(company_name);
                var id = $('#'+button_id).parent().parent().children('.wh_id').val();
				$.ajax({
					  method: "POST",
					  url: "/editWorkHistory",
					  data: {
					  	company_name:company_name,
                        id:id,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			});
    //business sector
        $(document).ready(function(){
            
            if ($('.business_sector_span').text() == "") {
                $('.business_sector_input').css('display','block');
                $('.business_sector').css('display','none');
                $('.business_sector_btn').css('display','none');
            };
        });

        $('.business_sector').click(function(){
            var edit_id = $(this).attr('id');
            $(this).css('display', 'none');
            var business_sector_span = $('#'+edit_id).prev().text();
            $('#'+edit_id).prev().css('display','none');
            $('#'+edit_id).parent().parent().children('.business_sector_input').fadeToggle('200');
            var input_id = $('#'+edit_id).parent().parent().children('.business_sector_input').attr('id');
            $("#"+input_id+" select").val(business_sector_span).focus();
        });
        
        $('.business_sector_btn').click(function(e){
				e.preventDefault();
                var button_id = $(this).attr('id');
                $('#'+button_id).parent().parent().children().children('.business_sector').css('display', 'inline');
                $('#'+button_id).parent().parent().children().children('.business_sector_span').css('display', 'inline');
                $('#'+button_id).parent().css('display','none');
                var business_sector = $('#'+button_id).parent().children('select').val();
                $('#'+button_id).parent().parent().children().children('.business_sector_span').html(business_sector);
                var id = $('#'+button_id).parent().parent().children('.wh_id').val();
				$.ajax({
					  method: "POST",
					  url: "/editWorkHistory",
					  data: {
					  	business_sector:business_sector,
                        id:id,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			});
    //location
        $(document).ready(function(){
            
            if ($('.wh_location_span').text() == "") {
                $('.wh_location_input').css('display','block');
                $('.wh_location').css('display','none');
                $('.wh_location_btn').css('display','none');
            };
        });

        $('.wh_location').click(function(){
            var edit_id = $(this).attr('id');
            $(this).css('display', 'none');
            var wh_location_span = $('#'+edit_id).prev().text();
            $('#'+edit_id).prev().css('display','none');
            $('#'+edit_id).parent().next().fadeToggle('200');
            var input_id = $('#'+edit_id).parent().next().attr('id');
            $('#'+input_id).val(wh_location_span).focus();
        });

        $('.wh_location_input button').click(function(e){
				e.preventDefault();
                var button_id = $(this).attr('id');
                $('#'+button_id).parent().prev().children('.wh_location').css('display', 'inline');
                $('#'+button_id).parent().prev().children('.wh_location_span').css('display', 'inline');
                $('#'+button_id).parent().css('display','none');
				var location = $('#'+button_id).parent().children('input').val();
				$('#'+button_id).parent().prev().children('.wh_location_span').html(location);
                var id = $('#'+button_id).parent().parent().children('.wh_id').val();
				$.ajax({
					  method: "POST",
					  url: "/editWorkHistory",
					  data: {
					  	location:location,
                        id:id,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			});
    //description
        $(document).ready(function(){
            
            if ($('.wh_description_span').text() == "") {
                $('.wh_description_input').css('display','block');
                $('.wh_description').css('display','none');
                $('.wh_description_btn').css('display','none');
            };
        });

        $('.wh_description').click(function(){
            var edit_id = $(this).attr('id');
            $(this).css('display', 'none');
            var wh_description_span = $('#'+edit_id).prev().text();
            $('#'+edit_id).prev().css('display','none');
            $('#'+edit_id).parent().next().fadeToggle('200');
            var input_id = $('#'+edit_id).parent().next().attr('id');
            $('#'+input_id).val(wh_description_span).focus();
        });

        $('.wh_description_input button').click(function(e){
				e.preventDefault();
                var button_id = $(this).attr('id');
                $('#'+button_id).parent().prev().children('.wh_description').css('display', 'inline');
                $('#'+button_id).parent().prev().children('.wh_description_span').css('display', 'inline');
                $('#'+button_id).parent().css('display','none');
				var description = $('#'+button_id).parent().children('textarea').val();
				$('#'+button_id).parent().prev().children('.wh_description_span').html(description);
                var id = $('#'+button_id).parent().parent().children('.wh_id').val();
				$.ajax({
					  method: "POST",
					  url: "/editWorkHistory",
					  data: {
					  	description:description,
                        id:id,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			});
    </script>
    
@endsection