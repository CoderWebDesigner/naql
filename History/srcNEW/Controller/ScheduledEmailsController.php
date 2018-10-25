<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ScheduledEmails Controller
 *
 * @property \App\Model\Table\ScheduledEmailsTable $ScheduledEmails
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class ScheduledEmailsController extends AppController
{

    /**
     * Helpers
     *
     * @var array
     */
    public $helpers = ['Alaxos.AlaxosHtml', 'Alaxos.AlaxosForm', 'Alaxos.Navbars'];

    /**
     * Components
     *
     * @var array
     */
    public $components = ['Alaxos.Filter'];

    /**
    * Index method
    *
    * @return void
    */
    public function index()
    {
        $this->paginate = [
            'contain' => ['UserEmails', 'UserGroups']
        ];
        $this->set('scheduledEmails', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['scheduledEmails']);
        
        $userEmails = $this->ScheduledEmails->UserEmails->find('list', ['limit' => 200]);
        $userGroups = $this->ScheduledEmails->UserGroups->find('list', ['limit' => 200]);
        $this->set(compact('userEmails', 'userGroups'));
    }

    /**
     * View method
     *
     * @param string|null $id Scheduled Email id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $scheduledEmail = $this->ScheduledEmails->get($id, [
            'contain' => ['UserEmails', 'UserGroups', 'ScheduledEmailRecipients']
        ]);
        $this->set('scheduledEmail', $scheduledEmail);
        $this->set('_serialize', ['scheduledEmail']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $scheduledEmail = $this->ScheduledEmails->newEntity();
        if ($this->request->is('post')) {
            $scheduledEmail = $this->ScheduledEmails->patchEntity($scheduledEmail, $this->request->data);
            if ($this->ScheduledEmails->save($scheduledEmail)) {
                $this->Flash->success(___('the scheduled email has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $scheduledEmail->id]);
            } else {
                $this->Flash->error(___('the scheduled email could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $userEmails = $this->ScheduledEmails->UserEmails->find('list', ['limit' => 200]);
        $userGroups = $this->ScheduledEmails->UserGroups->find('list', ['limit' => 200]);
        $this->set(compact('scheduledEmail', 'userEmails', 'userGroups'));
        $this->set('_serialize', ['scheduledEmail']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Scheduled Email id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $scheduledEmail = $this->ScheduledEmails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $scheduledEmail = $this->ScheduledEmails->patchEntity($scheduledEmail, $this->request->data);
            if ($this->ScheduledEmails->save($scheduledEmail)) {
                $this->Flash->success(___('the scheduled email has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $scheduledEmail->id]);
            } else {
                $this->Flash->error(___('the scheduled email could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $userEmails = $this->ScheduledEmails->UserEmails->find('list', ['limit' => 200]);
        $userGroups = $this->ScheduledEmails->UserGroups->find('list', ['limit' => 200]);
        $this->set(compact('scheduledEmail', 'userEmails', 'userGroups'));
        $this->set('_serialize', ['scheduledEmail']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Scheduled Email id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $scheduledEmail = $this->ScheduledEmails->get($id);
        
        try
        {
            if ($this->ScheduledEmails->delete($scheduledEmail)) {
                $this->Flash->success(___('the scheduled email has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the scheduled email could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the scheduled email could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The scheduled email could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
            }
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Delete all method
     */
    public function delete_all() {
        $this->request->allowMethod('post', 'delete');
        
        if(isset($this->request->data['checked_ids']) && !empty($this->request->data['checked_ids'])){
            
            $query = $this->ScheduledEmails->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected scheduled email has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected scheduledemails have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected scheduledemails could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected scheduledemails could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no scheduled email to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Scheduled Email id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $scheduledEmail = $this->ScheduledEmails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $scheduledEmail = $this->ScheduledEmails->newEntity();
            $scheduledEmail = $this->ScheduledEmails->patchEntity($scheduledEmail, $this->request->data);
            if ($this->ScheduledEmails->save($scheduledEmail)) {
                $this->Flash->success(___('the scheduled email has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $scheduledEmail->id]);
            } else {
                $this->Flash->error(___('the scheduled email could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $userEmails = $this->ScheduledEmails->UserEmails->find('list', ['limit' => 200]);
        $userGroups = $this->ScheduledEmails->UserGroups->find('list', ['limit' => 200]);
        
        $scheduledEmail->id = $id;
        $this->set(compact('scheduledEmail', 'userEmails', 'userGroups'));
        $this->set('_serialize', ['scheduledEmail']);
    }
}
