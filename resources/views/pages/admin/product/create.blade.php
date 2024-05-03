@extends('layouts.parent')

@section('content')
    <div class="row">
        <div class="card p-4">
            <h3 class="text-center">Create - Product</h3>

            <form action="{{ route('admin.product.create') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="mb-2">
                    <label for="inputTitle" name="title" class="card-title">Name</label>
                    <input type="text" class="form-control" id="inputTitle" name="title" value="{{ old('title') }}">
                </div>

                <div class="mb-2">
                    <label class="card-title">Description</label>
                    <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" name="category_id">
                            <option selected>=== Choose Category ===</option>
                            @foreach ($product as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-2">
                    <label class="card-title">Description</label>
                    <textarea class="quill-editor-default col-12"></textarea>
                </div>

                <div class="mb-2">
                    <label class="card-title">Price</label>
                    <span class="input-group-text">$</span>
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                </div>

                <div class="d-flex mt-5 justify-content-end">
                    <button class="btn btn-primary" type="submit">
                        <i class="bi bi-plus"></i>
                        Create News
                    </button>
                </div>

                <script>
                    ClassicEditor
                        .create(document.querySelector('#editor'))
                        .then(editor => {
                            console.log(editor);
                        })
                        .catch(error => {
                            console.error(error);
                        });
                </script>

            </form>
        </div>
    </div>
@endsection
