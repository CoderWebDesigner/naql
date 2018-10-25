<?php
namespace App\Controller;
use Cake\Auth\DefaultPasswordHasher;
use App\Controller\AppController;

/**
 * MachineDetails Controller
 *
 * @property \App\Model\Table\MachineDetailsTable $MachineDetails
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class MachineDetailsController extends AppController
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
    
    
    function resMachineDeatils(){
           $this->viewBuilder()->layout('ajax');
                        $getMachineDetails = $this->MachineDetails->find('all')
                       ->where(['MachineDetails.machine_id' => $this->request->data['machineID']])->toArray();
             debug($getMachineDetails);
                  $this->set('getMachineDetails', $getMachineDetails);
    }
    
    
    
    function getMachineDetails(){
           $this->viewBuilder()->layout('ajax');
                        $getMachineDetails = $this->MachineDetails->find('list',['valueField'=>'name'])
                       ->where(['MachineDetails.machine_id' => $this->request->data['machineID']]);
           //  debug($getMachineDetails);
                  $this->set('getMachineDetails', $getMachineDetails);
    }
    
    
    ///////
      function machineFilter(){
              $this->viewBuilder()->layout('ajax');
              $filterMachineAr = $this->MachineDetails->Machines->find('all')
                       ->where(['Machines.name LIKE' => $this->request->data(['ar']).'%'])
                      ->toArray();
             // debug($filterMachineAr);
                  $this->set('filterMachineAr', $filterMachineAr);
    }
    ///////
      function machineFilterEn(){
              $this->viewBuilder()->layout('ajax');
              $filterMachineEn = $this->MachineDetails->Machines->find('all')
                       ->where(['Machines.name_en LIKE' => $this->request->data(['en']).'%'])
                      ->toArray();
              // debug($filterMachineEn);
                  $this->set('filterMachineEn', $filterMachineEn);
    }
    ///////
    public function index()
    {
         $this->viewBuilder()->layout('dashboard');
        $this->paginate = [
            'contain' => ['Machines']
        ];
        $this->set('machineDetails', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['machineDetails']);
        
        $machines = $this->MachineDetails->Machines->find('list', ['limit' => 200]);
        $this->set(compact('machines'));
    }

    /**
     * View method
     *
     * @param string|null $id Machine Detail id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
         $this->viewBuilder()->layout('dashboard');
        $machineDetail = $this->MachineDetails->get($id, [
            'contain' => ['Machines', 'MachineOwners']
        ]);
        $this->set('machineDetail', $machineDetail);
        $this->set('_serialize', ['machineDetail']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        debug($this->request->data());
        $this->viewBuilder()->layout('dashboard');
        $machineDetail = $this->MachineDetails->newEntity();
        if ($this->request->is('post')) {
            
     //****************************************************upload photo*************************************
    
             $path_info = pathinfo($this->request->data['machine_photo']['name']);
             chmod($this->request->data['machine_photo']['tmp_name'], 0644);
             $photoo = time().mt_rand().".".$path_info['extension'];
             $fullpath = WWW_ROOT."library".'/'.'machine';
             if(!is_dir($fullpath)) {
            mkdir($fullpath, 0777, true);
            }
           move_uploaded_file($this->request->data['machine_photo']['tmp_name'], $fullpath.DS.$photoo);


   $this->request->data['machine_photo'] = $photoo;
 
     //****************************************************upload photo*************************************
     
            
            $machineDetail = $this->MachineDetails->patchEntity($machineDetail, $this->request->data);
            if ($this->MachineDetails->save($machineDetail)) {
                
                //machine cats 
                //$chkCat = $this->MachineDetails->Machines
               $machineCats = $this->MachineDetails->Machines->newEntity();
               $machine = array();
               $machine['name_ar'] = $this->request->data['name_ar_cats'];
               $machine['name_en'] = $this->request->data['name_en_cats'];
               $machineCats = $this->MachineDetails->Machines->patchEntity($machineCats , $machine);
                  $this->MachineDetails->Machines->save($machineCats);
                
                //
                
                
                $this->Flash->success(___('the machine detail has been saved'), ['plugin' => 'Alaxos']);
               return $this->redirect(['action' => 'view', $machineDetail->id]);
            } else {
                $this->Flash->error(___('the machine detail could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
         
        $machines = $this->MachineDetails->Machines->find('list', ['limit' => 200]);
        $this->set(compact('machineDetail', 'machines','machineCats'));
        $this->set('_serialize', ['machineDetail']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Machine Detail id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
         $this->viewBuilder()->layout('dashboard');
        $machineDetail = $this->MachineDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
                                       //****************************************************upload photo*************************************
      if(!empty($this->request->data['machine_photo']['name'])){
             $path_info = pathinfo($this->request->data['photo']['name']);
             chmod($this->request->data['machine_photo']['tmp_name'], 0644);
             $photoo = time().mt_rand().".".$path_info['extension'];
             $fullpath = WWW_ROOT."library".'/'.'machine';
             if(!is_dir($fullpath)) {
            mkdir($fullpath, 0777, true);
            }
           move_uploaded_file($this->request->data['machine_photo']['tmp_name'], $fullpath.DS.$photoo);


   $this->request->data['machine_photo'] = $photoo; 
   
             }
          else{
        $this->request->data['machine_photo']= $machineDetail['machine_photo'];
        
        
        }
 
     //****************************************************upload photo*************************************
            $machineDetail = $this->MachineDetails->patchEntity($machineDetail, $this->request->data);
            if ($this->MachineDetails->save($machineDetail)) {
                $this->Flash->success(___('the machine detail has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $machineDetail->id]);
            } else {
                $this->Flash->error(___('the machine detail could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $machines = $this->MachineDetails->Machines->find('list', ['limit' => 200]);
        $this->set(compact('machineDetail', 'machines'));
        $this->set('_serialize', ['machineDetail']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Machine Detail id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $machineDetail = $this->MachineDetails->get($id);
        
        try
        {
            if ($this->MachineDetails->delete($machineDetail)) {
                $this->Flash->success(___('the machine detail has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the machine detail could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the machine detail could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The machine detail could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->MachineDetails->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected machine detail has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected machinedetails have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected machinedetails could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected machinedetails could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no machine detail to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Machine Detail id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $machineDetail = $this->MachineDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $machineDetail = $this->MachineDetails->newEntity();
            $machineDetail = $this->MachineDetails->patchEntity($machineDetail, $this->request->data);
            if ($this->MachineDetails->save($machineDetail)) {
                $this->Flash->success(___('the machine detail has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $machineDetail->id]);
            } else {
                $this->Flash->error(___('the machine detail could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $machines = $this->MachineDetails->Machines->find('list', ['limit' => 200]);
        
        $machineDetail->id = $id;
        $this->set(compact('machineDetail', 'machines'));
        $this->set('_serialize', ['machineDetail']);
    }
}
