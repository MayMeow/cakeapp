<?php

/**
 * Created by PhpStorm.
 * User: martin
 * Date: 2/9/2017
 * Time: 11:35 AM
 */
namespace nothing;

use Cake\Core\Configure;
use Cake\Utility\Security;
use Cake\View\Helper\UrlHelper;
use Cake\View\View;
use CakeApp\Shell\SSH\AuthorizedKeys;
use MayMeow\Actions\AbstractAction;
use MayMeow\Actions\ActionInterface;
use MayMeow\Db\MayDb;
use MayMeow\Exceptions\EmptyPasswordException;
use MayMeow\Generator\ProjectNameGenerator;
use MayMeow\Generator\RandomStringGenerator;
use MayMeow\Git\Command\BranchCommand;
use MayMeow\Git\Command\LogCommand;
use MayMeow\Git\GitFactory;
use MayMeow\Git\GitRepository;
use MayMeow\Helpers\TwoStepAuth;
use MayMeow\Logging\CloudLogTemplate;
use MayMeow\Number\TimeFactory;
use MayMeow\Security\PasswordHasher;
use MayMeow\SocketServer;
use MayMeow\Templates\Config\AudioStreamConfig;

require_once 'vendor/autoload.php';
require_once 'config/paths.php';

/*$gen = new ProjectNameGenerator();

$gen->number = true;

print_r($gen->dashed());*/

/*$tfa = new TwoStepAuth();

$t = new CloudLogTemplate();

$t->severity = 'warning';
$t->setResource()
    ->id(12)
    ->action('view')
    ->controller('controller_name')
    ->plugin('pluginName');

$t->setEventType('ICMP_PING');

$t->jsonPayload = [
    'response' => [
        'secret' => $tfa->createSecret()->key(),
        'encrypted' => Security::hash($tfa-key(), 'sha256'),
        'readable' => $tfa->readableKey()
    ]
];

var_dump($t->serialize());

var_dump($tfa->verifyCode('A2PI652WCTN7VH7T','415727'));*/


/*var_dump(RandomStringGenerator::generate(5));*/

/*$streamConfig = new AudioStreamConfig();

$streamConfig
    ->setStream('express', 'http://stream.expres.sk:8000/128.mp3')
    ->setStream('fun-radio', 'http://stream.funradio.sk:8000/fun128.mp3')
    ->setStream('sturko', 'http://sturko.intrak.upjs.sk:8000/StuRKo_128.mp3');

$configuration = json_decode($streamConfig->serialize());\

print_r($configuration);*/

$streamDb = new MayDb();

/*$streamDb->addKind([
    'name' => 'streams',
    'category' => 'configuration',
    'description' => 'Configuration for audio streams'
]);*/

/*$streamDb->getKind('streams')
    ->addEntity(['name' => 'Express', 'url' => 'http://stream.expres.sk:8000/128.mp3'])
    ->addEntity(['name' => 'Fun radio', 'url' => 'http://stream.funradio.sk:8000/fun128.mp3'])
    ->addEntity(['name' => 'stuRko', 'url' => 'http://sturko.intrak.upjs.sk:8000/StuRKo_128.mp3'])
    ->addEntity((['name' => 'Radio Kosice', 'url' => 'http://stream.alternet.sk:8000/radiokosice-128.mp3']))
    ->addEntity(['name' => 'Jemne Melodie', 'url' => 'http://stream.jemne.sk/jemne-hi.mp3'])
    ->write();*/

/*$hh = new UrlHelper(new View());

var_dump($hh->build(['action' => 'index']));*/

/*$options = [
    'salt' => 'dlsoeld;s.d/eofei3odkalso2oe0'
];

try {
    echo PasswordHasher::hash('Test', $options);
} catch (EmptyPasswordException $e)
{
    echo $e->getMessage();
}

echo PasswordHasher::hash(null, $options);*/

//GitFactory::bare(GIT_DATA, 'maymeow');

/*$gitRepo = new GitRepository('CakeSource-Projects/majka.git');
var_dump($gitRepo->allCommitsCount());*/

/*$plugins = ROOT . DS . 'plugins' . DS;
$icon =  'git-commit';
$iconFile = file_get_contents($plugins . 'CakeOcticons' . DS .'webroot' . DS .'svg' . DS . $icon . '.svg');

$iconFile = str_replace('xmlns', 'class="octicon octicon-'. $icon .'" xmlns', $iconFile);

var_dump($iconFile);*/

$secToTime = new TimeFactory();

var_dump($secToTime->secondsToTime(7360)->toString());