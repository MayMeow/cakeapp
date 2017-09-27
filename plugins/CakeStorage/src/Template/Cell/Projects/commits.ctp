<div class="related">

    <?php if (!empty($commits)): ?>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h4 class="panel-title"><?= __('Commits') ?>
                </h4>
            </div>
            <table class="table table-hover">
                <?php foreach ($commits->getCommits() as $commit): ?>
                    <tr>
                        <td>
                            <strong><?= $commit->getAuthor()->getName() ?></strong>
                            <p>
                                <?= $this->Emoji->parse($commit->getMessage()->__toString()) ?>
                            </p>
                            <small><i class="fa fa-code-commit"></i> <?= $commit->getSha() ?></small>
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