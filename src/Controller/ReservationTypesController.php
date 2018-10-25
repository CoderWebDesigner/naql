<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ReservationTypes Controller
 *
 * @property \App\Model\Table\ReservationTypesTable $ReservationTypes
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class ReservationTypesController extends AppController
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
        $this->set('reservationTypes', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['reservationTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Reservation Type id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reservationType = $this->ReservationTypes->get($id, [
            'contain' => ['Reservations']
        ]);
        $this->set('reservationType', $reservationType);
        $this->set('_serialize', ['reservationType']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $reservationType = $this->ReservationTypes->newEntity();
        if ($this->request->is('post')) {
            $reservationType = $this->ReservationTypes->patchEntity($reservationType, $this->request->data);
            if ($this->ReservationTypes->save($reservationType)) {
                $this->Flash->success(___('the reservation type has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $reservationType->id]);
            } else {
                $this->Flash->error(___('the reservation type could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $this->set(compact('reservationType'));
        $this->set('_serialize', ['reservationType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Reservation Type id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reservationType = $this->ReservationTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reservationType = $this->ReservationTypes->patchEntity($reservationType, $this->request->data);
            if ($this->ReservationTypes->save($reservationType)) {
                $this->Flash->success(___('the reservation type has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $reservationType->id]);
            } else {
                $this->Flash->error(___('the reservation type could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $this->set(compact('reservationType'));
        $this->set('_serialize', ['reservationType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Reservation Type id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reservationType = $this->ReservationTypes->get($id);
        
        try
        {
            if ($this->ReservationTypes->delete($reservationType)) {
                $this->Flash->success(___('the reservation type has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the reservation type could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the reservation type could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The reservation type could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->ReservationTypes->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected reservation type has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected reservationtypes have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected reservationtypes could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected reservationtypes could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no reservation type to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Reservation Type id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $reservationType = $this->ReservationTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reservationType = $this->ReservationTypes->newEntity();
            $reservationType = $this->ReservationTypes->patchEntity($reservationType, $this->request->data);
            if ($this->ReservationTypes->save($reservationType)) {
                $this->Flash->success(___('the reservation type has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $reservationType->id]);
            } else {
                $this->Flash->error(___('the reservation type could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        
        $reservationType->id = $id;
        $this->set(compact('reservationType'));
        $this->set('_serialize', ['reservationType']);
    }
}
