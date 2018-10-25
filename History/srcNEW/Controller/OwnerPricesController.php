<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OwnerPrices Controller
 *
 * @property \App\Model\Table\OwnerPricesTable $OwnerPrices
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class OwnerPricesController extends AppController
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
            'contain' => ['Owners', 'Reservations']
        ];
        $this->set('ownerPrices', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['ownerPrices']);
        
        $owners = $this->OwnerPrices->Owners->find('list', ['limit' => 200]);
        $reservations = $this->OwnerPrices->Reservations->find('list', ['limit' => 200]);
        $this->set(compact('owners', 'reservations'));
    }

    /**
     * View method
     *
     * @param string|null $id Owner Price id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ownerPrice = $this->OwnerPrices->get($id, [
            'contain' => ['Owners', 'Reservations']
        ]);
        $this->set('ownerPrice', $ownerPrice);
        $this->set('_serialize', ['ownerPrice']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ownerPrice = $this->OwnerPrices->newEntity();
        if ($this->request->is('post')) {
            $ownerPrice = $this->OwnerPrices->patchEntity($ownerPrice, $this->request->data);
            if ($this->OwnerPrices->save($ownerPrice)) {
                $this->Flash->success(___('the owner price has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $ownerPrice->id]);
            } else {
                $this->Flash->error(___('the owner price could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $owners = $this->OwnerPrices->Owners->find('list', ['limit' => 200]);
        $reservations = $this->OwnerPrices->Reservations->find('list', ['limit' => 200]);
        $this->set(compact('ownerPrice', 'owners', 'reservations'));
        $this->set('_serialize', ['ownerPrice']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Owner Price id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ownerPrice = $this->OwnerPrices->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ownerPrice = $this->OwnerPrices->patchEntity($ownerPrice, $this->request->data);
            if ($this->OwnerPrices->save($ownerPrice)) {
                $this->Flash->success(___('the owner price has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $ownerPrice->id]);
            } else {
                $this->Flash->error(___('the owner price could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $owners = $this->OwnerPrices->Owners->find('list', ['limit' => 200]);
        $reservations = $this->OwnerPrices->Reservations->find('list', ['limit' => 200]);
        $this->set(compact('ownerPrice', 'owners', 'reservations'));
        $this->set('_serialize', ['ownerPrice']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Owner Price id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ownerPrice = $this->OwnerPrices->get($id);
        
        try
        {
            if ($this->OwnerPrices->delete($ownerPrice)) {
                $this->Flash->success(___('the owner price has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the owner price could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the owner price could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The owner price could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->OwnerPrices->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected owner price has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected ownerprices have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected ownerprices could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected ownerprices could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no owner price to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Owner Price id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $ownerPrice = $this->OwnerPrices->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ownerPrice = $this->OwnerPrices->newEntity();
            $ownerPrice = $this->OwnerPrices->patchEntity($ownerPrice, $this->request->data);
            if ($this->OwnerPrices->save($ownerPrice)) {
                $this->Flash->success(___('the owner price has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $ownerPrice->id]);
            } else {
                $this->Flash->error(___('the owner price could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $owners = $this->OwnerPrices->Owners->find('list', ['limit' => 200]);
        $reservations = $this->OwnerPrices->Reservations->find('list', ['limit' => 200]);
        
        $ownerPrice->id = $id;
        $this->set(compact('ownerPrice', 'owners', 'reservations'));
        $this->set('_serialize', ['ownerPrice']);
    }
}
