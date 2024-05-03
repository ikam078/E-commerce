<div class="modal fade" id="editModalCategory{{ $row->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit category {{ $row->id }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.category.update', $row->id ) }}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <div class="col-12">
                            <label for="inputNanme4" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="inputNanme4" name="name" value="{{ $row->name }}">
                        </div>
                        <div class="col-12">
                            <label for="image" class="form-label">Category Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <div class="col-12">
                            <img src="#" alt="category-image" id="preview-logo" class="visually-hidden img-thumbnail">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>