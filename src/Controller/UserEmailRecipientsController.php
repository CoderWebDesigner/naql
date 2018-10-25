<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserEmailRecipients Controller
 *
 * @property \App\Model\Table\UserEmailRecipientsTable $UserEmailRecipients
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class UserEmailRecipientsController extends AppController
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
            'contain' => ['UserEmails', 'Users']
        ];
        $this->set('userEmailRecipients', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['userEmailRecipients']);
        
        $userEmails = $this->UserEmailRecipients->UserEmails->find('list', ['limit' => 200]);
        $users = $this->UserEmailRecipients->Users->find('list', ['limit' => 200]);
        $this->set(compact('userEmails', 'users'));
    }

    /**
     * View method
     *
     * @param string|null $id User Email Recipient id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userEmailRecipient = $this->UserEmailRecipients->get($id, [
            'contain' => ['UserEmails', 'Users']
        ]);
        $this->set('userEmailRecipient', $userEmailRecipient);
        $this->set('_serialize', ['userEmailRecipient']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userEmailRecipient = $this->UserEmailRecipients->newEntity();
        if ($this->request->is('post')) {
            $userEmailRecipient = $this->UserEmailRecipients->patchEntity($userEmailRecipient, $this->request->data);
            if ($this->UserEmailRecipients->save($userEmailRecipient)) {
                $this->Flash->success(___('the user email recipient has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $userEmailRecipient->id]);
            } else {
                $this->Flash->error(___('the user email recipient could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $userEmails = $this->UserEmailRecipients->UserEmails->find('list', ['limit' => 200]);
        $users = $this->UserEmailRecipients->Users->find('list', ['limit' => 200]);
        $this->set(compact('userEmailRecipient', 'userEmails', 'users'));
        $this->set('_serialize', ['userEmailRecipient']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User Email Recipient id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userEmailRecipient = $this->UserEmailRecipients->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userEmailRecipient = $this->UserEmailRecipients->patchEntity($userEmailRecipient, $this->request->data);
            if ($this->UserEmailRecipients->save($userEmailRecipient)) {
                $this->Flash->success(___('the user email recipient has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $userEmailRecipient->id]);
            } else {
                $this->Flash->error(___('the user email recipient could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $userEmails = $this->UserEmailRecipients->UserEmails->find('list', ['limit' => 200]);
        $users = $this->UserEmailRecipients->Users->find('list', ['limit' => 200]);
        $this->set(compact('userEmailRecipient', 'userEmails', 'users'));
        $this->set('_serialize', ['userEmailRecipient']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User Email Recipient id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userEmailRecipient = $this->UserEmailRecipients->get($id);
        
        try
        {
            if ($this->UserEmailRecipients->delete($userEmailRecipient)) {
                $this->Flash->success(___('the user email recipient has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the user email recipient could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the user email recipient could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The user email recipient could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->UserEmailRecipients->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected user email recipient has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected useremailrecipients have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected useremailrecipients could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected useremailrecipients could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no user email recipient to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id User Email Recipient id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $userEmailRecipient = $this->UserEmailRecipients->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userEmailRecipient = $this->UserEmailRecipients->newEntity();
            $userEmailRecipient = $this->UserEmailRecipients->patchEntity($userEmailRecipient, $this->request->data);
            if ($this->UserEmailRecipients->save($userEmailRecipient)) {
                $this->Flash->success(___('the user email recipient has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $userEmailRecipient->id]);
            } else {
                $this->Flash->error(___('the user email recipient could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $userEmails = $this->UserEmailRecipients->UserEmails->find('list', ['limit' => 200]);
        $users = $this->UserEmailRecipients->Users->find('list', ['limit' => 200]);
        
        $userEmailRecipient->id = $id;
        $this->set(compact('userEmailRecipient', 'userEmails', 'users'));
        $this->set('_serialize', ['userEmailRecipient']);
    }
}
