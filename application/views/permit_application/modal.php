<div id="approve_<?= $item->paid_leave_id ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Approve Permit</h4>
                <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
            </div>
            <form action="<?= site_url('permit_application/approve/'.$item->paid_leave_id) ?>" method="post">
                <div class="modal-body">
                    <p>Are you sure you want to approve it?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Approve</button>
                </div>
            </form>
        </div>

    </div>
</div>

<div id="reject_<?= $item->paid_leave_id ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Reject Permit</h4>
                <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
            </div>
            <form action="<?= site_url('permit_application/reject/'.$item->paid_leave_id) ?>" method="post">
                <div class="modal-body">
                    <p>Are you sure you want to reject it?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Reject</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="delete_<?= $item->paid_leave_id ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Permit</h4>
                <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
            </div>
            <form action="<?= site_url('permit_application/delete/'.$item->paid_leave_id) ?>" method="post">
                <div class="modal-body">
                    <p>Are you sure you want to delete it?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>

    </div>
</div>
