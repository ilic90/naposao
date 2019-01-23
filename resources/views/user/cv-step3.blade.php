@extends('layouts.master')

@section('content')

    
    <h1 class="page_title main_page_title">{{ __('translate.cv_step_3_h1') }}</h1>

    <main class="main_app_container">
    @include('layouts.errors')
        <div class="login_register_container">

            <form action="{{ route('createWorkHistory') }}" method="GET" class="login_reg_form">

<div class="login_reg_form_item">

   <h2><strong>{{ __('translate.cv_step_3_work_experience') }}</strong></h2>
           <hr>
       @if(count($cv->workHistory) > 0)
           @foreach($cv->workHistory as $workHistory)
               <div class="applicants_for_job_list">
               <p class="form_title"><strong>{{ __('translate.cv_step_2_period') }} </strong><span>{{ $workHistory->month_from }} {{ $workHistory->year_from }} - {{ $workHistory->month_to }} {{ $workHistory->year_to }}</span></p>
               <p class="form_title"><strong>{{ __('translate.companies_register_person_position_label') }} </strong><span>{{ $workHistory->position }}</span></p>
               <p class="form_title"><strong>{{ __('translate.cv_step_3_company') }} </strong><span>{{ $workHistory->company_name }}</span></p>
               <p class="form_title"><strong>{{ __('translate.companies_register_business_sector_label') }} </strong><span>{{ $workHistory->business_sector }}</span></p>
               <p class="form_title"><strong>{{ __('translate.label_location') }} </strong><span>{{ $workHistory->location }}</span></p>
               @if($workHistory->description)
               <p class="form_title"><strong>{{ __('translate.cv_step_3_description') }} </strong><span>{{ $workHistory->description }}</span></p>
               @endif
               </div>
               <hr>
           @endforeach
       @endif
           
           <div class="popup_new_job_user_form_item cf">
           <div class="user_from_to_period">
           <p class="form_title">{{ __('translate.user_new_job_from_year') }}</p>
           <select name="year_from" id="work_job_years_from" required>
           <option value="">{{ __('translate.user_new_job_choose_year') }}</option>
               <script>
                   var year = 2018;
                   while(year > 1930) {
                       $('#work_job_years_from').append(`<option value="`+ year +`">`+ year-- +`</option>`); 
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
           <select name="year_to" id="work_job_years_to" required>
           <option value="">{{ __('translate.user_new_job_choose_year') }}</option>
               <script>
                   var year = 2018;
                   while(year > 1930) {
                       $('#work_job_years_to').append(`<option value="`+ year +`">`+ year-- +`</option>`); 
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
               <input type="submit" value="{{ __('translate.user_profile_save_button') }}">
           </div>
           
       </div>

        <a class="finish_btn" href="{{ route('storePdf', ['cvid' => $cv->id]) }}">{{ __('translate.finish') }}</a>
   </form>
   
        </div>

    </main>

@endsection