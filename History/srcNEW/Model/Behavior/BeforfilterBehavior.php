<?php // 
namespace App\Model\Behavior;

use Cake\Event\Event , ArrayObject;
use Cake\ORM\Behavior;
use Cake\ORM\Query;
use Cake\Network\Request;
use Cake\Network\Session;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Controller\Component\AuthComponent;


/**
 * Beforfilter behavior
 */
class BeforfilterBehavior extends Behavior
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];
    
    
    public function beforeFind(Event $event, Query $query = null, ArrayObject $options = null, $primary = null){
      
        if(isset($options['params'])){
        if($options['params'] != 0):
             $query->where([ $event->subject()->alias().'.user_id'=> $options['params']]);
        return $query;
        endif;
        }
    
  
}
}
 