<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class UsersController extends AppController
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
    ////////////////////////////
       public function diactiveted($userIhd , $chkNull = null ){
            $active = $this->Users->get($userIhd);
         //   debug($active);
            if($chkNull == null){
              if($active['active']==0){
                  $this->request->data['active']=1;
              }else {                
                  $this->request->data['active']= 0;
                }
            $active = $this->Users->patchEntity($active,$this->request->data);
              
              $this->Users->save($active);
                   return $this->redirect(['controller'=>'users','action' => 'index'  ]);
     } else{
          $this->request->data['active']= 0;
           $active = $this->Users->patchEntity($active,$this->request->data);
             $this->Users->save($active);
              return $this->redirect(['controller'=>'users','action' => 'allBlackList'  ]);
     }
                    $this->set('active', 'searchForDealivery');
        $this->set('_serialize', ['active','searchForDealivery']);
            
        }
        /////////////////////
       public function verified($userIhd){
            $active = $this->Users->get($userIhd);
         //   debug($active);
              if($active['email_verified']==0){
                  $this->request->data['email_verified']= 1;
              }else {                
                  $this->request->data['email_verified']= 0;
                }
            $active = $this->Users->patchEntity($active,$this->request->data);
              
            if( $this->Users->save($active)){
                   return $this->redirect(['controller'=>'users','action' => 'index'  ]);

            }
                    $this->set('active', 'searchForDealivery');
        $this->set('_serialize', ['active','searchForDealivery']);
            
        }
        /////////////////////
    public function index()
    {
          $this->viewBuilder()->layout('dashboard');
        $this->paginate = [
            'contain' => ['UserGroups'] , 
            'conditions'=>['Users.user_group_id'=> 2]
        ];
        $this->set('users', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['users']);
        
        $userGroups = $this->Users->UserGroups->find('list', ['limit' => 200]);
      //  $areas = $this->Users->Areas->find('list', ['limit' => 200]);
        $this->set(compact('userGroups'));
    }
    
    function addBlackList(){
          $this->viewBuilder()->layout('dashboard');
        $allActiveUser = $this->Users->find('list',['valueField'=>'username'])
                ->where(['Users.active'=>1 , 'Users.user_group_id >' => 1])
                ->toArray();
       // debug($this->request->data['user_id']);
        if ($this->request->is('post')) {
              return $this->redirect(['action' => 'diactiveted',  $this->request->data['user_id'] , 1]); 
             
        }
       //  debug($allActiveUser);
         $this->set('allActiveUser',$allActiveUser);
        
    }
    function allBlackList(){
              $this->viewBuilder()->layout('dashboard');
        $this->paginate = [
            'contain' => ['UserGroups'] , 
            'conditions'=>['Users.active'=> 0]
        ];
        $this->set('users', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['users']);
        
        $userGroups = $this->Users->UserGroups->find('list', ['limit' => 200]);
      //  $areas = $this->Users->Areas->find('list', ['limit' => 200]);
        $this->set(compact('userGroups'));
        
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
          $this->viewBuilder()->layout('dashboard');
        $user = $this->Users->get($id, [
            'contain' => ['UserGroups', 'LoginTokens', 'Messages', 'Owners', 'Rates', 'Reservations', 'ScheduledEmailRecipients', 'UserActivities', 'UserContacts', 'UserDetails', 'UserEmailRecipients', 'UserEmailSignatures', 'UserEmailTemplates', 'UserSocials']
        ]);
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
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
        $users = $this->Users->newEntity();
        if ($this->request->is('post')) {
            
          //****************************************************upload photo*************************************
    $imgExtention = 0 ; 
            $path_info = pathinfo($this->request->data['photo']['name']);
            chmod($this->request->data['photo']['tmp_name'], 0644);
            $photooImg = time().mt_rand().".".$path_info['extension'];
        ///////// chek extenstion 
                $supported_image = array('gif', 'jpg', 'jpeg', 'png');
                $src_file_name = $photooImg;
                $ext = strtolower(pathinfo($src_file_name, PATHINFO_EXTENSION)); // Using strtolower to overcome case sensitive ->>>>> CHK IMG extension
                if (in_array($ext, $supported_image)) {
                    $imgExtention = 1 ;
                 $fullpath = WWW_ROOT."library".'/'.'profile';
    if(!is_dir($fullpath)) {
            mkdir($fullpath, 0777, true);
    }
    move_uploaded_file($this->request->data['photo']['tmp_name'], $fullpath.DS.$photooImg);
    $this->request->data['photo'] = $photooImg;         
    } else {
        $imgExtention = 0 ;
          $this->Flash->error(___('problem in file extention gif , jpg ,jpeg ,png .'), ['plugin' => 'Alaxos']);  
    }

   $this->request->data['user_group_id'] = 2 ;
   if($this->request->data['password'] == $this->request->data['cpassword'] && $imgExtention > 0){
       
             $users = $this->Users->patchEntity($users , $this->request->data);
              $this->Users->save($users);
              $this->Flash->success(___('the user has been saved'), ['plugin' => 'Alaxos']);
                 return $this->redirect(['action' => 'view', $users->id]);
            }else {
                $this->Flash->error(___('password not match.'), ['plugin' => 'Alaxos']);
            }
            
 
        }
        $userGroups = $this->Users->UserGroups->find('list', ['limit' => 200]);
      //  $areas = $this->Users->Areas->find('list', ['limit' => 200]);
        $this->set(compact('users', 'userGroups'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
          $this->viewBuilder()->layout('dashboard');
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(___('the user has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $user->id]);
            } else {
                $this->Flash->error(___('the user could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $userGroups = $this->Users->UserGroups->find('list', ['limit' => 200]);
      //  $areas = $this->Users->Areas->find('list', ['limit' => 200]);
        $this->set(compact('user', 'userGroups'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        
        try
        {
            if ($this->Users->delete($user)) {
                $this->Flash->success(___('the user has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the user could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the user could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The user could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->Users->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected user has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected users have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected users could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected users could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no user to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id User id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->newEntity();
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(___('the user has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $user->id]);
            } else {
                $this->Flash->error(___('the user could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $userGroups = $this->Users->UserGroups->find('list', ['limit' => 200]);
        $areas = $this->Users->Areas->find('list', ['limit' => 200]);
        
        $user->id = $id;
        $this->set(compact('user', 'userGroups', 'areas'));
        $this->set('_serialize', ['user']);
    }
}
