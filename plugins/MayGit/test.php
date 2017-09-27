<?php

namespace test;

use MayMeow\Git\GitRepository;

require_once 'vendor/autoload.php';
require_once 'config/git.php';

/*
try {
    var_dump(GitFactory::cloneRepository('https://github.com/cakephp/cakephp.git', 'CakePHP2'));
 } catch (\Exception $e) {
     echo 'Error: ' . $e->getMessage();
 }

var_dump( GitFactory::status('CakePHP2') );

*/

$gitRepo = new GitRepository();

$gitRepo->setPath('baretest'); //->cloneRemote('ssh://git@helix.maymeow.tokyo:2248/may/testovacie-repo.git');\

$resp = $gitRepo->ls();

var_dump($resp);