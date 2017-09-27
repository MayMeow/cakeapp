<div class="input-group">
    <input title="clone" type="text" class="form-control input-sm" value="<?= $input_value ?>" readonly>
    <div class="input-group-btn">
        <?php foreach ($btn_group as $btn) : ?>
            <?php
            $active = ' btn-default ';
            if (array_key_exists($active_id, $this->request->getParam('pass')) && array_key_exists($active_id, $btn->getUrl())) {
                $active = ($this->request->getParam('pass'))[$active_id] == ($btn->getUrl())[$active_id] ? ' btn-info' : ' btn-default ';
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
</div>