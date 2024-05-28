@extends('layouts.parent')

@section('title', 'User')

@section('content')

    <div class="section dashboard">

        <div class="card info-card customers-card">
            <div class="card-body">
                <h5 class="card-title">Dashboard 
                    {{-- <p>{{ Auth::user()->created_at }}</p> --}}
                    <span class="badge bg-success text-dark"><i
                            class="bi bi-check-circle me-1"></i> | {{ Auth::user()->role }}</span></h5>

                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                        <h6>{{ Auth::user()->name }}</h6>
                        <span class="text-danger small pt-1 fw-bold">{{ Auth::user()->email }}</span>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                {{-- total pending --}}
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Total Pending</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart4"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $pending }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end --}}
            </div>

            <div class="col-md-4">
                {{-- total settlement --}}
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Total Settlement</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart4"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $settlement }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end --}}
            </div>

            <div class="col-md-4">
                {{-- total expired --}}
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Total Expired</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart4   "></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $expired }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end --}}
            </div>

        </div>
    </div>
@endsection
