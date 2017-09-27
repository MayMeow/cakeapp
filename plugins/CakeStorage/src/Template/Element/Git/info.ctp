<table class="table table-hover">
    <tr>
        <th><?= __('Name') ?></th>
        <td style="text-align: right"><?= h($gitRepository->name) ?></td>
    </tr>
    <tr>
        <th><?= __('Slug') ?></th>
        <td style="text-align: right"><?= h($gitRepository->slug) ?></td>
    </tr>
    <tr>
        <th><?= __('Uid') ?></th>
        <td style="text-align: right"><?= h($gitRepository->uid) ?></td>
    </tr>
    <tr>
        <th><?= __('Clone') ?> <i class="fa fa-download"></i></th>
        <td style="text-align: right"><label class="label label-info">git clone</label> <?= h($viewSack->get('clone')) ?></td>
    </tr>
    <tr>
        <th><?= __('Public access') ?> <i class="fa fa-download"></i></th>
        <td style="text-align: right"><label class="label label-info">git clone</label> <?= h($viewSack->get('publicClone')) ?></td>
    </tr>
    <tr>
        <th><?= __('User') ?></th>
        <td style="text-align: right"><?= $gitRepository->has('user') ? $this->Html->link($gitRepository->user->username, ['controller' => 'Users', 'action' => 'view', $gitRepository->user->id]) : '' ?></td>
    </tr>
    <tr>
        <th><?= __('Id') ?></th>
        <td style="text-align: right"><?= $this->Number->format($gitRepository->id) ?></td>
    </tr>
    <tr>
        <th><?= __('Default branch') ?></th>
        <td style="text-align: right"><?= h($gitRepository->default_branch) ?></td>
    </tr>
    <tr>
        <th><?= __('Created') ?></th>
        <td style="text-align: right"><?= h($gitRepository->created) ?></td>
    </tr>
    <tr>
        <th><?= __('Modified') ?></th>
        <td style="text-align: right"><?= h($gitRepository->modified) ?></td>
    </tr>
</table>