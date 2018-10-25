<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * LoginTokens Controller
 *
 * @property \App\Model\Table\LoginTokensTable $LoginTokens
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class LoginTokensController extends AppController
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
        $this->set('loginTokens', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['loginTokens']);
        
        $users = $this->LoginTokens->Users->find('list', ['limit' => 200]);
        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id Login Token id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $loginToken = $this->LoginTokens->get($id, [
            'contain' => ['Users']
        ]);
        $this->set('loginToken', $loginToken);
        $this->set('_serialize', ['loginToken']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $loginToken = $this->LoginTokens->newEntity();
        if ($this->request->is('post')) {
            $loginToken = $this->LoginTokens->patchEntity($loginToken, $this->request->data);
            if ($this->LoginTokens->save($loginToken)) {
                $this->Flash->success(___('the login token has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $loginToken->id]);
            } else {
                $this->Flash->error(___('the login token could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $users = $this->LoginTokens->Users->find('list', ['limit' => 200]);
        $this->set(compact('loginToken', 'users'));
        $this->set('_serialize', ['loginToken']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Login Token id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $loginToken = $this->LoginTokens->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $loginToken = $this->LoginTokens->patchEntity($loginToken, $this->request->data);
            if ($this->LoginTokens->save($loginToken)) {
                $this->Flash->success(___('the login token has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $loginToken->id]);
            } else {
                $this->Flash->error(___('the login token could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $users = $this->LoginTokens->Users->find('list', ['limit' => 200]);
        $this->set(compact('loginToken', 'users'));
        $this->set('_serialize', ['loginToken']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Login Token id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $loginToken = $this->LoginTokens->get($id);
        
        try
        {
            if ($this->LoginTokens->delete($loginToken)) {
                $this->Flash->success(___('the login token has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the login token could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the login token could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The login token could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->LoginTokens->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected login token has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected logintokens have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected logintokens could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected logintokens could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no login token to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Login Token id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $loginToken = $this->LoginTokens->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $loginToken = $this->LoginTokens->newEntity();
            $loginToken = $this->LoginTokens->patchEntity($loginToken, $this->request->data);
            if ($this->LoginTokens->save($loginToken)) {
                $this->Flash->success(___('the login token has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $loginToken->id]);
            } else {
                $this->Flash->error(___('the login token could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $users = $this->LoginTokens->Users->find('list', ['limit' => 200]);
        
        $loginToken->id = $id;
        $this->set(compact('loginToken', 'users'));
        $this->set('_serialize', ['loginToken']);
    }
}
