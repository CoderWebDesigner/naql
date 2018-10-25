<?php
namespace App\Controller\Api;
 use App\Controller\Api\AppController;
use Cake\ORM\TableRegistry;
/**
 * BlackLists Controller
 *
 * @property \App\Model\Table\BlackListsTable $BlackLists
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class OwnerPricesController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
          $this->loadComponent('Paginator');
                  $this->Auth->allow(['index','add','edit','view','getAllOffers']);

    }
     
     public $paginate = ['page' => 1, 'limit' => 1000, 'maxLimit' => 100, 'fields' => [],'sortWhitelist' => []];
     
     
      public function add()
    {
        $ownerPrice = $this->OwnerPrices->newEntity();
        if ($this->request->is('post')) {
            $ownerID = $this->request->data['owner_id'];
            $reservationID = $this->request->data['reservation_id'];
           
            $chkStatus = $this->OwnerPrices->find('all')
                    ->where(['OwnerPrices.status'=>'approved','OwnerPrices.reservation_id'=>$reservationID])
                    ->toArray();
            if($chkStatus){
                 $success['status'] = false ; 
            }else{
            $chkOldOwner = $this->OwnerPrices->find('all')
                    ->where(['OwnerPrices.owner_id'=>$ownerID,'OwnerPrices.reservation_id'=>$reservationID])
                    ->toArray();
            if($chkOldOwner){   
                $success['offer'] = false ;
                }

            else{
                
            $ownerPrice = $this->OwnerPrices->patchEntity($ownerPrice, $this->request->data);
          $this->OwnerPrices->save($ownerPrice);
                $success = true ;   
                }
         }
        }
         $this->set(compact('success','ownerPrice','chkOldOwner','chkStatus'));
        $this->set('_serialize', ['success','ownerPrice']);
    }
     //////--------------
      public function edit($id)
    {
        $ownerPrice = $this->OwnerPrices->get($id, [
            'contain' => []
        ]);
          if ($this->request->is(['patch', 'post', 'put'])) {
            
                 $status = $this->request->data['status']; 
                 $reservationId = $ownerPrice['reservation_id'];
                 $ownerId = $ownerPrice['owner_id'];
                 $price = $ownerPrice['price'];
                 if($status == "approved"){  $this->cancelOtherOffres($reservationId ,$ownerId );  }  //refused OLD offers
                 
          $ownerPrice = $this->OwnerPrices->patchEntity($ownerPrice, $this->request->data);
          if($this->OwnerPrices->save($ownerPrice)){
                $success['price'] = true ;   
                ////////////////////// edit reservation with new owner (dynamic) (elhamd llah)
        //     $this->editRes($reservationId,$ownerId);
                if($status){          
                    //فى حالة عدم ارسال حالة معنى كدا انه الحالة ادمن ولسه العميل موفقش على اى سعر 
             $success['reservation'] = $this->editRes($reservationId,$ownerId,$price);
             }
                 /////////////////////
                }
        }
      
        $this->set(compact('success','ownerPrice','chkOld','refusedOffers','reservation'));
        $this->set('_serialize', ['success','ownerPrice','chkOld','refusedOffers']);
    }
    ///////////////////////////
    
    function cancelOtherOffres($reservationId ,$ownerId ) {
           
                 $chkOld = $this->OwnerPrices->find('all')
                         ->where(['OwnerPrices.reservation_id'=>$reservationId ,'OwnerPrices.owner_id !='=>$ownerId ])   
                         ->toArray();
                 foreach($chkOld as $chkOldd):
                      $OfferOldId = $chkOldd['id'];
                 $refusedOffers = $this->OwnerPrices->get($OfferOldId);
                 $refused = array();
                 $refused['status'] = "refused";
                 $refusedOffers = $this->OwnerPrices->patchEntity($refusedOffers ,$refused);
                 $this->OwnerPrices->save($refusedOffers);
                 endforeach;
                  
    }
    ////////////////////////
    function editRes($reservationId , $ownerId ,$price){
            $reservation = $this->OwnerPrices->Reservations->get($reservationId);
                 $elhay = array();
                 $elhay['status'] = "completed" ; 
                 $elhay['owner_id'] = $ownerId;
                 $elhay['price'] = $price;
                 $reservation = $this->OwnerPrices->Reservations->patchEntity($reservation , $elhay);
                if( $this->OwnerPrices->Reservations->save($reservation)){
                      $success = true ;  
                }else{ $success = false ;  }
                return $success ; 
    }
    /////////////////////
    function getAllOffers($resId = null){
         $setting = TableRegistry::get('Settings'); 
        $chkPriceApproved =  $setting->find('all')
               ->order(['Settings.id DESC']) ->toArray();
        
        $priceApproved = $chkPriceApproved[0]['price_approved'];
 
        $reservation = $this->OwnerPrices->Reservations->find();
           
        $reservation->contain(['MachineDetails'=>function($machineElhay){
                 return $machineElhay 
                   ->select(['name','name_en','machine_photo']);
             }])
                ->where(['Reservations.id'=>$resId])->toArray();
             
        
        $data = $this->OwnerPrices->find('all')
                      ->contain([
                    'Owners' => function($ownerInfo) {
                        return $ownerInfo
                                ->select(['user_id', 'id'])
                                ->contain(['Rates' => function($rateElhay) {
                                        $rateElhay->select([
                                            'Rates.owner_id',
                                            'stars' => $rateElhay->func()->sum('Rates.star'),
                                            'count' => $rateElhay->func()->count('Rates.owner_id')
                                        ])
                                        ->group(['Rates.owner_id']);
                                        return $rateElhay;
                                    },
                                    'Users' => function($userInfo) {
                                        return $userInfo
                                                ->select(['username', 'photo','user_group_id']);
                                    }]);
                    }])
                ->where(['OwnerPrices.reservation_id' => $resId])
                ->toArray();

        $success = true ; 
        $this->set(compact('success','data','chkPriceApproved','priceApproved','reservation'));
        $this->set('_serialize', ['success','priceApproved','reservation','data']);
    }
    /////////////////////
}
