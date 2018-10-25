<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Rates Controller
 *
 * @property \App\Model\Table\RatesTable $Rates
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class RatesController extends AppController
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
            'contain' => ['Users', 'Owners']
        ];
        $this->set('rates', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['rates']);
        
        $users = $this->Rates->Users->find('list', ['limit' => 200]);
        $owners = $this->Rates->Owners->find('list', ['limit' => 200]);
        $this->set(compact('users', 'owners'));
    }

    /**
     * View method
     *
     * @param string|null $id Rate id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rate = $this->Rates->get($id, [
            'contain' => ['Users', 'Owners']
        ]);
        $this->set('rate', $rate);
        $this->set('_serialize', ['rate']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rate = $this->Rates->newEntity();
        if ($this->request->is('post')) {
            $rate = $this->Rates->patchEntity($rate, $this->request->data);
            if ($this->Rates->save($rate)) {
                $this->Flash->success(___('the rate has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $rate->id]);
            } else {
                $this->Flash->error(___('the rate could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $users = $this->Rates->Users->find('list', ['limit' => 200]);
        $owners = $this->Rates->Owners->find('list', ['limit' => 200]);
        $this->set(compact('rate', 'users', 'owners'));
        $this->set('_serialize', ['rate']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Rate id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rate = $this->Rates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rate = $this->Rates->patchEntity($rate, $this->request->data);
            if ($this->Rates->save($rate)) {
                $this->Flash->success(___('the rate has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $rate->id]);
            } else {
                $this->Flash->error(___('the rate could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $users = $this->Rates->Users->find('list', ['limit' => 200]);
        $owners = $this->Rates->Owners->find('list', ['limit' => 200]);
        $this->set(compact('rate', 'users', 'owners'));
        $this->set('_serialize', ['rate']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Rate id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rate = $this->Rates->get($id);
        
        try
        {
            if ($this->Rates->delete($rate)) {
                $this->Flash->success(___('the rate has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the rate could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the rate could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The rate could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->Rates->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected rate has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected rates have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected rates could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected rates could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no rate to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Rate id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $rate = $this->Rates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rate = $this->Rates->newEntity();
            $rate = $this->Rates->patchEntity($rate, $this->request->data);
            if ($this->Rates->save($rate)) {
                $this->Flash->success(___('the rate has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $rate->id]);
            } else {
                $this->Flash->error(___('the rate could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $users = $this->Rates->Users->find('list', ['limit' => 200]);
        $owners = $this->Rates->Owners->find('list', ['limit' => 200]);
        
        $rate->id = $id;
        $this->set(compact('rate', 'users', 'owners'));
        $this->set('_serialize', ['rate']);
    }
}
