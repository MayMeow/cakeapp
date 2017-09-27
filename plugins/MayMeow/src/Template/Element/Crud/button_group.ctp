<div class="btn-group">
    <?php foreach ($btn_group as $key => $btn) : ?>
        <?php
        $active = ' btn-default ';
            if (array_key_exists($activeId, $this->request->getParam('pass')) && array_key_exists($activeId, $btn->getUrl())) {
                $active = ($this->request->getParam('pass'))[$activeId] == ($btn->getUrl())[$activeId] ? ' btn-info' : ' btn-default ';
            }

            // IF section param is not set mark first menu item as active
            if (!array_key_exists(1,$this->request->getParam('pass')) && $key == 0) {
                $active = 'btn-info';
            }

            $btnClass = ['class' => 'btn btn-sm '. $active, 'escape' => false];
        ?>
        <?= $this->Html->link(__($btn->getTitle()), $btn->getUrl(), $btnClass) ?>
    <?php endforeach; ?>
</div>

