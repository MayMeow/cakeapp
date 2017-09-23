<?php $this->layout = 'CakeBootstrap.default'; ?>
<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end() ?>

<!-- Begin page content -->
<main id="main-container">

    <!-- Content -->
    <div class="container">

        <div class="row text-center">
            <div class="col-md-12">
                <?= $this->Svg->cakeappIcon(['width' => '77px', 'height' => '77px']) ?>
                <h1>CakeApp</h1>
                <p>
                    Made with CakePHP and VueJS
                </p>
                <?= $this->Html->link('Log in', ['plugin' => 'CakeAuth', 'controller' => 'Users', 'action' => 'login'], ['class' => 'btn btn-primary']) ?>
                <?= $this->Html->link('Create account', ['plugin' => 'CakeAuth', 'controller' => 'Users', 'action' => 'add'], ['class' => 'btn btn-default']) ?>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h2>Git Repositories</h2>
                <p>Manage your source code with CakeApp</p>
                <ul>
                    <li>Unlimited private repositories</li>
                    <li>Resource Groups</li>
                    <li>Personal and project repositories</li>
                    <li>More repositories per resource group</li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h2>Issue tracker</h2>
                <p>Issues for your project</p>
                <ul>
                    <li>Issue boards</li>
                    <li>Send email to your clients right from issue view</li>
                </ul>
            </div>
        </div>


    </div>
    <!-- Content -->

</main>
<!-- End page Content -->
