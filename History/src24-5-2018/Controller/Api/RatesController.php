<?php 
namespace App\Controller\Api;

 use App\Controller\Api\AppController;

/**
 * BlackLists Controller
 *
 * @property \App\Model\Table\BlackListsTable $BlackLists
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class RatesController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
          $this->loadComponent('Paginator');
                  $this->Auth->allow(['index','add','edit','view']);

    }
    
    
     public $paginate = [
        'page' => 1,
        'limit' => 1000,
        'maxLimit' => 100,
       'fields' => [],
        'sortWhitelist' => []
    ];
     
//         public function add()
//    {
//         
//        $rate = $this->Rates->newEntity();
//        if ($this->request->is('post')) {
//            
//            $userId = $this->request->data['user_id'];
//            $ownerId = $this->request->data['owner_id'];
//            
//            $chkRating = $this->Rates->find('all')                      //allah
//                    ->where(['Rates.user_id'=> $userId ,'Rates.owner_id'=>$ownerId ])
//                    ->toArray();
//            
//                 if($chkRating){
//                        $success= false; 
//                 }   else{
//                         $success= true; 
//            $rate = $this->Rates->patchEntity($rate, $this->request->data);
//               $this->Rates->save($rate);
//        }
//        $this->set(compact('rate','success','chkRating'));
//        $this->set('_serialize', ['success']);
//    }
//    }


 
     
}
