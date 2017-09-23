<?php
namespace App\Shell;

use Cake\Console\Shell;
use MayMeow\Logging\CloudLogTemplate;

/**
 * Hello shell command.
 */
class HelloShell extends Shell
{

    /**
     * Manage the available sub-commands along with their arguments and help
     *
     * @see http://book.cakephp.org/3.0/en/console-and-shells.html#configuring-options-and-generating-help
     *
     * @return \Cake\Console\ConsoleOptionParser
     */
    public function getOptionParser()
    {
        $parser = parent::getOptionParser();

        return $parser;
    }

    /**
     * main() method.
     *
     * @return bool|int|null Success or error code.
     */
    public function main()
    {
        //$this->out($this->OptionParser->help());

        $logTemplate = new CloudLogTemplate();
        $logTemplate->jsonPayload = trim(str_replace(' ', '', exec('tracert google.com')));

        $logTemplate->setResource()
            ->controller('ctrl')
            ->action('action')
            ->plugin('Cloud')
            ->id('0');

        $logTemplate->setEventType('CRON');

        $logTemplate->severity = 'debug';

        $table = $this->loadModel('MCloudLogging.CloudLogs');

        $cl = $table->newEntity();

        $cl->severity = $logTemplate->severity;
        $cl->resource_key = $logTemplate->getResource()->plugin . '.' . $logTemplate->getResource()->controller . '.' . $logTemplate->getResource()->action . '.' . $logTemplate->getResource()->id;
        $cl->event_type = $logTemplate->getEventType();
        $cl->json_data = $logTemplate->serialize();

        $table->save($cl);

    }
}
