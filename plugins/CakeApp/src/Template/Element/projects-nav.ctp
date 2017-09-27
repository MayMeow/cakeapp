<div class="border-bottom-gray projects-nav" style="padding-bottom: 0;">
    <div class="container text-center" style="height: 50px; line-height: 50px">
        <ul class="nav">
            <?php foreach ($navItems as $navItem) : ?>
                <li><?= $this->Html->link(__($navItem->getTitle()), $navItem->getUrl(), ['escape' => false]) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>