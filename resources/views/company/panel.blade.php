@extends('layouts.master')

@section('content')

<h1 class="page_title main_page_title">Main Menu</h1>

<main class="main_app_container">
	
	<div class="main_menu_user_profile_holder">

	 	<input class="companies_profile_input" id="tab1" type="radio" name="tabs" checked>
	    <label class="companies_profile_label" for="tab1">Job Offers and Candidates</label>

	    <input class="companies_profile_input" id="tab5" type="radio" name="tabs">
	    <label class="companies_profile_label" for="tab5">Applicants</label>

	    <input class="companies_profile_input" id="tab2" type="radio" name="tabs">
	    <label class="companies_profile_label" for="tab2">Questionaries</label>

	    <input class="companies_profile_input" id="tab3" type="radio" name="tabs">
	    <label class="companies_profile_label" for="tab3">Company Profile</label>

	    <input class="companies_profile_input" id="tab4" type="radio" name="tabs">
	    <label class="companies_profile_label" for="tab4">Invoices</label>	

	    <section class="company_profile_content" id="content1">

			<h2 class="page_title">Job offers</h2>

			<div class="tabs_job_offers">

				<input id="job_offers1" type="radio" name="tabz" checked>
				<label for="job_offers1">All</label>

				<input id="job_offers2" type="radio" name="tabz">
				<label for="job_offers2">Active and awaiting <span>(0)</span></label>

				<input id="job_offers3" type="radio" name="tabz">
				<label for="job_offers3">Inactive</label>
			
				<section id="con1">

					<p class="tab_title bold">All</p>

					<div class="filter_jobs_offer cf">

						<div class="filter_jobs_offer_item">
							<select name="" id="">
								<option value="1">Published</option>
								<option value="2">Awaiting approval</option>
								<option value="3">Stopped</option>
								<option value="4">Expired</option>
								<option value="5">Rejected</option>
							</select>
						</div>

						<div class="filter_jobs_offer_item">
							<select name="" id="">
								<option value="1">All ads</option>
								<option value="2">Messages with messages</option>
								<option value="3">Announcements with new messages</option>
							</select>
						</div>

					</div>

					<a href="{{ route('addNewJob') }}" href="new-job-add.html" class="add_more" style="margin-top: 20px;display: inline-block;">
						<i class="fa fa-plus-square" aria-hidden="true"></i>
						<span>Add new job</span>
					</a>

					<p style="font-size: 16px;color: #444;margin-top: 20px;">*AR (Application Rate) is an indicator of the job ad efficiency, it shows the percentage of applications from the overall job ad views.</p>

				</section>

				<section id="con2">

					<p class="tab_title bold">Active and awaiting</p>

					<div class="filter_jobs_offer cf">

						<div class="filter_jobs_offer_item">
							<select name="" id="">
								<option value="1">Published</option>
								<option value="2">Awaiting approval</option>
								<option value="3">Stopped</option>
								<option value="4">Expired</option>
								<option value="5">Rejected</option>
							</select>
						</div>

						<div class="filter_jobs_offer_item">
							<select name="" id="">
								<option value="1">All ads</option>
								<option value="2">Messages with messages</option>
								<option value="3">Announcements with new messages</option>
							</select>
						</div>

					</div>

					<a href="{{ route('addNewJob') }}" class="add_more" style="margin-top: 20px;display: inline-block;">
						<i class="fa fa-plus-square" aria-hidden="true"></i>
						<span>Add new job</span>
					</a>

					<p style="font-size: 16px;color: #444;margin-top: 20px;">*AR (Application Rate) is an indicator of the job ad efficiency, it shows the percentage of applications from the overall job ad views.</p>

				</section>


				<section id="con3">

					<p class="tab_title bold">Inactive</p>

					<div class="filter_jobs_offer cf">

						<div class="filter_jobs_offer_item">
							<select name="" id="">
								<option value="1">Published</option>
								<option value="2">Awaiting approval</option>
								<option value="3">Stopped</option>
								<option value="4">Expired</option>
								<option value="5">Rejected</option>
							</select>
						</div>

						<div class="filter_jobs_offer_item">
							<select name="" id="">
								<option value="1">All ads</option>
								<option value="2">Messages with messages</option>
								<option value="3">Announcements with new messages</option>
							</select>
						</div>

					</div>

					<a href="{{ route('addNewJob') }}" class="add_more" style="margin-top: 20px;display: inline-block;">
						<i class="fa fa-plus-square" aria-hidden="true"></i>
						<span>Add new job</span>
					</a>

					<p style="font-size: 16px;color: #444;margin-top: 20px;">*AR (Application Rate) is an indicator of the job ad efficiency, it shows the percentage of applications from the overall job ad views.</p>

				</section>

				</div>

	  	</section>

	    <section class="company_profile_content" id="content2">
			
			<div class="big_subtitle">
	    		<h3 class="">Questionnaire</h3>
	    	</div>

	    	<a href="#" class="add_more" style="margin-bottom: 10px;display: inline-block;"><i class="fa fa-plus" aria-hidden="true"></i>New Questionnaire</a>

		    <p>Displaying <span>1-1 of 1</span></p>

	    	<p id="date">22.2.1999</p>

	    	<div class="small_subtitle">
	    		<h3 class="">Questionnaire</h3>
	    	</div>

	    	<p>questions: 3</p>

	    	<a class="company_questionnaire_options" href="#company_questionnaire_edit" id="company_edit">Edit</a>

	    	<a class="company_questionnaire_options" href="#" >Delete</a>

	    	<hr/>

	    	<p>Displaying <span>1-1 of 1</span></p>
	    	<!-- Edit section to be moved -->
	    	<br />

	    	<p>title: <span class="company_questionnaire_title">Sample Questionnaire</span></p>

	    	<br />

	    	<p>scoring: <span class="company_questionnaire_title">No</span></p>

	    	<div class="company_questionnaire_edit" id="company_questionnaire_edit">

		      	<p class="company_questionnaire_title">1. What experience do you have in such a position? *</p>
		      	<textarea cols="40" rows="4" style="z-index: auto; position: relative; line-height: normal; font-size: 16px; transition: none; background: transparent !important; margin: 0px; height: 76px; width: 345px;"></textarea>

		      	<hr />

		      	<p class="company_questionnaire_title">2. When can you start working with us if you are approved? *</p>

		      	<div class="company_questionnaire_inputs">
		      		<input type="radio">Immediately <br />
			        <input type="radio">After 1 to 3 weeks <br />
		    	  	<input type="radio">After 1 month <br />
		      		<input type="radio">After more than 1 month
		    	</div>

		    	<hr />

		    	<p class="company_questionnaire_title">What net remuneration do you expect? *</p>

		      	<textarea cols="40" rows="4" style="z-index: auto; position: relative; line-height: normal; font-size: 16px; transition: none; background: transparent !important; margin: 0px; height: 76px; width: 345px;"></textarea>
		    </div>

	 		<hr />

	 		<a href="#" class="add_more" style="margin-top: 15px;display: inline-block;"><i class="fa fa-plus" aria-hidden="true"></i>Add Question</a>
	    </section>

	  	<section class="company_profile_content" id="content3">
			
			<div class="company_profile_edit_item">

		   		<div class="big_subtitle">
		   			<h3>Organization Profile</h3>
		   		</div> 

		   		<a href="{{ route('getCompanyProfile', ['cid' => Auth::user()->id]) }}" class="company_questionnaire_options">View Company Profile</a>
		    	<p>You can edit your company profile here. The profile is the place where users expect to find concise and structured details about the company.</p>

			</div>

			<div class="company_profile_edit_item">
				<div class="small_subtitle">
			   		<h3>Company Business Card</h3>
			   	</div>

			   	<small>* The business card provides the candidates with general information about the company.</small>
				
				<div class="company_profile_edit_section_view_info">				
				    <p class="company_profile_edit_section_view_info_title bold">BooProWeb</p>

				    <p class="company_profile_edit_section_view_info_desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>

				    <div class="company_profile_edit_section_view_info_data">

				    	<p class="edit_section_view_info_data_section">
				    		<span class="bold">Emplyees:</span> <span>6</span>
				    	</p>

				     	<p class="edit_section_view_info_data_section">
				     		<span class="bold">Location:</span> <span>Serbia</span>
				     	</p> 

				    </div>

					<div class="business_card_edit">
				    	<a href="{{ route('editBusinessCard') }}" class="">Edit The Business Card</a>
				    </div>
			    </div>
			</div>

			<div class="company_profile_edit_item">
				<div class="small_subtitle">
		   			<h3>Company logo</h3>
		   		</div> 
		   		<div class="company_profile_edit_item_logo_img">
					<img src="http://booproweb.com/img/booproweb-logo2.png" alt="">
				</div>
			</div>
			
			<div class="company_profile_edit_item">
			  	<div class="new_job_add_choose_form_item new_job_add_cover_photo_section">
					
					<div class="add_cover_preview_photo none">
						<img src="" alt="">	
					</div>

					<div class="add_cover_btn_input">
						<input type="file" id="" name="">
					</div>

					<div class="add_cover_btn">
						<a href="#" class=""><i class="fa fa-plus-square" aria-hidden="true"></i> Add cover</a>
					</div>

					<div class="add_cover_btn add_cover_btn_upload_cancle cf none">
						<a href="#" class=""><i class="fa fa-plus-square" aria-hidden="true"></i> Upload cover</a>
						<a href="#" class="cancle_btn"><i class="fa fa-times-circle" aria-hidden="true"></i> Cancle</a>
					</div>

					<div class="add_cover_btn add_cover_btn_change_remove cf none">
						<a href="#" class=""><i class="fa fa-plus-square" aria-hidden="true"></i> Change cover</a>
						<a href="#" class="cancle_btn"><i class="fa fa-times-circle" aria-hidden="true"></i> Remove cover</a>
					</div>

				</div>
			</div>

		
			<div class="company_profile_edit_item">
			
				<div class="small_subtitle">
			   		<h3>About The Company</h3>
			   	</div>

			  	<p class="bold">BooProWeb</p>

			  	<small style="margin-bottom: 5px;display: inline-block;">*You can tell about your organization, core activities, products and services here</small>
				
				<form action="{{ route('updateAboutUs') }}" method="POST" id="about_us_form">
					<div class="edit_profile_textarea">
				  		<textarea name="about_us" id="about_us_text" cols="40" rows="4"></textarea>
						{{ csrf_field() }}
				  	</div>

				  	<button id="about_us" class="add_more save_section_btn">Save Section</button>
			  	</form>

		  	</div>


			<div class="company_profile_edit_item">

				<div class="small_subtitle">
			   		<h3>Career at the Company</h3>
			   	</div>

			  	<small style="margin-bottom: 5px;display: inline-block;">*You can introduce your company as an employer, tell about the career development opportunities</small>
				

				<form action="{{ route('updateCareer') }}" method="POST" id="career_form">
				  	

					<button id="career" class="add_more save_section_btn">Save Section</button>
				</form>

			</div>
			
			<div class="company_profile_edit_item">
				<div class="small_subtitle">
			   		<h3>Contacts</h3>
			   	</div>
				<p><span class="bold">Adress:</span> <span>Anete And 9</span></p>
				<p><span class="bold">Phone:</span> <span>414 41414</span></p>

			</div>

	  	</section>

		<section class="company_profile_content" id="content4">
		    <p>
		      Bacon ipsum dolor sit amet landjaeger sausage brisket, jerky drumstick fatback boudin ball tip turducken. Pork belly meatball t-bone bresaola tail filet mignon kevin turkey ribeye shank flank doner cow kielbasa shankle. Pig swine chicken hamburger, tenderloin turkey rump ball tip sirloin frankfurter meatloaf boudin brisket ham hock. Hamburger venison brisket tri-tip andouille pork belly ball tip short ribs biltong meatball chuck. Pork chop ribeye tail short ribs, beef hamburger meatball kielbasa rump corned beef porchetta landjaeger flank. Doner rump frankfurter meatball meatloaf, cow kevin pork pork loin venison fatback spare ribs salami beef ribs.
		    </p>
		    <p>
		      Jerky jowl pork chop tongue, kielbasa shank venison. Capicola shank pig ribeye leberkas filet mignon brisket beef kevin tenderloin porchetta. Capicola fatback venison shank kielbasa, drumstick ribeye landjaeger beef kevin tail meatball pastrami prosciutto pancetta. Tail kevin spare ribs ground round ham ham hock brisket shoulder. Corned beef tri-tip leberkas flank sausage ham hock filet mignon beef ribs pancetta turkey.
		    </p>
		</section>

		<section class="company_profile_content" id="content5">

			<h2 class="page_title">Applications</h2>

			<ul class="applicants_for_job_list">
			@foreach($applications as $application)
				<li class="applicants_for_job_item">
					<h3 class="bold">
						<a href="{{ route('getConversation', ['aid' => $application->id]) }}">Applicaton for:<span>{{ $application->ad->position }}</span></a>
					</h3>
					<p class="applicants_for_job_read_unread bold">
						<span class="read"><i class="fa fa-check-circle" aria-hidden="true"></i></span>
						<span class="unread"><i class="fa fa-check-circle-o" aria-hidden="true"></i></span>
					</p>
					<div class="footer_applicants_for_job_item cf">
						<span class="applications_date_for_job"><span class="bold">Date:</span> {{ $application->created_at }} </span>
						<span class="applications_user_for_job"><span class="bold">Applicant:</span> <a href="">{{ $application->user->last_name }} {{ $application->user->first_name }}</a></span>
					</div>
				</li>
			@endforeach
			</ul>

		</section>

	</div>
</main>



@endsection