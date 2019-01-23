@extends('layouts.master')
@section('content')
<h1 class="page_title main_page_title">{{ __('translate.company_applications_h1') }}</h1>

<main class="main_app_container">
	<ul class="comapny_user_coversation" style="list-style-type: none;">
		@foreach($applications as $application)
				<li class="applicants_for_job_item">
					<h3 class="bold">
						<a href="{{ route('getConversation', ['aid' => $application->id]) }}">{{ __('translate.company_applications_for') }}<span>{{ $application->ad->position }}</span></a>
					</h3>
					<p >
						@php 
							$unreadMessages = 0; 
							
							foreach($application->messages as $message){
								if($message->company_read == 0){
									$unreadMessages++;
								}
							}
							if($unreadMessages > 0){
								echo	"You have ".$unreadMessages." unread messages";
							}else{
								echo "You don't have unread messages";
							}
				
						@endphp
					</p>
					<div class="footer_applicants_for_job_item cf">
						<span class="applications_date_for_job"><span class="bold">{{ __('translate.company_applications_date') }}</span> {{ $application->created_at->toFormattedDateString() }} </span>
						<span class="applications_user_for_job"><span class="bold">{{__('translate.company_applications_applicant')  }}</span> <a href="{{ route('getProfile',['uid' => $application->user_id]) }}">{{ $application->user->last_name }} {{ $application->user->first_name }}</a></span>
					</div>
				</li>
		@endforeach
	</ul>
</main>
@endsection