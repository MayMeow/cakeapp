<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
    <?= $top_menu->getTitle() ?>
    <span class="caret"></span>
    <ul class="dropdown-menu">
        <?php foreach ($top_menu->getEntries() as $menu_item) : ?>
            <li><a href="<?= $this->Url->build($menu_item->getUrl()) ?>"><?= $menu_item->getTitle() ?></a></li>
        <?php endforeach; ?>
    </ul>
</a>