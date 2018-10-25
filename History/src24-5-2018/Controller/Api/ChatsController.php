<?php
namespace App\Controller\Api;

 use App\Controller\Api\AppController;

/**
 * BlackLists Controller
 *
 * @property \App\Model\Table\BlackListsTable $BlackLists
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class ChatsController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
          $this->loadComponent('Paginator');
                  $this->Auth->allow(['index','add','edit','view','myChat','chatBtnUsers']);

    }
    
    
     public $paginate = [
        'page' => 1,
        'limit' => 1000,
        'maxLimit' => 100,
       'fields' => [],
        'sortWhitelist' => []
    ];
     
     
     
     function chatBtnUsers () {

$fromm=$this->request->data['fromm'];  $too =$this->request->data['too'];

            
    $data = $this->Chats->find('all');
    $data   ->order(['Chats.id ASC'])
            ->contain(['tooo'=>function($qq) {
                                    return $qq
                                    ->select(['photo','username']); 
                                           
                                    },
                                    'frommm'=>function($q) {
                                    return $q
                                    ->select(['photo','username'])  ; 
                                    }]) 
                                  
                                    ->where(['Chats.too'=>$too ,'Chats.fromm'=>$fromm])
                                    ->orwhere(['Chats.too'=>$fromm ,'Chats.fromm'=>$too ])
       					  ->toarray();
 
       
        $this->set(compact('data'));
        $this->set('_serialize', ['data']);

}

     
     
     //
     function newRoom($too ,$fromm ){
                $msg = $this->Chats->Messages->find('all')
                ->where(['Messages.too'=>$too,'Messages.fromm'=>$fromm])
                ->orwhere(['Messages.too'=>$fromm,'Messages.fromm'=>$too])
                ->toarray();
                $oldID =$msg[0]['id'];
      
      if($oldID == null){
                $message = $this->Chats->Messages->newEntity();
                      $elhay = array();
                      $elhay['user_id'] = $this->request->data['fromm'];
                      $elhay['too'] = $this->request->data['too'];
                      $elhay['fromm']= $this->request->data['fromm'];
               $message = $this->Chats->Messages->patchEntity($message , $elhay);
               $message =  $this->Chats->Messages->save($message);
               $newID =  $this->Chats->Messages->save($message)->id;
               
      }
      return [$oldID,$newID] ;
     }      
     //
   function add()
    {
     //     date_default_timezone_set("Asia/Riyadh");
            $currDateTime = date("Y-m-d H:i:s");     
                          //////////////////chk msg_id
            $too = $this->request->data['too'] ; 
            $fromm = $this->request->data['fromm'] ; 
            if(empty($too) || empty($fromm)){ $success = false ; }else {
         
               $newRoom = $this->newRoom($too ,$fromm ) ;
              $oldID  = $newRoom[1] ;
              $newID  = $newRoom[0] ;
                
            }
            /////////////////////////
      $chat = $this->Chats->newEntity();
   if ($this->request->is('post')) {
                    //****************************************************upload photo*************************************
    if(!empty($this->request->data['photo']['name'])){
            $path_info = pathinfo($this->request->data['photo']['name']);

       chmod($this->request->data['photo']['tmp_name'], 0644);
    $photoo = time().mt_rand().".".$path_info['extension'];

                 $fullpath = WWW_ROOT."library".'/'.'chat';
    if(!is_dir($fullpath)) {
            mkdir($fullpath, 0777, true);
    }
    move_uploaded_file($this->request->data['photo']['tmp_name'], $fullpath.DS.$photoo);


   $this->request->data['photo'] = $photoo;
   }
 // debug($this->request->data);
     //****************************************************upload photo*************************************
       
   
       if($newID == null){
           $this->request->data['message_id']= $oldID;
       }else{
            $this->request->data['message_id']= $newID;
       }
       
                       

       $chat = $this->Chats->patchEntity($chat , $this->request->data);
            if ($this->Chats->save($chat)) {
                $success = true ; 
                //modified message to sort DESC message in array   
                 if($newID == null){
                    $elhayy =$this->Chats->Messages->get($oldID,[]);
                    $this->request->data['modified']= $currDateTime ;
                    $elhayy = $this->Chats->Messages->patchEntity($elhayy, $this->request->data);
                    $this->Chats->Messages->save($elhayy);
                 }
       
            } else{   $success = false ; }
}
        
         
            $this->set(compact('success','chat','msg','message','elhayy','oldID','newID','newIDd','newId'));
        $this->set('_serialize', ['success','chat']);
    } 
  
        /////////----- sea
  
    
    
 
    
 
     
     
     
     
}


//
//  public function getlast()
//    {
//
//
//        $query = $this->Chat->find('all')->order(['created' => 'DESC']);;
//
//
//   
//    $newOptions = array();
//foreach ($query as $option) {
//  $brand = $option['title'];
//  $code = $option['title_message'];
//  $name = $option['user_id'];
//
//  $newOptions[$name][$code] = $option;
//}
//foreach ($newOptions as $newOption) {
//debug(reset($newOption));
//$final[] = reset($newOption);
//}
//        $this->set('chat', $final);
//        $this->set('_serialize', ['chat']);
//        
//    }