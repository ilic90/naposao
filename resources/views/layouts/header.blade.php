
<header class="main_header">

@php
    if(Session::has('user')){
        $uid = Session::get('user')->id;
        $unreadMessages = App\Message::where('user_id',$uid)->where('user_read',0)->get();
        $userUnreadMessages = count($unreadMessages);
    }
    if(Auth::check()){
        $cid = Auth::user()->id;
            $applications = App\Application::where('company_id',$cid)->get();
            $companyUnreadMessages = 0;
            foreach($applications as $application){
                foreach($application->messages as $message){
                    if($message->company_read == 0){
                        $companyUnreadMessages++;
                    }
                }
            }
    }
@endphp

            <div class="main_header_reg_lang_menu cf">
            
                    
                <div class="main_header_reg_lang_menu_content">
                    <ul class="header_login_reg_holder cf">
                        <li><i class="fa fa-sign-in" aria-hidden="true"></i></li>
                        @if(Auth::check())
                            <li>
                                <a href="{{ route('logout') }}">{{ __('translate.header_logout') }}</a>
                            </li>
                        @elseif(Session::has('user'))
                            <li>
                                <a href="{{ route('logout') }}">{{ __('translate.header_logout') }}</a>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('getUserLogin') }}">{{ __('translate.header_login_users') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('getCompanyLogin') }}">{{ __('translate.header_login_companies') }}</a>
                            </li>
                        @endif
                    </ul>

                <ul class="choose_lang_header cf">
                        <li>
                            <a href="{{ URL::to('/')}}/lang/sr">
                                <img src="{{ URL::to('/public')}}/photos/serbian-flag-graphic.png" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="{{ URL::to('/')}}/lang/en">
                                <img src="{{ URL::to('/public')}}/photos/british-flag-graphic.png" alt="">
                            </a>
                        </li>
                    </ul>
                    
                </div>
            </div>

            <div class="main_header_top cf"> 
                <a href="{{ URL::to('/')}}" class="logo_header_holder animated bounceInLeft">
                    <img src="{{ URL::to('/public')}}/photos/naposaologo.png" alt="">
                </a>

                <nav class="main_nav">
                    <ul class="cf">
                     @if(Session::has('user'))
                        <li>
                            <a href="{{ route('getUserProfile') }}">{{ __('translate.user_menu_profile') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('getUserFavorites') }}">{{ __('translate.user_menu_favorites') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('getHistory') }}">{{ __('translate.user_menu_history') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('getMessages') }}">{{ __('translate.user_menu_messages') }}@if($userUnreadMessages > 0) : {{ $userUnreadMessages }}@endif</a>
                        </li>
                        <li>
                            <a href="{{ route('getCV') }}">{{ __('translate.user_menu_cv') }}</a>
                        </li>
                        @if(Session::get('user')->is_admin)
                            <li>
                                <a href="{{ route('getAdminPanel') }}">{{ __('translate.user_menu_admin_panel') }}</a>
                            </li>
                        @endif
                    @endif
                    @if(Auth::check())
                        <li>
                            <a href="{{ route('addNewJob') }}">{{ __('translate.companies_menu_new_job') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('getCompanyProfile', ['cid' => Auth::user()->id]) }}">{{ __('translate.companies_menu_profile') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('getApplications') }}">{{ __('translate.companies_menu_applications') }}@if($companyUnreadMessages > 0) : {{ $companyUnreadMessages }}@endif</a>
                        </li>
                        <li>
                            <a href="{{ route('getAllJobs') }}">{{ __('translate.companies_menu_ads') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('getInvoices') }}">{{ __('translate.companies_menu_invoices') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('getPayment') }}">{{ __('translate.companies_menu_credits') }}{{ Auth::user()->balance }}</a>
                        </li>
                    @endif
                    </ul>
                </nav>
                @if(Session::has('user') || Auth::check())
                <a href="#" class="mob_menu_icon">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </a>
                @endif
                <nav class="main_nav_mob">
                    <ul class="cf">
                     @if(Session::has('user'))
                        <li>
                            <a href="{{ route('getUserProfile') }}">{{ __('translate.user_menu_profile') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('getUserFavorites') }}">{{ __('translate.user_menu_favorites') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('getHistory') }}">{{ __('translate.user_menu_history') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('getMessages') }}">{{ __('translate.user_menu_messages') }}@if($userUnreadMessages > 0) : {{ $userUnreadMessages }}@endif</a>
                        </li>
                         <li>
                            <a href="{{ route('getCV') }}">{{ __('translate.user_menu_cv') }}</a>
                        </li>
                        @if(Session::get('user')->is_admin)
                            <li>
                                <a href="{{ route('getAdminPanel') }}">{{ __('translate.user_menu_admin_panel') }}</a>
                            </li>
                        @endif
                    @endif
                    @if(Auth::check())
                        <li>
                            <a href="{{ route('addNewJob') }}">{{ __('translate.companies_menu_new_job') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('getCompanyProfile', ['cid' => Auth::user()->id]) }}">{{ __('translate.companies_menu_profile') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('getApplications') }}">{{ __('translate.companies_menu_applications') }}@if($companyUnreadMessages > 0) : {{ $companyUnreadMessages }}@endif</a>
                        </li>
                        <li>
                            <a href="{{ route('getAllJobs') }}">{{ __('translate.companies_menu_ads') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('getInvoices') }}">{{ __('translate.companies_menu_invoices') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('getPayment') }}">{{ __('translate.companies_menu_credits') }}{{ Auth::user()->balance }}</a>
                        </li>
                    @endif
                    </ul>
                </nav>
            </div>

            <div class="main_header_bottom cf">
                <div class="main_header_bottom_bottom">
                    <div class="main_header_bottom_left">
                        <p>
                            <a href="{{ route('getJobs') }}">{{ __('translate.header_all_job_offers') }}<span>{{ App\Ad::countAll() }}</span></a>
                        </p>
                    </div>

                    <div class="main_header_bottom_right">
                        <p>
                            <a href="{{ route('getToday') }}">{{ __('translate.header_today_job_offers') }}<span>{{ App\Ad::countLastDay() }}</span></a>
                        </p>
                    </div>
                </div>
            </div>
        </header>
       