<?php
/**
 * Rocket.CMS : Your Social CMS (http://rocketcms.eu)
 * Copyright (c) Martin Kukolos (http://kukolos.eu)
 *
 * For full copyright and licence information, please see the LICENCE.txt
 * Redistributions of files must retain the above copyright notice
 *
 * @copyright Copyright (c) Martin Kukolos (http://kukolos.eu)
 * @link http://rocketcms.eu The Rocket CMS Project
 * @since 0.1.0
 * @licence http://rocketcms.eu/licence
 *
 * @author Martin
 * @created 15.6.16 14:15
 */

$this->layout = 'CakeBootstrap.default'; ?>

<div class="cinema border-bottom-gray">
    <div class="container">
        <h3><?= $this->Svg->cakeappIcon(['width' => '20px', 'height' => '20px']) ?> <?= __('Login') ?>
        </h3>
    </div>
</div>

<main id="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?= $this->Emoji->parse('Cloud :cloud: application made with CakePHP :birthday: and VueJS.') ?>
                <div style="text-align: center; padding-top: 16px">
                    <?= $this->Html->image('startup.png', ['class' => 'img img-responsive']) ?>
                </div>
            </div>
            <div class="col-md-4">
                <h3>Login</h3>
                <?= $this->Form->create() ?>
                <?= $this->Form->input('username') ?>
                <?= $this->Form->input('password') ?>
                <?= $this->Form->button(__('Login')); ?>
                <?= $this->Html->link('Forgotten passowrd?', ['action' => 'forgottenPassword']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</main>
