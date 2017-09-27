var CakeSerivce = {};

(function () {

    /*UpVote function*/
    CakeSerivce.UpVote = function (id) {
        $.get('/cake-service/issues/up-vote/' + id + '.json', function (response) {
            if (response.response.code == 200) {
                document.getElementById('upvote-count').innerHTML = response.response.data;
                console.log('success');
            } else if (response.response.result == 'fail') {
                console.log('failed');
            }
        })
    };

    /*DownVote function*/
    CakeSerivce.DownVote = function (id) {
        $.get('/cake-service/issues/down-vote/' + id + '.json', function (response) {
            if (response.response.code == 200) {
                document.getElementById('downvote-count').innerHTML = response.response.data;
                console.log('success');
            } else if (response.response.result == 'fail') {
                console.log('failed');
            }
        })
    }
})(jQuery);