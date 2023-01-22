<!-- delete modal section  -->

<div class="modal fade" id="delete_modal" tabindex="-1" aria-labelledby="confirm_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="contact/delete_contact" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Contact</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">Do you want to delete this Contact ?</div>
                <input type="hidden" value="" name="delete_id" id="delete_id" />
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary btn-xs" data-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-outline-danger btn-xs" id="delete_confirm">
                        Delete
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- delete modal section end  -->
