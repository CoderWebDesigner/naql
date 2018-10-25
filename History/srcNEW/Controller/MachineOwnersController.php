<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MachineOwners Controller
 *
 * @property \App\Model\Table\MachineOwnersTable $MachineOwners
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class MachineOwnersController extends AppController
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
        $this->paginate = [
            'contain' => ['MachineDetails', 'Owners','Machines','MachinePhotos']
        ];
        $this->set('machineOwners', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['machineOwners']);
        
        $machineDetails = $this->MachineOwners->MachineDetails->find('list');
        $machines = $this->MachineOwners->Machines->find('list');
        $owners = $this->MachineOwners->Owners->find('list',['valueField'=>'name']);
        $this->set(compact('machineDetails', 'owners','machines'));
    }

    /**
     * View method
     *
     * @param string|null $id Machine Owner id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
          $this->viewBuilder()->layout('front');
        $machineOwner = $this->MachineOwners->get($id, [
            'contain' => ['MachineDetails', 'Owners']
        ]);
        $this->set('machineOwner', $machineOwner);
        $this->set('_serialize', ['machineOwner']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        debug($this->request->data());
        $this->viewBuilder()->layout('front');
        $machineOwner = $this->MachineOwners->newEntity();
    
  if ($this->request->is('post')) {
      $machineOwner = $this->MachineOwners->patchEntity($machineOwner, $this->request->data);
        if ($this->MachineOwners->save($machineOwner)) {
                   $machineOwnerId =$machineOwner->id;
           //      return $this->redirect(['action' => 'view', $machineOwner->id]);
                        //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> add multiple machine photos  <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<  
       $this->multiapleMachinePhotos($machineOwnerId) ; 
  $this->Flash->success(___('the machine owner has been saved'), ['plugin' => 'Alaxos']);
              ///////// end chek extenstion 
  //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>END  multiple machine photos  <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
 } else {
                $this->Flash->error(___('the machine owner could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
//           $machineOwnerId =$machineOwner->id;
//       
//        
//       $this->multiapleMachinePhotos($machineOwnerId) ; 
       
        
        
        $machines = $this->MachineOwners->Machines->find('list');
        $machineDetails = $this->MachineOwners->MachineDetails->find('list');
        $owners = $this->MachineOwners->Owners->find('list',['valueField'=>'name']) ;
        $this->set(compact('machineOwner', 'machineDetails', 'owners','machines','machinePhotos'));
        $this->set('_serialize', ['machineOwner']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Machine Owner id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
          $this->viewBuilder()->layout('front');
        $machineOwner = $this->MachineOwners->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $machineOwner = $this->MachineOwners->patchEntity($machineOwner, $this->request->data);
            $machineOwnerId = $machineOwner->id ;
            if ($this->MachineOwners->save($machineOwner)) {
                
     //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> add multiple machine photos  <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<  
       $this->multiapleMachinePhotos($machineOwnerId) ; 
   ///////// end chek extenstion 
  //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>END  multiple machine photos  <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
                $this->Flash->success(___('the machine owner has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $machineOwner->id]);
            } else {
                $this->Flash->error(___('the machine owner could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $machines = $this->MachineOwners->Machines->find('list');
        $machineDetails = $this->MachineOwners->MachineDetails->find('list');
        $owners = $this->MachineOwners->Owners->Users->find('list',['valueField'=>'username'])
                ->where(['Users.user_group_id'=>3]) ;
        $this->set(compact('machineOwner', 'machineDetails', 'owners','machines','machinePhotos'));
        $this->set('_serialize', ['machineOwner']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Machine Owner id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $machineOwner = $this->MachineOwners->get($id);
        
        try
        {
            if ($this->MachineOwners->delete($machineOwner)) {
                $this->Flash->success(___('the machine owner has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the machine owner could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the machine owner could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The machine owner could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->MachineOwners->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected machine owner has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected machineowners have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected machineowners could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected machineowners could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no machine owner to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Machine Owner id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $machineOwner = $this->MachineOwners->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $machineOwner = $this->MachineOwners->newEntity();
            $machineOwner = $this->MachineOwners->patchEntity($machineOwner, $this->request->data);
            if ($this->MachineOwners->save($machineOwner)) {
                $this->Flash->success(___('the machine owner has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $machineOwner->id]);
            } else {
                $this->Flash->error(___('the machine owner could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $machineDetails = $this->MachineOwners->MachineDetails->find('list');
        $owners = $this->MachineOwners->Owners->find('list');
        
        $machineOwner->id = $id;
        $this->set(compact('machineOwner', 'machineDetails', 'owners'));
        $this->set('_serialize', ['machineOwner']);
    }
    
    
    
    /////////////////
    
    public function multiapleMachinePhotos($machineOwnerId) {
    
      if (!empty($this->request->data['photo'])) {
          $i = 0 ; 
      foreach($this->request->data['photo'] as $key => $data){
            $machinePhotos = $this->MachineOwners->MachinePhotos->newEntity();
                $path_info = pathinfo($data['name']);
                chmod($data['tmp_name'], 0644);
                $photooImg = time() . mt_rand() . "." . $path_info['extension'];
///////// chek extenstion 
                $supported_image = array('gif', 'jpg', 'jpeg', 'png');
                $src_file_name = $photooImg;
                $ext = strtolower(pathinfo($src_file_name, PATHINFO_EXTENSION)); // Using strtolower to overcome case sensitive ->>>>> CHK IMG extension
                if (in_array($ext, $supported_image)) {
             
                    $fullpath = WWW_ROOT . "library" . '/' . 'machineOwners';
                    if (!is_dir($fullpath)) {
                        mkdir($fullpath, 0777, true);
                    }
                    move_uploaded_file($data['tmp_name'], $fullpath . DS . $photooImg);
                    
                     $machinePhotos = $this->MachineOwners->MachinePhotos->patchEntity($machinePhotos , ['photo'=>$photooImg,'machine_owner_id'=>$machineOwnerId]) ;
               $this->MachineOwners->MachinePhotos->save($machinePhotos) ; 
                    
                    }else {  $i = 1 ;   }
                                                              }
         if( $i > 0){  $this->Flash->error(___('the machine photos must be (gif, jpg, jpeg, png) extention.'), ['plugin' => 'Alaxos']);  }
                    
      }
       }
}


    /////////////////

 
