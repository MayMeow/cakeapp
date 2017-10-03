<ul>
    <?php foreach ($items as $menu_item) : ?>
        <li class="<?= $menu_item->hasActivePlugin($this->request->params['plugin']) ? 'active' : '' ?>"><a href="<?= $this->Url->build($menu_item->getUrl()) ?>"><?= $menu_item->getTitle() ?></a>
            <?php if ($this->request->params['plugin'] == ($menu_item->getUrl())['plugin']): ?>
                <ul class="sidebar-sub-nav">
                    <?php foreach ($menu_item->getEntries() as $action_item) : ?>
                        <li
                            class="<?= $this->request->params['controller'] == ($action_item->getUrl())['controller'] ? 'active' : '' ?>">
                            <?= $this->Html->link(__($action_item->getTitle()), $action_item->getUrl(), $action_item->getOptions()) ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</ul>
