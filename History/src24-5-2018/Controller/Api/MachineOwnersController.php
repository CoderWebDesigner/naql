<?php 
namespace App\Controller\Api;

 use App\Controller\Api\AppController;

/**
 * BlackLists Controller
 *
 * @property \App\Model\Table\BlackListsTable $BlackLists
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class MachineOwnersController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
          $this->loadComponent('Paginator');
                  $this->Auth->allow(['index','add','edit','view','machineProfile']);

    }
    
    
     public $paginate = [
        'page' => 1,
        'limit' => 1000,
        'maxLimit' => 100,
       'fields' => [],
        'sortWhitelist' => []
    ];
     
        /////////////////
    
 
      public function edit($userId = null,$id = null)
    {
         
        $machineOwner =  $this->MachineOwners->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['post'])) {
            //check owner exist for this user id or not ??
              $chkOwner = $this->MachineOwners->Owners->find('all')
                    ->where(['Owners.user_id'=>$userId])
                    ->toArray();
          
            if($chkOwner){
                  $ownerID = $chkOwner[0]['id'];
            }else{
            $ownerID =  $this->addNewOwner($userId) ;  //  add new owner  
            }
           $this->request->data['owner_id'] = $ownerID ; 
              $thisMachineDetail = $this->request->data['machine_detail_id'];
         
              $chkAddNewMachine = $this->MachineOwners->find('all')
                      ->where(['MachineOwners.machine_detail_id'=>$thisMachineDetail,'MachineOwners.owner_id'=>$ownerID])
                      ->toArray();
           //   if($chkAddNewMachine){
          //     $success['machineOwner'] = false ; $success['photos'] = false ;
             // }else{
            $machineOwner = $this->MachineOwners->patchEntity($machineOwner, $this->request->data);
            if ($this->MachineOwners->save($machineOwner)) {
                $success['machineOwner'] = true ; 
                $machineOwnerId = $machineOwner->id ;
                
     //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> add multiple machine photos  <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<  
    //   $this->multiapleMachinePhotos($machineOwnerId) ; 
       
       $success['photos'] =  $this->multiapleMachinePhotos($machineOwnerId);
       if($success['photos'] == null){$success['photos'] = false ;} //multiphotos resposne
   ///////// end chek extenstion 
 
        }  else{  $success['machineOwner'] = false ;   } 
        
      //  }
        }
        
        $this->set(compact('ownerID','machineOwner', 'machineDetails', 'owners','machines','machinePhotos','success','chkOwner','newOwner','chkAddNewMachine'));
        $this->set('_serialize', ['ownerID','success','machineOwner','chkAddNewMachine']);
    }
       public function add($userId = null)
    {
         
        $machineOwner = $this->MachineOwners->newEntity();
        if ($this->request->is(['post'])) {
            //check owner exist for this user id or not ??
              $chkOwner = $this->MachineOwners->Owners->find('all')
                    ->where(['Owners.user_id'=>$userId])
                    ->toArray();
          
            if($chkOwner){
                  $ownerID = $chkOwner[0]['id'];
            }else{
            $ownerID =  $this->addNewOwner($userId) ;  //  add new owner  
            }
           $this->request->data['owner_id'] = $ownerID ; 
              $thisMachineDetail =$this->request->data['machine_detail_id'];
         
              $chkAddNewMachine = $this->MachineOwners->find('all')
                      ->where(['MachineOwners.machine_detail_id'=>$thisMachineDetail,'MachineOwners.owner_id'=>$ownerID])
                      ->toArray();
              if($chkAddNewMachine){
               $success['machineOwner'] = false ; $success['photos'] = false ;
              }else{
            $machineOwner = $this->MachineOwners->patchEntity($machineOwner, $this->request->data);
            if ($this->MachineOwners->save($machineOwner)) {
                $success['machineOwner'] = true ; 
                $machineOwnerId = $machineOwner->id ;
                
     //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> add multiple machine photos  <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<  
    //   $this->multiapleMachinePhotos($machineOwnerId) ; 
       
       $success['photos'] =  $this->multiapleMachinePhotos($machineOwnerId);
       if($success['photos'] == null){$success['photos'] = false ;} //multiphotos resposne
   ///////// end chek extenstion 
 
        }  else{  $success['machineOwner'] = false ;   } 
        
        }
        }
        
        $this->set(compact('ownerID','machineOwner', 'machineDetails', 'owners','machines','machinePhotos','success','chkOwner','newOwner','chkAddNewMachine'));
        $this->set('_serialize', ['ownerID','success','machineOwner','chkAddNewMachine']);
    }
//////////////////////////////////////////////////////////////////
    
    
    
    function addNewOwner($userId){
        
       
           
             
               $newOwner = $this->MachineOwners->Owners->newEntity();
               $ownerInfos = array() ; 
               $ownerInfos['user_id'] = $userId ; 
               $ownerInfos['machine_count'] = $this->request->data['machine_count'] ; 
               $ownerInfos['area_id'] = $this->request->data['area_id'] ; 
               $ownerInfos['description'] = $this->request->data['description'] ; 
             // $ownerInfos['name'] = $userId ; 
               $newOwner = $this->MachineOwners->Owners->patchEntity($newOwner,$ownerInfos);
               $this->MachineOwners->Owners->save($newOwner);
                $ownerID  = $newOwner->id   ; 
              
                 
           
             
            return $ownerID;
    }
    
    
    
    
    
    
    //////////////////////////////////////////////////////////////////
    
    
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
                   
                    } else{ $i = 2 ; }
                                                              }
         if( $i == 0 ){  $success = true ;   } else {$success = false ; }//extention
     return $success;        
      }
       }
      /////////////////

       
       
       
       
    /////////////////
//      public function edit($Ownerid = null)
//    {
//          $getOwnerID = $this->MachineOwners->find('all')->where(['MachineOwners.owner_id'=>$Ownerid])->toArray();
//          $id = $getOwnerID[0]['id'];
//        $machineOwner = $this->MachineOwners->get($id, [
//            'contain' => []
//        ]);
//        if ($this->request->is(['patch', 'post', 'put'])) {
////            if(!empty($this->request->data['machine_count'])){
////                
////            }
//            
//            $machineOwner = $this->MachineOwners->patchEntity($machineOwner, $this->request->data);
//            $machineOwnerId = $machineOwner->id ; //machine_count
//            if ($this->MachineOwners->save($machineOwner)) {
//                
//     //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> add multiple machine photos  <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<  
//       $this->multiapleMachinePhotos($machineOwnerId) ; 
//   ///////// end chek extenstion 
// 
//            } else {
//                
//            }
//        }
//        
//        $this->set(compact('machineOwner', 'machineDetails', 'owners','machines','machinePhotos'));
//        $this->set('_serialize', ['machineOwner']);
//    }  
       
       
       public function machineProfile($ownerId = null){
           $success = true ; 
           $data = $this->MachineOwners->find('all')
                   ->where(['MachineOwners.owner_id'=>$ownerId])
                   ->contain([
                   'Areas',
                   'MachineDetails'=>function($deatilsMachine){
                       return $deatilsMachine 
                              ->select(['name','name_en','machine_photo']) 
                               ;
                   }])
                   ->toArray();
                           $this->set(compact('success', 'data'));
        $this->set('_serialize', ['success','data']);
       }
       ///////////////////////////
              public function machineEditProfile($ownerId = null){
           $success = true ; 
           $data = $this->MachineOwners->find('all')
                   ->where(['MachineOwners.owner_id'=>$ownerId])
                   ->contain([
                   'Areas',
                   'MachineDetails'=>function($deatilsMachine){
                       return $deatilsMachine 
                              ->select(['name','name_en','machine_photo']) 
                               ;
                   }])
                   ->toArray();
                           $this->set(compact('success', 'data'));
        $this->set('_serialize', ['success','data']);
       }
       
         }
