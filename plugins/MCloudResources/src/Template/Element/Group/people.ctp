<div class="panel panel-default">
    <div class="panel-heading">
        <h2 class="panel-title"><i class="fa fa-user"></i> People</h2>
    </div>

    <table class="table table-hover">
        <?php
        if (!empty($data)):
            foreach ($data as $member):
        ?>
                <tr>
                    <td><?= $member->username; ?></td>
                    <td><label class="label label-info"><?= $member->_joinData->role; ?></label></td>
                    <td class="col-md-2"><a href="#" class="btn btn-xs btn-default">Remove member</a> </td>
                </tr>
        <?php
            endforeach;
        endif;
        ?>
    </table>

    <div class="panel-footer">
        <?= $this->Html->link('Add member', ['action' => 'addMember', $ID], ['class' => 'btn btn-success btn-sm']) ?>
    </div>
</div>