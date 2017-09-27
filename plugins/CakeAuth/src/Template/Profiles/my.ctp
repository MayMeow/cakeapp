<?php $this->start('scripts_for_page'); ?>
<script>
    var board = new Vue({
        el: "#cake-vue-app",
        data: {
            loading: false,
            preload: false,
            content: true,
            loaders: {
                project: true
            },
            projects: [],
            timer: '',
            id: <?=  $profile->user_id ?>
        },

        created() {
            //this.timer = setInterval(this.loadBacklog, 30000);
        },

        beforeDestroy() {
            //clearInterval(this.timer);
        },

        mounted() {
            this.loadProjects();
        },

        methods: {
            loadProjects: function () {
                axios.get('/cake-storage/api/git-repositories/projects/' + this.id + '.json')
                    .then(function (response) {
                        board.projects = response.data.html;
                        board.loaders.project = false;
                        console.log(board.projects);
                    })
                    .catch(function (error) {
                        console.log(error)
                    });
            }
        }
    });
</script>
<?php $this->end() ?>

<?php $this->extend('CakeApp.Common/view-col3-col9');?>

<?php $this->assign('page-title', 'Profiles'); ?>

<?php $this->start('page-menu'); ?>
<?php $this->end() ?>

<?php $this->start('header-buttons'); ?>
<?php $this->end() ?>

<?php $this->start('breadcrumb'); ?>
<ol class="breadcrumb">
    <li><a href="#">
            <?= $profile->user->image !== null ? $this->Html->image($profile->user->image, ['height' => '18', 'width' => '18', 'class' => 'img img-circle']) : '<i class="fa fa-user-circle-o"></i>'?>
        </a></li>
    <li class="active"><?= h($profile->name) ?></li>
</ol>
<?php $this->end() ?>

<?php $this->start('sidebar-content'); ?>
<p><?= $profile->user->image !== null ? $this->Html->image($profile->user->image, ['class' => 'img img-responsive']) : '<i class="fa fa-user-circle-o"></i>'?></p>
<h2><?= h($profile->name) ?></h2>
<h4><?= h($profile->user->username) ?></h4>
<p><?= $this->Emoji->parse($profile->bio) ?></p>
<p><?= $profile->company ? '<i class="fa fa-building-o"></i> ' . h($profile->company) : '' ?></p>
<p><?= $profile->url ? '<i class="fa fa-link"></i> ' . h($profile->url) : '' ?></p>
<p><?= $profile->location ? '<i class="fa fa-map-pin"></i> ' . h($profile->location) : '' ?></p>
<?php $this->end() ?>

<!-- Begin page content -->

<div class="row">
    <div class="col-md-12" style="font-size: 1.17em">
        <?= $this->Emoji->parse($profile->bio) ?>
    </div>
</div>

<div class="text-center" v-show="loaders.project">
    <h1><i class="fa fa-sun-o fa-spin"></i></h1>
</div>
<div v-html="projects" v-cloak></div>

<!-- End page Content -->
