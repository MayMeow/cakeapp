<template>
    <div v-cloak>

        <!-- Header -->
        <div id="issue-app" v-cloak>
            <div class="cinema border-bottom-gray with-nav-tabs">
                <div class="container">
                    <h3>
                        <i class="fa fa-folder-open"></i> Issues / Issue
                        <label v-if="issue.finished === true" class="label label-danger">Closed</label>
                        <label v-else class="label label-success">Open</label>
                        <i v-show="loading" class="fa fa-sun-o fa-spin"></i>
                        <div class="pull-right">
                            <div class="btn-group">
                                <a href="#" class="btn btn-sm btn-default">New Issue</a>
                                <router-link to="/board" class="btn btn-sm btn-default"><i class="fa fa-level-up"></i></router-link>
                                <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-left">
                                    <li><a href="#">Test</a></li>
                                </ul>
                            </div>
                        </div>
                    </h3>

                </div>
            </div>

        <!-- Begin page content -->
        <main id="main-container" style="padding-top: 0">

            <!-- Content -->
            <div class="container">

                <div class="border-bottom-gray" style="margin-bottom: 10px">
                    <h2>{{issue.title}}</h2> <br/>
                    <div v-html="marked(issue.description)"></div>
                </div>

                <div style="padding-bottom: 10px">
                    <button class="btn btn-default" id="upvote-count" data-issue-id="1"
                            v-on:click="upVote(1)">
                        <span>{{message}}</span> Like</button>
                    <button class="btn btn-default" id="down-vote" data-issue-id="1"><span
                                id="downvote-count">0</span> Dislike</button>
                    <button class="btn btn-success">Close issue</button>
                    <button class="btn btn-default">Create task</button>
                </div>

                <table class="table table-hover">
                    <tr>
                        <th>Title</th>
                        <td style="text-align: right">{{issue.title}}</td>
                    </tr>
                    <tr>
                        <th>User</th>
                        <td style="text-align: right">
                            {{issue.user.username}}
                        </td>
                    </tr>
                    <tr>
                        <th>ID</th>
                        <td style="text-align: right">{{issue.id}}</td>
                    </tr>
                    <tr>
                        <th>Estimate</th>
                        <td style="text-align: right">{{issue.estimate}}</td>
                    </tr>
                    <tr>
                        <th>Due date</th>
                        <td style="text-align: right">{{issue.due_date}}</td>
                    </tr>
                    <tr>
                        <th>Created</th>
                        <td style="text-align: right">{{issue.created}}</td>
                    </tr>
                    <tr>
                        <th>Modified</th>
                        <td style="text-align: right">{{issue.modified}}</td>
                    </tr>
                    <tr>
                        <th>Labels</th>
                        <td style="text-align: right">
                            <label v-for="label in issue.labels" v-bind:class="'label ' + label.label_class"
                                   style="margin: 2px">{{label.name}}</label>
                        </td>
                    </tr>
                </table>


                <div class="related">
                    <table class="table table-hover">
                        <tr v-for="comment in issue.comments">
                            <td style="width: 30px;"><i class="fa fa-comment-o"></i></td>
                            <td><strong>{{comment.user.username}}</strong> <label class="label label-info">{{comment.created}}</label>
                                <p v-highlightjs v-html="marked(comment.message)"></p>
                            </td>
                        </tr>
                    </table>
                </div>

                <div style="margin-bottom: 10px">

                    <form action="/cake-service/api/v1/add-comment/1" accept-charset="utf8"
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
            <!-- Content -->

        </main>
    </div>
    <!-- End page Content -->

    </div>
</template>

<script>
import Errors from '@/core/Errors.js'
import Form from '@/core/Form.js'

export default {
    name: 'IssueView',

    data () {
        return {
            issue: {
                user: [],
                comments: [],
                description: ''
            },
            message: '',
            loading: true,
            preload: true,
            content: false,
            newComment: new Form({
                user_id: '',
                message: ''
            }),
            errors: new Errors()
        }
    },

    mounted () {
        this.fetchData(this.$route.params.id);
    },

    methods: {
        fetchData: function (id) {
            var self = this;

            axios.get('/cake-service/api/v1/issues/view/' + id + '.json')
                .then(function (response) {
                    console.log(response);
                    self.issue = response.data.issue;
                    //test.issue.userUrl = '/cake-auth/users/view/' + response.issue.user.id;
                    console.log(test.issue);
                    self.loading = false;
                    self.preload = false;
                    self.content = true;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },

        marked: function (input) {
            return emojione.shortnameToUnicode(markdownit.render(input));
        },

        onSubmit: function (id) {
            var self = this;

            var id = self.$route.params.id;

            console.log(self.newComment);
            axios.post('/cake-service/api/v1/issues/add-comment/' + id +'.json', self.newComment)
                .then(self.onSuccess)
                .catch(error => self.errors.record(error.self.data));
        },

        onSuccess: function (response) {
            var self = this;

            self.newComment.reset();
            self.fetchData(self.$route.params.id);
            //window.scrollTo(0,document.body.scrollHeight);
            // window.location.replace('/cake-service/issues');
        },

        marked: function (input) {
            return emojione.shortnameToUnicode(markdownit.render(input));
        }
    }
}
</script>
