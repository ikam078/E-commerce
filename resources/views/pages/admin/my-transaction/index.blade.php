@extends('layouts.parent')

@section('title', 'My Transaction')

@section('content')

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">My Transaction</h5>

            <nav>
                <ol class="breadcrumb">
                    @if (Auth::user()->role == 'admin')
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    @else
                        <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                    @endif
                    <li class="breadcrumb-item"><a href="#">Transaction</a></li>
                    <li class="breadcrumb-item active">MyTransaction</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="card-title"><i class="bi bi-cart"></i> List Transaction </div>

            <table class="table table-striped table-hover table-bordered datatable">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Name Account</td>
                        <td>Reciever Name</td>
                        <td>Email</td>
                        <td>Phone</td>
                        <td>Status</td>
                        <td>Total Price</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($myTransaction as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->user->name }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->phone }}</td>
                            <td>
                                @if ($row->status == 'EXPIRED')
                                    <span class="badge bg-danger text-uppercase">Expired</span>
                                @elseif ($row->status == 'PENDING')
                                    <span class="badge bg-warning">Pending</span>
                                @elseif ($row->status == 'SETTLEMENT')
                                    <span class="badge bg-success text-uppercase">Settlement</span>
                                @else
                                    <span class="badge bg-primary text-uppercase">Success</span>
                                @endif
                            </td>
                            <td>IDR {{ number_format($row->total_price) }}</td>
                            <td>
                                @if (Auth::user()->role == 'admin')
                                    <a href="{{ route('admin.my-transaction.showDataBySlugAndId', [$row->slug, $row->id]) }}"
                                        class="btn btn-info">
                                        <i class="bi bi-eye"></i></a>
                                @else
                                    <a href="{{ route('user.my-transaction.showDataBySlugAndId', [$row->slug, $row->id]) }}"
                                        class="btn btn-info">
                                        <i class="bi bi-eye"></i></a>
                                @endif
                                {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalshowtransaction{{ $row->id }}">
                                    <i class="bi bi-eye"></i>
                                </button>
                                @include('pages.admin.my-transaction.show-my-transaction') --}}
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
