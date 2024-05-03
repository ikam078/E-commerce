@extends('layouts.parent')

@section('title', 'Product')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Category</h5>

            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Product</a></li>
                    <li class="breadcrumb-item active">Data Category</li>
                </ol>
            </nav>

            {{-- button modal --}}
            <!-- create product -->
            <a href="{{ route('admin.product.create') }}" class="btn btn-primary">
                <i class="bi bi-plus"></i>
                Add Product
            </a>
            <!-- End Basic Modal-->

            <table class="table datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($product as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->name }}</td>
                            <td>
                                <img src="{{ url('storage/product/', $row->image) }}" alt="{{ $row->name }}"
                                    class="w-25">
                            </td>
                            <td>
                                <button class="btn btn-warning" type="button" data-bs-toggle="modal"
                                    data-bs-target="#editModalCategory{{ $row->id }}">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <form action="{{ route('admin.product.destroy', $row->id) }}" method="post"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Data is empty</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
