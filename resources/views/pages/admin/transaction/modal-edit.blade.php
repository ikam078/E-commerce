<div class="modal fade" id="modalshowtransaction{{ $row->id }}" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $row->name }} - {{ $row->phone }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.transaction.update', $row->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <label for="status">Status</label>
                    <select class="form-select" aria-label="Default select example" name="status">
                        <option selected>Select menu</option>
                        <option value="PENDING">PENDING</option>
                        <option value="SETTLEMENT">SETTLEMENT</option>
                        <option value="EXPIRED">EXPIRED</option>
                        <option value="SUCCESS">SUCCESS</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="bi bi-arrow-left btn btn-secondary"
                        data-bs-dismiss="modal">Back</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
