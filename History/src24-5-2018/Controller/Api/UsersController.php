<?php

namespace App\Controller\Api;

use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;
use Firebase\JWT\JWT;
use Cake\Core\Configure;
use Cake\Mailer\Email;
use Cake\Core\App;
use Cake\Core\Plugin;
use Cake\Filesystem\Folder;
use Cake\Routing\Router;
use Cake\Validation\Validation;
use Cake\Database\Expression\QueryExpression;
use Cake\I18n\Time;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class UsersController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['index', 'add', 'token', 'forgotPassword', 'fileupload', 'activatePassword', 'views']);
    }
 
    public function profilePhoto(){
          if ($this->request->is('post')) {
            
          //****************************************************upload photo*************************************
    
            $path_info = pathinfo($this->request->data['photo']['name']);
            chmod($this->request->data['photo']['tmp_name'], 0644);
            $photooImg = time().mt_rand().".".$path_info['extension'];
        ///////// chek extenstion 
                $supported_image = array('gif', 'jpg', 'jpeg', 'png');
                $src_file_name = $photooImg;
                $ext = strtolower(pathinfo($src_file_name, PATHINFO_EXTENSION)); // Using strtolower to overcome case sensitive ->>>>> CHK IMG extension
                if (in_array($ext, $supported_image)) {
                    $errors = true ;
                 $fullpath = WWW_ROOT."library".'/'.'profile';
    if(!is_dir($fullpath)) {
            mkdir($fullpath, 0777, true);
    }
    move_uploaded_file($this->request->data['photo']['tmp_name'], $fullpath.DS.$photooImg);
    $this->request->data['photo'] = $photooImg;         
    } else {
       $errors  = false;
     }
              }
               
    }
  //****************************************************upload photo*************************************

 
  //****************************************************upload multi photos*************************************

   public function multiPhotos($machineOwnerid) {
           if (!empty($this->request->data['photo'])) {
          $i = 0 ; 
      foreach($this->request->data['machine_photos'] as $key => $data){
            $machinePhotos = $this->Users->Owners->MachineOwners->MachinePhotos->newEntity();
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
                    
                     $machinePhotos = $this->Users->Owners->MachineOwners->MachinePhotos->patchEntity($machinePhotos , ['photo'=>$photooImg,'machine_owner_id'=>$machineOwnerid]) ;
               $this->Users->Owners->MachineOwners->MachinePhotos->save($machinePhotos) ; 
             //    $imgext[] =   $photooImg;
                    }else {  $i = 1 ;  $imgExtentions = false ;  }
                                                              }
         if( $i == 0){  $imgExtentions = true ;    }
               
      }
     
            return  $imgExtentions ;      
            
     
    }
    
  //****************************************************upload multi photos*************************************


    public function add() {

            $this->profilePhoto();
        
            
        
            
        $this->Crud->on('afterSave', function(Event $event) {
 
         $photo = $event->subject->entity->photo ;  
         if($photo == null){$photo = 0  ;}
            if ($event->subject->created) {
          $this->set('data', [ 
              'user_id' => $event->subject->entity->id,
              'photo' => $photo,
                                        'mobile' => $event->subject->entity->mobile,

                     'user_group_id' => $event->subject->entity->user_group_id,
                    'token' => JWT::encode(
                            [
                        'sub' => $event->subject->entity->id,
                        'exp' => time() + 604800
                            ], Security::salt())
                ]);
                $this->Crud->action()->config('serialize.data', 'data','errors','groupId');
//                    $this->set('_serialize', ['groupId']);
            }
        });
        return $this->Crud->execute();
    }

    ///////////


    public function index() {

        $this->paginate = [
            'order' => [
                'created' => 'asc'
            ], 'limit' => 400
        ];
        $this->set('users', $this->paginate());
        $this->set('_serialize', ['users']);
    }

   

    public function views($id = null) {
        $user = $this->Users->get($id, [
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    public function forgotPassword() {

        $userEntity = $this->Users->newEntity($this->request->data);

        $email = $userEntity['email'];


        $user = $this->Users->findByUsernameOrEmail($email, $email)->first();
        if (!empty($user)) {
            if ($user['email_verified'] == 1) {
                $userId = $user['id'];
                $emailObj = new Email('default');
                $emailObj->emailFormat('both');
                $emailObj->from([$fromConfig => $fromNameConfig]);
                $emailObj->sender([$fromConfig => $fromNameConfig]);
                $emailObj->to($user['email']);
                $emailObj->subject('codesroots' . ': ' . __('Request to Reset Your Password'));
                $activate_key = $this->getActivationKey($userEntity['email'] . $user['password']);
                $link = Router::url("/users/activatePassword?ident=$userId&activate=$activate_key", true);


                $body = __('Welcome {0},<br/><br/>You have requested to have your password reset on {1}. Please click the link below to reset your password now: <br/><br/>{2}<br/><br/>If clicking on the link doesn\'t work, try copying and pasting it into your browser.<br/><br/>Thanks,<br/>{3}', [$userEntity['first_name'], 'codesroots', $link, 'codesroots']);
                try {
                    $emailObj->send($body);
                } catch (Exception $ex) {
                    
                }
                echo json_encode(['state' => '200', 'data' => 'the password has been sent to your email']);
            } else {
                
            }

            //$this->redirect(['action'=>'login']);
        } else {
            echo json_encode(['state' => '500', 'data' => 'username or email incorrect']);
        }


        $this->set(compact('userEntity'));
    }

    public function getActivationKey($string) {
        return md5(md5($string) . Security::salt());
    }

    public function edit($id = null) {
     $this->profilePhoto();
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {




            $user = $this->Users->patchEntity($user, $this->request->data);
            $this->Users->save($user);
        }

        $this->set(compact('user', 'userGroups'));
        $this->set('_serialize', ['user']);
    }
///////////////////////////////////////////////////////////
 public function token()
{
      $email = $this->request->data['username'];   
      
  
      $chkActive = $this->Users->find('all')  //chk email Or username (exsit)
            ->where(['Users.email'=>$email,'Users.active'=>0])
            ->orwhere(['Users.username'=>$email,'Users.active'=>0])
            ->orwhere([
                'OR'=>[
               [ 'Users.mobile'=>$email,'Users.active'=>0 ]
                    ]
                ])
           ->toArray();
  

      if(!empty($chkActive)){
        $success = false ;
         $data = array() ; 
         $data['message'] = "الحساب غير مفعل";
         $data['url'] = "/api/users/token.json";
         $data['code'] = 401;
 }
  
    
       $this->set(compact('chkActive','msg','success','data','chkMob'));
       $this->set('_serialize', ['msg','success','data']);
       
     
       if(empty($chkActive) ){
    
           
           
        
           
        if (Validation::email($this->request->data['username'])) {
                $this->Auth->config('authenticate', [
                    'Form' => [
                        'fields' => ['username' => 'email']
                    ]
                ]);
                $this->Auth->constructAuthenticate();
                $this->request->data['email'] = $this->request->data['username'];
                unset($this->request->data['username']);
            }  elseif(is_numeric($email)) {
                  $this->Auth->config('authenticate', [
                    'Form' => [
                        'fields' => ['username' => 'mobile']
                    ]
                ]);
                $this->Auth->constructAuthenticate();
                $this->request->data['mobile'] = $this->request->data['username'];
                unset($this->request->data['username']);
            }              
    $user = $this->Auth->identify();
 
    if (!$user) {
        throw new UnauthorizedException('الرجاء التأكد من إسم المستخدم والرقم السرى');
    }
 
    //////// get profile data  if data is username not email yet 
 
$emailRes = $user['email'] ;
if($emailRes==null  ){$emailRes=0;}
 if($ownerID==null  ){$ownerID=0;}

if($user['user_group_id'] == 3  || $user['user_group_id'] == 1){
   
    $getOwnerID = $this->Users->Owners->find()->where(['Owners.user_id'=>$user['id']])->toArray();
    $ownerID = $getOwnerID[0]['id'];
    ///////////////////////////
    $machineOwner = $this->Users->Owners->MachineOwners->find()
           ->select(['machine_detail_id'])
            ->contain(['MachineDetails'=>function($machince){
                return $machince
                       ->select(['id','name']) ;
            }])
            ->where(['MachineOwners.owner_id'=>$ownerID])->toArray();
       //////get machine_details///////
    //
     $this->set(compact('getOwnerID','machineOwner'));
}

    
    $this->set([
        'success' => true,
        'data' => [
           
             'user_id' => $user['id'],
             'owner_id'=>$ownerID , 
              'photo' => $user['photo'],
              'user_group_id' => $user['user_group_id'],
             'name' => $user['username'],
                          'mobile' => $user['mobile'],

              'email' => $emailRes , 
               'active' => $user['active'],
               
          
            'token' => JWT::encode([
                'sub' => $user['id'],
                'exp' =>  time() + 6004800
            ],
            Security::salt()) 
        ],
        '_serialize' => ['success', 'machineOwner','data','user','a','b','loop','loopp','userEntity','loginValid','errorMsg','getuserID','userOrEmail','ownerID']
    ]);
}
}
///////////////////////////////////////////////////////////
}
