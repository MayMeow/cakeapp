<?php
namespace CakeService\Controller;

use Cake\Core\Configure;
use Cake\Mailer\MailerAwareTrait;
use Cake\Network\Email\Email;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;
use CakeActivity\Factory\ActivityFactory;
use CakeActivity\Factory\EventItemTypeFactory;
use CakeActivity\Model\CardTemplate;
use CakeService\Controller\AppController;
use Emojione\Client;
use Emojione\Emojione;
use Emojione\Ruleset;
use MayMeow\Api\ServerResponse;
use MayMeow\Email\EmailAddressFromTitle;
use MayMeow\Email\EmailMessage;
use MayMeow\Email\Traits\ReplyByMailTrait;
use MayMeow\Helpers\MeowDown;
use CakeApp\Component\Licensing\Factory\LicenseFactory;
use CakeApp\Component\Licensing\Helper\LicenseHelper;

/**
 * Issues Controller
 *
 * @property \CakeService\Model\Table\IssuesTable $Issues
 *
 * @method \CakeService\Model\Entity\Issue[] paginate($object = null, array $settings = [])
 */
abstract class AbstractIssuesController extends AppController
{
    use ReplyByMailTrait, MailerAwareTrait;

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function isAuthorized($user): bool
    {
        return parent::isAuthorized($user); // TODO: Change the autogenerated stub
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Labels'],
            'order' => ['id' => 'DESC']
        ];
        $issues = $this->paginate($this->Issues);

        $this->set(compact('issues'));
        $this->set('_serialize', ['issues']);
    }

    /**
     * View method
     *
     * @param string|null $id Issue id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if ($this->request->is('json')) {
            $issue = $this->Issues->get($id, [
                'contain' => [
                    'Users',
                    'Comments' => [
                        'Users'
                    ],
                    'Assignees',
                    'Labels']
            ]);

            /*$md = new MeowDown();
            $em = new Client(new Ruleset());
            $issue->description = $em->shortnameToUnicode($md->parse($issue->description));

            foreach ($issue->comments as &$comment) {
                $comment->message = $em->shortnameToUnicode($md->parse($comment->message));
            }*/

            $this->set('issue', $issue);
            $this->set('_serialize', ['issue']);
        }

        $this->set('issueID', $id);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $issue = $this->Issues->newEntity();
        if ($this->request->is('post')) {
            $issue = $this->Issues->patchEntity($issue, $this->request->getData());
            $issue->finished = 0;
            $issue->uid = Text::uuid();
            if ($this->Issues->save($issue)) {
                $this->Flash->success(__('The issue has been saved.'));

                // check if title contain email and send notification

                //Configure email before Sending
                $emailMessage = new EmailMessage(new EmailAddressFromTitle($issue->title));
                $emailMessage->setSubject('!' . $issue->id . ' ' . $issue->title)
                    ->setBody($issue->description);

                $emailMessage->setFrom($this->getSenderEmail('customersupport'));

                //$this->_sendEmail($emailMessage);
                if ($emailMessage->getEmailAddress()->isEmail()) {
                    $this->getMailer('CakeService.Issue')->send('newIssue', [$emailMessage]);
                }

                // activity

                $card = new CardTemplate();
                $card->setType(EventItemTypeFactory::NEW_ISSUE)
                    ->setTitle($issue->title)
                    ->setText($issue->description)
                    ->setTimestamp(time());
                $card->setUser()->setId($this->Auth->user('id'))->setUsername($this->Auth->user('username'));
                $card->setRelatedItem()
                    ->setId($issue->id)
                    ->setPlugin('CakeService')
                    ->setController('issues')
                    ->setAction('view');

                ActivityFactory::createCard($card);

                // Redirect to newly created issue
                return $this->redirect(['action' => 'view', $issue->id]);
            }
            $this->Flash->error(__('The issue could not be saved. Please, try again.'));
        }
        $users = $this->Issues->Users->find('list', ['limit' => 200]);
        $comments = $this->Issues->Comments->find('list', ['limit' => 200]);
        $assignees = $this->Issues->Assignees->find('list', ['limit' => 200]);
        $labels = $this->Issues->Labels->find('list', ['limit' => 200]);
        $this->set(compact('issue', 'users', 'comments', 'assignees', 'labels'));
        $this->set('_serialize', ['issue']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Issue id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $issue = $this->Issues->get($id, [
            'contain' => ['Comments', 'Assignees', 'Labels']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $issue = $this->Issues->patchEntity($issue, $this->request->getData());
            if ($this->Issues->save($issue)) {
                $this->Flash->success(__('The issue has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The issue could not be saved. Please, try again.'));
        }
        $users = $this->Issues->Users->find('list', ['limit' => 200]);
        $comments = $this->Issues->Comments->find('list', ['limit' => 200]);
        $assignees = $this->Issues->Assignees->find('list', ['limit' => 200]);
        $labels = $this->Issues->Labels->find('list', ['limit' => 200]);
        $this->set(compact('issue', 'users', 'comments', 'assignees', 'labels'));
        $this->set('_serialize', ['issue']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Issue id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $issue = $this->Issues->get($id);
        if ($this->Issues->delete($issue)) {
            $this->Flash->success(__('The issue has been deleted.'));
        } else {
            $this->Flash->error(__('The issue could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * @param EmailMessage $message
     *
     * Premium function
     */
    protected function _sendEmail(EmailMessage $message)
    {
        // Check if software has license EES apr EEP
        if (LicenseFactory::isLicensed([LicenseHelper::EEP, LicenseHelper::EES])) {
            if ($message->getEmailAddress()->isEmail()) {
                $mta = new Email();
                $mta->setTo($message->getTo())
                    ->addBcc('martin@kukolos.sk')
                    ->setFrom($message->getFrom())
                    ->setSubject($message->getSubject())
                    ->send($message->getBody());
            }
        }
    }
}
