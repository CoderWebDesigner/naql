<?php namespace App\Controller\Api;
 use App\Controller\Api\AppController;
use Cake\ORM\TableRegistry;
/**
 * BlackLists Controller
 *
 * @property \App\Model\Table\BlackListsTable $BlackLists
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class ReservationsController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Paginator');
   $this->Auth->allow(['index','add','edit','view','completedResForUser','history','orders','talabaty','sendMessage','GetseenResOwner','GetseenResUser','seen']);

    }
    		  function getseenresowner($ownerID = null)
    {
    
      $machineDetails = $this->machineOwner($ownerID);
        $data = $this->Reservations->find('all')
                ->where(['Reservations.machine_detail_id IN'=>$machineDetails  ,  'Reservations.seen'=>0]);

                       $this->set(compact('data'));
        $this->set('_serialize', ['data']); 
                
     }
    
     public $paginate = [
        'page' => 1,
        'limit' => 1000,
        'maxLimit' => 100,
       'fields' => [],
        'sortWhitelist' => []
    ];
     /////////////////////////////////////////////////
   /////////////////////////////////////////////////
  	function sendMessage($sendNotification){
  	
  	$array = $sendNotification;
  	foreach ($array as $data ){
  	
		$content = array(
			"en" => 'حجز جديد'
			);
		
		$fields = array(
			'app_id' => "1c2df6cd-9d65-4c4e-b773-ff882750ea3e",
			"tags" => [
			
			[
    
      "key" => "id","relation" => "=",
      "value" =>  $data
     
   ]],
			'data' => array("foo" => "bar"),
			'contents' => $content
		);
		
		$fields = json_encode($fields);
   // 	print("\nJSON sent:\n");
    //	print($fields);
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
							 'Authorization: Basic MTM5ZGFhOTAtYmY4Yi00MGFhLTljNzUtOGViZWYzOWJiMWM2'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

		$response = curl_exec($ch);
		curl_close($ch);
		
		}
	
	
	
	
	
return $array;
	
	}
	

	  public function GetseenResUser($id)
    {
    
       $data = $this->Reservations->find('all');
               $data->where(['Reservations.user_id'=>$id , 'Reservations.seen'=> 0 ,  'Reservations.status'=>"pending"]);

                       $this->set(compact('data'));
        $this->set('_serialize', ['data']);
     }
     //////////////////////////////////////////////////////
     //////////////////////////////////////////////////////
      public function add()
    {
        $reservation = $this->Reservations->newEntity();
        if ($this->request->is('post')) {
            $reservation = $this->Reservations->patchEntity($reservation, $this->request->data);
            if ($this->Reservations->save($reservation)) {
                //ckeck reservationStatus 
                $status =  $this->reservationStatus() ; 
                if ($status['price_approved'] === "automatic") {
                            $machineId = $this->request->data['machine_id'] ; 
                $machineDetailId = $this->request->data['machine_detail_id'] ;
                $allOwners = $this->Reservations->MachineDetails->MachineOwners->find('all')
                        ->contain(['Owners'])
                        ->where(['MachineOwners.machine_id' => $machineId,'MachineOwners.machine_detail_id' => $machineDetailId])->toArray();
              foreach($allOwners as $allOwnerss):
                   $notificationOwner[] = $allOwnerss['owner']['user_id'];
            endforeach;
                      //send ownersID 
              $sendNotification =  $this->sendOwnerId() ; 
        
              ///////////////////
         
              
              ////////////////
              if($notificationOwner == null){$success['owner']= false;$notificationOwner = 0 ;}else{$success['owner']= true;}
                } else{
                  $sendNotifications =  $this->sendOwnerId() ; 
                      $sendNotification =  $this->sendToAdmin() ; 
                }
                
               // send notitfications
              $notfiarr =   $this->sendMessage($sendNotification);
                            $notfiarrs =   $this->sendMessage($sendNotifications);

                // end send ownersID 
                $success['res'] = true ;
             } else {
                   $success['res'] = false ;
                   $success['owner']= false;
             }
                      
        }
        $this->set(compact('success','reservation','allOwners','status','sendNotification','notfiarr','notfiarrs'));
        $this->set('_serialize', ['success','reservation','status','sendNotification','notfiarr','notfiarrs']);
    }
    ///////////////////////////////
    function sendToAdmin(){
         $users =   TableRegistry::get('Users');
            $user = $users->find('all')->where(['Users.user_group_id'=>1])->select(['id']);
             foreach($user as $usersss):
                   $userx[] = $usersss['id'];
              endforeach;
              
        return $userx ; 
    }
   ////////////////////////////////////////////////////// 
   function reservationStatus(){
       $status =   TableRegistry::get('Settings'); 
       $statue = $status->find('all')->order(['Settings.id DESC'])->select(['price_approved'])->first();
        return $statue ; 
   }
    ///////////////////////////////////////////////////
       function sendOwnerId(){
      $machineId = $this->request->data['machine_id'] ; 
                $machineDetailId = $this->request->data['machine_detail_id'] ;
                $allOwners = $this->Reservations->MachineDetails->MachineOwners->find('all')
                        ->contain(['Owners'])
                        ->where(['MachineOwners.machine_id' => $machineId,'MachineOwners.machine_detail_id' => $machineDetailId])->toArray();
              foreach($allOwners as $allOwnerss):
                   $notificationOwner[] = $allOwnerss['owner']['user_id'];
              endforeach;
              return $notificationOwner ; 
}
//////////////////////////////////////////////
    function history($page){   //after owner accpet order
$userID = $this->request->data['userID'] ; 
$ownerID = $this->request->data['ownerID'] ; 
$status = $this->request->data['status'];
if(!empty($ownerID)){
     $success = true ; 
     //user information elhamd llah 
    $data =  $this->userInfo($ownerID,$status) ;
        }elseif(!empty($userID)){
               $success = true ; 
     $data =  $this->ownerInfo($userID,$status) ;
        }else{   $success = false ; }
        
         $this->paginate = [
            'page' => $page,
            'limit' => 10,
            'maxLimit' => 100,
            'fields' => []
              ]; 
   	   $this->paginate($data);
           $count = $data->count();
     
                $this->set(compact('count','success','data'));
        $this->set('_serialize', ['count','success','data']);
    }

    

////////////////////////////orders methods//////////////////////////
 function machineOwner($ownerID) {
     $chkMachines = $this->Reservations->MachineDetails->MachineOwners->find('all')
                 ->where(['MachineOwners.owner_id'=>$ownerID])->toArray();
        
         foreach($chkMachines as $chkMachiness):
             $machineDetails[] =  $chkMachiness['machine_detail_id'] ; 
          
         endforeach;
         
         return $machineDetails ;
 }
//////////////////////////////////////////////////////
    function orders($ownerID = null,$page=null){   // order before aproved
   
    
        // chk orders by 
       $status = 'pending';
 if($ownerID == 0){
      $data = $this->Reservations->find('all')
                 ->where(['Reservations.status'=>$status])
                ->contain(['MachineDetails'=>function($carElhay){
                      return $carElhay 
                            ->select(['name','name_en','machine_photo']);
                },
                    'OwnerPrices'  =>function($chkPrice){  return $chkPrice->select(['owner_id','reservation_id','price']); }
                    ,'ReservationTypes' =>function($qq){ return $qq->select(['name','name_en']); }
                    ,'Users'=>function($elhay){  return $elhay->select(['username','photo']);  }
                         ]) 
                    ->order(['Reservations.id DESC']);
                    }
 else{
     $this->request->data['ownerID'] = $ownerID ; 
         
       $machineDetails = $this->machineOwner($ownerID);
        $data = $this->Reservations->find('all')
                ->where(['Reservations.machine_detail_id IN'=>$machineDetails  ,  'Reservations.status'=>$status])
                ->contain(['MachineDetails'=>function($carElhay){
                      return $carElhay 
                            ->select(['name','name_en','machine_photo']);
                },
                    'OwnerPrices' =>function($chkPrice){   //ownerprices to remove (pricing form post by owner)
                     return $chkPrice  
                             ->where(['OwnerPrices.owner_id'=>$this->request->data['ownerID']])
                             ->select(['owner_id','reservation_id','price'])
                             ; 
                }
                    ,'ReservationTypes' =>function($qq){ return $qq  ->select(['name','name_en']);  }
                    ,'Users'=>function($elhay){   return $elhay  ->select(['username','photo']) ; }
                         ])
                ->order(['Reservations.id DESC']);
               
 }
    $this->paginate = [
            'page' => $page,
            'limit' => 10,
            'maxLimit' => 100,
            'fields' => []
              ]; 
   	   $this->paginate($data);
           $count = $data->count();
     
                $this->set(compact('count','success','data','chkMachines','machineDetails'));
        $this->set('_serialize', ['count','success','data','machineDetails']);
        $success = true ; 
                
    }

        function seen($ownerID = null){   // order before aproved
   
    
        // chk orders by 
     
 if($ownerID == 0){
      $data = $this->Reservations->find('all')
                 ->where(['Reservations.seen'=>0])
                ->toArray();
                    }
 else{
     $this->request->data['ownerID'] = $ownerID ; 
         
       $machineDetails = $this->machineOwner($ownerID);
        $data = $this->Reservations->find('all')
                ->where(['Reservations.machine_detail_id IN'=>$machineDetails  ,  'Reservations.seen'=>0])
                
                ->toArray();
 }
 foreach ($data as $dd) {
 $ids[] = $dd;
      $reservation = $this->Reservations->get($dd["id"], [
           
        ]);
       
        $ids["seen"] = "1" ;
            $reservation = $this->Reservations->patchEntity($reservation, $ids);
            if ($this->Reservations->save($reservation)) {
                $success = true ; 
            } else {
               $success = false ; 
            }
 

      
          }
            
                $this->set(compact('success','data','chkMachines','machineDetails'));
        $this->set('_serialize', ['success','data','machineDetails']);
  
    }
//////////////////////////////////////////////////////

    
//////////////////////////////////////////////////////
    // order status (pending  , approved , canceled , completed )
    
    public function edit($id = null)
    {
        $reservation = $this->Reservations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reservation = $this->Reservations->patchEntity($reservation, $this->request->data);
            if ($this->Reservations->save($reservation)) {
                $success = true ; 
            } else {
               $success = false ; 
            }
        }
 
        $this->set(compact('reservation', 'success'));
        $this->set('_serialize', ['success','reservation']);
    }
//////////////////////////////////////////////////////
    
    
    public function talabaty($userID){
        $success = true ; 
        $data = $this->Reservations->find('all')
                ->where(['Reservations.user_id'=>$userID,'Reservations.status'=>'pending'])
                ->contain([
                'MachineDetails'=>function($carElhay){
                      return $carElhay 
                            ->select(['name','name_en','machine_photo']);
                },
                    'ReservationTypes'=>function($contractElhay){
                    return $contractElhay 
                            ->select(['name','name_en']);
                }])
                ->order(['Reservations.id DESC'])
                ->toArray();
             $this->set(compact('data', 'success'));
        $this->set('_serialize', ['success','data']);
    }
    
    ///////////////////////
    
      public function view($id = null)
    {
          $success = true ;
        $data = $this->Reservations->get($id, [
            'contain' => [ 'Owners'=>function($elhayInfo){
            return $elhayInfo
                    ->contain(['Users'=>function($userInfo){
                         return $userInfo 
                                 ->select(['username','photo']);
                    }])
                    ->select(['id']);
            }]
        ]);
        $this->set(compact('success','data'));
        $this->set('_serialize', ['success','data']);
    }
       ///////////////////////history methods /////////////////
       
 function userInfo ($ownerID,$status ){
      
        $data = $this->Reservations->find('all');
               $data->where(['Reservations.owner_id'=>$ownerID , 'Reservations.status'=>$status]) 
                       ->contain(['Users'=>function($UserInfoelhay){
                                return $UserInfoelhay 
                                 ->select(['username','photo','mobile'])  ; 
                       }
                       
                           ,'ReservationTypes'=>function($typeElhay){
                           return $typeElhay 
                                 ->select(['name','name_en'])  ; 
                       }
                       ])
                       ->order(['Reservations.id DESC'])
                       ->toArray();
                       return $data ;
}
    
//////////////////////////////////////////////////////
 function ownerInfo($userID,$status){
                $data = $this->Reservations->find('all');
               $data ->where(['Reservations.user_id'=>$userID , 'Reservations.status'=>$status]) 
                       ->contain(['ReservationTypes'=>function($typeElhay){
                           return $typeElhay 
                                 ->select(['name','name_en'])  ; 
                       }
                       ,'Owners' =>
                           function($elhay){
                           return $elhay 
                                   ->select(['user_id','id']) 
                                   ->contain([ 'Users'=>function($UserInfo){
                                    
                                       return $UserInfo
                                                 ->select(['username','photo','mobile']); 
                                       
                                   },
                                       
                                       'Rates'=>function($q) {
    $q->select([
         'Rates.owner_id',
         'count' => $q->func()->count('Rates.owner_id') ,
         'stars' => $q->func()->sum('Rates.star')
    ])   
     ->group(['Rates.owner_id']);
      return $q;
              
            }
                                       
                                       ]) ;
 
                       }
                       ])
                     ->order(['Reservations.id DESC'])   ->toArray();
                         return $data ;
 }
//////////////////////////////////////////////////////
    
       ///////////////////////end history methods /////////////////
}


