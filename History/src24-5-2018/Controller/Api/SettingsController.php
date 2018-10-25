<?php 
namespace App\Controller\Api;

 use App\Controller\Api\AppController;

/**
 * BlackLists Controller
 *
 * @property \App\Model\Table\BlackListsTable $BlackLists
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class SettingsController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
          $this->loadComponent('Paginator');
                  $this->Auth->allow(['index','add','status']);

    }
    
    
     public $paginate = [
        'page' => 1,
        'limit' => 1000,
        'maxLimit' => 100,
       'fields' => [],
        'sortWhitelist' => []
    ];
     
     function status () {
         $status = $this->Settings->find('all')
                 ->order(['Settings.id DESC'])
                 ->select(['price_approved'])
                ->first();
            $this->set('status', $status);
        $this->set('_serialize', ['status']);
     }
 
}
