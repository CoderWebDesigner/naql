<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserEmailTemplates Controller
 *
 * @property \App\Model\Table\UserEmailTemplatesTable $UserEmailTemplates
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class UserEmailTemplatesController extends AppController
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
            'contain' => ['Users']
        ];
        $this->set('userEmailTemplates', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['userEmailTemplates']);
        
        $users = $this->UserEmailTemplates->Users->find('list', ['limit' => 200]);
        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User Email Template id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userEmailTemplate = $this->UserEmailTemplates->get($id, [
            'contain' => ['Users']
        ]);
        $this->set('userEmailTemplate', $userEmailTemplate);
        $this->set('_serialize', ['userEmailTemplate']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userEmailTemplate = $this->UserEmailTemplates->newEntity();
        if ($this->request->is('post')) {
            $userEmailTemplate = $this->UserEmailTemplates->patchEntity($userEmailTemplate, $this->request->data);
            if ($this->UserEmailTemplates->save($userEmailTemplate)) {
                $this->Flash->success(___('the user email template has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $userEmailTemplate->id]);
            } else {
                $this->Flash->error(___('the user email template could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $users = $this->UserEmailTemplates->Users->find('list', ['limit' => 200]);
        $this->set(compact('userEmailTemplate', 'users'));
        $this->set('_serialize', ['userEmailTemplate']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User Email Template id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userEmailTemplate = $this->UserEmailTemplates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userEmailTemplate = $this->UserEmailTemplates->patchEntity($userEmailTemplate, $this->request->data);
            if ($this->UserEmailTemplates->save($userEmailTemplate)) {
                $this->Flash->success(___('the user email template has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $userEmailTemplate->id]);
            } else {
                $this->Flash->error(___('the user email template could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $users = $this->UserEmailTemplates->Users->find('list', ['limit' => 200]);
        $this->set(compact('userEmailTemplate', 'users'));
        $this->set('_serialize', ['userEmailTemplate']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User Email Template id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userEmailTemplate = $this->UserEmailTemplates->get($id);
        
        try
        {
            if ($this->UserEmailTemplates->delete($userEmailTemplate)) {
                $this->Flash->success(___('the user email template has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the user email template could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the user email template could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The user email template could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->UserEmailTemplates->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected user email template has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected useremailtemplates have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected useremailtemplates could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected useremailtemplates could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no user email template to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id User Email Template id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $userEmailTemplate = $this->UserEmailTemplates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userEmailTemplate = $this->UserEmailTemplates->newEntity();
            $userEmailTemplate = $this->UserEmailTemplates->patchEntity($userEmailTemplate, $this->request->data);
            if ($this->UserEmailTemplates->save($userEmailTemplate)) {
                $this->Flash->success(___('the user email template has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $userEmailTemplate->id]);
            } else {
                $this->Flash->error(___('the user email template could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $users = $this->UserEmailTemplates->Users->find('list', ['limit' => 200]);
        
        $userEmailTemplate->id = $id;
        $this->set(compact('userEmailTemplate', 'users'));
        $this->set('_serialize', ['userEmailTemplate']);
    }
}
