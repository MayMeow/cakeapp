<?php $this->extend('CakeApp./Common/view-col9-col3'); ?>

<?php $this->assign('page-title', 'Issues'); ?>

<?php $this->start('page-menu'); ?>
<?= $this->element('MayMeow.Crud/admin_menu', ['admin_menu' => $crud_admin_menu]) ?>
<?php $this->end() ?>

<?php $this->start('header-buttons'); ?>
<div class="btn-group">
    <?= $this->Html->link(__('New Issue'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
    <?= $this->Html->link(__('<i class="fa fa-level-up"></i>'), ['action' => 'board'], ['class' => 'btn btn-sm btn-default', 'escape' => false]) ?>
    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-chevron-down"></i>
    </button>
    <ul class="dropdown-menu dropdown-menu-left">
        <li><?= $this->Html->link(__('Edit Issue'), ['action' => 'edit', $issueID]) ?> </li>
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
<?php $this->end() ?>

<?php $this->start('breadcrumb'); ?>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-stet"></i></a></li>
    <li><a href="#">Service desk</i></a></li>
    <li class="active"><label class="label label-default">Issues</label></li>
</ol>
<?php $this->end() ?>


<?php $this->start('sidebar-content') ?>
<div class="right-sidebar">
    <div class="block">
        <div><?= __('Title') ?></div>
        <div class="block-content">{{issue.title}}</div>
    </div>
    <div class="block">
        <div><?= __('User') ?></div>
        <div class="block-content">
            {{issue.user.username}}
        </div>
    </div>
    <div class="block">
        <div><?= __('Id') ?></div>
        <div class="block-content">{{issue.id}}</div>
    </div>
    <div class="block">
        <div><?= __('Finished') ?></div>
        <div class="block-content">{{issue.finished}}</div>
    </div>
    <div class="block">
        <div><?= __('Estimate') ?></div>
        <div class="block-content">{{issue.estimate}}</div>
    </div>
    <div class="block">
        <div><?= __('Due Date') ?></div>
        <div class="block-content">{{issue.due_date}}</div>
    </div>
    <div class="block">
        <div><?= __('Chat room') ?></div>
        <div class="block-content"><a href="#">Create new</a></div>
    </div>
    <div class="block">
        <div><?= __('Created') ?></div>
        <div class="block-content">{{issue.created}}</div>
    </div>
    <div class="block">
        <div><?= __('Modified') ?></div>
        <div class="block-content">{{issue.modified}}</div>
    </div>
    <div class="block">
        <div>Labels</div>
        <div class="block-content">
            <label v-for="label in issue.labels" v-bind:class="'label ' + label.label_class"
                   style="margin: 2px">{{label.name}}</label>
        </div>
    </div>
    <div class="block">
        <?= $this->Html->link(__('More issues'), ['action' => 'index'], ['class' => 'btn btn-sm btn-default btn-block', 'escape' => false]) ?>
    </div>
</div>
<?php $this->end() ?>

<!-- Begin page content -->

<div id="issue-app" v-cloak>
    <div class="border-bottom-gray" style="margin-bottom: 10px">
        <ul style="display: flex; align-items: center; list-style: none; padding: 0; margin: 0">
            <li>
                <div v-if="issue.finished == false" class="avatar-rounded bg-success avatar-sq30p" style="margin-right: 10px">
                    <div class="avatar-content"><i class="far fa-circle"></i></div>
                </div>
                <div v-else class="avatar-rounded bg-danger avatar-sq30p" style="margin-right: 10px">
                    <div class="avatar-content"><i class="far fa-circle"></i></div>
                </div>
            </li>
            <li>
                <h2>{{issue.title}}</h2>
            </li>
        </ul>
        <div v-html="marked(issue.description)"></div>
    </div>

    <div style="padding-bottom: 10px">
        <button class="btn btn-default" id="upvote-count" data-issue-id="<?= $issueID ?>"
                v-on:click="upVote(<?= $issueID ?>)">
            <span>{{issue.vote_up_count}}</span> <?= $this->Emoji->parse(':thumbsup:') ?>
        </button>
        <button class="btn btn-default" id="down-vote" data-issue-id="<?= $issueID ?>" v-on:click="downVote(<?= $issueID ?>)"><span
                    id="downvote-count">{{issue.vote_down_count}}</span> <?= $this->Emoji->parse(':thumbsdown:') ?>
        </button>
        <button v-if="issue.finished == false" class="btn btn-warning" id="close-issue" data-issue-id="<?= $issueID ?>" v-on:click="closeIssue(<?= $issueID ?>)">Close issue</button>
        <button v-else class="btn btn-success">Reopen Issue</button>
        <button class="btn btn-default">Create task</button>
    </div>




    <div class="related">
        <table class="table table-hover">
            <tr v-for="comment in issue.comments">
                <td style="width: 30px;"><i class="fa fa-comment-o"></i></td>
                <td><strong>{{ comment.user.username }}</strong> <label class="label label-info">{{ comment.created
                        }}</label>
                    <p v-highlightjs v-html="marked(comment.message)"></p>
                </td>
            </tr>
        </table>
    </div>

    <div style="margin-bottom: 10px">

        <form action="<?= $this->Url->build(['action' => 'addComment', $issueID]) ?>" accept-charset="utf8"
              @submit.prevent="onSubmit">
            <div class="form-group">
                <label for="newComment">Message</label>
                <textarea id="newComment" class="form-control" name="comment" v-model="newComment.message"
                          aria-describedby="messageHelpText" required></textarea>
                <span id="messageHelpText" class="form-text" v-text="errors.get('comment')"></span>
            </div>
            <button class="btn btn-success">Send</button>
        </form>
    </div>
</div>

<!-- End page Content -->

<?php $this->start('scripts_for_page'); ?>
<?= $this->Html->script('CakeService.cake-service') ?>
<?= $this->Html->script('vue-app/directives') ?>
<?= $this->Html->script('vue-app/core/Form') ?>
<?= $this->Html->script('vue-app/core/Errors') ?>
<script>

    //var markdownit = new markdownit();

    let reader = new commonmark.Parser();
    let writer = new commonmark.HtmlRenderer();

    let test = new Vue({
        el: "#cake-vue-app",

        data: {
            issue: {
                user: [],
                comments: [],
                description: ''
            },
            message: '',
            loading: true,
            preload: true,
            content: false,
            timer: '',
            newComment: new Form({
                user_id: '',
                message: ''
            }),
            errors: new Errors(),
            id: <?= $issueID ?>
        },
        mounted() {
            this.fetchData(this.id);
        },

        created() {
            this.timer = setInterval(this.fetchData(this.id), 30000);
        },

        methods: {
            upVote: function (id) {
                test.loading = true;
                $.get('/cake-service/api/v1/issues/up-vote/' + id + '.json').then(function (response) {
                    //Vue.set('message', response.response.data)
                    test.issue.vote_up_count = response.response.data;
                    console.log(this.message);
                    test.loading = false;
                    test.content = true;
                }, function (response) {

                });
            },

            downVote: function (id) {
                test.loading = true;
                $.get('/cake-service/api/v1/issues/down-vote/' + id + '.json').then(function (response) {
                    //Vue.set('message', response.response.data)
                    test.issue.vote_down_count = response.response.data;
                    console.log(this.message);
                    test.loading = false;
                    test.content = true;
                }, function (response) {

                });
            },

            closeIssue: function (id) {
                test.loading = true;
                $.get('/cake-service/api/v1/issues/close/' + id + '.json').then(function (response) {
                    //Vue.set('message', response.response.data)
                    test.issue.vote_down_count = response.response.data;
                    console.log(this.message);
                    test.loading = false;
                    test.content = true;
                }, function (response) {
                });
                this.fetchData(this.id);
            },

            fetchData: function (id) {
                axios.get('/cake-service/api/v1/issues/view/' + id + '.json')
                    .then(function (response) {
                        //console.log(response);
                        test.issue = response.data.issue;
                        //test.issue.userUrl = '/cake-auth/users/view/' + response.issue.user.id;
                        //console.log(test.issue);
                        test.loading = false;
                        test.preload = false;
                        test.content = true;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

            onSubmit: function () {
                //var id = this.id;
                console.log(this.newComment);
                axios.post('/cake-service/api/v1/issues/add-comment/' + this.id + '.json', this.newComment)
                    .then(this.onSuccess)
                    .catch(error => this.errors.record(error.this.data));
            },

            onSuccess: function (response) {
                this.newComment.reset();
                test.fetchData(this.id);
                //window.scrollTo(0,document.body.scrollHeight);
                // window.location.replace('/cake-service/issues');
            },

            marked: function (input) {
                let parsed = reader.parse(input);
                return emojione.shortnameToUnicode(writer.render(parsed));
            }
        }
    });
</script>

<?php $this->end() ?>
