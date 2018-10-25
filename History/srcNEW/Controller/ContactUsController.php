<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ContactUs Controller
 *
 * @property \App\Model\Table\ContactUsTable $ContactUs
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class ContactUsController extends AppController
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
        $this->set('contactUs', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['contactUs']);
    }

    /**
     * View method
     *
     * @param string|null $id Contact U id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contactU = $this->ContactUs->get($id, [
            'contain' => []
        ]);
        $this->set('contactU', $contactU);
        $this->set('_serialize', ['contactU']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contactU = $this->ContactUs->newEntity();
        if ($this->request->is('post')) {
            $contactU = $this->ContactUs->patchEntity($contactU, $this->request->data);
            if ($this->ContactUs->save($contactU)) {
                $this->Flash->success(___('the contact u has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $contactU->id]);
            } else {
                $this->Flash->error(___('the contact u could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $this->set(compact('contactU'));
        $this->set('_serialize', ['contactU']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Contact U id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contactU = $this->ContactUs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contactU = $this->ContactUs->patchEntity($contactU, $this->request->data);
            if ($this->ContactUs->save($contactU)) {
                $this->Flash->success(___('the contact u has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $contactU->id]);
            } else {
                $this->Flash->error(___('the contact u could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $this->set(compact('contactU'));
        $this->set('_serialize', ['contactU']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Contact U id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contactU = $this->ContactUs->get($id);
        
        try
        {
            if ($this->ContactUs->delete($contactU)) {
                $this->Flash->success(___('the contact u has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the contact u could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the contact u could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The contact u could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->ContactUs->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected contact u has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected contactus have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected contactus could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected contactus could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no contact u to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Contact U id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $contactU = $this->ContactUs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contactU = $this->ContactUs->newEntity();
            $contactU = $this->ContactUs->patchEntity($contactU, $this->request->data);
            if ($this->ContactUs->save($contactU)) {
                $this->Flash->success(___('the contact u has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $contactU->id]);
            } else {
                $this->Flash->error(___('the contact u could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        
        $contactU->id = $id;
        $this->set(compact('contactU'));
        $this->set('_serialize', ['contactU']);
    }
}
