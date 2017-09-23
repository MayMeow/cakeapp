<template>
    <div>
    <!-- Header -->
    <div class="cinema border-bottom-gray with-nav-tabs">
        <div class="container-fluid">
            <h3>
                <i class="fa fa-trello"></i>
                Board
                <div class="pull-right">

                    <div class="btn-group">
                        <a href="#" class="btn btn-sm btn-default">New Issue</a>
                        <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-chevron-down"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-left">
                            <li><a href="#">Index</a></li>
                        </ul>
                    </div>
                </div>
            </h3>
        </div>
    </div>

    <!-- Begin page content -->
    <div id="main-container">
        <!-- Content -->
        <div class="container-fluid">

            <div class="row" style="height: calc(100vh - 290px); overflow: hidden">
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
                                    <strong>
                                        <router-link :to="{ name: 'IssueView', params: { id: issue.id } }">{{issue.title}}</router-link>
                                    </strong>
                                    <p>
                                        #{{issue.id}} opened by {{issue.user.username}}
                                    </p>
                                    <div>
                                        <label v-for="label in issue.labels" v-bind:class="'label ' + label.label_class"
                                               style="margin: 2px">{{label.name}}</label>
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
                                <li v-for="issue in backlog" v-if="checkCDN(issue.labels, 'todo')"
                                    class="list-group-item">
                                    <i class="fa fa-check-circle-o"></i>
                                    <strong>
                                        <router-link :to="{ name: 'IssueView', params: { id: issue.id } }">{{issue.title}}</router-link>
                                    </strong>
                                    <p>
                                        #{{issue.id}} opened by {{issue.user.username}}
                                    </p>
                                    <div>
                                        <label v-for="label in issue.labels" v-bind:class="'label ' + label.label_class"
                                               style="margin: 2px">{{label.name}}</label>
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
                                <li v-for="issue in backlog" v-if="checkCDN(issue.labels, 'Doing')"
                                    class="list-group-item">
                                    <i class="fa fa-check-circle-o"></i>
                                    <strong>
                                        <router-link :to="{ name: 'IssueView', params: { id: issue.id } }">{{issue.title}}</router-link>
                                    </strong>
                                    <p>
                                        #{{issue.id}} opened by {{issue.user.username}}
                                    </p>
                                    <div>
                                        <label v-for="label in issue.labels" v-bind:class="'label ' + label.label_class"
                                               style="margin: 2px">{{label.name}}</label>
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
                                <li v-for="issue in backlog" v-if="checkCDN(issue.labels, 'Done')"
                                    class="list-group-item">
                                    <i class="fa fa-check-circle-o"></i>
                                    <strong>
                                        <router-link :to="{ name: 'IssueView', params: { id: issue.id } }">{{issue.title}}</router-link>
                                    </strong>
                                    <p>
                                        #{{issue.id}} opened by {{issue.user.username}}
                                    </p>
                                    <div>
                                        <label v-for="label in issue.labels" v-bind:class="'label ' + label.label_class"
                                               style="margin: 2px">{{label.name}}</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content -->
    </div>
    <!-- End page Content -->
</div>
</template>


<script>
    export default {
        name: 'board',

        data() {
            return {
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
            }
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
                var self = this;

                axios.get('/cake-service/api/v1/issues/backlog.json')
                    .then(function (response) {
                        self.backlog = response.data.issues;
                        self.loaders.backlog = false;
                        console.log(self.backlog);
                    })
                    .catch(function (error) {
                        console.log(error)
                    });
            },

            checkCDN: function (labels, condition) {
                let isTrue = false;
                labels.forEach(function (label, index) {
                    if (label.name === condition) {
                        isTrue = true;
                    }
                });

                return isTrue;
            }
        }
    }
</script>
