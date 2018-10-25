<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserActivities Controller
 *
 * @property \App\Model\Table\UserActivitiesTable $UserActivities
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class UserActivitiesController extends AppController
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
        $this->set('userActivities', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['userActivities']);
        
        $users = $this->UserActivities->Users->find('list', ['limit' => 200]);
        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User Activity id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userActivity = $this->UserActivities->get($id, [
            'contain' => ['Users']
        ]);
        $this->set('userActivity', $userActivity);
        $this->set('_serialize', ['userActivity']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userActivity = $this->UserActivities->newEntity();
        if ($this->request->is('post')) {
            $userActivity = $this->UserActivities->patchEntity($userActivity, $this->request->data);
            if ($this->UserActivities->save($userActivity)) {
                $this->Flash->success(___('the user activity has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $userActivity->id]);
            } else {
                $this->Flash->error(___('the user activity could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $users = $this->UserActivities->Users->find('list', ['limit' => 200]);
        $this->set(compact('userActivity', 'users'));
        $this->set('_serialize', ['userActivity']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User Activity id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userActivity = $this->UserActivities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userActivity = $this->UserActivities->patchEntity($userActivity, $this->request->data);
            if ($this->UserActivities->save($userActivity)) {
                $this->Flash->success(___('the user activity has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $userActivity->id]);
            } else {
                $this->Flash->error(___('the user activity could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $users = $this->UserActivities->Users->find('list', ['limit' => 200]);
        $this->set(compact('userActivity', 'users'));
        $this->set('_serialize', ['userActivity']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User Activity id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userActivity = $this->UserActivities->get($id);
        
        try
        {
            if ($this->UserActivities->delete($userActivity)) {
                $this->Flash->success(___('the user activity has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the user activity could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the user activity could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The user activity could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->UserActivities->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected user activity has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected useractivities have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected useractivities could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected useractivities could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no user activity to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id User Activity id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $userActivity = $this->UserActivities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userActivity = $this->UserActivities->newEntity();
            $userActivity = $this->UserActivities->patchEntity($userActivity, $this->request->data);
            if ($this->UserActivities->save($userActivity)) {
                $this->Flash->success(___('the user activity has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $userActivity->id]);
            } else {
                $this->Flash->error(___('the user activity could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $users = $this->UserActivities->Users->find('list', ['limit' => 200]);
        
        $userActivity->id = $id;
        $this->set(compact('userActivity', 'users'));
        $this->set('_serialize', ['userActivity']);
    }
}
