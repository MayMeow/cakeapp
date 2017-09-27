<?php if (!empty($tree)): ?>
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4 class="panel-title"><?= __('Content') ?> <strong
                    style="font-size: 14px"><?= $this->Number->toReadableSize($dirsize) ?></strong>
            </h4>
        </div>
        <table class="table table-hover">
            <?php foreach ($tree as $file): ?>
                <tr>
                    <td class="col-md-3 col-xs-4">
                        <?= $file->getType() == 'tree' ? '<i class="fa fa-folder"></i>' : '<i class="fa fa-file"></i>' ?>
                        <?= $file->getType() == 'tree' ? $this->Html->link($file->getName(), $this->Url->build($this->request->here() . DS . $file->getName())) : $this->Html->link($file->getName(), ['action' => 'blob', $gitRepository->namespace, $gitRepository->slug, $file->getSha()]) ?>
                    </td>
                    <td><?= $this->Emoji->parse($file->getLog()->getMessage()) ?></td>
                    <td class="hidden-sm hidden-xs"><?= $file->getType() == 'blob' ? $this->Number->toReadableSize($file->getSize()) : '' ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
<?php else: ?>
    <div>
        <?= $this->cell('Docs', ['Git/how-to']) ?>
    </div>
<?php endif; ?>