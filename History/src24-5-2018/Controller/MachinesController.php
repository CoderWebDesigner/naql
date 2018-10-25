<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Machines Controller
 *
 * @property \App\Model\Table\MachinesTable $Machines
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class MachinesController extends AppController
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
        $this->set('machines', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['machines']);
    }

    /**
     * View method
     *
     * @param string|null $id Machine id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
  
    /////////////
    public function view($id = null)
    {
          $this->viewBuilder()->layout('front');
        $machine = $this->Machines->get($id, [
            'contain' => ['MachineDetails', 'Reservations']
        ]);
        $this->set('machine', $machine);
        $this->set('_serialize', ['machine']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('front');
        $this->viewBuilder()->layout('default');
        $machine = $this->Machines->newEntity();
        
        $location[] = ["" , "1" , "2"];  
        if ($this->request->is('post')) {
                 //****************************************************upload photo*************************************
    
             $path_info = pathinfo($this->request->data['photo']['name']);
             chmod($this->request->data['photo']['tmp_name'], 0644);
             $photoo = time().mt_rand().".".$path_info['extension'];
             $fullpath = WWW_ROOT."library".'/'.'machine';
             if(!is_dir($fullpath)) {
            mkdir($fullpath, 0777, true);
            }
           move_uploaded_file($this->request->data['photo']['tmp_name'], $fullpath.DS.$photoo);


   $this->request->data['photo'] = $photoo;
 
     //****************************************************upload photo*************************************
            $machine = $this->Machines->patchEntity($machine, $this->request->data);
            if ($this->Machines->save($machine)) {
                $this->Flash->success(___('the machine has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $machine->id]);
            } else {
                $this->Flash->error(___('the machine could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $this->set(compact('machine','location'));
        $this->set('_serialize', ['machine']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Machine id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
          $this->viewBuilder()->layout('front');
          
        $machine = $this->Machines->get($id, [
            'contain' => []
        ]);
           $location[] = ["" , "1" , "2"];  
        if ($this->request->is(['patch', 'post', 'put'])) {
                           //****************************************************upload photo*************************************
      if(!empty($this->request->data['photo']['name'])){
             $path_info = pathinfo($this->request->data['photo']['name']);
             chmod($this->request->data['photo']['tmp_name'], 0644);
             $photoo = time().mt_rand().".".$path_info['extension'];
             $fullpath = WWW_ROOT."library".'/'.'machine';
             if(!is_dir($fullpath)) {
            mkdir($fullpath, 0777, true);
            }
           move_uploaded_file($this->request->data['photo']['tmp_name'], $fullpath.DS.$photoo);


   $this->request->data['photo'] = $photoo; 
   
             }
          else{
        $this->request->data['photo']= $machine['photo'];
        
        
        }
 
     //****************************************************upload photo*************************************
            $machine = $this->Machines->patchEntity($machine, $this->request->data);
            if ($this->Machines->save($machine)) {
                $this->Flash->success(___('the machine has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $machine->id]);
            } else {
                $this->Flash->error(___('the machine could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $this->set(compact('machine','location'));
        $this->set('_serialize', ['machine']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Machine id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $machine = $this->Machines->get($id);
        
        try
        {
            if ($this->Machines->delete($machine)) {
                $this->Flash->success(___('the machine has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the machine could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the machine could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The machine could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->Machines->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected machine has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected machines have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected machines could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected machines could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no machine to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Machine id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $machine = $this->Machines->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $machine = $this->Machines->newEntity();
            $machine = $this->Machines->patchEntity($machine, $this->request->data);
            if ($this->Machines->save($machine)) {
                $this->Flash->success(___('the machine has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $machine->id]);
            } else {
                $this->Flash->error(___('the machine could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        
        $machine->id = $id;
        $this->set(compact('machine'));
        $this->set('_serialize', ['machine']);
    }
}
