@extends('layouts.parent')

@section('title', 'Product Gallery')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Product Gallery >>{{ $product->name }}</h5>

            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Product</a></li>
                    <li class="breadcrumb-item active">Data Product Gallery</li>
                </ol>
            </nav>
            <div class="d-flex justify-content-end">
                <a href="#" class="btn btn-primary">
                    <i class="bi bi-plus">
                        Add Gallery
                    </i>
                </a>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Image</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>1</th>
                        <th>Gambar</th>
                        <th>Action</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
