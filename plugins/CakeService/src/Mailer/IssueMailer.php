<?php
namespace CakeService\Mailer;

use Cake\Mailer\Mailer;
use CakeApp\Component\Licensing\Factory\LicenseFactory;
use CakeApp\Component\Licensing\Helper\LicenseHelper;
use MayMeow\Email\EmailMessage;

/**
 * Issue mailer.
 */
class IssueMailer extends Mailer
{

    /**
     * Mailer's name.
     *
     * @var string
     */
    static public $name = 'Issue';

    public function newIssue(EmailMessage $emailMessage)
    {
        if (LicenseFactory::isLicensed([LicenseHelper::EEP, LicenseHelper::EES])) {
            $this->setTo($emailMessage->getTo())
                ->setTemplate('CakeService.new_issue')
                ->addBcc('martin@kukolos.sk')
                ->setFrom($emailMessage->getFrom())
                ->setSubject($emailMessage->getSubject())
                ->set(['content' => $emailMessage->getBody()]);
        }
    }

    public function issueComment(EmailMessage $emailMessage)
    {
        if (LicenseFactory::isLicensed([LicenseHelper::EEP, LicenseHelper::EES])) {
            $this->setTo($emailMessage->getTo())
                ->setTemplate('CakeService.issue_comment')
                ->addBcc('martin@kukolos.sk')
                ->setFrom($emailMessage->getFrom())
                ->setSubject($emailMessage->getSubject())
                ->set(['content' => $emailMessage->getBody()]);
        }
    }
}
