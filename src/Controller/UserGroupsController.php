<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserGroups Controller
 *
 * @property \App\Model\Table\UserGroupsTable $UserGroups
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class UserGroupsController extends AppController
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
            'contain' => ['ParentUserGroups']
        ];
        $this->set('userGroups', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['userGroups']);
        
        $parentUserGroups = $this->UserGroups->ParentUserGroups->find('list', ['limit' => 200]);
        $this->set(compact('parentUserGroups'));
    }

    /**
     * View method
     *
     * @param string|null $id User Group id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userGroup = $this->UserGroups->get($id, [
            'contain' => ['ParentUserGroups', 'ScheduledEmails', 'UserEmails', 'UserGroupPermissions', 'ChildUserGroups', 'Users']
        ]);
        $this->set('userGroup', $userGroup);
        $this->set('_serialize', ['userGroup']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userGroup = $this->UserGroups->newEntity();
        if ($this->request->is('post')) {
            $userGroup = $this->UserGroups->patchEntity($userGroup, $this->request->data);
            if ($this->UserGroups->save($userGroup)) {
                $this->Flash->success(___('the user group has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $userGroup->id]);
            } else {
                $this->Flash->error(___('the user group could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $parentUserGroups = $this->UserGroups->ParentUserGroups->find('list', ['limit' => 200]);
        $this->set(compact('userGroup', 'parentUserGroups'));
        $this->set('_serialize', ['userGroup']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User Group id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userGroup = $this->UserGroups->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userGroup = $this->UserGroups->patchEntity($userGroup, $this->request->data);
            if ($this->UserGroups->save($userGroup)) {
                $this->Flash->success(___('the user group has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $userGroup->id]);
            } else {
                $this->Flash->error(___('the user group could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $parentUserGroups = $this->UserGroups->ParentUserGroups->find('list', ['limit' => 200]);
        $this->set(compact('userGroup', 'parentUserGroups'));
        $this->set('_serialize', ['userGroup']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User Group id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userGroup = $this->UserGroups->get($id);
        
        try
        {
            if ($this->UserGroups->delete($userGroup)) {
                $this->Flash->success(___('the user group has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the user group could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the user group could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The user group could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->UserGroups->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected user group has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected usergroups have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected usergroups could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected usergroups could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no user group to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id User Group id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $userGroup = $this->UserGroups->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userGroup = $this->UserGroups->newEntity();
            $userGroup = $this->UserGroups->patchEntity($userGroup, $this->request->data);
            if ($this->UserGroups->save($userGroup)) {
                $this->Flash->success(___('the user group has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $userGroup->id]);
            } else {
                $this->Flash->error(___('the user group could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $parentUserGroups = $this->UserGroups->ParentUserGroups->find('list', ['limit' => 200]);
        
        $userGroup->id = $id;
        $this->set(compact('userGroup', 'parentUserGroups'));
        $this->set('_serialize', ['userGroup']);
    }
}
