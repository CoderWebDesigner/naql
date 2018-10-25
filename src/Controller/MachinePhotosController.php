<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MachinePhotos Controller
 *
 * @property \App\Model\Table\MachinePhotosTable $MachinePhotos
 */
class MachinePhotosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['MachineOwners']
        ];
        $machinePhotos = $this->paginate($this->MachinePhotos);

        $this->set(compact('machinePhotos'));
        $this->set('_serialize', ['machinePhotos']);
    }

    /**
     * View method
     *
     * @param string|null $id Machine Photo id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $machinePhoto = $this->MachinePhotos->get($id, [
            'contain' => ['MachineOwners']
        ]);

        $this->set('machinePhoto', $machinePhoto);
        $this->set('_serialize', ['machinePhoto']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $machinePhoto = $this->MachinePhotos->newEntity();
        if ($this->request->is('post')) {
            $machinePhoto = $this->MachinePhotos->patchEntity($machinePhoto, $this->request->data);
            if ($this->MachinePhotos->save($machinePhoto)) {
                $this->Flash->success(__('The machine photo has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The machine photo could not be saved. Please, try again.'));
            }
        }
        $machineOwners = $this->MachinePhotos->MachineOwners->find('list', ['limit' => 200]);
        $this->set(compact('machinePhoto', 'machineOwners'));
        $this->set('_serialize', ['machinePhoto']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Machine Photo id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $machinePhoto = $this->MachinePhotos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $machinePhoto = $this->MachinePhotos->patchEntity($machinePhoto, $this->request->data);
            if ($this->MachinePhotos->save($machinePhoto)) {
                $this->Flash->success(__('The machine photo has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The machine photo could not be saved. Please, try again.'));
            }
        }
        $machineOwners = $this->MachinePhotos->MachineOwners->find('list', ['limit' => 200]);
        $this->set(compact('machinePhoto', 'machineOwners'));
        $this->set('_serialize', ['machinePhoto']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Machine Photo id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $machinePhoto = $this->MachinePhotos->get($id);
        if ($this->MachinePhotos->delete($machinePhoto)) {
            $this->Flash->success(__('The machine photo has been deleted.'));
        } else {
            $this->Flash->error(__('The machine photo could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
