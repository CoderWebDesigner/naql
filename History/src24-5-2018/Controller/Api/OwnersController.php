<?php 
namespace App\Controller\Api;

 use App\Controller\Api\AppController;

/**
 * BlackLists Controller
 *
 * @property \App\Model\Table\BlackListsTable $BlackLists
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class OwnersController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
          $this->loadComponent('Paginator');
                  $this->Auth->allow(['index','add','edit','view','ownerInfo']);

    }
    
    
     public $paginate = [
        'page' => 1,
        'limit' => 1000,
        'maxLimit' => 100,
       'fields' => [],
        'sortWhitelist' => []
    ];
     
     
public function ownerInfo($ownerId=null , $machineDeatil = null){
    $this->request->data['MachineDeatilID'] = $machineDeatil ; 
    $this->request->data['OwnerID'] = $ownerId ; 
    $success = true ; 
    $data = $this->Owners->find('all')
            ->where(['Owners.id'=>$ownerId])
            ->contain([
                'Rates' => function($rateElhay) {
                                        $rateElhay->select([
                                            'Rates.owner_id',
                                            'stars' => $rateElhay->func()->sum('Rates.star'),
                                            'count' => $rateElhay->func()->count('Rates.owner_id')
                                        ])
                                        ->group(['Rates.owner_id']);
                                        return $rateElhay;
                                    }
                ,
                'Users'=>function($user){
                return $user
                        ->select(['photo','username']); 
                } , 
                'MachineOwners'=>function($getMachine){
                return $getMachine
                        ->where(['MachineOwners.machine_detail_id'=>$this->request->data['MachineDeatilID']])
                        ->contain(['MachinePhotos','MachineDetails'])
                        ;
            } 
            ])
            ->toArray();
            
            
            $comments = $this->Owners->Rates->find('all')
                    ->contain(['Users'=>function($userInfo){
                        return $userInfo                 //elhmad llah
                        ->select(['username']);
                    }])
                    ->where(['Rates.owner_id'=>$this->request->data['OwnerID']])
                    ->toArray();
            
        $this->set(compact('success','data','comments'));
        $this->set('_serialize', ['success','data','comments']);
}
}
