<div class="row">
    <div class="col-md-12">
        <?php if (count($projects) > 0) : ?>

        <ul class="projects-list">
            <?php foreach ($projects as $gitRepository): ?>
                <li class="project-row">
                    <div style="margin-right: 10px">
                        <i class="fa fa-code"></i>
                    </div>
                    <div style="margin-right: 10px">
                        <strong>
                            <a href="<?= $this->Url->build(['prefix' => false, 'plugin' => 'CakeStorage', 'controller' => 'GitRepositories','action' => 'view', $gitRepository->namespace, $gitRepository->slug]) ?>">
                                <?= $gitRepository->namespace ?> /
                                <strong><?= $gitRepository->slug ?></strong>
                            </a>
                        </strong>
                    </div>
                    <div>
                        <?= $this->Emoji->parse($gitRepository->description) ?>
                    </div>
                </li>

            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
    </div>
</div>