<div class="panel panel-default">
    <div class="panel-heading">
        <h2 class="panel-title"><i class="fa fa-user"></i> Buckets</h2>
    </div>

    <table class="table table-hover">
        <?php
        if (!empty($data)):
            foreach ($data as $bucket):
                ?>
                <tr>
                    <td><a href="<?= $this->Url->build(['plugin' => 'CakeStorage', 'controller' => 'buckets', 'action' => 'view', $bucket->id])?>"><?= $bucket->name; ?></a></td>
                    <td><label class="label label-info"><?= $bucket->uid; ?></label></td>
                </tr>
                <?php
            endforeach;
        endif;
        ?>
    </table>
</div>