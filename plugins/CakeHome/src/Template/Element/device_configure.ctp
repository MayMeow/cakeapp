<table class="table table-hover">
    <tr>
        <th><?= __('Name') ?></th>
        <td style="text-align: right"><?= h($device->name) ?></td>
    </tr>
    <tr>
        <th><?= __('Socket') ?></th>
        <td style="text-align: right"><?= h($device->socket) ?></td>
    </tr>
    <tr>
        <th><?= __('App Key') ?></th>
        <td style="text-align: right"><label class="label label-info">Hidden</label></td>
    </tr>
    <tr>
        <th><?= __('App Secret') ?></th>
        <td style="text-align: right"><label class="label label-info">Hidden</label></td>
    </tr>
    <tr>
        <th><?= __('Agent Type') ?></th>
        <td style="text-align: right"><?= h($device->agent_type) ?></td>
    </tr>
    <tr>
        <th><?= __('Id') ?></th>
        <td style="text-align: right"><?= $this->Number->format($device->id) ?></td>
    </tr>
    <tr>
        <th><?= __('Created') ?></th>
        <td style="text-align: right"><?= h($device->created) ?></td>
    </tr>
    <tr>
        <th><?= __('Modified') ?></th>
        <td style="text-align: right"><?= h($device->modified) ?></td>
    </tr>

    <tr>
        <th><?= __('Actions') ?> <label class="label label-info">Audio</label></th>
        <td style="text-align: right">
            <a href="<?= $this->Url->build(['action' => 'stop', $device->id]) ?>" class="btn btn-default btn-sm">Stop</a>
            <!--<a href="<?php /*= $this->Url->build(['action' => 'restart', $device->id]) */?>" class="btn btn-default btn-sm">Reboot agent</a>-->
        </td>
    </tr>
</table>

<h3 class="page-header">Configuration string</h3>
Paste this string into agent.json configuration file.
<pre><?= $configuration ?></pre>