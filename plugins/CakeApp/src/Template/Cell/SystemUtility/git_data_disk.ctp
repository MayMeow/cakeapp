<strong><?= $disk['path'] ?></strong>
<p>
    <?= $this->Number->toReadableSize($disk['free']) ?> free of
    <?= $this->Number->toReadableSize($disk['total']) ?>
</p>
