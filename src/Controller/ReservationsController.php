<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\AppController;

/**
 * Reservations Controller
 *
 * @property \App\Model\Table\ReservationsTable $Reservations
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class ReservationsController extends AppController {

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
    //////////////////////////////////////////////////////
    function makeOrder() {
        $this->viewBuilder()->layout('frontend');

        $id = $this->Auth->user('id');
        $this->set(compact('id', 'success', 'offer', 'ownerID', 'ownerIDQuery'));
    }

    function makeOrderen() {
        $this->viewBuilder()->layout('frontenden');

        $id = $this->Auth->user('id');
        $this->set(compact('id', 'success', 'offer', 'ownerID', 'ownerIDQuery'));
    }

    function reports() {
        $this->viewBuilder()->layout('dashboard');


      //  $users = $this->Reservations->Users->find('list', ['limit' => 200, 'keyField' => 'id',
         //   'valueField' => 'username']);
       $all = $this->Reservations->find('all')->contain(['Machines', 'MachineDetails','Users'])->toarray();
        $query = $this->Reservations->Machines->find();
        $ddd = $query->select(['total_result' => $query->func()->count('Reservations.machine_id')])
                ->autoFields(true)
                ->contain('Reservations')
                ->leftJoinWith('Reservations')
                ->group(['Machines.id'])
                ->order(['total_result' => 'DESC'])
                ->toarray();
       //debug($all);
//
//        if ($this->request->is('post')) {
//            $this->paginate = [
//                'contain' => ['Doctors', 'Departments', 'Cobons', 'Users'], 'limit' => 1000
//            ];
//            $this->set('all', $this->paginate($this->Filter->getFilterQuery()));
//            $this->set('_serialize', ['all']);
//            $this->set('reservations', $this->paginate($this->Filter->getFilterQuery()));
//            $this->set('_serialize', ['reservations']);
//        } else {
//
           $this->set('all', $all);
//            $this->set('_serialize', ['all']);
            $this->paginate = [
                'contain' => ['Users', 'Machines', 'MachineDetails','Owners'=>['Users']]
            ];
            $this->set('reservations', $this->paginate($this->Filter->getFilterQuery()));
            $this->set('_serialize', ['reservations']);
      //  }
//
            
                   $users = $this->Reservations->Users->find('list', ['limit' => 200, 'keyField' => 'id',
            'valueField' => 'username']);
                $owners = $this->Reservations->Owners->find('list', ['limit' => 200,"contain"=>(["Users"]) ,'keyField' => 'id',
            'valueField' =>function($e){
                    return $e->user->username;
                    
            }]);
                $reservationTypes = $this->Reservations->ReservationTypes->find('list', ['limit' => 200, 'keyField' => 'id',
            'valueField' => 'name']);
                $machineDetails = $this->Reservations->MachineDetails->find('list', ['limit' => 200, 'keyField' => 'id',
            'valueField' => 'name']);
                                $machines = $this->Reservations->Machines->find('list', ['limit' => 200, 'keyField' => 'id',
            'valueField' => 'name']);

        $this->set(compact('machines', 'users', 'owners', 'reservationTypes', 'query', 'getdocreservation','machineDetails'));
    }

    public function myorders($userID) {
        $this->viewBuilder()->layout('dashboard');
        $success = true;
        $data = $this->Reservations->find('all')
                //     ->limit(2) 
                ->where(['Reservations.user_id' => $userID, 'Reservations.status' => 'pending'])
                ->contain([
                    'MachineDetails' => function($carElhay) {
                        return $carElhay
                                ->select(['name', 'name_en', 'machine_photo']);
                    },
                            'ReservationTypes' => function($contractElhay) {
                        return $contractElhay
                                ->select(['name', 'name_en']);
                    }])
                        ->order(['Reservations.id DESC'])
                        ->toArray();

                //
                $ownerIDQuery = $this->Reservations->Owners->find()->where(['Owners.user_id' => $userID])->toArray();
                $ownerId = $ownerIDQuery[0]['owner_id'];
                debug($ownerId);
                //
                if ($this->request->is('post')) {

                    $offer = $this->Reservations->OwnerPrices->newEntity();

                    $offer = $this->Reservations->OwnerPrices->patchEntity($offer, $this->request->data);
                    if ($this->Reservations->OwnerPrices->save($offer)) {
                        $this->Flash->success(___('the offer price has been saved'), ['plugin' => 'Alaxos']);
                    } else {
                        $this->Flash->error(___('the offer price could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
                    }
                }

                //     debug($data);
                $this->set(compact('data', 'success', 'offer', 'ownerID', 'ownerIDQuery'));
                $this->set('_serialize', ['success', 'data']);
            }

            ///////////////////////

            function homepage() {
                $this->viewBuilder()->layout('front');
            }

            function reservations() {
                $this->viewBuilder()->layout('front');
                $machineDetail = TableRegistry::get('Machines');
                $chooseMachines = $machineDetail->find('all')
                        ->contain(['MachineDetails'])
                        ->toArray();
                debug($chooseMachines);
                $this->set(compact('chooseMachines'));
            }

            public function index() {
                $this->paginate = [
                    'contain' => ['Users', 'Owners', 'ReservationTypes', 'Machines']
                ];
                $this->set('reservations', $this->paginate($this->Filter->getFilterQuery()));
                $this->set('_serialize', ['reservations']);

                $users = $this->Reservations->Users->find('list', ['limit' => 200]);
                $owners = $this->Reservations->Owners->find('list', ['limit' => 200]);
                $reservationTypes = $this->Reservations->ReservationTypes->find('list', ['limit' => 200]);
                $machines = $this->Reservations->Machines->find('list', ['limit' => 200]);
                $this->set(compact('users', 'owners', 'reservationTypes', 'machines'));
            }

            /**
             * View method
             *
             * @param string|null $id Reservation id.
             * @return void
             * @throws \Cake\Network\Exception\NotFoundException When record not found.
             */
            public function view($id = null) {
                $reservation = $this->Reservations->get($id, [
                    'contain' => ['Users', 'Owners', 'ReservationTypes', 'Machines']
                ]);
                $this->set('reservation', $reservation);
                $this->set('_serialize', ['reservation']);
            }

            /**
             * Add method
             *
             * @return void Redirects on successful add, renders view otherwise.
             */
            public function add() {
                $reservation = $this->Reservations->newEntity();
                if ($this->request->is('post')) {
                    $reservation = $this->Reservations->patchEntity($reservation, $this->request->data);
                    if ($this->Reservations->save($reservation)) {
                        $this->Flash->success(___('the reservation has been saved'), ['plugin' => 'Alaxos']);
                        return $this->redirect(['action' => 'view', $reservation->id]);
                    } else {
                        $this->Flash->error(___('the reservation could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
                    }
                }
                $users = $this->Reservations->Users->find('list', ['limit' => 200]);
                $owners = $this->Reservations->Owners->find('list', ['limit' => 200]);
                $reservationTypes = $this->Reservations->ReservationTypes->find('list', ['limit' => 200]);
                $machines = $this->Reservations->Machines->find('list', ['limit' => 200]);
                $this->set(compact('reservation', 'users', 'owners', 'reservationTypes', 'machines'));
                $this->set('_serialize', ['reservation']);
            }

            /**
             * Edit method
             *
             * @param string|null $id Reservation id.
             * @return void Redirects on successful edit, renders view otherwise.
             * @throws \Cake\Network\Exception\NotFoundException When record not found.
             */
            public function edit($id = null) {
                $reservation = $this->Reservations->get($id, [
                    'contain' => []
                ]);
                if ($this->request->is(['patch', 'post', 'put'])) {
                    $reservation = $this->Reservations->patchEntity($reservation, $this->request->data);
                    if ($this->Reservations->save($reservation)) {
                        $this->Flash->success(___('the reservation has been saved'), ['plugin' => 'Alaxos']);
                        return $this->redirect(['action' => 'view', $reservation->id]);
                    } else {
                        $this->Flash->error(___('the reservation could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
                    }
                }
                $users = $this->Reservations->Users->find('list', ['limit' => 200]);
                $owners = $this->Reservations->Owners->find('list', ['limit' => 200]);
                $reservationTypes = $this->Reservations->ReservationTypes->find('list', ['limit' => 200]);
                $machines = $this->Reservations->Machines->find('list', ['limit' => 200]);
                $this->set(compact('reservation', 'users', 'owners', 'reservationTypes', 'machines'));
                $this->set('_serialize', ['reservation']);
            }

            /**
             * Delete method
             *
             * @param string|null $id Reservation id.
             * @return void Redirects to index.
             * @throws \Cake\Network\Exception\NotFoundException When record not found.
             */
            public function delete($id = null) {
                $this->request->allowMethod(['post', 'delete']);
                $reservation = $this->Reservations->get($id);

                try {
                    if ($this->Reservations->delete($reservation)) {
                        $this->Flash->success(___('the reservation has been deleted'), ['plugin' => 'Alaxos']);
                    } else {
                        $this->Flash->error(___('the reservation could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
                    }
                } catch (\Exception $ex) {
                    if ($ex->getCode() == 23000) {
                        $this->Flash->error(___('the reservation could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
                    } else {
                        $this->Flash->error(sprintf(__('The reservation could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
                    }
                }

                return $this->redirect(['action' => 'index']);
            }

            /**
             * Delete all method
             */
            public function delete_all() {
                $this->request->allowMethod('post', 'delete');

                if (isset($this->request->data['checked_ids']) && !empty($this->request->data['checked_ids'])) {

                    $query = $this->Reservations->query();
                    $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);

                    try {
                        if ($statement = $query->execute()) {
                            $deleted_total = $statement->rowCount();
                            if ($deleted_total == 1) {
                                $this->Flash->set(___('the selected reservation has been deleted.'), ['element' => 'Alaxos.success']);
                            } elseif ($deleted_total > 1) {
                                $this->Flash->set(sprintf(__('The %s selected reservations have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                            }
                        } else {
                            $this->Flash->set(___('the selected reservations could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                        }
                    } catch (\Exception $ex) {
                        $this->Flash->set(___('the selected reservations could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
                    }
                } else {
                    $this->Flash->set(___('there was no reservation to delete'), ['element' => 'Alaxos.error']);
                }

                return $this->redirect(['action' => 'index']);
            }

            /**
             * Copy method
             *
             * @param string|null $id Reservation id.
             * @return void Redirects on successful copy, renders view otherwise.
             * @throws \Cake\Network\Exception\NotFoundException When record not found.
             */
            public function copy($id = null) {
                $reservation = $this->Reservations->get($id, [
                    'contain' => []
                ]);
                if ($this->request->is(['patch', 'post', 'put'])) {
                    $reservation = $this->Reservations->newEntity();
                    $reservation = $this->Reservations->patchEntity($reservation, $this->request->data);
                    if ($this->Reservations->save($reservation)) {
                        $this->Flash->success(___('the reservation has been saved'), ['plugin' => 'Alaxos']);
                        return $this->redirect(['action' => 'view', $reservation->id]);
                    } else {
                        $this->Flash->error(___('the reservation could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
                    }
                }
                $users = $this->Reservations->Users->find('list', ['limit' => 200]);
                $owners = $this->Reservations->Owners->find('list', ['limit' => 200]);
                $reservationTypes = $this->Reservations->ReservationTypes->find('list', ['limit' => 200]);
                $machines = $this->Reservations->Machines->find('list', ['limit' => 200]);

                $reservation->id = $id;
                $this->set(compact('reservation', 'users', 'owners', 'reservationTypes', 'machines'));
                $this->set('_serialize', ['reservation']);
            }

        }
        