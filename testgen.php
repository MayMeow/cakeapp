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
use CakeActivity\Model\CardTemplate;
use CakeApp\Component\IO\Serializer\ObjectSerializer;
use CakeApp\Shell\SSH\AuthorizedKeys;
use MayMeow\Actions\AbstractAction;
use MayMeow\Actions\ActionInterface;
use MayMeow\Crud\View\Menu\MenuDropdown;
use MayMeow\Crud\View\Menu\MenuItem;
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

/*$secToTime = new TimeFactory();

var_dump($secToTime->secondsToTime(7360)->toString());*/

/*$card = new CardTemplate();

$card->setTitle('Ahoj')->setText('Ahoj');
$card->setUser()->setId(1)->setUsername('martin');
$card->setRelatedItem()->setTitle('Item name')->setPlugin('CakeService')->setController('issues')->setAction('view')->setId(57);

$serializer = new ObjectSerializer();

print_r($serializer->serialize($card));*/

$menu = new MenuDropdown('<i class="far fa-database"></i> Overview', ['prefix' => 'admin', 'plugin' => 'CakeAuth', 'controller' => 'Users', 'action' => 'index'], [], [
    new MenuItem('<i class="fa fa-user"></i> Users', ['action' => 'index', 'plugin' => 'CakeAuth', 'controller' => 'Users'], ['escape' => false]),
    new MenuItem('<i class="fa fa-cube"></i> Auth Applications', ['action' => 'index', 'plugin' => 'CakeAuth', 'controller' => 'AuthApplications'], ['escape' => false]),
    new MenuItem('<i class="fa fa-key"></i> SSH Keys', ['action' => 'index', 'plugin' => 'CakeAuth', 'controller' => 'SshKeys'], ['escape' => false]),
    new MenuItem('<i class="fab fa-git"></i> Repositories', ['action' => 'index', 'plugin' => 'CakeStorage', 'controller' => 'GitRepositories'], ['escape' => false, 'class' => 'nav-link']),
    new MenuItem('<i class="fab fa-bitbucket"></i> Buckets', ['action' => 'index', 'plugin' => 'CakeStorage', 'controller' => 'Buckets'], ['escape' => false, 'class' => 'nav-link']),
    new MenuItem('<i class="fa fa-users"></i> Groups', ['action' => 'index', 'plugin' => 'MCloudResources', 'controller' => 'ResourceGroups'], ['escape' => false, 'class' => 'nav-link']),
    new MenuItem('<i class="fa fa-suitcase"></i> Companies', ['action' => 'index', 'plugin' => 'MCloudResources', 'controller' => 'Companies'], ['escape' => false, 'class' => 'nav-link']),
    new MenuItem('<i class="fa fa-phone"></i> Contacts', ['action' => 'index', 'plugin' => 'MCloudResources', 'controller' => 'Contacts'], ['escape' => false, 'class' => 'nav-link']),
    new MenuItem('<i class="fa fa-exclamation"></i> Issues', ['controller' => 'Issues', 'plugin' => 'CakeService', 'action' => 'index'], ['escape' => false]),
    new MenuItem('<i class="fa fa-map-signs"></i> Milestones', ['controller' => 'Milestones', 'plugin' => 'CakeService', 'action' => 'index'], ['escape' => false]),
    new MenuItem('<i class="fa fa-dashboard"></i> Logs', ['action' => 'index', 'plugin' => 'CakeLogs', 'controller' => 'CloudLogs'], ['escape' => false]),
    new MenuItem('<i class="fa fa-clone"></i> Cards', ['plugin' => 'CakeActivity', 'controller' => 'Cards', 'action' => 'index'], ['escape' => false])
]);

var_dump($menu->getPlugins());

new ObjectSerializer()