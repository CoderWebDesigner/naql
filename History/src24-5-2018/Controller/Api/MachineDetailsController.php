<?php 
namespace App\Controller\Api;

 use App\Controller\Api\AppController;

/**
 * BlackLists Controller
 *
 * @property \App\Model\Table\BlackListsTable $BlackLists
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class MachineDetailsController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
          $this->loadComponent('Paginator');
                  $this->Auth->allow(['index','add','edit','view','subCat']);

    }
    
    
     public $paginate = [
        'page' => 1,
        'limit' => 1000,
        'maxLimit' => 100,
       'fields' => [],
        'sortWhitelist' => []
    ];
     
     
     /// get sup_cat by catID
     function subCat($catID){
         $data = $this->MachineDetails->find('all')
                 ->where(['MachineDetails.machine_id'=>$catID])
                 ->toArray();
         
        $this->set(compact('data'));
          $this->set('_serialize', ['data']);
         
     }
}
