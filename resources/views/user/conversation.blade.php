@extends('layouts.master')

@section('content')

<h1 class="page_title main_page_title">{{ __('translate.conversation_h1') }}</h1>

<main class="main_app_container">
	<ul class="comapny_user_coversation">
		
		@foreach($conversation->messages as $message)
		<li class="comapny_user_coversation_item comapny_user_coversation_applicants">
			<div class="comapny_user_coversation_item_name">
				<p><a href=""><i class="fa fa-user-circle" aria-hidden="true"></i> {{$message->last_name}} {{ $message->first_name }} {{ $message->company_name }}</a></p>
			</div>
			 <div class="comapny_user_coversation_item_text">
			 	<p>{{ $message->text }}</p>
			 </div>
			 <div class="time"><span class="timestamp_msg">{{ $message->created_at->toFormattedDateString() }}</span></div>
		</li>
		@endforeach
	</ul>

	<form action="{{ route('postUserMessage') }}" method="POST" class="comapny_user_coversation_msg">
		<textarea required name="text" placeholder="{{ __('translate.conversation_placeholder') }}"></textarea>
		<input class="application_id_msg" type="hidden" name="application_id" value="{{ $conversation->id }}">
		<input  class="msg_first_name" type="hidden" name="first_name" value="{{ Session::get('user')->first_name }}">
		<input class="msg_last_name" type="hidden" name="last_name" value="{{ Session::get('user')->last_name }}">
		<input type="hidden" name="user_id" value="{{ Session::get('user')->id }}">
		<input type="file" name="file" accept="application/pdf" />
		{{ csrf_field() }}
		<div class="comapny_user_coversation_send_btn">
			<input type="submit" value="{{ __('translate.conversation_send_button') }}" class="confirm_btn">
			
		</div>
	</form>
</main>

<script>
/*
$(function(){
   

    function checkMessages(){

        $.ajax({
            type: 'post',
            url: '/updateMessages',  
            dataType: 'json',
            data:  {
            	timestamp: $('.timestamp_msg').last().text(),
            	application_id: $('.application_id_msg').val(),
            	 '_token': $('meta[name="csrf-token"]').attr('content')
            },   
            success: function(data) {
          	if (data[0] !== undefined ) {
           		   var text = data[0].text;
             	   var companyName = data[0].company_name;
                   var timestamp_msg_created = data[0].created_at;
        			$('.comapny_user_coversation').append(
        				`<li class="comapny_user_coversation_item comapny_user_coversation_applicants">
							<div class="comapny_user_coversation_item_name">
								<p><a href=""><i class="fa fa-user-circle" aria-hidden="true"></i>`
								 + companyName + 
								`</a></p>
							</div>
			 				<div class="comapny_user_coversation_item_text">
			 				<p>`
			 				 + text + 
			 				 `</p>
			 				</div>
			 				<div class="time"><span class="timestamp_msg">`
			 				 + timestamp_msg_created + 
			 				 `</span></div>
						</li>`);		
            	}
            },
           complete: function(){
                checkMessagesTimeout = setTimeout(function(){
                    checkMessages();
                }, 5000); 
            }
        });

    }

     $(window).on('load', function (){
        checkMessages();
    });
});

*/
 
</script>


			
		
@endsection
