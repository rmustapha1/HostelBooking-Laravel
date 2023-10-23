@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Booking Details
        </div>
        <div class="card-body">
            @if(session('message'))
            <div class="toast" style="position: absolute; top: 0; right: 0;">
                <div class="toast-header">
                    <strong class="mr-auto">Message</strong>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
                </div>
                <div class="toast-body">
                    {{ session('message') }}
                </div>
            </div>
            @endif
            <h5 class="card-title">Booking Summary</h5>
            <p class="card-text">Check-in date: {{ $booking->check_in_date }}</p>
            <p class="card-text">Check-out date: {{ $booking->check_out_date }}</p>
            <p class="card-text">Room type: {{ $booking->room->room_type }}</p>
            <p class="card-text">Total price: {{ $booking->room->price_per_year }}</p>
            <a href="#" class="btn btn-primary">Continue to Pay</a>
            <a href="#" class="btn btn-secondary">Pay Later</a>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('.toast').toast('show');
    });
</script>
@endpush