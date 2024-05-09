@extends('layouts.parent')

@section('title', 'Dashboard - Admin')

@section('content')
    <div class="section dashboard">
        <div class="col-xl-12">

            <div class="card info-card customers-card">

                <div class="card-body">
                    <h5 class="card-title">Dashboard <span class="badge bg-info text-dark">
                            <i class="bi bi-patch-check me-1"></i>Admin</span>
                    </h5>

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

        </div>
    </div>

    <div class="section dashboard">
        <div class="row">

            <!-- Category Card -->
            <div class="col-md-4">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Category</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $category }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Card -->
            <div class="col-md-4">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Product</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-bag"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $product }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- User Card -->
            <div class="col-md-4">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">User</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-file-earmark-person-fill"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $user }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h3 class="card-title fs-2">Info users</h3>
            <table class="table text-center  table-hover">
                <thead class="table table-primary">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->role }}</td>
                            <td>
                                <button type="button" class="btn btn-warning " data-bs-toggle="modal"
                                    data-bs-target="#basicModal{{ $row->id }}">
                                    <i class="bi bi-exclamation-triangle"></i>
                                    Reset Password
                                </button>
                                <div class="modal fade" id="basicModal{{ $row->id }}" tabindex="-1">p
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Reset Password {{ $row->name }} ?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Default Password Become to
                                                <strong>password</strong>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <form action="{{ route('admin.resetpassword', $row->id) }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-success">Reset <i
                                                            class="bi bi-check-circle me-1"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
