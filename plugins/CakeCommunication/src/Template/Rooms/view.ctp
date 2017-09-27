<?php $this->layout = 'CakeBootstrap.chat'; ?>
<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end() ?>

<?php $this->start('scripts_for_page'); ?>
<?= $this->Html->script('vue-app/core/Form') ?>
<?= $this->Html->script('vue-app/core/Errors') ?>
<?= $this->Html->script('moment') ?>


<script>
var reader = new commonmark.Parser();
var writer = new commonmark.HtmlRenderer();

var room = new Vue({
    el: "#cake-vue-app",

    data: {
        room: {
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
        errors: new Errors(),
        timer: '',
        id: <?= $id ?>
    },

    created() {
        this.timer = setInterval(this.fetchData, 3000);
    },

    beforeDestroy() {
        clearInterval(this.timer);
    },

    mounted() {
        this.fetchData();
    },

    updated() {
        var container = this.$el.querySelector("#messages");
        container.scrollTop = container.scrollHeight;
    },

    methods: {
        fetchData: function() {

            axios.get('/cake-communication/api/v1/rooms/view/' + this.id + '.json')
                .then(function(response) {
                    console.log(response);
                    room.room = response.data.room;

                    room.loading = false;
                    room.preload = false;
                    room.content = true;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },

        onSubmit: function (id) {
            var id = this.id;
            console.log(this.newComment);
            axios.post('/cake-communication/api/v1/rooms/add-comment/' + id +'.json', this.newComment)
                .then(this.onSuccess)
                .catch(error => this.errors.record(error.this.data));
        },

        onSuccess: function (response) {
            this.newComment.reset();
            this.fetchData(this.id);
            //window.scrollTo(0,document.body.scrollHeight);
            // window.location.replace('/cake-service/issues');
        },

        marked: function(input) {
            let parsed = reader.parse(input);
            return emojione.shortnameToUnicode(writer.render(parsed));
        },

        emoji: function(input) {
            return emojione.shortnameToUnicode(input);
        },

        formatDate: function(date) {
            return moment(date).format('hh:mm a');
        }
    }


});
</script>

<?php $this->end() ?>
<!-- Header -->
<div class="cinema border-bottom-gray" v-cloak>
    <div class="container-fluid">
        <h3>#{{room.name}} <small v-html="emoji(room.description)"></small>
            <div class="pull-right">

                <div class="btn-group">
                    <?= $this->Html->link(__('New Room'), ['action' => 'add'], ['class' => 'btn btn-sm btn-default']) ?>
                    <?= $this->Html->link(__('<i class="fa fa-level-up"></i>'), ['action' => 'index'], ['class' => 'btn btn-sm btn-default', 'escape' => false]) ?>
                    <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li><?= $this->Html->link(__('Edit Room'), ['action' => 'edit', $room->id]) ?> </li>
                        <li><?= $this->Html->link(__('List Rooms'), ['action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New Room'), ['action' => 'add']) ?> </li>
                        <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']) ?> </li>
                    </ul>
                </div>
            </div>
        </h3>
    </div>
</div>


<!-- Begin page content -->
<main id="main-container" v-cloak>

    <!-- Content -->
    <div class="container-fluid">

        <div class="row">

            <div class="col-md-12">
                <div id="messages" class="related" style="height: calc(100vh - 151px); margin-bottom: 10px; overflow-x: hidden; overflow-y: scroll">

                    <div v-for="comment in room.comments" style="padding-right: 5px">
                        <strong>{{comment.user.username}}</strong> <small class="text-muted text-uppercase">{{formatDate(comment.created)}}</small>
                        <div><p v-html="marked(comment.message)"></p></div>
                    </div>

                </div>
                <div>
                    <form accept-charset="utf8" @submit.prevent="onSubmit">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <button class="btn btn-default"><i class="fa fa-plus"></i></button>
                                </span>
                                <input id="chatInput" name="comment" v-model="newComment.message" type="text" class="form-control" placeholder="Message #room" />
                                <!-- <textarea class="form-control" rows="1" name="comment" v-model="newComment.message" ></textarea> -->
                                <span class="input-group-btn">
                                    <button class="btn btn-default"><i class="fa fa-smile-o"></i></button>
                                    <button class="btn btn-default"><i class="fa fa-send"></i></button>
                                </span>
                            </div>
                        </div>
                        <!-- <button class="btn btn-success">Send</button> -->
                    </form>
                </div>
            </div>
        </div>





    </div>
    <!-- Content -->

</main>
<!-- End page Content -->
