@extends('layouts.master')

@section('content')

    <h1 class="page_title main_page_title">{{ __('translate.cv_step_2_h1') }}</h1>

    <main class="main_app_container">
	@include('layouts.errors')
        <div class="login_register_container">

            <form action="{{ route('createEducation') }}" method="GET" class="login_reg_form">
            <div class="login_reg_form_item">
            <h2 class="cv_title">{{ __('translate.cv_step_2_education') }}</h2>
            <hr>
            @if(count($cv->education) > 0)
                @foreach($cv->education as $education)
                    <div class="applicants_for_job_list create_cv_education_section">
						<p class="form_title"><strong>{{ __('translate.cv_step_2_period') }} </strong><span>{{ $education->month_from }} {{ $education->year_from }} - {{ $education->month_to }} {{ $education->year_to }}</span></p>
						<p class="form_title"><strong>{{ __('translate.filters_level_label') }}: </strong><span>{{ $education->level }}</span></p>
						<p class="form_title"><strong>{{ __('translate.cv_step_2_school') }} </strong><span>{{ $education->school }}</span></p>
						<p class="form_title"><strong>{{ __('translate.label_location') }} </strong><span>{{ $education->location }}</span></p>
						@if($education->description)
						<p class="form_title"><strong>{{ __('translate.cv_step_2_description') }} </strong><span>{{ $education->description }}</span></p>
						@endif
                    </div>
					<hr>
                @endforeach
            @endif
            
            <div class="popup_new_job_user_form_item cf user_from_to_period_cv_education">
                <div class="user_from_to_period">
                    <p class="form_title">{{ __('translate.user_new_job_from_year') }}</p>
                    <select name="year_from" id="education_job_years_from" required>
					    <option value="">{{ __('translate.user_new_job_choose_year') }}</option>
					    <script>
					        var year = 2018;
					        while(year > 1930) {
						        $('#education_job_years_from').append(`<option value="`+ year +`">`+ year-- +`</option>`); 
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
                    <select name="year_to" id="education_job_years_to" required>
					    <option value="">{{ __('translate.user_new_job_choose_year') }}</option>
					    <script>
						    var year = 2018;
						    while(year > 1930) {
							    $('#education_job_years_to').append(`<option value="`+ year +`">`+ year-- +`</option>`); 
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

			<p class="form_title"><strong>{{ __('translate.cv_step_2_school') }}* </strong><input id="school" name="school" type="text" required></p>

			<p class="form_title"><strong>{{ __('translate.label_location') }}* </strong><input id="location" name="location" type="text" required></p>
			<hr>

			<p class="form_title"><strong>{{ __('translate.filters_level_label') }}:* </strong></p>
			<select id="level" name="level">
				<option value="">{{ __('translate.cv_choose') }}</option>
				<option value="Secondary school">{{ __('translate.cv_step_2_secondary_school') }}</option>
				<option value="Professional">{{ __('translate.cv_step_2_professional') }}</option>
				<option value="College">{{ __('translate.cv_step_2_college') }}</option>
				<option value="Bachelor's degree">{{ __('translate.cv_step_2_bachelor') }}</option>
				<option value="Master's degree">{{ __('translate.cv_step_2_master') }}</option>
				<option value="Doctorate">{{ __('translate.cv_step_2_doctorate') }}</option>
			</select>

			<p class="form_title"><strong>{{ __('translate.cv_step_2_description') }}</strong></p>
            <textarea id="description" name="description" rows="3" cols="50"></textarea>

            <input id="cv_id" type="hidden" name="cv_id" value="{{ $cv->id }}">

            {{ csrf_field() }}
            <div class="login_reg_form_item login_reg_form_submit" style="margin-top: 20px;">
				<input id="btnSaveCvStep2" class="green_btn" type="submit" value="{{ __('translate.user_profile_save_button') }}">
			</div>

           		<a class="next_btn_cv" href="{{ route('getWorkHistory',['cvid' => $cv->id]) }}">{{ __('translate.next') }}</a>
             </div>
            </form>
        </div>

    </main>
	
	
@endsection