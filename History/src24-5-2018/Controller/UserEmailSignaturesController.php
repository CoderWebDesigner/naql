<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserEmailSignatures Controller
 *
 * @property \App\Model\Table\UserEmailSignaturesTable $UserEmailSignatures
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class UserEmailSignaturesController extends AppController
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
        $this->set('userEmailSignatures', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['userEmailSignatures']);
        
        $users = $this->UserEmailSignatures->Users->find('list', ['limit' => 200]);
        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User Email Signature id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userEmailSignature = $this->UserEmailSignatures->get($id, [
            'contain' => ['Users']
        ]);
        $this->set('userEmailSignature', $userEmailSignature);
        $this->set('_serialize', ['userEmailSignature']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userEmailSignature = $this->UserEmailSignatures->newEntity();
        if ($this->request->is('post')) {
            $userEmailSignature = $this->UserEmailSignatures->patchEntity($userEmailSignature, $this->request->data);
            if ($this->UserEmailSignatures->save($userEmailSignature)) {
                $this->Flash->success(___('the user email signature has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $userEmailSignature->id]);
            } else {
                $this->Flash->error(___('the user email signature could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $users = $this->UserEmailSignatures->Users->find('list', ['limit' => 200]);
        $this->set(compact('userEmailSignature', 'users'));
        $this->set('_serialize', ['userEmailSignature']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User Email Signature id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userEmailSignature = $this->UserEmailSignatures->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userEmailSignature = $this->UserEmailSignatures->patchEntity($userEmailSignature, $this->request->data);
            if ($this->UserEmailSignatures->save($userEmailSignature)) {
                $this->Flash->success(___('the user email signature has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $userEmailSignature->id]);
            } else {
                $this->Flash->error(___('the user email signature could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $users = $this->UserEmailSignatures->Users->find('list', ['limit' => 200]);
        $this->set(compact('userEmailSignature', 'users'));
        $this->set('_serialize', ['userEmailSignature']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User Email Signature id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userEmailSignature = $this->UserEmailSignatures->get($id);
        
        try
        {
            if ($this->UserEmailSignatures->delete($userEmailSignature)) {
                $this->Flash->success(___('the user email signature has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the user email signature could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the user email signature could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The user email signature could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->UserEmailSignatures->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected user email signature has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected useremailsignatures have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected useremailsignatures could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected useremailsignatures could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no user email signature to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id User Email Signature id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $userEmailSignature = $this->UserEmailSignatures->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userEmailSignature = $this->UserEmailSignatures->newEntity();
            $userEmailSignature = $this->UserEmailSignatures->patchEntity($userEmailSignature, $this->request->data);
            if ($this->UserEmailSignatures->save($userEmailSignature)) {
                $this->Flash->success(___('the user email signature has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $userEmailSignature->id]);
            } else {
                $this->Flash->error(___('the user email signature could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $users = $this->UserEmailSignatures->Users->find('list', ['limit' => 200]);
        
        $userEmailSignature->id = $id;
        $this->set(compact('userEmailSignature', 'users'));
        $this->set('_serialize', ['userEmailSignature']);
    }
}
