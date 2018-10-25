<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ScheduledEmailRecipients Controller
 *
 * @property \App\Model\Table\ScheduledEmailRecipientsTable $ScheduledEmailRecipients
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class ScheduledEmailRecipientsController extends AppController
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
            'contain' => ['ScheduledEmails', 'Users']
        ];
        $this->set('scheduledEmailRecipients', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['scheduledEmailRecipients']);
        
        $scheduledEmails = $this->ScheduledEmailRecipients->ScheduledEmails->find('list', ['limit' => 200]);
        $users = $this->ScheduledEmailRecipients->Users->find('list', ['limit' => 200]);
        $this->set(compact('scheduledEmails', 'users'));
    }

    /**
     * View method
     *
     * @param string|null $id Scheduled Email Recipient id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $scheduledEmailRecipient = $this->ScheduledEmailRecipients->get($id, [
            'contain' => ['ScheduledEmails', 'Users']
        ]);
        $this->set('scheduledEmailRecipient', $scheduledEmailRecipient);
        $this->set('_serialize', ['scheduledEmailRecipient']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $scheduledEmailRecipient = $this->ScheduledEmailRecipients->newEntity();
        if ($this->request->is('post')) {
            $scheduledEmailRecipient = $this->ScheduledEmailRecipients->patchEntity($scheduledEmailRecipient, $this->request->data);
            if ($this->ScheduledEmailRecipients->save($scheduledEmailRecipient)) {
                $this->Flash->success(___('the scheduled email recipient has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $scheduledEmailRecipient->id]);
            } else {
                $this->Flash->error(___('the scheduled email recipient could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $scheduledEmails = $this->ScheduledEmailRecipients->ScheduledEmails->find('list', ['limit' => 200]);
        $users = $this->ScheduledEmailRecipients->Users->find('list', ['limit' => 200]);
        $this->set(compact('scheduledEmailRecipient', 'scheduledEmails', 'users'));
        $this->set('_serialize', ['scheduledEmailRecipient']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Scheduled Email Recipient id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $scheduledEmailRecipient = $this->ScheduledEmailRecipients->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $scheduledEmailRecipient = $this->ScheduledEmailRecipients->patchEntity($scheduledEmailRecipient, $this->request->data);
            if ($this->ScheduledEmailRecipients->save($scheduledEmailRecipient)) {
                $this->Flash->success(___('the scheduled email recipient has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $scheduledEmailRecipient->id]);
            } else {
                $this->Flash->error(___('the scheduled email recipient could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $scheduledEmails = $this->ScheduledEmailRecipients->ScheduledEmails->find('list', ['limit' => 200]);
        $users = $this->ScheduledEmailRecipients->Users->find('list', ['limit' => 200]);
        $this->set(compact('scheduledEmailRecipient', 'scheduledEmails', 'users'));
        $this->set('_serialize', ['scheduledEmailRecipient']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Scheduled Email Recipient id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $scheduledEmailRecipient = $this->ScheduledEmailRecipients->get($id);
        
        try
        {
            if ($this->ScheduledEmailRecipients->delete($scheduledEmailRecipient)) {
                $this->Flash->success(___('the scheduled email recipient has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the scheduled email recipient could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the scheduled email recipient could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The scheduled email recipient could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->ScheduledEmailRecipients->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected scheduled email recipient has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected scheduledemailrecipients have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected scheduledemailrecipients could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected scheduledemailrecipients could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no scheduled email recipient to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Scheduled Email Recipient id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $scheduledEmailRecipient = $this->ScheduledEmailRecipients->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $scheduledEmailRecipient = $this->ScheduledEmailRecipients->newEntity();
            $scheduledEmailRecipient = $this->ScheduledEmailRecipients->patchEntity($scheduledEmailRecipient, $this->request->data);
            if ($this->ScheduledEmailRecipients->save($scheduledEmailRecipient)) {
                $this->Flash->success(___('the scheduled email recipient has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $scheduledEmailRecipient->id]);
            } else {
                $this->Flash->error(___('the scheduled email recipient could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $scheduledEmails = $this->ScheduledEmailRecipients->ScheduledEmails->find('list', ['limit' => 200]);
        $users = $this->ScheduledEmailRecipients->Users->find('list', ['limit' => 200]);
        
        $scheduledEmailRecipient->id = $id;
        $this->set(compact('scheduledEmailRecipient', 'scheduledEmails', 'users'));
        $this->set('_serialize', ['scheduledEmailRecipient']);
    }
}
