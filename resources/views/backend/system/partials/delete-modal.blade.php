<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                {{__('Are you sure you want to delete ?')}}
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="POST" action="">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm" id="confirmDelete" data-bs-dismiss="modal">{{__('Delete')}}
                    </button>
                    <button type="button" class="btn btn-primary btn-sm"  data-bs-dismiss="modal">{{__('Cancel')}}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
