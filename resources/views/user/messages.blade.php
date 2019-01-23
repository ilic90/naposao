@extends('layouts.master')

@section('content')
<h1 class="page_title main_page_title">{{ __('translate.user_messages_h1') }}</h1>
<main class="main_app_container">

	<ul class="applicants_for_job_list">
	@if(!$applications->first())
		{{ __('translate.user_messages_no_messages') }}
	@endif
	@foreach($applications as $application)
		<li class="applicants_for_job_item">
			<h3 class="bold">
				<a href="{{ route('getUserConversation', ['aid' => $application->id]) }}">{{ __('translate.user_messages_application_for') }}<span>{{ $application->ad->position }}</span></a>
			</h3>
			<p >
			@php 
			$unreadMessages = 0; 
			
			foreach($application->messages as $message){
				if($message->user_read == 0){
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
				<span class="applications_date_for_job"><span class="bold">{{ __('translate.user_messages_date') }}</span> {{ $application->created_at->toFormattedDateString() }} </span>
				@if($application->ad->confidential == 0)
				<span class="applications_user_for_job"><span class="bold">{{ __('translate.user_messages_company') }}</span> <a href="{{ route('getCompanyProfile', ['cid' => $application->company->id]) }}">{{ $application->company->company_name }}</a></span>
				@endif
			</div>
		</li>
	@endforeach
	</ul>
</main>

@endsection
