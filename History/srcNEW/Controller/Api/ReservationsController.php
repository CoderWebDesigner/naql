<?php namespace App\Controller\Api;
 use App\Controller\Api\AppController;

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
        $this->Auth->allow(['index','add','edit','view','completedResForUser','history','orders','talabaty']);

    }
    
    
     public $paginate = [
        'page' => 1,
        'limit' => 1000,
        'maxLimit' => 100,
       'fields' => [],
        'sortWhitelist' => []
    ];
     /////////////////////////////////////////////////

     //////////////////////////////////////////////////////
      public function add()
    {
        $reservation = $this->Reservations->newEntity();
        if ($this->request->is('post')) {
            $reservation = $this->Reservations->patchEntity($reservation, $this->request->data);
            if ($this->Reservations->save($reservation)) {
                  //send ownersID 
              $notificationOwner =  $this->sendOwnerId() ; 
              if($notificationOwner ==null){$success['owner']= false;$notificationOwner = 0 ;}else{$success['owner']= true;}
                // end send ownersID 
                $success['res'] = true ;
             } else {
                   $success['res'] = false ;
                   $success['owner']= false;
             }
        }
        $this->set(compact('success','reservation','allOwners','notificationOwner'));
        $this->set('_serialize', ['success','reservation','notificationOwner']);
    }
   ////////////////////////////////////////////////////// 
    
       function sendOwnerId(){
      $machineId = $this->request->data['machine_id'] ; 
                $machineDetailId = $this->request->data['machine_detail_id'] ;
                $allOwners = $this->Reservations->MachineDetails->MachineOwners->find('all')
                        ->where(['MachineOwners.machine_id' => $machineId,'MachineOwners.machine_detail_id' => $machineDetailId])->toArray();
              foreach($allOwners as $allOwnerss):
                   $notificationOwner[] = $allOwnerss['owner_id'];
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
           
     
                $this->set(compact('success','data'));
        $this->set('_serialize', ['success','data']);
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
    function orders($ownerID = null){   // order before aproved
   
    
        // chk orders by 
       $status = 'pending';
 if($ownerID == 0){
      $data = $this->Reservations->find('all')
                 ->where(['Reservations.status'=>$status])
                ->contain([
                    'OwnerPrices'  =>function($chkPrice){  return $chkPrice->select(['owner_id','reservation_id','price']); }
                    ,'ReservationTypes' =>function($qq){ return $qq->select(['name','name_en']); }
                    ,'Users'=>function($elhay){  return $elhay->select(['username','photo']);  }
                         ]) 
                    ->order(['Reservations.id DESC']) ->toArray();
                    }
 else{
     $this->request->data['ownerID'] = $ownerID ; 
         
       $machineDetails = $this->machineOwner($ownerID);
        $data = $this->Reservations->find('all')
                ->where(['Reservations.machine_detail_id IN'=>$machineDetails  ,  'Reservations.status'=>$status])
                ->contain([
                    'OwnerPrices' =>function($chkPrice){   //ownerprices to remove (pricing form post by owner)
                     return $chkPrice  
                             ->where(['OwnerPrices.owner_id'=>$this->request->data['ownerID']])
                             ->select(['owner_id','reservation_id','price'])
                             ; 
                }
                    ,'ReservationTypes' =>function($qq){ return $qq  ->select(['name','name_en']);  }
                    ,'Users'=>function($elhay){   return $elhay  ->select(['username','photo']) ; }
                         ])
                ->order(['Reservations.id DESC'])
                ->toArray();
 }
        $success = true ; 
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
                                 ->select(['username','photo'])  ; 
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
                                                 ->select(['username','photo']); 
                                       
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
