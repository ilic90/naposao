@extends('layouts.master')

@section('content')

<main class="main_app_container">
		
<div class="creating_comp_buisness_card_holder">
	<p style="text-align: center;">{{ __('translate.companies_register_step_3_string') }}</p>
	<form action="{{ route('postCompanyRegisterStep3') }}" method="POST" class="creating_comp_buisness_card_form" id="comp_buisness_card">
		<div class="creating_comp_buisness_yes_no_section">
			<p class="form_title">{{ __('translate.companies_register_step_3_question') }}</p>
		
			<label for="office_out_country" style="margin-right: 10px;">
				{{ __('translate.companies_register_step_3_answer_1') }}
				<input type="radio" value="1" name="office_out_country">
			</label>

			<label for="office_out_country">
			{{ __('translate.companies_register_step_3_answer_2') }}
				<input type="radio" value="0" name="office_out_country">
			</label>
		</div>
		
		<div class="office_out_country_section none">
			<div class="office_out_country_section_item">
				<p class="form_title">{{ __('translate.companies_register_step_3_main_activity_label') }}</p>
				<div class="required_field">
					<textarea name="main_activity" id="" cols="30" rows="10" style="width: 100%" placeholder="{{ __('translate.companies_register_step_3_main_activity_placeholder') }}" required></textarea>
				</div>
			</div>

			<div class="office_out_country_section_item">
				<p class="form_title">{{ __('translate.companies_register_step_3_founded_label') }}</p>
				<div class="required_field">
					<input name="founded_in" type="text" required>
				</div>
			</div>

			<div class="office_out_country_section_item office_out_country_no none">
				<p class="form_title">{{ __('translate.companies_register_step_3_started_bulgaria_label') }}</p>
				<div class="required_field">
					<input name="started_at" type="text">
				</div>
			</div>

			<div class="office_out_country_section_item office_out_country_no none">
				<p class="form_title">{{ __('translate.companies_register_step_3_employees_bulgaria_label') }}</p>
				<div class="required_field">
					<input name="number_of_employees_bulgaria" type="number">		
				</div>
			</div>

			<div class="office_out_country_section_item office_out_country_no none">
				<p class="form_title">{{ __('translate.companies_register_step_3_locations_bulgaria_label') }}</p>
				<div class="required_field">
					<input name="locations_bulgaria" type="text" placeholder="Cities where the company has offices/facilities">		
				</div>
			</div>

			<div class="office_out_country_section_item office_out_country_no none">
				<p class="form_title">{{ __('translate.companies_register_step_3_employees_world_label') }}</p>
				<div class="required_field">
					<input name="number_of_employees_worldwide" type="number">		
				</div>
			</div>

			<div class="office_out_country_section_item office_out_country_no none">
				<p class="form_title">{{ __('translate.companies_register_step_3_locations_world_label') }}</p>
				<div class="required_field">
					<input type="text" name="locations_worldwide" placeholder="Countries/cities outside of Bulgaria where the company has offices/facilities">		
				</div>
			</div>

			<div class="office_out_country_section_item location_comp_reg">
				<p class="form_title">{{ __('translate.companies_register_step_3_employees_label') }}</p>
				<div class="required_field">
					<input name="number_of_employees" type="number" placeholder="">		
				</div>
			</div>

			<div class="office_out_country_section_item location_comp_reg">
				<p class="form_title">{{ __('translate.companies_register_step_3_locations_label') }}</p>
				<div class="required_field">
					<input name="locations" type="text" placeholder="">		
				</div>
			</div>

			<div class="office_out_country_section_item">
				<p class="form_title">{{ __('translate.companies_register_step_3_technologies_label') }}</p>
				<p style="margin-bottom: 15px;">{{ __('translate.companies_register_step_3_technologies_description') }}</p>
				<div class="required_field">
					<input name="technologies" type="text" placeholder="{{ __('translate.companies_register_step_3_technologies_placeholder') }}">		
				</div>
			</div>

		</div>

		<div class="office_out_country_section_item" style="text-align: center;">
			<input type="hidden" name="id" value="{{$id}}">
			{{ csrf_field() }}
			<input type="submit" value="{{ __('translate.companies_register_step_3_save_button') }}" class="btn_submit">
			<button class="cancel_btn">{{ __('translate.companies_register_step_3_cancle_button') }}</button>
		</div>
	</form>

	<script>
	$('#comp_buisness_card').validate();
	</script>

	 @if(count($errors)>0)

        <div class="aler alert-danger">

            <ul>

                    @foreach($errors->all() as $error)

                    <li>{{$error}}</li>

                    @endforeach

            </ul>

         </div>

   	@endif

</div>	
</main>
@endsection