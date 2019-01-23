@extends('layouts.master')

@section('content')

  <style>
      @media (min-width: 992px) {
      body {
          padding-top: 56px;
          margin-top: 35px; 
      }
  }
  .card_holder {
      height: 400px;
      border: solid 1px #eee;
      padding: 40px;
      margin: 20px auto;
  } 
  .card-img-top {
      width: 100%;
  }
  #payment-form {
  background: #eeeeee54;
  padding: 30px;
  display: none;
  padding-bottom: 90px;
  margin-bottom: 15px;
  }

  #payment-form label {
      padding: 10px;
  }
  #card-element {
      border: solid 2px #eee;
      border-radius: 330px;
      padding: 5px;
      margin-bottom: 10px;
  }
  </style>
<h1 class="page_title main_page_title">{{ __('translate.company_payment_h1') }}</h1>

<main class="main_app_container">
    
<div class="container money_slider_container">
  <div class="row">
  <div class="col-sm-6 center-block text-center">
<h3>{{ __('translate.company_payment_get_discount') }}</h3>
  <div class="row">
    <div class="col-sm-12">
      <div class="h4">{{ __('translate.company_payment_pay') }}</div>
      <div class="value-1">
        <div class="number-1" id="credits">0 RSD
        </div>
        <div class="money-slider"></div>
      </div>
    </div>
    <div class="col-sm-12">
      <div class="h4">{{ __('translate.company_payment_get_bonus') }} ( <span id="bonus">0%</span>)</div>
      <div class="value-2">
        <div class="number-2">0
        </div>
        <div class="slider-2"></div>
      </div>
    </div>
  </div>
  </div>
    <div class="col-sm-6 center-block text-center">
      <h3>{{ __('translate.company_payment_method') }}</h3>
      <div class="radio payment_method">
       <label for="stripe_payment"><input type="radio" name="stripe_payment" id="stripe_payment">{{ __('translate.company_payment_stripe') }}</label>
      </div>
      <button class="btn btn-primary" id="payment_btn">{{ __('translate.company_payment_proceed_button') }} <span id="total_amount_btn"> 0 RSD </span></button>
    </div>
    <input type="hidden" value="" name="bonus_amm" id="bonus_amm">
    <input type="hidden" value="" name="ammount" id="ammount">
  </div>

       

   <form action="{{ route('submitPayment') }}" method="post" id="payment-form">
                {{ csrf_field() }}
                    <div class="form-row">
                    <div class="row">
                        <div class="col-md-6">
                        <label> {{ __('translate.company_payment_first_name_label') }} </label>
                        <input type="text" class="form-control" name="name" placeholder="{{ __('translate.company_payment_first_name_placeholder') }}" required>
                        </div>
                        <div class="col-md-6">
                        <label> {{ __('translate.company_payment_last_name_label') }} </label>
                        <input type="text" class="form-control" name="lastName" placeholder="{{ __('translate.company_payment_last_name_placeholder') }}" required>
                        </div>
                        <div class="col-md-12">
                        <label> {{ __('translate.company_payment_email_label') }} </label>
                        <input type="e-mail" class="form-control" name="email" placeholder="{{ __('translate.company_payment_email_placeholder') }}" required >
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-group col-md-6">
                    <label for="inputCity">{{ __('translate.company_payment_city_label') }}</label>
                        <input type="text" class="form-control" name="city" id="inputCity" placeholder="{{ __('translate.company_payment_city_placeholder') }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">{{ __('translate.company_payment_state_label') }}</label>
                        <select id="inputState" class="form-control" name="country">
                            <option selected>France</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputZip">{{ __('translate.company_payment_zip_label') }}</label>
                        <input type="text" class="form-control" id="inputZip" placeholder="{{ __('translate.company_payment_zip_placeholder') }}" name="zip">
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-group col-md-4">
                        <label for="statenum">{{ __('translate.company_payment_state_number_label') }}</label>
                        <select id="statenum" class="form-control" name="statenum">
                            <option selected>France(+33)</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="form-group col-md-8">
                    <label for="statenum">{{ __('translate.company_payment_phone_label') }}</label>
                        <input type="text" class="form-control" id="telnum" name="phone" placeholder="{{ __('translate.company_payment_phone_placeholder') }}" >
                    </div>
                    <div class="col-md-12">
                        <label> {{ __('translate.company_payment_address_label') }} </label>
                        <input type="text" class="form-control" placeholder="{{ __('translate.company_payment_address_placeholder') }}" name="address">
                    </div>
                    </div>
                    <div class="form-row">
                            <label for="card-element">{{ __('translate.company_payment_card_label') }}</label>
                            <div id="card-element">
                            <!-- a Stripe Element will be inserted here. -->
                            </div>
                            <!-- Used to display form errors -->
                            <div id="card-errors"></div>
                    </div>
                <div class="col-md-12">
                    <label class="text-center">{{ __('translate.company_payment_total_label') }} <span class="sub_amount">0 RSD</span></label>
                    <input type="hidden" value="" name="hidden_ammount" id="hidden_ammount">
                    <input type="hidden" value="" name="package" id="package">
                    <input type="submit" class="btn btn-primary center-block" value="{{ __('translate.company_payment_submit_button') }}"></input>
                </div>
                <div class="col-md-12">
                    <!-- <input type="submit" class="btn btn-primary center-block"></input> -->
                </div>
            </form>
</div>
</main>
<script>
    $('#credits').on("DOMSubtreeModified",function(){
        var string = $('#credits').text();
        var pack = string.replace(" RSD","");
        $('#package').val(pack);
    });
</script>
 <script src="{{ asset('public/js/charge.js') }}"></script>
@endsection