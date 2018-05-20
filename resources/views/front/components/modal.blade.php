<div class="modal fade" id="messageModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    {{ $title ?? 'Message' }}
                </h4>
            </div>
        
            <div class="modal-body text-center">
                {{ $slot }}
            </div>
        
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>