<div class="related">
    <?php if (!empty($streams->entities)): ?>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h4 class="panel-title"><?= $streams->name ?>
                </h4>
            </div>
            <table class="table table-hover">
                <tr>
                    <td><?= __('Name') ?></td>
                    <td><?= __('Url') ?></td>
                    <td>Actions</td>
                </tr>
                <?php foreach ($streams->entities as $entity): ?>
                    <tr>
                        <td><?= h($entity->name) ?></td>
                        <td><?= h($entity->url) ?></td>
                        <td><a href="<?= $this->Url->build(['action' => 'play', $device->id, $entity->key]) ?>" class="btn btn-default btn-sm"><i class="fa fa-play"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    <?php endif; ?>
</div>