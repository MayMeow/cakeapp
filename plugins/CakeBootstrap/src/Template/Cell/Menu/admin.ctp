<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i
            class="fa fa-th text-modern"></i></a>
    <ul class="dropdown-menu">
        <?php foreach ($menu as $menuItem): ?>

            <?php
                $link = [
                    'prefix' => $menuItem['prefix'],
                    'controller' => $menuItem['controller'],
                    'plugin' => $menuItem['plugin'],
                    'action' => 'index'
                ];
            ?>

            <li><a href="<?= $this->Url->build($link); ?>"><?= $menuItem['controller'] ?></a></li>
        <?php endforeach; ?>
    </ul>

</li>
