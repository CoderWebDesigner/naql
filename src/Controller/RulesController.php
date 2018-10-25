<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Rules Controller
 *
 * @property \App\Model\Table\RulesTable $Rules
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class RulesController extends AppController
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
        $this->set('rules', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['rules']);
    }

    /**
     * View method
     *
     * @param string|null $id Rule id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rule = $this->Rules->get($id, [
            'contain' => []
        ]);
        $this->set('rule', $rule);
        $this->set('_serialize', ['rule']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rule = $this->Rules->newEntity();
        if ($this->request->is('post')) {
            $rule = $this->Rules->patchEntity($rule, $this->request->data);
            if ($this->Rules->save($rule)) {
                $this->Flash->success(___('the rule has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $rule->id]);
            } else {
                $this->Flash->error(___('the rule could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $this->set(compact('rule'));
        $this->set('_serialize', ['rule']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Rule id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rule = $this->Rules->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rule = $this->Rules->patchEntity($rule, $this->request->data);
            if ($this->Rules->save($rule)) {
                $this->Flash->success(___('the rule has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $rule->id]);
            } else {
                $this->Flash->error(___('the rule could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $this->set(compact('rule'));
        $this->set('_serialize', ['rule']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Rule id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rule = $this->Rules->get($id);
        
        try
        {
            if ($this->Rules->delete($rule)) {
                $this->Flash->success(___('the rule has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the rule could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the rule could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The rule could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->Rules->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected rule has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected rules have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected rules could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected rules could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no rule to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Rule id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $rule = $this->Rules->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rule = $this->Rules->newEntity();
            $rule = $this->Rules->patchEntity($rule, $this->request->data);
            if ($this->Rules->save($rule)) {
                $this->Flash->success(___('the rule has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $rule->id]);
            } else {
                $this->Flash->error(___('the rule could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        
        $rule->id = $id;
        $this->set(compact('rule'));
        $this->set('_serialize', ['rule']);
    }
}
