<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserGroupPermissions Controller
 *
 * @property \App\Model\Table\UserGroupPermissionsTable $UserGroupPermissions
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class UserGroupPermissionsController extends AppController
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
        $this->set('userGroupPermissions', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['userGroupPermissions']);
        
        $userGroups = $this->UserGroupPermissions->UserGroups->find('list', ['limit' => 200]);
        $this->set(compact('userGroups'));
    }

    /**
     * View method
     *
     * @param string|null $id User Group Permission id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userGroupPermission = $this->UserGroupPermissions->get($id, [
            'contain' => ['UserGroups']
        ]);
        $this->set('userGroupPermission', $userGroupPermission);
        $this->set('_serialize', ['userGroupPermission']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userGroupPermission = $this->UserGroupPermissions->newEntity();
        if ($this->request->is('post')) {
            $userGroupPermission = $this->UserGroupPermissions->patchEntity($userGroupPermission, $this->request->data);
            if ($this->UserGroupPermissions->save($userGroupPermission)) {
                $this->Flash->success(___('the user group permission has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $userGroupPermission->id]);
            } else {
                $this->Flash->error(___('the user group permission could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $userGroups = $this->UserGroupPermissions->UserGroups->find('list', ['limit' => 200]);
        $this->set(compact('userGroupPermission', 'userGroups'));
        $this->set('_serialize', ['userGroupPermission']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User Group Permission id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userGroupPermission = $this->UserGroupPermissions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userGroupPermission = $this->UserGroupPermissions->patchEntity($userGroupPermission, $this->request->data);
            if ($this->UserGroupPermissions->save($userGroupPermission)) {
                $this->Flash->success(___('the user group permission has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $userGroupPermission->id]);
            } else {
                $this->Flash->error(___('the user group permission could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $userGroups = $this->UserGroupPermissions->UserGroups->find('list', ['limit' => 200]);
        $this->set(compact('userGroupPermission', 'userGroups'));
        $this->set('_serialize', ['userGroupPermission']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User Group Permission id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userGroupPermission = $this->UserGroupPermissions->get($id);
        
        try
        {
            if ($this->UserGroupPermissions->delete($userGroupPermission)) {
                $this->Flash->success(___('the user group permission has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the user group permission could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the user group permission could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The user group permission could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->UserGroupPermissions->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected user group permission has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected usergrouppermissions have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected usergrouppermissions could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected usergrouppermissions could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no user group permission to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id User Group Permission id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $userGroupPermission = $this->UserGroupPermissions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userGroupPermission = $this->UserGroupPermissions->newEntity();
            $userGroupPermission = $this->UserGroupPermissions->patchEntity($userGroupPermission, $this->request->data);
            if ($this->UserGroupPermissions->save($userGroupPermission)) {
                $this->Flash->success(___('the user group permission has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $userGroupPermission->id]);
            } else {
                $this->Flash->error(___('the user group permission could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $userGroups = $this->UserGroupPermissions->UserGroups->find('list', ['limit' => 200]);
        
        $userGroupPermission->id = $id;
        $this->set(compact('userGroupPermission', 'userGroups'));
        $this->set('_serialize', ['userGroupPermission']);
    }
}
