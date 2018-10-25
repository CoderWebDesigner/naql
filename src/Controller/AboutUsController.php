<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AboutUs Controller
 *
 * @property \App\Model\Table\AboutUsTable $AboutUs
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class AboutUsController extends AppController
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
        $this->set('aboutUs', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['aboutUs']);
    }

    /**
     * View method
     *
     * @param string|null $id About U id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $aboutU = $this->AboutUs->get($id, [
            'contain' => []
        ]);
        $this->set('aboutU', $aboutU);
        $this->set('_serialize', ['aboutU']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $aboutU = $this->AboutUs->newEntity();
        if ($this->request->is('post')) {
            $aboutU = $this->AboutUs->patchEntity($aboutU, $this->request->data);
            if ($this->AboutUs->save($aboutU)) {
                $this->Flash->success(___('the about u has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $aboutU->id]);
            } else {
                $this->Flash->error(___('the about u could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $this->set(compact('aboutU'));
        $this->set('_serialize', ['aboutU']);
    }

    /**
     * Edit method
     *
     * @param string|null $id About U id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $aboutU = $this->AboutUs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $aboutU = $this->AboutUs->patchEntity($aboutU, $this->request->data);
            if ($this->AboutUs->save($aboutU)) {
                $this->Flash->success(___('the about u has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $aboutU->id]);
            } else {
                $this->Flash->error(___('the about u could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $this->set(compact('aboutU'));
        $this->set('_serialize', ['aboutU']);
    }

    /**
     * Delete method
     *
     * @param string|null $id About U id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $aboutU = $this->AboutUs->get($id);
        
        try
        {
            if ($this->AboutUs->delete($aboutU)) {
                $this->Flash->success(___('the about u has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the about u could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the about u could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The about u could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->AboutUs->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected about u has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected aboutus have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected aboutus could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected aboutus could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no about u to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id About U id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $aboutU = $this->AboutUs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $aboutU = $this->AboutUs->newEntity();
            $aboutU = $this->AboutUs->patchEntity($aboutU, $this->request->data);
            if ($this->AboutUs->save($aboutU)) {
                $this->Flash->success(___('the about u has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $aboutU->id]);
            } else {
                $this->Flash->error(___('the about u could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        
        $aboutU->id = $id;
        $this->set(compact('aboutU'));
        $this->set('_serialize', ['aboutU']);
    }
}
