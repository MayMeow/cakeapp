<li class="timeline-block event-item">
    <div class="event-icon" style="font-size: 16px">
        <i class="far fa-pencil text-success"></i>
    </div>
    <div class="event-content">
        <div><small><?= $timestamp ?></small></div>
        <?= $data->user->username ?> has created new Issue: <strong><?= $data->title ?></strong>
        <div>
            <?= $data->text ?>
        </div>
    </div>
</li>