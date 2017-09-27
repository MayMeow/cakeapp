<?php $this->layout = 'CakeBootstrap.default'; ?>
<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end() ?>

<?php $this->start('scripts_for_page'); ?>
<script>
    var board = new Vue({
        el: "#cake-vue-app",
        data: {
            loading: false,
            preload: false,
            content: true,
            loaders: {
                backlog: true
            },
            backlog: [],
            doing: [],
            done: [],
            todo: [],
            timer: ''
        },

        created() {
            this.timer = setInterval(this.loadBacklog, 30000);
        },

        beforeDestroy() {
            clearInterval(this.timer);
        },

        mounted() {
            this.loadBacklog();
        },

        methods: {
            loadBacklog: function () {
                axios.get('/cake-service/api/v1/issues/backlog.json')
                    .then(function (response) {
                        board.backlog = response.data.issues;
                        board.loaders.backlog = false;
                        console.log(board.backlog);
                    })
                    .catch(function (error) {
                        console.log(error)
                    });
            },

            checkCDN: function (labels, condition) {
                isTrue = false;
                labels.forEach(function(label, index) {
                    if (label.name === condition) {
                        isTrue = true;
                    }
                });

                return isTrue;
            }
        }
    });
</script>
<?php $this->end() ?>

<!-- Header -->
<div class="cinema border-bottom-gray with-nav-tabs">
    <div class="container-fluid">
        <h3>
            <i class="fa fa-trello"></i>
            <?= __('Board') ?>
            <div class="pull-right">

                <div class="btn-group">
                    <?= $this->Html->link(__('New Issue'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li><?= $this->Html->link(__('List Issues'), ['action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New Issue'), ['action' => 'add']) ?> </li>
                        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
                        <li><?= $this->Html->link(__('List Assignees'), ['controller' => 'Assignees', 'action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New Assignee'), ['controller' => 'Assignees', 'action' => 'add']) ?> </li>
                        <li><?= $this->Html->link(__('List Issue Comments'), ['controller' => 'IssueComments', 'action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New Issue Comment'), ['controller' => 'IssueComments', 'action' => 'add']) ?> </li>
                    </ul>
                </div>
            </div>
        </h3>
        <?= $this->element('MayMeow.Crud/admin_menu', ['admin_menu' => $crud_admin_menu]) ?>
    </div>
</div>

<!-- Begin page content -->
<main id="main-container">

    <!-- Content -->
    <div class="container-fluid">
        <div class="row text-center" style="margin-bottom: 10px">
            <div class="col-md-12">
                <div class="btn-group">
                    <a href="<?= $this->Url->build(['action' => 'index']) ?>" class="btn btn-default btn-sm">List</a>
                    <a href="<?= $this->Url->build(['action' => 'board']) ?>" class="btn btn-info btn-sm">Board</a>
                </div>
            </div>
        </div>

        <div class="row" style="height: calc(100vh - 300px); overflow: hidden">
            <div class="col-md-3 col-sm-3 height-full">
                <div class="panel panel-default" style="height: 100%;">
                    <div class="panel-heading">
                        <strong>Backlog</strong> <span v-cloak class="badge">{{backlog.length}}</span>
                    </div>
                    <div class="panel-body board-inner">
                        <div class="text-center" v-show="loaders.backlog">
                            <h2><i class="fa fa-sun-o fa-spin"></i></h2>
                        </div>
                        <ul v-cloak class="list-group">
                            <li v-for="issue in backlog" class="list-group-item">
                                <i class="fa fa-check-circle-o"></i>
                                <strong><a v-bind:href="'/cake-service/issues/view/' + issue.id">{{issue.title}}</a></strong>
                                <p>
                                    #{{issue.id}} opened by {{issue.user.username}}
                                </p>
                                <div>
                                    <label v-for="label in issue.labels" v-bind:class="'label ' + label.label_class" style="margin: 2px">{{label.name}}</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 height-full">
                <div class="panel panel-default" style="height: 100%;">
                    <div class="panel-heading">
                        <strong>ToDo</strong> <span v-cloak class="badge">{{todo.length}}</span>
                    </div>
                    <div class="panel-body board-inner">
                        <div class="text-center" v-show="loaders.backlog">
                            <h2><i class="fa fa-sun-o fa-spin"></i></h2>
                        </div>
                        <ul v-cloak class="list-group">
                            <li v-for="issue in backlog" v-if="checkCDN(issue.labels, 'to-do')" class="list-group-item">
                                <i class="fa fa-check-circle-o"></i>
                                <strong><a v-bind:href="'/cake-service/issues/view/' + issue.id">{{issue.title}}</a></strong>
                                <p>
                                    #{{issue.id}} opened by {{issue.user.username}}
                                </p>
                                <div>
                                    <label v-for="label in issue.labels" v-bind:class="'label ' + label.label_class" style="margin: 2px">{{label.name}}</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 height-full">
                <div class="panel panel-default" style="height: 100%;">
                    <div class="panel-heading">
                        <strong>Doing</strong> <span v-cloak class="badge">{{doing.length}}</span>
                    </div>
                    <div class="panel-body board-inner">
                        <div class="text-center" v-show="loaders.backlog">
                            <h2><i class="fa fa-sun-o fa-spin"></i></h2>
                        </div>
                        <ul v-cloak class="list-group">
                            <li v-for="issue in backlog" v-if="checkCDN(issue.labels, 'doing')" class="list-group-item">
                                <i class="fa fa-check-circle-o"></i>
                                <strong><a v-bind:href="'/cake-service/issues/view/' + issue.id">{{issue.title}}</a></strong>
                                <p>
                                    #{{issue.id}} opened by {{issue.user.username}}
                                </p>
                                <div>
                                    <label v-for="label in issue.labels" v-bind:class="'label ' + label.label_class" style="margin: 2px">{{label.name}}</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 height-full">
                <div class="panel panel-default" style="height: 100%;">
                    <div class="panel-heading">
                        <strong>Done</strong> <span v-cloak class="badge">{{done.length}}</span>
                    </div>
                    <div class="panel-body board-inner">
                        <div class="text-center" v-show="loaders.backlog">
                            <h2><i class="fa fa-sun-o fa-spin"></i></h2>
                        </div>
                        <ul v-cloak class="list-group">
                            <li v-for="issue in backlog" v-if="checkCDN(issue.labels, 'done')"class="list-group-item">
                                <i class="fa fa-check-circle-o"></i>
                                <strong><a v-bind:href="'/cake-service/issues/view/' + issue.id">{{issue.title}}</a></strong>
                                <p>
                                    #{{issue.id}} opened by {{issue.user.username}}
                                </p>
                                <div>
                                    <label v-for="label in issue.labels" v-bind:class="'label ' + label.label_class" style="margin: 2px">{{label.name}}</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Content -->

</main>
<!-- End page Content -->
