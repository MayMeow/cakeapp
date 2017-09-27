<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
    <i class="fa fa-bars"></i>
    <ul class="dropdown-menu">
        <li class="<?= $this->request->params['controller'] == 'Users' ? 'active': ''; ?>">
            <a href="<?= $this->Url->build(['action' => 'index', 'controller' => 'users', 'plugin' => 'UserManager']); ?>"
               class="">
                <i class="fa fa-users"></i>
                <span class="title">Users</span>
            </a>
        </li>
        <li class="<?= $this->request->params['controller'] == 'Roles' ? 'active': ''; ?>">
            <a href="<?= $this->Url->build(['action' => 'index', 'controller' => 'roles', 'plugin' => 'UserManager']); ?>"
               class="">
                <i class="fa fa-key"></i>
                <span class="title">Roles</span>
            </a>
        </li>
        <li class="<?= $this->request->params['controller'] == 'Badges' ? 'active': ''; ?>">
            <a href="<?= $this->Url->build(['action' => 'index', 'controller' => 'badges', 'plugin' => 'UserManager']); ?>"
               class="">
                <i class="fa fa-certificate"></i>
                <span class="title">Badges</span>
            </a>
        </li>
        <li class="<?= $this->request->params['controller'] == 'Profiles' ? 'active': ''; ?>">
            <a href="<?= $this->Url->build(['action' => 'index', 'controller' => 'profiles', 'plugin' => 'UserManager']); ?>"
               class="">
                <i class="fa fa-users"></i>
                <span class="title">Profiles</span>
            </a>
        </li>
        <li class="<?= $this->request->params['controller'] == 'Nodes' ? 'active': ''; ?>">
            <!-- Content Manager-->
            <a href="<?= $this->Url->build(['action' => 'index', 'controller' => 'nodes', 'plugin' => 'ContentManager']); ?>"
               class="">
                <i class="fa fa-tree"></i>
                <span class="title">Nodes</span>
            </a>
        </li>
        <li class="<?= $this->request->params['controller'] == 'Subblogs' ? 'active': ''; ?>">
            <a href="<?= $this->Url->build(['action' => 'index', 'controller' => 'subblogs', 'plugin' => 'ContentManager']); ?>"
               class="">
                <i class="fa fa-square"></i>
                <span class="title">Subblogs</span>
            </a>
        </li>
        <li class="<?= $this->request->params['controller'] == 'Tags' ? 'active': ''; ?>">
            <a href="<?= $this->Url->build(['action' => 'index', 'controller' => 'tags', 'plugin' => 'ContentManager']); ?>"
               class="">
                <i class="fa fa-tag"></i>
                <span class="title">Tags</span>
            </a>
        </li>
        <li class="<?= $this->request->params['controller'] == 'Vocabularies' ? 'active': ''; ?>">
            <a href="<?= $this->Url->build(['action' => 'index', 'controller' => 'vocabularies', 'plugin' => 'TaxonomyManager']); ?>"
               class="">
                <i class="fa fa-book"></i>
                <span class="title">Vocabularies</span>
            </a>
        </li>
    </ul>
</a>