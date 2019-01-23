@extends('layouts.master')

@section('content')

<h1 class="page_title main_page_title">{{ __('translate.companies_register_h1') }}</h1>

<main class="main_app_container">
			@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif

			<div class="login_register_container">
				<form action="{{ route('postCompanyRegister') }}" method="POST" id="company_reg_form" class="login_reg_form company_registration_form">
				<div class="first_part_companies_reg">

						<div class="login_reg_form_item">
							<p class="form_title">{{ __('translate.companies_register_country_label') }}</p>
							<select name="country">
								<option value="Serbia">{{ __('translate.companies_register_country_option_1') }}</option>
								<option value="Bulgaria">{{ __('translate.companies_register_country_option_2') }}</option>
							</select>
						</div>

						<div class="login_reg_form_item">
							<p class="form_title">{{ __('translate.companies_register_organisation_type_label') }}</p>
							<div class="company_type_form_section">
								<label for="private_company"><span>{{ __('translate.companies_register_organisation_type_option_1') }}</span><input type="radio" name="register_type" value="0" id="private_company" checked="checked"></label>
								<label for="government_company"><span>{{ __('translate.companies_register_organisation_type_option_2') }}</span><input type="radio" name="register_type" value="1" id="government_company"></label>
							</div>
						</div>

						<div class="login_reg_form_item">
							<p class="form_title">{{ __('translate.companies_register_pib_label') }}</p>
							<div class="required_field">
								<input type="text" id="" name="pib" required>
							</div>
						</div>

						<div class="login_reg_form_item">
							<p class="form_title">{{ __('translate.companies_register_vat_question') }}</p>
							<div class="company_type_form_section">
								<label for="company_organization_yes"><span>{{ __('translate.companies_register_vat_answer_1') }}</span><input type="radio" id="company_organization_yes"></label>
								<label for="company_organization_no"><span>{{ __('translate.companies_register_vat_answer_2') }}</span><input type="radio" id="company_organization_no"></label>
							</div>
							<div id="vat_div">
								<p>VAT number:</p>
								<input type="text" name="vat">
							</div>
						</div>

						<div class="login_reg_form_item login_reg_form_submit">
							<button class="submit btn_check_company_pib">{{ __('translate.companies_register_continue_button') }}</button>
						</div>

					</div>

					<!-- Second Part Companies Registration -->
					<div class="second_part_companies_reg">

						<div class="login_reg_form_item">
							<p class="">{{ __('translate.companies_register_message_1') }}</p>
							<p class="form_title" style="margin-top: 20px;">{{ __('translate.companies_register_company_name_label') }}</p>
							<div class="required_field">
								<input name="company_name" type="text" required>
							</div>
							<p class="form_title">{{ __('translate.companies_register_company_foreign_name_label') }}</p>
							<div class="required_field">
								<input name="foreign_name" type="text" required>
							</div>
							<p class="form_title">{{ __('translate.companies_register_company_registered_office_label') }}</p>
							<div class="required_field">
								<input name="company_registered_office" type="text" required>
							</div>
						</div>

						<div class="login_reg_form_item form_smaller_text">
							<p class="form_title">{{ __('translate.companies_register_company_type_label') }}</p>
							<div class="company_type_form_section" style="margin-bottom: 20px;">
								<label for="company_type_org_companies"><span>	{{ __('translate.companies_register_company_type_option_1') }}</span><input type="radio" name="company_type" value="0" id="company_type_org_companies" checked="checked">
								<small>{{ __('translate.companies_register_company_type_option_1_description') }}</small></label>

								<label for="company_type_hr_consultan"><span>{{ __('translate.companies_register_company_type_option_2') }} </span><input type="radio" name="company_type" value="1" id="company_type_hr_consultan"><small>{{ __('translate.companies_register_company_type_option_2_description') }}</small></label>
							</div>
							

							<p class="form_title">{{ __('translate.companies_register_business_sector_label') }}*</p>
							<select class="selectSector select_move_area" size="5">
    							@foreach( App\Category::getCategories() as $category)
									<option value="{{$category->id}}">{{ $category->name }}</option>
                                @endforeach
							</select>

							<select class="selectSectorSelected select_move_area" name="sector" size="5">
							</select>

							<p class="form_title">{{ __('translate.companies_register_company_website_label') }}</p>
							<div class="required_field">
								<input name="company_website" type="url" required>
							</div>

							<p class="form_title">Company email:*</p>
							<div class="required_field">
								<input name="email" type="email" required>
							</div>

							<p class="form_title">{{ __('translate.companies_register_company_phone_label') }}</p>
							<div class="required_field">
								<input name="company_phone" type="number" required>
							</div>

							<p class="form_title">{{ __('translate.companies_register_company_address_label') }}</p>
							<div class="required_field">
								<input name="company_address" type="text" required>
							</div>
							
							<p class="form_title">{{ __('translate.companies_register_information_title') }}</p>
							<p>{{ __('translate.companies_register_information_text') }}</p>
							<br>
							<p class="form_title">{{ __('translate.companies_register_message_2') }}</p>

							<p class="form_title">{{ __('translate.companies_register_first_name_label') }}</p>
							<div class="required_field">
								<input name="first_name" type="text" required>
							</div>

							<p class="form_title">{{ __('translate.companies_register_last_name_label') }}</p>
							<div class="required_field">
								<input name="last_name" type="text" required>
							</div>

							<p class="form_title">{{ __('translate.companies_register_position_label') }}</p>
							<div class="required_field">
								<input name="position" type="text" required> 
							</div>

							<p class="form_title">{{ __('translate.companies_register_business_phone_label') }}</p>
							<div class="required_field">
								<input name="business_phone" type="number" required>
							</div>

							<p class="form_title">{{ __('translate.companies_register_business_email_label') }}</p>
							<div class="required_field">
								<input name="business_email" type="email" required style="width: calc(100% - 30px);">
							</div>

							<small style="margin-bottom: 10px;display: inline-block;">{{ __('translate.companies_register_message_3') }}</small>
							
							<label for="weekly_jobs_newsletter"><input type="checkbox" name="newsletter" id="weekly_jobs_newsletter"> {{ __('translate.companies_register_newsletter') }}</label>

							<p class="form_title">{{ __('translate.companies_register_message_4') }}</p>

							<p class="form_title">{{ __('translate.companies_register_username_label') }}</p>
							<div class="required_field">
								<input name="username" type="text" required>
							</div>

							<p class="form_title">{{ __('translate.companies_register_password_label') }}</p>
							<div class="required_field">
								<input name="password" type="password" style="width: calc(100% - 30px);" required>
							</div>

							<p class="form_title">{{ __('translate.companies_register_confirm_password_label') }}</p>
							<div class="required_field">
								<input name="password" type="password" style="width: calc(100% - 30px);" required>
							</div>
						</div>

						<div class="login_reg_form_item">
							<p class="form_title">{{ __('translate.companies_register_person_question') }}</p>

							<label for="" style="display: inline-block; margin-right: 10px;"><span>{{ __('translate.companies_register_person_answer_1') }}</span> <input type="radio" name="authorized_person" value="1" checked="checked">
							</label>

							<label for="" style="display: inline-block;"><span>{{ __('translate.companies_register_person_answer_2') }}</span> <input type="radio" name="authorized_person" class="no_authorized_checkbox" value="0"></label>
							

							
							<div class="authorized_person_for_contact_company none" style="margin-top: 15px;">
								<p class="form_title">{{ __('translate.companies_register_person_title') }}</p>
								
								<p>{{ __('translate.companies_register_person_text') }}</p>
								
								<br>
							
								<p class="form_title">{{ __('translate.companies_register_person_first_name_label') }}</p>
								<input name="administrative_contact_first_name" type="text">

								<p class="form_title">{{ __('translate.companies_register_person_last_name_label') }}</p>
								<input name="administrative_contact_last_name" type="text">

								<p class="form_title">{{ __('translate.companies_register_person_position_label') }}</p>
								<input name="administrative_contact_position" type="text">

								<p class="form_title">{{ __('translate.companies_register_person_business_phone_label') }}</p>
								<input name="administrative_contact_business_phone" type="number">

								<p class="form_title">{{ __('translate.companies_register_person_business_email_label') }}</p>
								<input name="administrative_contact_business_email" type="email" style="width: calc(100% - 30px)">	
							</div>

						</div>
						

						<div class="login_reg_form_item">
							<p class="form_title">{{ __('translate.companies_register_manager_title') }}</p>

							<p>{{ __('translate.companies_register_manager_text') }}</p>
							<br>
							<p class="form_title">{{ __('translate.companies_register_manager_first_name_label') }}</p>
							<input name="manager_first_name" type="text">

							<p class="form_title">{{ __('translate.companies_register_manager_last_name_label') }}</p>
							<input name="manager_last_name" type="text">

							<p class="form_title">{{ __('translate.companies_register_manager_position_label') }}</p>
							<input name="manager_position" type="text">

							<p class="form_title">{{ __('translate.companies_register_manager_business_phone_label') }}</p>
							<input name="manager_phone" type="number">

							<p class="form_title">{{ __('translate.companies_register_manager_business_email_label') }}</p>
							<input name="manager_email" type="email" style="width: calc(100% - 30px)">

							<small>{{ __('translate.companies_register_manager_business_email_description') }}</small>
						</div>

						<div class="login_reg_form_item">
							<p class="form_title">{{ __('translate.companies_register_manager_title') }}</p>

							<p style="color: #d42929;font-family: open_sans_bold;">{{ __('translate.companies_register_manager_important') }}</p>
							<br>
							<p>{{ __('translate.companies_register_manager_after_important_string') }}</p>
							<br>
							<p>{{ __('translate.companies_register_manager_after_important_text') }}</p>
						</div>

						<div class="login_reg_form_item">

							<div style="text-align: center;">
								<img src="images/employers/test-employer.jpg" alt="">
							</div>

							<p class="form_title">{{ __('translate.companies_register_enter_key_label') }}</p>
							<input type="text">
						</div>
						 {{ csrf_field() }}
						<div class="login_reg_form_item login_reg_form_submit">
							<input type="submit" value="{{ __('translate.companies_register_create_account_button') }}">
						</div>
					</div>
				</form>

				<script>
					$('#company_reg_form').validate();
					$(document).ready(function(){
						$('#vat_div').css('display','none');
					});
					$('#company_organization_yes').click(function(){
						$('#vat_div').css('display','block');
						$('#company_organization_yes').prop('checked',true);
						$('#company_organization_no').prop('checked',false);
					});
					$('#company_organization_no').click(function(){
						$('#vat_div').css('display','none');
						$('#company_organization_no').prop('checked',true);
						$('#company_organization_yes').prop('checked',false);
					});
				</script>
			</div>
		</main>
@endsection