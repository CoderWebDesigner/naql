<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserContacts Controller
 *
 * @property \App\Model\Table\UserContactsTable $UserContacts
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class UserContactsController extends AppController
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
        $this->set('userContacts', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['userContacts']);
        
        $users = $this->UserContacts->Users->find('list', ['limit' => 200]);
        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User Contact id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userContact = $this->UserContacts->get($id, [
            'contain' => ['Users']
        ]);
        $this->set('userContact', $userContact);
        $this->set('_serialize', ['userContact']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userContact = $this->UserContacts->newEntity();
        if ($this->request->is('post')) {
            $userContact = $this->UserContacts->patchEntity($userContact, $this->request->data);
            if ($this->UserContacts->save($userContact)) {
                $this->Flash->success(___('the user contact has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $userContact->id]);
            } else {
                $this->Flash->error(___('the user contact could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $users = $this->UserContacts->Users->find('list', ['limit' => 200]);
        $this->set(compact('userContact', 'users'));
        $this->set('_serialize', ['userContact']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User Contact id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userContact = $this->UserContacts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userContact = $this->UserContacts->patchEntity($userContact, $this->request->data);
            if ($this->UserContacts->save($userContact)) {
                $this->Flash->success(___('the user contact has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $userContact->id]);
            } else {
                $this->Flash->error(___('the user contact could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $users = $this->UserContacts->Users->find('list', ['limit' => 200]);
        $this->set(compact('userContact', 'users'));
        $this->set('_serialize', ['userContact']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User Contact id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userContact = $this->UserContacts->get($id);
        
        try
        {
            if ($this->UserContacts->delete($userContact)) {
                $this->Flash->success(___('the user contact has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the user contact could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the user contact could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The user contact could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->UserContacts->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected user contact has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected usercontacts have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected usercontacts could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected usercontacts could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no user contact to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id User Contact id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $userContact = $this->UserContacts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userContact = $this->UserContacts->newEntity();
            $userContact = $this->UserContacts->patchEntity($userContact, $this->request->data);
            if ($this->UserContacts->save($userContact)) {
                $this->Flash->success(___('the user contact has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $userContact->id]);
            } else {
                $this->Flash->error(___('the user contact could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $users = $this->UserContacts->Users->find('list', ['limit' => 200]);
        
        $userContact->id = $id;
        $this->set(compact('userContact', 'users'));
        $this->set('_serialize', ['userContact']);
    }
}
