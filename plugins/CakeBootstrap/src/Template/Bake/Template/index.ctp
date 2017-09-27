<%
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.1.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Utility\Inflector;

$fields = collection($fields)
    ->filter(function($field) use ($schema) {
        return !in_array($schema->columnType($field), ['binary', 'text']);
    })
    ->take(7);
%>
<?php $this->extend('CakeApp.Common/index');?>

<?php $this->assign('page-title', '<%= $pluralHumanName %>'); ?>

<?php $this->start('page-menu'); ?>
<?php $this->end() ?>

<?php $this->start('header-buttons'); ?>
<div class="btn-group">
    <?= $this->Html->link(__('New <%= $singularHumanName %>'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-chevron-down"></i>
    </button>
    <ul class="dropdown-menu dropdown-menu-left">
        <li><?= $this->Html->link(__('List <%= $pluralHumanName %>'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New <%= $singularHumanName %>'), ['action' => 'add']) ?> </li>
        <%
        $done = [];
        foreach ($associations as $type => $data) {
        foreach ($data as $alias => $details) {
        if ($details['controller'] !== $this->name && !in_array($details['controller'], $done)) {
        %>
        <li><?= $this->Html->link(__('List <%= $this->_pluralHumanName($alias) %>'), ['controller' => '<%= $details['controller'] %>', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New <%= Inflector::humanize(Inflector::singularize(Inflector::underscore($alias))) %>'), ['controller' => '<%= $details['controller'] %>', 'action' => 'add']) ?> </li>
        <%
        $done[] = $details['controller'];
        }
        }
        }
        %>
    </ul>
</div>
<?php $this->end() ?>

<?php $this->start('breadcrumb'); ?>
<?php $this->end() ?>

<!-- Begin page content -->

<?php if(count($<%= $pluralVar %>) > 0) : ?>
<div class="row">
    <div class="col-md-12">

        <div class="table-responsive">
            <table class="table table-hover table-vcenter">
                <thead>
                <tr>
                    <% foreach ($fields as $field): %>
                    <td><?= $this->Paginator->sort('<%= $field %>') ?></td>
                    <% endforeach; %>
                    <td class="actions text-center"><?= __('Actions') ?></td>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($<%= $pluralVar %> as $<%= $singularVar %>): ?>
                <tr>
                    <%        foreach ($fields as $field) {
                    $isKey = false;
                    if (!empty($associations['BelongsTo'])) {
                    foreach ($associations['BelongsTo'] as $alias => $details) {
                    if ($field === $details['foreignKey']) {
                    $isKey = true;
                    %>
                    <td>
                        <?= $<%= $singularVar %>->has('<%= $details['property'] %>') ? $this->Html->link($<%= $singularVar %>-><%= $details['property'] %>-><%= $details['displayField'] %>, ['controller' => '<%= $details['controller'] %>', 'action' => 'view', $<%= $singularVar %>-><%= $details['property'] %>-><%= $details['primaryKey'][0] %>]) : '' ?>
                    </td>
                    <%
                    break;
                    }
                    }
                    }
                    if ($isKey !== true) {
                    if (!in_array($schema->columnType($field), ['integer', 'biginteger', 'decimal', 'float'])) {
                    %>
                    <td><?= h($<%= $singularVar %>-><%= $field %>) ?></td>
                    <%
                    } else {
                    %>
                    <td><?= $this->Number->format($<%= $singularVar %>-><%= $field %>) ?></td>
                    <%
                    }
                    }
                    }

                    $pk = '$' . $singularVar . '->' . $primaryKey[0];
                    %>
                    <td class="actions text-center">
                        <div class="btn-group">
                            <?= $this->Html->link(__('View'), ['action' => 'view', <%= $pk %>], ['class' => 'btn btn-xs btn-default']) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', <%= $pk %>], ['class' => 'btn btn-xs btn-default']) ?>
                            <button class="btn btn-xs btn-danger" type="button" data-toggle="modal" data-target="#modal-delete-<?= <%= $pk %>?>">Delete</button>

                        </div>
                        <?= $this->element('CakeBootstrap.deletemodal', ['id' => <%= $pk %>, 'name' => <%= $pk %>]); ?>
                    </td>
                </tr>

                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <ul class="pagination">
            <?php //echo $this->Paginator->prev('< ' . __('previous')) ?>
                            <?= $this->Paginator->numbers() ?>
                            <?php //echo $this->Paginator->next(__('next') . ' >') ?>
        </ul>
    </div>
</div>

<?php else : ?>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body text-center">
                <h2><i class="fa fa-plus-square-o text-amethyst"></i></h2>
                <p><strong>You currently have now <%= $pluralHumanName %></strong></p>
                <p>To get started, click to button bellow and create new <%= $singularHumanName %></p>
                <?= $this->Html->link(__('Add new <%= $singularHumanName %>'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>

<!-- End page Content -->
