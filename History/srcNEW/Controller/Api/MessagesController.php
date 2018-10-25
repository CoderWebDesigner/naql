<?php namespace App\Controller\Api;
 use App\Controller\Api\AppController;

/**
 * BlackLists Controller
 *
 * @property \App\Model\Table\BlackListsTable $BlackLists
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class MessagesController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
          $this->loadComponent('Paginator');
                  $this->Auth->allow(['index','add','edit','view','myChat','lastmsg']);

    }
    
    
     public $paginate = [
        'page' => 1,
        'limit' => 1000,
        'maxLimit' => 100,
       'fields' => [],
        'sortWhitelist' => []
    ];
     
//     function lastmsg (){
//             $query = $this->Messages->Chats->find('all')  ->order(['created' => 'DESC']);
//
//$userID = 1;
//   
//    $newOptions = array();
//foreach ($query as $option) {
// // $brand = $option['post'];
//  $code = $option['post'];
//  if( $name = $option['fromm'] == $userID){ $name = $option['fromm'];}
// 
//  
//  //$namee = $option['fromm'];
//
//  $newOptions[$name][$code] = $option;
//}
//foreach ($newOptions as $newOption) {
//debug(reset($newOption));
//$final[] = reset($newOption);
//}
//        $this->set('chat', $final);
//        $this->set('_serialize', ['chat']);
//        }
        
        
        
        
        
        public function myChat ($id) {

         $myChat = $this->Messages->find() 
             
         ->order(['Messages.created DESC'])
         ->contain([
             'Chatss'             =>  
             
             function($q) {
                                    return $q
                                
                                    ->order(['Chatss.created ASC']) 
                                 ->contain([  'tooo'=>function($tooInfo){
                                     return $tooInfo 
                                             ->select(['username','photo','user_group_id']);
                                     
                                 }  ,'frommm'=>function($frommInfo){
                                     return $frommInfo 
                                             ->select(['username','photo','user_group_id']);
                                 }
                                 ]);
                                    }  
             

                                    
                                  
                                    ]) 
            
        
 
         ->where(['Messages.fromm'=>$id])
         ->orwhere(['Messages.too'=>$id])
     
         ->toarray();
         
        $userFrom = $myChat[0]['fromm'];
        $userTo =  $myChat[0]['too'];
        

  
        $this->set('myChat',$myChat);
        $this->set('_serialize', ['myChat']);  
    }
    
}
