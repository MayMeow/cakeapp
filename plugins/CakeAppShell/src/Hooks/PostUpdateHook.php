<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 9/7/2017
 * Time: 12:47 PM
 */

namespace CakeApp\Component\Shell\Hooks;

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

require_once '/var/www/html/vendor/autoload.php';

class PostUpdateHook extends Application
{
    public function doRun(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('   _____      _                             ');
        $output->writeln('  / ____|    | |          /\                ');
        $output->writeln(' | |     __ _| | _____   /  \   _ __  _ __  ');
        $output->writeln(' | |    / _` | |/ / _ \ / /\ \ | \'_ \| \'_ \ ');
        $output->writeln(' | |___| (_| |   <  __// ____ \| |_) | |_) |');
        $output->writeln('  \_____\__,_|_|\_\___/_/    \_\ .__/| .__/');
        $output->writeln('                               | |   | |    ');
        $output->writeln('                               |_|   |_|    ');
        $output->writeln('CakePHP + VueJS + GIT solution');
        $output->writeln('CakeApp by Martin Kukolos <martin+cakeapp@kukolos.sk>');
    }
}

$hook = new PostUpdateHook();
$hook->run();

