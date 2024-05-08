@extends('layouts.parent')

@section('title', 'Data Product Gallery')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Data Product Gallery >>{{ $product->name }}</h5>

            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Product</a></li>
                    <li class="breadcrumb-item active"><a href="#"></a>Data Product Gallery</li>
                </ol>
            </nav>
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                    <i class="bi bi-plus">Product Gallery</i>
                </button>

                <a href="{{ route('admin.product.index') }}" class="btn btn-primary">
                    <i class="bi bi-arrow-left">
                        Back
                    </i>
                </a>

                @include('pages.admin.product.gallery.modal-create')
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($product->product_galleries as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ url('storage/product/gallery/', $row->image) }}" alt="image-product"
                                    class="img-thumbnail" width="100">
                            </td>
                            <td>
                                <form action="{{ route('admin.product.gallery.destroy', [$product->id, $row->id]) }}"
                                    method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
