<ul class="nav nav-tabs">
    <?php foreach ($admin_menu as $menu_item) : ?>
        <li role="presentation"
            class="<?= $this->request->params['controller'] == ($menu_item->getUrl())['controller'] ? 'active' : '' ?>">
            <?= $this->Html->link(__($menu_item->getTitle()), $menu_item->getUrl(), $menu_item->getOptions()) ?>
        </li>
    <?php endforeach; ?>
</ul>
