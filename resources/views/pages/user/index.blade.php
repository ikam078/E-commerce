@extends('layouts.parent')

@section('title', 'User')

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="text-end">
                <p class="badge bg-info text-dark mt-2"><i class="bi bi-info-circle me-1"></i> | {{ Auth::user()->role }}</p>
            </div>
            <h5 class="text-center fs-4 fw-bold">Hallo {{ Auth::user()->name }}</h5>
            <h4 class="text-center fs-5 fw-semibold"> {{ Auth::user()->email }}</h4>
            <p class="text-center fs-6 fw-medium">{{ Auth::user()->created_at }}</p>
        </div>
    </div>

    <div class="section dashboard">
        <div class="row">
            <div class="col-md-4">
                {{-- total pending --}}
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">total pending</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart4"></i>
                            </div>
                            <div class="ps-3">
                                <h6></h6>
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
                        <h5 class="card-title">total settlement</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart4"></i>
                            </div>
                            <div class="ps-3">
                                <h6></h6>
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
                        <h5 class="card-title">total exppired</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart4   "></i>
                            </div>
                            <div class="ps-3">
                                <h6></h6>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end --}}
            </div>

        </div>
    </div>
@endsection
