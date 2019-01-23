@extends('layouts.master')

@section('content')

    <h1 class="page_title main_page_title">Invoices</h1>

    <main class="main_app_container">
        <div class="job_list_filter_holder">
            @if(count($invoices) < 1)
                {{ __('translate.admin_no_results') }}
            @endif
            @foreach($invoices as $invoice)
                <div class="job_list_filter_item cf">
                    <div class="job_list_filter_item_left">
                        <small><span class="bold">Date:</span> {{ $invoice->created_at->toFormattedDateString() }}</small>
                        <p><span class="bold">Invoice ID :</span> <span>{{ $invoice->invoice_id }}</span></p>
                    </div>
                    <div class="job_list_filter_item_right">
                        <div class="job_container_push_right cf">
                            <a href="{{ route('getInvoiceHtml', ['iid' => $invoice->id]) }}" target="_blank"><button type="button" class="btn btn-secondary">View</button></a>
                            <a href="{{ route('deleteInvoice', ['iid' => $invoice->id]) }}"><button type="button" class="btn btn-danger delete">{{ __('translate.admin_delete_button') }}</button></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>

@endsection