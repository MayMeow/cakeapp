<?php
namespace CakeService\Controller\Api\V1;

use Cake\Core\Configure;
use Cake\Mailer\MailerAwareTrait;
use Cake\ORM\TableRegistry;
use CakeService\Controller\AbstractIssuesController;
use MayMeow\Api\ServerResponse;
use CakeApp\Component\IO\Text\EmailAddress;
use MayMeow\Email\EmailMessage;

/**
 * Issues Controller
 *
 * @property \CakeService\Model\Table\IssuesTable $Issues
 *
 * @method \CakeService\Model\Entity\Issue[] paginate($object = null, array $settings = [])
 */
class IssuesController extends AbstractIssuesController
{
    use MailerAwareTrait;

    /**
     * Public Actions
     * @var array
     */
    protected $publicActions = [];

    /**
     * @var array
     * Need user to be verified and has set role to User Actions
     */
    protected $userActions = ['upVote', 'downVote', 'close', 'backlog', 'addComment', 'view', 'addComment'];

    /**
     * @var array
     * ONLY for admin Actions
     */
    protected $adminActions = [];

    /**
     * @var array
     * Actions that need authorization
     */
    protected $authorizedActions = [];

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function isAuthorized($user): bool
    {
        // Allow all users to list, view and add projects
        if (in_array($this->request->getParam('action'), $this->userActions)){
            if (isset($user['role']) && $user['role'] === 'user') {
                return true;
            }
        }

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
            'contain' => ['Users']
        ];
        $issues = $this->paginate($this->Issues);

        $this->set('paging', current($this->request->getParam('paging')));

        $this->set(compact('issues', 'paging'));
        $this->set('_serialize', ['issues', 'paging']);
    }

    /**
     * @param null $id
     */
    public function upVote ($id = null)
    {
        $issue = $this->Issues->get($id);

        $issue->vote_up_count++;

        $this->Issues->save($issue);

        $response = new ServerResponse;

        $response->setData($issue->vote_up_count)
            ->setMessage('success')
            ->setCode(200);

        $this->set('response', $response->get());
        $this->set('_serialize', ['response']);
    }

    /**
     * @param null $id
     */
    public function downVote($id = null)
    {
        $issue = $this->Issues->get($id);

        $issue->vote_down_count++;

        $this->Issues->save($issue);

        $response = new ServerResponse();

        $response->setData($issue->vote_down_count)
            ->setMessage('success')
            ->setCode(200);

        $this->set('response', $response->get());
        $this->set('_serialize', ['response']);
    }

    /**
     * @param null $id
     */
    public function addComment($id = null)
    {
        if ($this->request->is(['patch', 'post', 'put'])) {
            $newComment = $this->loadModel('CakeCommunication.Comments');
            $comment = $newComment->newEntity();
            $newComment->patchEntity($comment, $this->request->getData());

            // update user information
            $comment->user_id = $this->Auth->user('id');

            $issue = $this->Issues->get($id);

            if($newComment->save($comment)) {
                $tt = TableRegistry::get('IssuesComments');
                $link = $tt->newEntity();
                $link->comment_id = $comment->id;
                $link->issue_id = $id;
                $tt->save($link);

                $emailMessage = new EmailMessage(new EmailAddress($issue->title));

                $emailMessage->setSubject('!' . $issue->id . ' ' . $issue->title . ' NEW COMMENT')
                    ->setBody($comment->message)
                    ->setFrom($this->getReplyAddress($issue->uid, $issue->user_id));

                //$this->_sendEmail($emailMessage);
                if ($emailMessage->getEmailAddress()->isEmail()) {
                    $this->getMailer('CakeService.Issue')->send('issueComment', [$emailMessage]);
                }

            };

            $this->set('newComment', $comment);
        }
    }

    public function close($id = null)
    {
        $issue = $this->Issues->get($id);

        $issue->finished = true;

        $this->Issues->save($issue);

        $response = new ServerResponse();

        $response->setData($issue->vote_down_count)
            ->setMessage('success')
            ->setCode(200);

        $this->set('response', $response->get());
        $this->set('_serialize', ['response']);
    }

    public function backlog()
    {
        $this->paginate = [
            'contain' => ['Users', 'Labels'],
            'finder' => [
                //'byLabelName' => ['label' => 'done']
            ],
            'order' => ['Issues.id' => 'DESC']
        ];
        $issues = $this->paginate($this->Issues);

        $this->set(compact('issues'));
        $this->set('_serialize', ['issues']);
    }
}
