<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Areas Controller
 *
 * @property \App\Model\Table\AreasTable $Areas
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class AreasController extends AppController
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
         $this->viewBuilder()->layout('front');
        $this->set('areas', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['areas']);
    }

    /**
     * View method
     *
     * @param string|null $id Area id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
         $this->viewBuilder()->layout('front');
        $area = $this->Areas->get($id, [
            'contain' => ['Users']
        ]);
        $this->set('area', $area);
        $this->set('_serialize', ['area']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('front');
        $area = $this->Areas->newEntity();
        if ($this->request->is('post')) {
            $area = $this->Areas->patchEntity($area, $this->request->data);
            if ($this->Areas->save($area)) {
                $this->Flash->success(___('the area has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $area->id]);
            } else {
                $this->Flash->error(___('the area could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $this->set(compact('area'));
        $this->set('_serialize', ['area']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Area id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
         $this->viewBuilder()->layout('front');
        $area = $this->Areas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $area = $this->Areas->patchEntity($area, $this->request->data);
            if ($this->Areas->save($area)) {
                $this->Flash->success(___('the area has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $area->id]);
            } else {
                $this->Flash->error(___('the area could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $this->set(compact('area'));
        $this->set('_serialize', ['area']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Area id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $area = $this->Areas->get($id);
        
        try
        {
            if ($this->Areas->delete($area)) {
                $this->Flash->success(___('the area has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the area could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the area could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The area could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->Areas->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected area has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected areas have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected areas could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected areas could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no area to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Area id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $area = $this->Areas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $area = $this->Areas->newEntity();
            $area = $this->Areas->patchEntity($area, $this->request->data);
            if ($this->Areas->save($area)) {
                $this->Flash->success(___('the area has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $area->id]);
            } else {
                $this->Flash->error(___('the area could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        
        $area->id = $id;
        $this->set(compact('area'));
        $this->set('_serialize', ['area']);
    }
}
