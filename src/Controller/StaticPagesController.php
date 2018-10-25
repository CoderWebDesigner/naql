<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * StaticPages Controller
 *
 * @property \App\Model\Table\StaticPagesTable $StaticPages
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class StaticPagesController extends AppController
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
        $this->set('staticPages', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['staticPages']);
    }

    /**
     * View method
     *
     * @param string|null $id Static Page id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $staticPage = $this->StaticPages->get($id, [
            'contain' => []
        ]);
        $this->set('staticPage', $staticPage);
        $this->set('_serialize', ['staticPage']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $staticPage = $this->StaticPages->newEntity();
        if ($this->request->is('post')) {
            $staticPage = $this->StaticPages->patchEntity($staticPage, $this->request->data);
            if ($this->StaticPages->save($staticPage)) {
                $this->Flash->success(___('the static page has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $staticPage->id]);
            } else {
                $this->Flash->error(___('the static page could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $this->set(compact('staticPage'));
        $this->set('_serialize', ['staticPage']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Static Page id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $staticPage = $this->StaticPages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $staticPage = $this->StaticPages->patchEntity($staticPage, $this->request->data);
            if ($this->StaticPages->save($staticPage)) {
                $this->Flash->success(___('the static page has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $staticPage->id]);
            } else {
                $this->Flash->error(___('the static page could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $this->set(compact('staticPage'));
        $this->set('_serialize', ['staticPage']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Static Page id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $staticPage = $this->StaticPages->get($id);
        
        try
        {
            if ($this->StaticPages->delete($staticPage)) {
                $this->Flash->success(___('the static page has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the static page could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the static page could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The static page could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->StaticPages->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected static page has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected staticpages have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected staticpages could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected staticpages could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no static page to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Static Page id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $staticPage = $this->StaticPages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $staticPage = $this->StaticPages->newEntity();
            $staticPage = $this->StaticPages->patchEntity($staticPage, $this->request->data);
            if ($this->StaticPages->save($staticPage)) {
                $this->Flash->success(___('the static page has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $staticPage->id]);
            } else {
                $this->Flash->error(___('the static page could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        
        $staticPage->id = $id;
        $this->set(compact('staticPage'));
        $this->set('_serialize', ['staticPage']);
    }
}
