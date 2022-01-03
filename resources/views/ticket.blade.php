@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Booking Ticket</h1>
    <div class="col-md-8 m-auto">
        <div class="card">
            <div class="card-header">{{ __('Ticket') }}</div>
            <div class="card-body pb-0 mb-0">
                <div class="row py-3">
                    <div class="col-9">
                        <h5>Booking Date</h5>
                    </div>
                    <div class="col-3 text-end">
                        <h5> {{ $ticket->booking_date }}</h5>
                    </div>
                </div>
                <div class="row py-3">
                    <div class="col-9">
                        <h5>Booking Time</h5>
                    </div>
                    <div class="col-3 text-end">
                        <h5> {{ $ticket->booking_time }}</h5>
                    </div>
                </div>
                <div class="row py-3">
                    <div class="col-9">
                        <h5>Guest</h5>
                    </div>
                    <div class="col-3 text-end">
                        <h5> {{ $ticket->total_guest }}</h5>
                    </div>
                </div>
                <div class="row py-3">
                    <div class="col-9">
                        <h5>Table No</h5>
                    </div>
                    <div class="col-3 text-end">
                        <h5> {{ $ticket->table_no }}</h5>
                    </div>
                </div>
                <div class="row py-3">
                    <div class="col-9">
                        <h5>Booking At</h5>
                    </div>
                    <div class="col-3 text-end">
                        <h5> {{ $ticket->created_at }}</h5>
                    </div>
                </div>
                
                <div class="col-12">
                    <div class="alert alert-primary" role="alert">
                        Check your past booking <a href="{{ route('booktable.pastBookingIndex') }}">here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection