@extends('layouts.master')
@section('content')
 
<h1 class="page_title main_page_title">{{ __('translate.user_profile_h1') }}</h1>

<main class="main_app_container">
	<div class="user_profile_content cf">
		<div class="user_profile_main">
			<div class="user_profile_main_header">
				<div class="user_profile_image user_profile_item">
					<div class="user_profile_image_holder">
						<span>
							<img src="{{ URL::to('/public') . $avatar }}" alt="">
						</span>

						<form action="{{ route('updateAvatar') }}" method="POST" enctype="multipart/form-data" id="upload_avt_form">
                            {{Form::open(array('route' => 'updateAvatar','method'=>'POST', 'files'=>true))}}
                            <div class="edit_info_window change_image_edit_info_window" id="avatar_input" style="display:none">
                            	<p class="simulat_choose_img">{{ __('translate.user_profile_choose_image') }}</p>
                                <input type="file" name="data_input">
                            
                            </div>
                            <div class="edit_info_window" id="avatar_input2" style="display:none">
                                {{ csrf_field() }}
                  				<button type="submit" value="{{ __('translate.companies_register_step_2_upload_button') }}" class="confirm_edit_btn blue_btn"><i class="fa fa-check" aria-hidden="true"></i></button>
      						</div>
     		           </form>

						<a class=" editProfileImg" id="avatar" href="{{ route('imageCrop2') }}">	
							
						</a>

					<button type="button" class="btn btn-primary change_profile_photo_btn" data-toggle="modal" data-target="#exampleModal">
						Change photo<i class="fa fa-pencil" aria-hidden="true"></i>
					</button>
						<br>
						<!-- <div class="edit_info_window change_image_edit_info_window" id="avatar_input" style="display:none">
							<input type="file">
							<button class="confirm_edit_btn blue_btn">Choose image</button>
						</div>
				
						</div> -->
					</div>
					<div class="edit_info_window" id="avatar_input2" style="display:none">
						<button class="confirm_edit_btn blue_btn"><i class="fa fa-check" aria-hidden="true"></i></button>
					</div>
				</div>

				<div class="user_profile_name_holder user_profile_item">
					<p class="user_profile_name">
					<span>{{ Session::get('user')->first_name }} {{Session::get('user')->last_name}}</span>
					</p>
					

				</div>


	

				

				<!-- <div class="user_profile_about user_profile_item">
					<p class="user_profile_about_text">
					<span id="description_span">{{ Session::get('user')->description }}</span>
						<a class="edit_link" id="description">	
							<i class="fa fa-pencil" aria-hidden="true"></i>
						</a>
					</p>
					
					<div class="edit_info_window" id="description_input" style="display:none">
						<textarea name="" cols="30" rows="10" width="100%" placeholder="Say something about you"></textarea>

						<button class="confirm_edit_btn blue_btn" id="description_btn">Confirm <i class="fa fa-check" aria-hidden="true"></i></button>
					</div>
				</div> -->
			</div>
		</div>


		<div class="user_profile_sidebar">
			<div class="user_profile_sidebar_item">
				<p class="bold">{{ __('translate.user_profile_email_label') }}</p>
				<span>{{ Session::get('user')->email }}</span>
			</div>

			<div class="user_profile_sidebar_item">
				<p class="bold">{{ __('translate.user_profile_gender_label') }}</p>
				<span>{{ Session::get('user')->gender }}</span>
			</div>
			<div class="user_profile_sidebar_item">
				<p class="bold">{{ __('translate.user_profile_phone_label') }}</p>
				<span id="phone_span">{{ Session::get('user')->phone }}</span>
				<a class="edit_link" id="phone">	
					<i class="fa fa-pencil" aria-hidden="true"></i>
				</a>

				<div class="edit_info_window"  id="phone_input" style="display:none">
					<input type="text" placeholder="{{ __('translate.user_profile_phone_placeholder') }}">
					<button class="confirm_edit_btn blue_btn" id="phone_btn"><i class="fa fa-check" aria-hidden="true"></i></button>
				</div>
			</div>
		
			</div>
		</div>

<script>
	$('#myModal').on('shown.bs.modal', function () {
	$('#myInput').trigger('focus')
	})

</script>



	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

		<div class="modal-dialog modal_profile_photo" role="document">
			<div class="modal-content">
			<div class="modal-header modal_header">
				<h5 class="modal-title" id="exampleModalLabel">Select Image</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<div class="modal-body">
		<div class="panel-body">


	<div class="row">


		<div class="col-md-6 text-center">

		<div id="upload-demo" ></div>

		</div>

		<div class="col-md-6" >

		<div class="choose_profile_photo">
			<input type="file" id="upload">
			<div class="mask_btn">Choose Image</div>
		</div>

	
		<div class="upload_profile_photo">
			<a href="" class="btn_upload_profile_photo upload-result">Upload Image</a>
		</div>



</main>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js" integrity="sha384-FzT3vTVGXqf7wRfy8k4BiyzvbNfeYjK+frTVqZeNDFl8woCbF0CYG6g2fMEFFo/i" crossorigin="anonymous"></script>


<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>

<script src="http://demo.itsolutionstuff.com/plugin/croppie.js"></script>

<link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">

<link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/croppie.css">

<meta name="csrf-token" content="{{ csrf_token() }}">


<!-- Ajax upload profile photo -->
<script>
$.ajaxSetup({

headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}

});


$('#upload').on('change', function () { 

	var reader = new FileReader();

    reader.onload = function (e) {
    	$uploadCrop.croppie('bind', {
    		url: e.target.result
    	}).then(function(){
    		console.log('jQuery bind complete');
    	});
    }
    reader.readAsDataURL(this.files[0]);
});



// If file is choosen hide upload BTN
$(function() {
     $("#upload").change(function (){
		$(".choose_profile_photo").hide();
		$(".upload-result").css('display','inline-block');
     });
  });
//Ajax upload profile photo
$.ajaxSetup({

headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}

});

$uploadCrop = $('#upload-demo').croppie({
    enableExif: true,
    viewport: {
        width: 200,
        height: 200,
        type: 'circle'
    },

    boundary: {
        width: 250,
        height: 250
    }
});

$('#upload').on('change', function () { 

	var reader = new FileReader();

    reader.onload = function (e) {
    	$uploadCrop.croppie('bind', {
    		url: e.target.result
    	}).then(function(){
    		console.log('jQuery bind complete');
    	});
    }
    reader.readAsDataURL(this.files[0]);
});


$('.upload-result').on('click', function (e) {
	e.preventDefault();
	$uploadCrop.croppie('result', {
		type: 'canvas',
		size: 'viewport'
	}).then(function (resp) {

		$.ajax({
			url: "/updateAvatar",
			type: "POST",
			data: {"image":resp},
			success: function (data) {
				html = '<img src="' + resp + '" />';
				location.reload();
			}
		});

	});

});

	 $(document).click(function() {
	
// dugme da se pojavljuje i nestaje

        $('.confirm_edit_btn').css('display','none');
	 	$('#avatar').css('display','inline-block');
	 	$('#avatar_input').css('display','none');
	 	$('#avatar_input2').css('display','none');
        });

	 	$('.edit_link').click(function(e){
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

   		$('#education_input input').click(function(e){
   			e.stopPropagation();
			$(this).next().css('display','inline-block');
		});

		$('#avatar_input2 button').click(function(e){
   			e.stopPropagation();
		});

		$('.user_profile_sidebar').click(function(e){
			e.stopPropagation();
		});


// avatar/ profile image   - nezavrsen
 
	$('#avatar').click(function(){
			$(this).css('display', 'none');
			$('#avatar_input').css('display','block');
			$('#avatar_input2').css('display','block');
			$('#avatar_input2 button').css('display','inline-block');
		});

		$('#avatar_input2').click(function(e){
			e.preventDefault();
			$('#avatar').css('display','block');	
			$('#avatar_input').css('display','none');
			$('#avatar_input2').css('display','none');
		});
	// 		var data_input = $('#avatar_input input')[0].files[0];
	// 		console.log(data_input);
	// 		$.ajax({
	// 		  method: "POST",
	// 		  url: "/updateAvatar",
	// 		     contentType:false,
 //               	 cache: false,
 //             	 processData:false,
	// 		  data: {
	// 		  	'_token': $('meta[name="csrf-token"]').attr('content'),
	// 		  	data_input:data_input
	// 		  },
	// 		  // headers: {
 //     //  				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	// 				// },
	// 			})
	//            .done(function(data)
	// 	           {
	// 	            console.log(data);
	// 	           })



// // avatar/ profile image   - nezavrsen

// 	$('#avatar').classick(function(){
// 			$(this).css('display', 'none');
// 			$('#avatar_input').slideToggle('slow');
// 		});

// 		$('#avatar_input button').click(function(e){
// 			e.preventDefault();
// 			$('#avatar').css('display','block');	
// 		});

		// });   ???


		//ako su prazni da stoje otvoreno 
		$(document).ready(function(){
		
		if ($('#phone_span').text() == "") {
			$('#phone_input').css('display','block');
			$('#phone').css('display','none');
			$('#phone_btn').css('display','none');
			
		};
		


		$('#upload_avt_form').click(function(e){
			e.stopPropagation();
		})
	});
		


// phone

	$('#phone').click(function(){
			$(this).css('display', 'none');
			var pho_span = $('#phone_span').text();
			$('#phone_span').css('display','none');
			$('#phone_input').css('display', 'flex');
			$('#phone_input input').val(pho_span).focus();
		});

			//

			$('#phone_input button').click(function(e){
				e.preventDefault();
				$('#phone').css('display', 'block');
				$('#phone_span').css('display','block');
				$('#phone_input').css('display','none');
				var data_input = $('#phone_input input').val();
				$('#phone_span').html(data_input);
				$.ajax({
					  method: "POST",
					  url: "/updatePhone",
					  data: {
					  	data_input:data_input,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			           .done(function(data)
				           {
				            console.log(data);
				           })


			});

		
</script>

@endsection