@extends('layouts.master')

@section('content')
@if(session('message'))
    <h4 style="text-align: center; margin-bottom: 15px;color: #ff5c5c;">{{ session('message') }}</h4>
@endif
<main class="main_app_container home_page">
    @include('layouts.messages')
    <div class="home_search_job_employers_section cf">

        <!-- Home Job Search Section -->
        <div class="home_search_job">
            <form class="home_search_job_form cf" action="{{ route('getSearchResults') }}" method="GET">
                
                <!-- Home Main Job Search: location and job category -->
                <div class="home_search_job_main cf">   
                    <div class="home_search_job_item search_location_holder">
                        <p class="home_search_job_item_title">{{ __('translate.filters_search_position_label') }}</p>
                        <input type="text" id="" name="term" placeholder="{{ __('translate.filters_search_position_placeholder') }}">
                    </div>

                    <div class="home_search_job_item job_category">

                        <p class="home_search_job_item_title">{{ __('translate.filters_categories_label') }}</p>
                        
                        <p class="job_search_option_triger">{{ __('translate.filters_categories_dropdown') }}<i class="fa fa-angle-down" aria-hidden="true"></i><i class="fa fa-angle-up" aria-hidden="true"></i></p>

                        <div class="options_checkbox">
                        @foreach( App\Category::getCategories() as $category)
                            <label for="category" id="category">
                                <span>{{ $category->name }}</span>
                                <input id="category" type="checkbox" name="category[]" value="{{$category->id}}">
                            </label>
                        @endforeach
                        </div>

                    </div>
                </div>
                <!-- End Home Main Job Search -->
                
                <!-- Btn Submit Form and Filters Search -->
                <div class="cf">
                    <div class="filter_search_triger">
                        <p><i class="fa fa-sort-desc" aria-hidden="true"></i><i class="fa fa-sort-asc" aria-hidden="true"></i>{{ __('translate.filters_search_filters') }}</p>
                    </div>

                    <div class="btn_job_search_home_submit">
                        {{ csrf_field() }}
                        <input type="submit" value="{{ __('translate.filters_button') }}" class="confirm_btn">
                    </div>
                </div>
                <!-- End Btn Submit Form and Filters Search -->
                
                <!-- Home Filters Job Section -->
                <div class="search_job_filters_holder cf">
                    
                    <div class="search_job_filters_content">
                        <div class="home_search_job_item search_job_filters_item">

                            <p class="home_search_job_item_title">{{ __('translate.filters_job_type_label') }}</p>

                            <p class="job_search_option_triger">{{ __('translate.filters_job_type_dropdown') }}<i class="fa fa-angle-down" aria-hidden="true"></i><i class="fa fa-angle-up" aria-hidden="true"></i></p>
                            
                            <div class="options_checkbox">
                                <label for="job_type">
                                    <span>{{ __('translate.job_type_option_1') }}</span>
                                    <input type="checkbox" name="job_type[]" value="0">
                                </label>

                                <label for="job_type">
                                    <span>{{ __('translate.job_type_option_2') }}</span>
                                    <input type="checkbox" name="job_type[]" value="1">
                                </label>
                                <label for="job_type">
                                    <span>{{ __('translate.job_type_option_3') }}</span>
                                    <input type="checkbox" name="job_type[]" value="2">
                                </label>
                                <label for="job_type">
                                    <span>{{ __('translate.job_type_option_4') }}</span>
                                    <input type="checkbox" name="job_type[]" value="3">
                                </label>
                            </div>
                        </div>

                    <div class="home_search_job_item search_job_filters_item">

                        <p class="home_search_job_item_title">{{ __('translate.filters_level_label') }}</p>

                        <p class="job_search_option_triger">{{ __('translate.filters_level_dropdown') }}<i class="fa fa-angle-down" aria-hidden="true"></i><i class="fa fa-angle-up" aria-hidden="true"></i></p>
                        
                        <div class="options_checkbox">
                            <label for="career_level">
                                <span>{{ __('translate.level_option_1') }}</span>
                                <input type="checkbox" name="career_level[]" value="0">
                            </label>

                            <label for="career_level">
                                <span>{{ __('translate.level_option_2') }}</span>
                                <input type="checkbox" name="career_level[]" value="1">
                            </label>
                            <label for="career_level">
                                <span> {{ __('translate.level_option_3') }}</span>
                                <input type="checkbox" name="career_level[]" value="2">
                            </label>
                        </div>
                    </div>

                    <div class="home_search_job_item search_job_filters_item">

                        <p class="home_search_job_item_title">{{ __('translate.filters_foreign_languages_label') }}</p>

                        <p class="job_search_option_triger">{{ __('translate.filters_foreign_languages_dropdown') }}<i class="fa fa-angle-down" aria-hidden="true"></i><i class="fa fa-angle-up" aria-hidden="true"></i></p>

                        <div class="options_checkbox">
                            @foreach(App\Language::getLanguages() as $language)
                                <label for="language">
                                    <span>{{ $language->language }}</span>
                                    <input type="checkbox" name="language[]" value="{{ $language->id }}">
                                </label>
                            @endforeach
                        </div>

                    </div>

                    <div class="home_search_job_item search_job_filters_item">
                    
                        <p class="home_search_job_item_title">{{ __('translate.filters_salary_from_label') }}</p>

                        <input class="filter_text_item" type="number" name="salary_from">

                        <div class="option filter_text_item_currency">
                            <label for="currency">
                                <span>EUR</span>
                                <input type="radio" name="currency" value="EUR">
                            </label>

                            <label for="career_level">
                                <span>RSD</span>
                                <input type="radio" name="currency" value="RSD">
                            </label>
                            <label for="career_level">
                                <span>USD</span>
                                <input type="radio" name="currency" value="USD">
                            </label>
                        </div>
                    
                    </div>
                    <div class="home_search_job_item search_job_filters_item">
                    
                        <p class="home_search_job_item_title">{{ __('translate.filters_city_label') }}</p>

                        <input class="filter_text_item" type="text" name="city" placeholder="{{ __('translate.filters_city_placeholder') }}">
                    
                    </div>

                    </div>

                </div>
                <!-- Home Filters Job Section -->

            </form>
        </div>
        <!-- End Home Search Job Section -->
        
        <!-- Home Top Employers Section -->
        <div class="home_top_employers_top_jobs cf">

            <div class="home_top_employers cf">
                <h3 class="section_title"><span>{{ __('translate.front_top_employers') }}</span></h3>
                @if(count($companies) > 0)
                <ul class="home_top_employers_grid cf">
                    @foreach($companies as $company)
                    <li>
                        <a href="{{ route('getCompanyProfile', ['cid' => $company->id]) }}">
                        @if($company->image)
                            <img src="{{ URL::to('/public') . $company->image['path'] }}" alt="">
                        @endif
                        <small class="bold">{{ $company->company_name }}</small>
                        </a>
                    </li>
                    @endforeach
                </ul>
                @endif
            </div>


            <div class="home_top_jobs cf">
           
                <h3 class="section_title"><span>{{ __('translate.front_top_jobs') }}</span></h3>
               
                
                <ul class="home_top_jobs_grid cf">
                @foreach($ads as $ad)
                    @if($ad->company)
                        @if($ad->confidential == 0)
                    <li class="home_top_jobs_grid_item">
                        <span class="home_top_jobs_grid_item_header cf">
                                <span class="home_top_jobs_grid_item_logo">
                                
                                    <a href="{{ route('getSpecificJob', ['jid' => $ad->id, 'cid' => $ad->company->id]) }}" >
                               
                                        <img src="{{ URL::to('/public')}}/photos/naposaologo.png" alt="">
                                        
                                    </a>
                                </span>

                                <h3 class="bold home_top_jobs_grid_item_company">
                                    <a href="{{ route('getCompanyProfile', ['cid' => $ad->company->id]) }}">{{ $ad->company->company_name }}</a>
                                </h3>
                        </span>

                        <p class="bold home_top_jobs_grid_item_descript">
                            <a href="{{ route('getSpecificJob', ['jid' => $ad->id, 'cid' => $ad->company->id]) }}">{{ $ad->position }}</a>
                            <span style="float:right">{{ $ad->dateFormat($ad->expiration_date)->toFormattedDateString() }}</span>
                        </p>
                        @if($ad->categories)
                            @if(count($ad->categories) > 1)
                                <div class="tob_job_home_category">
                                    <small>{{ $ad->categories->first()->name }}...</small>
                                </div>
                            @else
                                <div class="tob_job_home_category">
                                    <small>{{ $ad->categories->first()->name }}</small>
                                </div>
                            @endif
                        @endif
                    </li>
                        @elseif($ad->confidential == 1)
                        <li class="home_top_jobs_grid_item">
                            <span class="home_top_jobs_grid_item_header cf">
                                <span class="home_top_jobs_grid_item_logo">
                                    
                                    <a href="{{ route('getSpecificJob', ['jid' => $ad->id, 'cid' => $ad->company->id]) }}" >
                                    
                                        <img src="{{ URL::to('/public')}}/photos/naposaologo.png" alt="">
                            
                                    </a>
                                </span>
                            </span>
                            <p class="bold home_top_jobs_grid_item_descript">
                                <a href="{{ route('getSpecificJob', ['jid' => $ad->id, 'cid' => $ad->company->id]) }}">{{ $ad->position }}</a>
                                <span style="float:right">{{ $ad->dateFormat($ad->expiration_date)->toFormattedDateString() }}</span>
                            </p>
                            @if($ad->categories)
                                @if(count($ad->categories) > 1)
                                    <div class="tob_job_home_category">
                                        <small>{{ $ad->categories->first()->name }}...</small>
                                    </div>
                                @else
                                    <div class="tob_job_home_category">
                                        <small>{{ $ad->categories->first()->name }}</small>
                                    </div>
                                @endif
                            @endif
                        </li>
                        @endif
                    @endif
                @endforeach
                </ul>
            </div>
        </div>
       
        
        <!-- End Top Employers Section -->
    </div>
</main>
@if(Session::has('msg'))
<div class="popUp pop_up_registration_success">
    <div class="pop_up_registration_success_content">
        <p>{{ __('translate.msg_registration_complete') }}</p>
        <p>{{ __('translate.msg_registration_confirm') }}</p>
        <button class="pop_up_registration_success_btn">{{ __('translate.msg_ok') }}</button>
    </div>
</div> 
@endif

<!-- <script type="text/javascript">

      $(document).click(function() {

       $(".search_job_filters_holder").click(function(e) {
            e.stopPropagation(); // if you click on the div itself it will cancel the click event.
        });

</script> -->

@endsection
