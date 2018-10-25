<?php
namespace App\Controller;
use App\Controller\AppController;

// Cake\Routing\RequestActionTrait::requestAction();

//App::import('Controller', 'MachineOwners');
/**
 * Owners Controller
 *
 * @property \App\Model\Table\OwnersTable $Owners
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
  
class OwnersController extends AppController
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
            'contain' => ['Users']
        ];
        $this->set('owners', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['owners']);
        
        $users = $this->Owners->Users->find('list', ['limit' => 200]);
        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id Owner id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
          $this->viewBuilder()->layout('front');
        $owner = $this->Owners->get($id, [
            'contain' => ['Users', 'MachineOwners', 'Rates', 'Reservations']
        ]);
        $this->set('owner', $owner);
        $this->set('_serialize', ['owner']);
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
        $owner = $this->Owners->newEntity();
        if ($this->request->is('post')) {
               ////////////////////////
               $user = $this->Owners->Users->newEntity();
               $this->request->data['user_group_id'] = 3 ;
               
        if($this->request->data['password'] == $this->request->data['cpassword']){
             $user = $this->Owners->Users->patchEntity($user , $this->request->data);
              $this->Owners->Users->save($user);
            }else {
                $this->Flash->error(___('password not match.'), ['plugin' => 'Alaxos']);
            }
            ////////////////////////
                $userID = $user->id ;
                $userNAME = $user->username ;
                $this->request->data['user_id'] = $userID ; 
                $this->request->data['name'] = $userNAME ; 
               
            $owner = $this->Owners->patchEntity($owner, $this->request->data);
            if ($userID > 0) {
                $this->Owners->save($owner);
                $OwnerID = $owner->id ; 
                $machineDetailsID = $this->request->data['machine_detail_id'];
                $machineID = $this->request->data['machine_id'];
                //machine_owners + machine_photos
               $machineOwners = $this->Owners->MachineOwners->newEntity();
               $this->request->data['owner_id'] = $OwnerID ;
               $this->request->data['machine_id'] = $machineID ;
               $this->request->data['machine_detail_id'] = $machineDetailsID ;
               $machineOwners = $this->Owners->MachineOwners->patchEntity($machineOwners,$this->request->data);
               $this->Owners->MachineOwners->save($machineOwners);
               $machineOwnersID = $machineOwners->id ; 
 ///////////////multiaple photos//////////////
               
               $this->multiPhotos($machineOwnersID);
             
                
                
 //////////multiaple photos////////////
                
                 $this->Flash->success(___('the owner has been saved'), ['plugin' => 'Alaxos']);
               return $this->redirect(['action' => 'view', $owner->id]);
            } else {
                $this->Flash->error(___('the owner could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
         }
         
        $machines = $this->Owners->MachineOwners->Machines->find('list');
        $machineDetails = $this->Owners->MachineOwners->MachineDetails->find('list');
        $area = $this->Owners->Users->Areas->find('list');
        $users = $this->Owners->Users->find('list', ['limit' => 200]);
        $this->set(compact('owner', 'users','user','area','owners','machines','machineDetails','machinePhotos','machineOwners'));
        $this->set('_serialize', ['owner']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Owner id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
          $this->viewBuilder()->layout('front');
        $owner = $this->Owners->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $owner = $this->Owners->patchEntity($owner, $this->request->data);
            if ($this->Owners->save($owner)) {
                $this->Flash->success(___('the owner has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $owner->id]);
            } else {
                $this->Flash->error(___('the owner could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $users = $this->Owners->Users->find('list', ['limit' => 200]);
        $this->set(compact('owner', 'users'));
        $this->set('_serialize', ['owner']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Owner id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $owner = $this->Owners->get($id);
        
        try
        {
            if ($this->Owners->delete($owner)) {
                $this->Flash->success(___('the owner has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the owner could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the owner could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The owner could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->Owners->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected owner has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected owners have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected owners could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected owners could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no owner to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Owner id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $owner = $this->Owners->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $owner = $this->Owners->newEntity();
            $owner = $this->Owners->patchEntity($owner, $this->request->data);
            if ($this->Owners->save($owner)) {
                $this->Flash->success(___('the owner has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $owner->id]);
            } else {
                $this->Flash->error(___('the owner could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $users = $this->Owners->Users->find('list', ['limit' => 200]);
        
        $owner->id = $id;
        $this->set(compact('owner', 'users'));
        $this->set('_serialize', ['owner']);
    }
    
    public function multiPhotos($machineOwnersID) {
           if (!empty($this->request->data['photo'])) {
          $i = 0 ; 
      foreach($this->request->data['photo'] as $key => $data){
            $machinePhotos = $this->Owners->MachineOwners->MachinePhotos->newEntity();
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
                    
                     $machinePhotos = $this->Owners->MachineOwners->MachinePhotos->patchEntity($machinePhotos , ['photo'=>$photooImg,'machine_owner_id'=>$machineOwnersID]) ;
               $this->Owners->MachineOwners->MachinePhotos->save($machinePhotos) ; 
                    
                    }else {  $i = 1 ;   }
                                                              }
         if( $i > 0){  $this->Flash->error(___('the machine photos must be (gif, jpg, jpeg, png) extention.'), ['plugin' => 'Alaxos']);  }
                    
      }
    }
}
