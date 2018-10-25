<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserSocials Controller
 *
 * @property \App\Model\Table\UserSocialsTable $UserSocials
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class UserSocialsController extends AppController
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
        $this->set('userSocials', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['userSocials']);
        
        $users = $this->UserSocials->Users->find('list', ['limit' => 200]);
        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User Social id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userSocial = $this->UserSocials->get($id, [
            'contain' => ['Users']
        ]);
        $this->set('userSocial', $userSocial);
        $this->set('_serialize', ['userSocial']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userSocial = $this->UserSocials->newEntity();
        if ($this->request->is('post')) {
            $userSocial = $this->UserSocials->patchEntity($userSocial, $this->request->data);
            if ($this->UserSocials->save($userSocial)) {
                $this->Flash->success(___('the user social has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $userSocial->id]);
            } else {
                $this->Flash->error(___('the user social could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $users = $this->UserSocials->Users->find('list', ['limit' => 200]);
        $this->set(compact('userSocial', 'users'));
        $this->set('_serialize', ['userSocial']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User Social id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userSocial = $this->UserSocials->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userSocial = $this->UserSocials->patchEntity($userSocial, $this->request->data);
            if ($this->UserSocials->save($userSocial)) {
                $this->Flash->success(___('the user social has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $userSocial->id]);
            } else {
                $this->Flash->error(___('the user social could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $users = $this->UserSocials->Users->find('list', ['limit' => 200]);
        $this->set(compact('userSocial', 'users'));
        $this->set('_serialize', ['userSocial']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User Social id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userSocial = $this->UserSocials->get($id);
        
        try
        {
            if ($this->UserSocials->delete($userSocial)) {
                $this->Flash->success(___('the user social has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the user social could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the user social could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The user social could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->UserSocials->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected user social has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected usersocials have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected usersocials could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected usersocials could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no user social to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id User Social id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $userSocial = $this->UserSocials->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userSocial = $this->UserSocials->newEntity();
            $userSocial = $this->UserSocials->patchEntity($userSocial, $this->request->data);
            if ($this->UserSocials->save($userSocial)) {
                $this->Flash->success(___('the user social has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $userSocial->id]);
            } else {
                $this->Flash->error(___('the user social could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $users = $this->UserSocials->Users->find('list', ['limit' => 200]);
        
        $userSocial->id = $id;
        $this->set(compact('userSocial', 'users'));
        $this->set('_serialize', ['userSocial']);
    }
}
