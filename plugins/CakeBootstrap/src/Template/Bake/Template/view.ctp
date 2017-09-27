<%
use Cake\Utility\Inflector;

$associations += ['BelongsTo' => [], 'HasOne' => [], 'HasMany' => [], 'BelongsToMany' => []];
$immediateAssociations = $associations['BelongsTo'] + $associations['HasOne'];
$associationFields = collection($fields)
    ->map(function($field) use ($immediateAssociations) {
        foreach ($immediateAssociations as $alias => $details) {
            if ($field === $details['foreignKey']) {
                return [$field => $details];
            }
        }
    })
    ->filter()
    ->reduce(function($fields, $value) {
        return $fields + $value;
    }, []);

$groupedFields = collection($fields)
    ->filter(function($field) use ($schema) {
        return $schema->columnType($field) !== 'binary';
    })
    ->groupBy(function($field) use ($schema, $associationFields) {
        $type = $schema->columnType($field);
        if (isset($associationFields[$field])) {
            return 'string';
        }
        if (in_array($type, ['integer', 'float', 'decimal', 'biginteger'])) {
            return 'number';
        }
        if (in_array($type, ['date', 'time', 'datetime', 'timestamp'])) {
            return 'date';
        }
        return in_array($type, ['text', 'boolean']) ? $type : 'string';
    })
    ->toArray();

$groupedFields += ['number' => [], 'string' => [], 'boolean' => [], 'date' => [], 'text' => []];
$pk = "\$$singularVar->{$primaryKey[0]}";
%>
<?php $this->extend('CakeApp.Common/view');?>

<?php $this->assign('page-title', '<%= $singularVar %>-><%= $displayField %>'); ?>

<?php $this->start('page-menu'); ?>
<?php $this->end() ?>

<?php $this->start('header-buttons'); ?>
<div class="btn-group">
    <?= $this->Html->link(__('New <%= $singularHumanName %>'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-chevron-down"></i>
    </button>
    <ul class="dropdown-menu dropdown-menu-left">
        <li><?= $this->Html->link(__('Edit <%= $singularHumanName %>'), ['action' => 'edit', <%= $pk %>]) ?> </li>
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

<table class="table table-hover">
    <% if ($groupedFields['string']) : %>
    <% foreach ($groupedFields['string'] as $field) : %>
    <% if (isset($associationFields[$field])) :
    $details = $associationFields[$field];
    %>
    <tr>
        <th><?= __('<%= Inflector::humanize($details['property']) %>') ?></th>
        <td style="text-align: right"><?= $<%= $singularVar %>->has('<%= $details['property'] %>') ? $this->Html->link($<%= $singularVar %>-><%= $details['property'] %>-><%= $details['displayField'] %>, ['controller' => '<%= $details['controller'] %>', 'action' => 'view', $<%= $singularVar %>-><%= $details['property'] %>-><%= $details['primaryKey'][0] %>]) : '' ?></td>
    </tr>
    <% else : %>
    <tr>
        <th><?= __('<%= Inflector::humanize($field) %>') ?></th>
        <td style="text-align: right"><?= h($<%= $singularVar %>-><%= $field %>) ?></td>
    </tr>
    <% endif; %>
    <% endforeach; %>
    <% endif; %>
    <% if ($associations['HasOne']) : %>
    <%- foreach ($associations['HasOne'] as $alias => $details) : %>
    <tr>
        <th><?= __('<%= Inflector::humanize(Inflector::singularize(Inflector::underscore($alias))) %>') ?></th>
        <td style="text-align: right"><?= $<%= $singularVar %>->has('<%= $details['property'] %>') ? $this->Html->link($<%= $singularVar %>-><%= $details['property'] %>-><%= $details['displayField'] %>, ['controller' => '<%= $details['controller'] %>', 'action' => 'view', $<%= $singularVar %>-><%= $details['property'] %>-><%= $details['primaryKey'][0] %>]) : '' ?></td>
    </tr>
    <%- endforeach; %>
    <% endif; %>
    <% if ($groupedFields['number']) : %>
    <% foreach ($groupedFields['number'] as $field) : %>
    <tr>
        <th><?= __('<%= Inflector::humanize($field) %>') ?></th>
        <td style="text-align: right"><?= $this->Number->format($<%= $singularVar %>-><%= $field %>) ?></td>
    </tr>
    <% endforeach; %>
    <% endif; %>
    <% if ($groupedFields['date']) : %>
    <% foreach ($groupedFields['date'] as $field) : %>
    <tr>
        <th><%= "<%= __('" . Inflector::humanize($field) . "') %>" %></th>
        <td style="text-align: right"><?= h($<%= $singularVar %>-><%= $field %>) ?></td>
    </tr>
    <% endforeach; %>
    <% endif; %>
    <% if ($groupedFields['boolean']) : %>
    <% foreach ($groupedFields['boolean'] as $field) : %>
    <tr>
        <th><?= __('<%= Inflector::humanize($field) %>') ?></th>
        <td style="text-align: right"><?= $<%= $singularVar %>-><%= $field %> ? __('Yes') : __('No'); ?></td>
    </tr>
    <% endforeach; %>
    <% endif; %>
</table>



    <% if ($groupedFields['text']) : %>
    <% foreach ($groupedFields['text'] as $field) : %>
<div class="">
    <h4><?= __('<%= Inflector::humanize($field) %>') ?></h4>
    <?= $this->Text->autoParagraph(h($<%= $singularVar %>-><%= $field %>)); ?>
</div>
    <% endforeach; %>
    <% endif; %>
    <%
    $relations = $associations['HasMany'] + $associations['BelongsToMany'];
    foreach ($relations as $alias => $details):
    $otherSingularVar = Inflector::variable($alias);
    $otherPluralHumanName = Inflector::humanize(Inflector::underscore($details['controller']));
    %>
<div class="related">
    <?php if (!empty($<%= $singularVar %>-><%= $details['property'] %>)): ?>
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4 class="panel-title"><?= __('Related <%= $otherPluralHumanName %>') ?>
                         <?= $this->Html->link(__('CREATE'), ['controller' => '<%= $details['controller'] %>', 'action' => 'add']) ?>
            </h4>
        </div>
        <table class="table table-hover">
            <tr>
                <% foreach ($details['fields'] as $field): %>
                <td><?= __('<%= Inflector::humanize($field) %>') ?></td>
                <% endforeach; %>
                <td class="actions"><?= __('Actions') ?></td>
            </tr>
            <?php foreach ($<%= $singularVar %>-><%= $details['property'] %> as $<%= $otherSingularVar %>): ?>
            <tr>
                <%- foreach ($details['fields'] as $field): %>
                <td><?= h($<%= $otherSingularVar %>-><%= $field %>) ?></td>
                <%- endforeach; %>
                <%- $otherPk = "\${$otherSingularVar}->{$details['primaryKey'][0]}"; %>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => '<%= $details['controller'] %>', 'action' => 'view', <%= $otherPk %>]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => '<%= $details['controller'] %>', 'action' => 'edit', <%= $otherPk %>]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => '<%= $details['controller'] %>', 'action' => 'delete', <%= $otherPk %>], ['confirm' => __('Are you sure you want to delete # {0}?', <%= $otherPk %>)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php endif; ?>
</div>
    <% endforeach; %>

<!-- End page Content -->
