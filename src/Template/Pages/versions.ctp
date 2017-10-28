<?php $this->layout = 'CakeBootstrap.default'; ?>
<?php $this->start('subtitle_for_page'); ?>
Cms
<?php $this->end() ?>

<!-- Begin page content -->
<main id="main-container">

    <!-- Content -->
    <div class="container">

        <h1>Versions</h1>

        <div class="row pBot10">
            <div class="col-md-12">
                You can choose from following versions
            </div>
        </div>

        <div class="row text-center">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>CE</h2>
                        0&euro; per user / month
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">User Management, Profiles</li>
                        <li class="list-group-item">Application authentication</li>
                        <li class="list-group-item">SSh Keys *</li>
                        <li class="list-group-item">Taxonomy (Labels, Tags)</li>
                        <li class="list-group-item">Issue manager</li>
                        <li class="list-group-item">Storage (Git, buckets) *</li>
                        <li class="list-group-item">Installation on docker</li>
                        <li class="list-group-item">Resources (Projects, Companies, Contacts)</li>
                        <li class="list-group-item">Pages <label class="label label-danger">Betta</label> (Nodes, Galleries, Lists)</li>
                    </ul>
                    <div class="panel-footer">
                        <button class="btn btn-info btn-block">Download</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h2>EES</h2>
                        3.50&euro; per user / month
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">All from CE +</li>
                        <li class="list-group-item">Related issues</li>
                        <li class="list-group-item">Send email based on issue title</li>
                        <li class="list-group-item">Send email when new content is created</li>
                        <li class="list-group-item">Monitoring</li>
                    </ul>
                    <div class="panel-footer">
                        <button class="btn btn-info btn-block">Contact us</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>EEP</h2>
                        17.80&euro; per user / month
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">All from CE and EES +</li>
                        <li class="list-group-item">Certification Authority *</li>
                    </ul>
                    <div class="panel-footer">
                        <button class="btn btn-info btn-block">Contact us</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <p>
                    <label class="label label-primary">EES</label> and <label class="label label-primary">EEP</label> versions require license file to run. Without license file all versions running as <label class="label label-success">CE</label>
                </p>
                <p>
                    * Needs to be installed on your own server or on docker container to use it.
                </p>
                <p>
                    You can get <label class="label label-primary">EES</label> and <label class="label label-primary">EEP</label> versions for 1 year for <label class="label label-success">FREE</label> until year 2017 ends.
                </p>
            </div>
        </div>

    </div>
    <!-- Content -->

</main>
<!-- End page Content -->
