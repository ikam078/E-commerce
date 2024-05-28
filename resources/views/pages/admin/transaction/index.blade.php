@extends('layouts.parent')

@section('title', 'Transaction')

@section('content')

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Transaction</h5>

            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Transaction</a></li>
                    <li class="breadcrumb-item active">Transaction</li>
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
                        <th>No</th>
                        <th>Name Account</th>
                        <th>Reciever Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Total Price</th>
                        <th>Payment url</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transaction as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->user->name }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->phone }}</td>
                            <td>{{ number_format($row->total_price) }}</td>
                            <td>
                                @if ($row->payment_url == 'null')
                                    <span>Null</span>
                                @else
                                    <a href="{{ $row->payment_url }}" target="_blank">Payment URL</a>
                                @endif
                            </td>
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
                            <td>
                                <a href="{{ route('admin.transaction.showTransactionUserByAdminWithSlugAndId', [$row->slug, $row->id]) }}" class="btn btn-info btn-sm mx-2">Show</a>

                                <button type="button" class="btn btn-warning btn-sm m-2" data-bs-toggle="modal"
                                    data-bs-target="#modalshowtransaction{{ $row->id }}">
                                    Edit
                                </button>
                                @include('pages.admin.transaction.modal-edit')
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
