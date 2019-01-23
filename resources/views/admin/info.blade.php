@extends('layouts.master')

@section('content')

    <h1 class="page_title main_page_title">Site Info</h1>

    <main class="main_app_container">
        <ul class="nav nav-tabs">
            <li role="presentation"><a href="{{ route('getAdminAds') }}">{{ __('translate.admin_menu_ads') }}</a></li>
            <li role="presentation"><a href="{{ route('getAdminCompanies') }}">{{ __('translate.admin_menu_companies') }}</a></li>
            <li role="presentation"><a href="{{ route('getAdminUsers') }}">{{ __('translate.admin_menu_users') }}</a></li>
            <li role="presentation"><a href="{{ route('getReports') }}">{{ __('translate.admin_menu_reports-ads') }}</a></li>
            <li role="presentation"><a href="{{ route('getReportsCompanies') }}">{{ __('translate.admin_menu_reports-companies') }}</a></li>
            <li role="presentation"><a href="{{ route('getAdminLanguages') }}">{{ __('translate.admin_menu_languages') }}</a></li>
            <li role="presentation"><a href="{{ route('getAdminCategories') }}">{{ __('translate.admin_menu_categories') }}</a></li>
            <li role="presentation"><a href="{{ route('getAdminInfo') }}">Site Info</a></li>
        </ul>
 
        <div class="login_register_container" style="margin-top:20px;">
            <form method="POST" class="login_reg_form">
                <div class="login_reg_form_item">
                    <h2 class="bold">Site Info</h2>
                    <hr>
                    <p class="form_title"><strong>Company name:</strong> 
                        <span id="name_span">{{ $info->name }}</span>
                        <a class="cv_edit_link" id="name">	
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </p>
                    <div class="edit_info_window"  id="name_input" style="display:none">
                        <input name="name" type="text">
                        <button class="confirm_edit_btn blue_btn" id="name_btn"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </div>
                
                    <p class="form_title"><strong>Country:</strong> 
                        <span id="country_span">{{ $info->country }}</span>
                        <a class="cv_edit_link" id="country">	
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </p>
                    <div class="edit_info_window"  id="country_input" style="display:none">
                        <input name="country" type="text">
                        <button class="confirm_edit_btn blue_btn" id="country_btn"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </div>

                    <p class="form_title"><strong>City:</strong> 
                        <span id="city_span">{{ $info->city }}</span>
                        <a class="cv_edit_link" id="city">	
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </p>
                    <div class="edit_info_window"  id="city_input" style="display:none">
                        <input name="city" type="text">
                        <button class="confirm_edit_btn blue_btn" id="city_btn"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </div>

                    <p class="form_title"><strong>Address:</strong> 
                        <span id="address_span">{{ $info->address }}</span>
                        <a class="cv_edit_link" id="address">	
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </p>
                    <div class="edit_info_window"  id="address_input" style="display:none">
                        <input name="address" type="text">
                        <button class="confirm_edit_btn blue_btn" id="address_btn"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </div>

                    <p class="form_title"><strong>PIB:</strong> 
                        <span id="pib_span">{{ $info->pib }}</span>
                        <a class="cv_edit_link" id="pib">	
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </p>
                    <div class="edit_info_window"  id="pib_input" style="display:none">
                        <input name="pib" type="text">
                        <button class="confirm_edit_btn blue_btn" id="pib_btn"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </div>

                    <p class="form_title"><strong>VAT:</strong> 
                        <span id="vat_span">{{ $info->vat }}</span>
                        <a class="cv_edit_link" id="vat">	
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </p>
                    <div class="edit_info_window"  id="vat_input" style="display:none">
                        <input name="vat" type="text">
                        <button class="confirm_edit_btn blue_btn" id="vat_btn"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </div>
                </div>

                <div class="login_reg_form_item">
                    <hr>
                    <h2 class="bold">Bank info</h2>
                    <hr>
                    <p class="form_title"><strong>Bank name:</strong> 
                        <span id="bank_name_span">{{ $info->bank_name }}</span>
                        <a class="cv_edit_link" id="bank_name">	
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </p>
                    <div class="edit_info_window"  id="bank_name_input" style="display:none">
                        <input name="bank_name" type="text">
                        <button class="confirm_edit_btn blue_btn" id="bank_name_btn"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </div>

                    <p class="form_title"><strong>Bank country:</strong> 
                        <span id="bank_country_span">{{ $info->bank_country }}</span>
                        <a class="cv_edit_link" id="bank_country">	
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </p>
                    <div class="edit_info_window"  id="bank_country_input" style="display:none">
                        <input name="bank_country" type="text">
                        <button class="confirm_edit_btn blue_btn" id="bank_country_btn"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </div>

                    <p class="form_title"><strong>Bank city:</strong> 
                        <span id="bank_city_span">{{ $info->bank_city }}</span>
                        <a class="cv_edit_link" id="bank_city">	
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </p>
                    <div class="edit_info_window"  id="bank_city_input" style="display:none">
                        <input name="bank_city" type="text">
                        <button class="confirm_edit_btn blue_btn" id="bank_city_btn"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </div>

                    <p class="form_title"><strong>Bank address:</strong> 
                        <span id="bank_address_span">{{ $info->bank_address }}</span>
                        <a class="cv_edit_link" id="bank_address">	
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </p>
                    <div class="edit_info_window"  id="bank_address_input" style="display:none">
                        <input name="bank_address" type="text">
                        <button class="confirm_edit_btn blue_btn" id="bank_address_btn"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </div>

                    <p class="form_title"><strong>BIC:</strong> 
                        <span id="bic_span">{{ $info->bic }}</span>
                        <a class="cv_edit_link" id="bic">	
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </p>
                    <div class="edit_info_window"  id="bic_input" style="display:none">
                        <input name="bic" type="text">
                        <button class="confirm_edit_btn blue_btn" id="bic_btn"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </div>

                    <p class="form_title"><strong>IBAN:</strong> 
                        <span id="iban_span">{{ $info->iban }}</span>
                        <a class="cv_edit_link" id="iban">	
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </p>
                    <div class="edit_info_window"  id="iban_input" style="display:none">
                        <input name="iban" type="text">
                        <button class="confirm_edit_btn blue_btn" id="iban_btn"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </div>

                </div>
                {{ csrf_field() }}
            </form>
        </div>

    </main>

    <script>
    // Name
        $(document).ready(function(){
            if ($('#name_span').text() == "") {
                $('#name_input').css('display','block');
                $('#name').css('display','none');
                $('#name_btn').css('display','none');
            };
        });
        $('#name').click(function(){
            $(this).css('display', 'none');
            var name_span = $('#name_span').text();
            $('#name_span').css('display','none');
            $('#name_input').slideToggle('slow');
            $('#name_input input').val(name_span).focus();
        });
        $('#name_input button').click(function(e){
				e.preventDefault();
				$('#name').css('display', 'inline');
				$('#name_span').css('display','inline');
				$('#name_input').css('display','none');
				var name = $('#name_input input').val();
				$('#name_span').html(name);
				$.ajax({
					  method: "POST",
					  url: "/admin/updateInfo",
					  data: {
					  	name:name,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			});

    // Country
        $(document).ready(function(){
            if ($('#country_span').text() == "") {
                $('#country_input').css('display','block');
                $('#country').css('display','none');
                $('#country_btn').css('display','none');
            };
        });
        $('#country').click(function(){
            $(this).css('display', 'none');
            var country_span = $('#country_span').text();
            $('#country_span').css('display','none');
            $('#country_input').slideToggle('slow');
            $('#country_input input').val(country_span).focus();
        });
        $('#country_input button').click(function(e){
				e.preventDefault();
				$('#country').css('display', 'inline');
				$('#country_span').css('display','inline');
				$('#country_input').css('display','none');
				var country = $('#country_input input').val();
				$('#country_span').html(country);
				$.ajax({
					  method: "POST",
					  url: "/admin/updateInfo",
					  data: {
					  	country:country,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			});

    // City
        $(document).ready(function(){
            if ($('#city_span').text() == "") {
                $('#city_input').css('display','block');
                $('#city').css('display','none');
                $('#city_btn').css('display','none');
            };
        });
        $('#city').click(function(){
            $(this).css('display', 'none');
            var city_span = $('#city_span').text();
            $('#city_span').css('display','none');
            $('#city_input').slideToggle('slow');
            $('#city_input input').val(city_span).focus();
        });
        $('#city_input button').click(function(e){
				e.preventDefault();
				$('#city').css('display', 'inline');
				$('#city_span').css('display','inline');
				$('#city_input').css('display','none');
				var city = $('#city_input input').val();
				$('#city_span').html(city);
				$.ajax({
					  method: "POST",
					  url: "/admin/updateInfo",
					  data: {
					  	city:city,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			});

    // Address
        $(document).ready(function(){
            if ($('#address_span').text() == "") {
                $('#address_input').css('display','block');
                $('#address').css('display','none');
                $('#address_btn').css('display','none');
            };
        });
        $('#address').click(function(){
            $(this).css('display', 'none');
            var address_span = $('#address_span').text();
            $('#address_span').css('display','none');
            $('#address_input').slideToggle('slow');
            $('#address_input input').val(address_span).focus();
        });
        $('#address_input button').click(function(e){
				e.preventDefault();
				$('#address').css('display', 'inline');
				$('#address_span').css('display','inline');
				$('#address_input').css('display','none');
				var address = $('#address_input input').val();
				$('#address_span').html(address);
				$.ajax({
					  method: "POST",
					  url: "/admin/updateInfo",
					  data: {
					  	address:address,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			});

    // Pib
        $(document).ready(function(){
            if ($('#pib_span').text() == "") {
                $('#pib_input').css('display','block');
                $('#pib').css('display','none');
                $('#pib_btn').css('display','none');
            };
        });
        $('#pib').click(function(){
            $(this).css('display', 'none');
            var pib_span = $('#pib_span').text();
            $('#pib_span').css('display','none');
            $('#pib_input').slideToggle('slow');
            $('#pib_input input').val(pib_span).focus();
        });
        $('#pib_input button').click(function(e){
				e.preventDefault();
				$('#pib').css('display', 'inline');
				$('#pib_span').css('display','inline');
				$('#pib_input').css('display','none');
				var pib = $('#pib_input input').val();
				$('#pib_span').html(pib);
				$.ajax({
					  method: "POST",
					  url: "/admin/updateInfo",
					  data: {
					  	pib:pib,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			});

    // Vat
        $(document).ready(function(){
            if ($('#vat_span').text() == "") {
                $('#vat_input').css('display','block');
                $('#vat').css('display','none');
                $('#vat_btn').css('display','none');
            };
        });
        $('#vat').click(function(){
            $(this).css('display', 'none');
            var vat_span = $('#vat_span').text();
            $('#vat_span').css('display','none');
            $('#vat_input').slideToggle('slow');
            $('#vat_input input').val(vat_span).focus();
        });
        $('#vat_input button').click(function(e){
				e.preventDefault();
				$('#vat').css('display', 'inline');
				$('#vat_span').css('display','inline');
				$('#vat_input').css('display','none');
				var vat = $('#vat_input input').val();
				$('#vat_span').html(vat);
				$.ajax({
					  method: "POST",
					  url: "/admin/updateInfo",
					  data: {
					  	vat:vat,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			});

    // Bank name
        $(document).ready(function(){
            if ($('#bank_name_span').text() == "") {
                $('#bank_name_input').css('display','block');
                $('#bank_name').css('display','none');
                $('#bank_name_btn').css('display','none');
            };
        });
        $('#bank_name').click(function(){
            $(this).css('display', 'none');
            var bank_name_span = $('#bank_name_span').text();
            $('#bank_name_span').css('display','none');
            $('#bank_name_input').slideToggle('slow');
            $('#bank_name_input input').val(bank_name_span).focus();
        });
        $('#bank_name_input button').click(function(e){
				e.preventDefault();
				$('#bank_name').css('display', 'inline');
				$('#bank_name_span').css('display','inline');
				$('#bank_name_input').css('display','none');
				var bank_name = $('#bank_name_input input').val();
				$('#bank_name_span').html(bank_name);
				$.ajax({
					  method: "POST",
					  url: "/admin/updateInfo",
					  data: {
					  	bank_name:bank_name,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			});

    // Bank country
        $(document).ready(function(){
            if ($('#bank_country_span').text() == "") {
                $('#bank_country_input').css('display','block');
                $('#bank_country').css('display','none');
                $('#bank_country_btn').css('display','none');
            };
        });
        $('#bank_country').click(function(){
            $(this).css('display', 'none');
            var bank_country_span = $('#bank_country_span').text();
            $('#bank_country_span').css('display','none');
            $('#bank_country_input').slideToggle('slow');
            $('#bank_country_input input').val(bank_country_span).focus();
        });
        $('#bank_country_input button').click(function(e){
				e.preventDefault();
				$('#bank_country').css('display', 'inline');
				$('#bank_country_span').css('display','inline');
				$('#bank_country_input').css('display','none');
				var bank_country = $('#bank_country_input input').val();
				$('#bank_country_span').html(bank_country);
				$.ajax({
					  method: "POST",
					  url: "/admin/updateInfo",
					  data: {
					  	bank_country:bank_country,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			});

    // Bank city
        $(document).ready(function(){
            if ($('#bank_city_span').text() == "") {
                $('#bank_city_input').css('display','block');
                $('#bank_city').css('display','none');
                $('#bank_city_btn').css('display','none');
            };
        });
        $('#bank_city').click(function(){
            $(this).css('display', 'none');
            var bank_city_span = $('#bank_city_span').text();
            $('#bank_city_span').css('display','none');
            $('#bank_city_input').slideToggle('slow');
            $('#bank_city_input input').val(bank_city_span).focus();
        });
        $('#bank_city_input button').click(function(e){
				e.preventDefault();
				$('#bank_city').css('display', 'inline');
				$('#bank_city_span').css('display','inline');
				$('#bank_city_input').css('display','none');
				var bank_city = $('#bank_city_input input').val();
				$('#bank_city_span').html(bank_city);
				$.ajax({
					  method: "POST",
					  url: "/admin/updateInfo",
					  data: {
					  	bank_city:bank_city,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			});

    // Bank address
        $(document).ready(function(){
            if ($('#bank_address_span').text() == "") {
                $('#bank_address_input').css('display','block');
                $('#bank_address').css('display','none');
                $('#bank_address_btn').css('display','none');
            };
        });
        $('#bank_address').click(function(){
            $(this).css('display', 'none');
            var bank_address_span = $('#bank_address_span').text();
            $('#bank_address_span').css('display','none');
            $('#bank_address_input').slideToggle('slow');
            $('#bank_address_input input').val(bank_address_span).focus();
        });
        $('#bank_address_input button').click(function(e){
				e.preventDefault();
				$('#bank_address').css('display', 'inline');
				$('#bank_address_span').css('display','inline');
				$('#bank_address_input').css('display','none');
				var bank_address = $('#bank_address_input input').val();
				$('#bank_address_span').html(bank_address);
				$.ajax({
					  method: "POST",
					  url: "/admin/updateInfo",
					  data: {
					  	bank_address:bank_address,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			});

    // Bic
        $(document).ready(function(){
            if ($('#bic_span').text() == "") {
                $('#bic_input').css('display','block');
                $('#bic').css('display','none');
                $('#bic_btn').css('display','none');
            };
        });
        $('#bic').click(function(){
            $(this).css('display', 'none');
            var bic_span = $('#bic_span').text();
            $('#bic_span').css('display','none');
            $('#bic_input').slideToggle('slow');
            $('#bic_input input').val(bic_span).focus();
        });
        $('#bic_input button').click(function(e){
				e.preventDefault();
				$('#bic').css('display', 'inline');
				$('#bic_span').css('display','inline');
				$('#bic_input').css('display','none');
				var bic = $('#bic_input input').val();
				$('#bic_span').html(bic);
				$.ajax({
					  method: "POST",
					  url: "/admin/updateInfo",
					  data: {
					  	bic:bic,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			});

    // Iban
        $(document).ready(function(){
            if ($('#iban_span').text() == "") {
                $('#iban_input').css('display','block');
                $('#iban').css('display','none');
                $('#iban_btn').css('display','none');
            };
        });
        $('#iban').click(function(){
            $(this).css('display', 'none');
            var iban_span = $('#iban_span').text();
            $('#iban_span').css('display','none');
            $('#iban_input').slideToggle('slow');
            $('#iban_input input').val(iban_span).focus();
        });
        $('#iban_input button').click(function(e){
				e.preventDefault();
				$('#iban').css('display', 'inline');
				$('#iban_span').css('display','inline');
				$('#iban_input').css('display','none');
				var iban = $('#iban_input input').val();
				$('#iban_span').html(iban);
				$.ajax({
					  method: "POST",
					  url: "/admin/updateInfo",
					  data: {
					  	iban:iban,
					  	'_token': $('meta[name="csrf-token"]').attr('content')
					  },
					})
			});

    </script>
@endsection