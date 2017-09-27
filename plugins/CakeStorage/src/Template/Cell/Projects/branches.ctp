<div class="related">

    <?php if (!empty($branches)): ?>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h4 class="panel-title"><?= __('Branches') ?>
                </h4>
            </div>
            <table class="table table-hover">
                <?php foreach ($branches as  $branch): ?>
                    <tr>
                        <td>
                            <?= $branch ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    <?php else:?>
        <div class="text-center">
            Your repository is empty.
        </div>
    <?php endif; ?>

</div>