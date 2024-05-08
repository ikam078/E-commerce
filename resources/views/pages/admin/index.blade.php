@extends('layouts.parent')

@section('title', 'Dashboard - Admin')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Dashboard</h5>

            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="bi bi-house-door"></i></a></li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <!-- Sales Card -->
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Sales <span>| Today</span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-cart"></i>
                        </div>
                        <div class="ps-3">
                            <h6>145</h6>
                            <span class="text-success small pt-1 fw-bold">12%</span> <span
                                class="text-muted small pt-2 ps-1">increase</span>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
