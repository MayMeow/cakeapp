<!-- Normal Modal -->
<div class="modal" id="modal-delete-<?= $id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-warning"></i></h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete <span class="text-danger"><?= $name; ?></span> ?</p>
                <p>You cant revert this action.</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-success" type="button" data-dismiss="modal">No, Go back</button>
                <?= $this->Form->postLink(__('<i class="fa fa-danger"></i> Yes, Delete'), ['action' => 'delete', $id], ['class' => 'btn btn-sm btn-danger', 'escape' => false], ['confirm' => __('Are you sure you want to delete # {0}?', $id)]) ?>
            </div>

        </div>
    </div>
</div>
<!-- END Normal Modal -->