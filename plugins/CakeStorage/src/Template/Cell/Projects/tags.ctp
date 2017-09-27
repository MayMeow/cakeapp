<div class="related">

    <?php if (!empty($tags)): ?>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h4 class="panel-title"><?= __('Branches') ?>
                </h4>
            </div>
            <table class="table table-hover">
                <?php foreach ($tags as  $tag): ?>
                    <tr>
                        <td>
                            <?= $tag->getName() ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    <?php else:?>
        <div class="text-center">
            Your repository don't have any tags
        </div>
    <?php endif; ?>

</div>