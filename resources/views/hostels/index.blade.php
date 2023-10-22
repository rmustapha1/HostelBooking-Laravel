@extends('layouts.app')

@section('content')

<div class="container hostel mt-20">
    <div class="page-header">
        <h1 class="page-title">Hostels in <span style="text-transform: uppercase;">uds</span></h1>
    </div>
    <p class="page-content mb-3 mt-3 text-muted">Click and start booking process.</p>

    @if ($message)
    <div class="alert alert-info">{{ $message }}</div>
    @else
    <div class="row">
        @foreach ($filteredHostels as $hostel)
        <div class="col-lg-4 col-md-6 mb-5 hostel-item">
            <div class="card mb-3 d-flex flex-column rounded-lg border-none shadow-md">
                <div class="">
                    <img src="{{$hostel->img_url}}" class="h-full w-full object-cover object-center rounded-md" alt="{{$hostel->img_url}}">
                    <div class="img-price">
                        <h6><i class="bis">&#8373;</i>{{$hostel->price_range}}</h6>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{$hostel->name}}</h5>
                    <span>{{$hostel->location}}</span>
                    @php
                    $rating = number_format($ratings[$hostel->id], 1);
                    @endphp
                    <div class="star-rating">
                        @for ($i = 1; $i <= 5; $i++) @if ($rating>= $i)
                            <i class="bi bi-star-fill text-yellow-500"></i>
                            @elseif ($rating > ($i - 1))
                            <i class="bi bi-star-half text-yellow-500"></i>
                            @else
                            <i class="bi bi-star text-yellow-500"></i>
                            @endif
                            @endfor
                            {{$rating}}
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <p class="card-text text-muted">
                                <i class="bi bi-calendar3"></i>Duration: 1yr
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p class="card-text text-muted">
                                @php
                                $rowCount = count($hostel->rooms);
                                @endphp
                                <i class="bi bi-building"></i>{{$rowCount}} rooms available
                            </p>
                        </div>
                    </div>
                </div>
                <div class="hostel-info">
                    <h4>{{$hostel->name}}</h4>
                    <p><i class="bi">&#8373;</i>{{$hostel->price_range}}/yr</p>
                    <a href="{{ route('hostels.show', $hostel->id) }}" class="details-link" title="More Details"><i class="bi bi-link"></i></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif


</div>


@endsection