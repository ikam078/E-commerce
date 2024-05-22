<div class="modal fade" id="modalshowtransaction{{ $row->id }}" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $row->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <li class="list-group-item"><p>Reciver Name : <strong>{{ $row->name }}</strong></p></li>
                    <li class="list-group-item"><p>Email : <strong>{{ $row->email }}</strong></p></li>
                    <li class="list-group-item"><p>Phone : <strong>{{ $row->phone }}</strong></p></li>
                    <li class="list-group-item"><p>Address : <strong>{{ $row->address }}</strong></p></li>
                    <li class="list-group-item"><p>courier : <strong>{{ $row->courier }}</strong></p></li>
                    <li class="list-group-item"><p>Payment : <strong>{{ $row->payment }}</strong></p></li>
                    <li class="list-group-item"><p>Payment url : <strong>{{ $row->payment_url }}</strong></p></li>
                    <li class="list-group-item"><p>Status : <strong>{{ $row->status }}</strong></p></li>
                    <li class="list-group-item"><p>Total Price : <strong>{{ $row->total_price }}</strong></p></li>
                </div>
            <div class="modal-footer">
                <button type="button" class="bi bi-arrow-left btn btn-secondary" data-bs-dismiss="modal">Back</button>
            </div>
        </div>
    </div>
</div>
