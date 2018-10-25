<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserDetails Controller
 *
 * @property \App\Model\Table\UserDetailsTable $UserDetails
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class UserDetailsController extends AppController
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
        $this->set('userDetails', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['userDetails']);
        
        $users = $this->UserDetails->Users->find('list', ['limit' => 200]);
        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User Detail id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userDetail = $this->UserDetails->get($id, [
            'contain' => ['Users']
        ]);
        $this->set('userDetail', $userDetail);
        $this->set('_serialize', ['userDetail']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userDetail = $this->UserDetails->newEntity();
        if ($this->request->is('post')) {
            $userDetail = $this->UserDetails->patchEntity($userDetail, $this->request->data);
            if ($this->UserDetails->save($userDetail)) {
                $this->Flash->success(___('the user detail has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $userDetail->id]);
            } else {
                $this->Flash->error(___('the user detail could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $users = $this->UserDetails->Users->find('list', ['limit' => 200]);
        $this->set(compact('userDetail', 'users'));
        $this->set('_serialize', ['userDetail']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User Detail id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userDetail = $this->UserDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userDetail = $this->UserDetails->patchEntity($userDetail, $this->request->data);
            if ($this->UserDetails->save($userDetail)) {
                $this->Flash->success(___('the user detail has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $userDetail->id]);
            } else {
                $this->Flash->error(___('the user detail could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $users = $this->UserDetails->Users->find('list', ['limit' => 200]);
        $this->set(compact('userDetail', 'users'));
        $this->set('_serialize', ['userDetail']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User Detail id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userDetail = $this->UserDetails->get($id);
        
        try
        {
            if ($this->UserDetails->delete($userDetail)) {
                $this->Flash->success(___('the user detail has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the user detail could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the user detail could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The user detail could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->UserDetails->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected user detail has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected userdetails have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected userdetails could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected userdetails could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no user detail to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id User Detail id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $userDetail = $this->UserDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userDetail = $this->UserDetails->newEntity();
            $userDetail = $this->UserDetails->patchEntity($userDetail, $this->request->data);
            if ($this->UserDetails->save($userDetail)) {
                $this->Flash->success(___('the user detail has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $userDetail->id]);
            } else {
                $this->Flash->error(___('the user detail could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $users = $this->UserDetails->Users->find('list', ['limit' => 200]);
        
        $userDetail->id = $id;
        $this->set(compact('userDetail', 'users'));
        $this->set('_serialize', ['userDetail']);
    }
}
