<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserEmails Controller
 *
 * @property \App\Model\Table\UserEmailsTable $UserEmails
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class UserEmailsController extends AppController
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
            'contain' => ['UserGroups']
        ];
        $this->set('userEmails', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['userEmails']);
        
        $userGroups = $this->UserEmails->UserGroups->find('list', ['limit' => 200]);
        $this->set(compact('userGroups'));
    }

    /**
     * View method
     *
     * @param string|null $id User Email id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userEmail = $this->UserEmails->get($id, [
            'contain' => ['UserGroups', 'ScheduledEmails', 'UserEmailRecipients']
        ]);
        $this->set('userEmail', $userEmail);
        $this->set('_serialize', ['userEmail']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userEmail = $this->UserEmails->newEntity();
        if ($this->request->is('post')) {
            $userEmail = $this->UserEmails->patchEntity($userEmail, $this->request->data);
            if ($this->UserEmails->save($userEmail)) {
                $this->Flash->success(___('the user email has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $userEmail->id]);
            } else {
                $this->Flash->error(___('the user email could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $userGroups = $this->UserEmails->UserGroups->find('list', ['limit' => 200]);
        $this->set(compact('userEmail', 'userGroups'));
        $this->set('_serialize', ['userEmail']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User Email id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userEmail = $this->UserEmails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userEmail = $this->UserEmails->patchEntity($userEmail, $this->request->data);
            if ($this->UserEmails->save($userEmail)) {
                $this->Flash->success(___('the user email has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $userEmail->id]);
            } else {
                $this->Flash->error(___('the user email could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $userGroups = $this->UserEmails->UserGroups->find('list', ['limit' => 200]);
        $this->set(compact('userEmail', 'userGroups'));
        $this->set('_serialize', ['userEmail']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User Email id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userEmail = $this->UserEmails->get($id);
        
        try
        {
            if ($this->UserEmails->delete($userEmail)) {
                $this->Flash->success(___('the user email has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the user email could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the user email could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The user email could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->UserEmails->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected user email has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected useremails have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected useremails could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected useremails could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no user email to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id User Email id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $userEmail = $this->UserEmails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userEmail = $this->UserEmails->newEntity();
            $userEmail = $this->UserEmails->patchEntity($userEmail, $this->request->data);
            if ($this->UserEmails->save($userEmail)) {
                $this->Flash->success(___('the user email has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $userEmail->id]);
            } else {
                $this->Flash->error(___('the user email could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $userGroups = $this->UserEmails->UserGroups->find('list', ['limit' => 200]);
        
        $userEmail->id = $id;
        $this->set(compact('userEmail', 'userGroups'));
        $this->set('_serialize', ['userEmail']);
    }
}
