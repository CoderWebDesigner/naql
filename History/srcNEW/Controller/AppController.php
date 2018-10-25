<?php
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\Table;
class AppController extends Controller {

	public $components = ['Flash', 'Auth', 'Usermgmt.UserAuth'/*, 'Security', 'Csrf'*/];
	public $helpers = ['Usermgmt.UserAuth', 'Usermgmt.Image', 'Form'];

	/* Override functions */
	public function paginate($object = null) {
		$sessionKey = sprintf('UserAuth.Search.%s.%s', $this->request['controller'], $this->request['action']);
		if($this->request->session()->check($sessionKey)) {
			$persistedData = $this->request->session()->read($sessionKey);
			if(!empty($persistedData['page_limit'])) {
				$this->paginate['limit'] = $persistedData['page_limit'];
			}
		}
		return parent::paginate($object);
	}

public function beforeFilter(Event $event){


//      $this->viewBuilder()->layout('dashboard');

//$this->loadModel('Hospitals');
//  $this->loadModel('Advices');
//       $hospital = $this->Hospitals->Doctors->find('all')->where(['Doctors.user_id'=>  $this->Auth->user('id')])->toarray();
//       $doctors = $this->Hospitals->Doctors->find('all',['limit'=>7]) ->order('rand()')->toarray();
//       $hos = $this->Hospitals->find('all',['limit'=>7]) ->order('rand()')->toarray();
//
//       $adv= $this->Advices->find('all',['limit'=>7]) ->order('rand()')->toarray();
//
//                $this->set(compact('doctors','hospital','hos','adv'));                

}


public function beforeRender(Event $event) {
                      $this->loadModel('Users');

      $users = $this->Users->find('all')->where(['Users.id'=>  $this->Auth->user('id')])->toarray();


                                            $this->set('user',$users); 

		if(!array_key_exists('_serialize', $this->viewVars) && in_array($this->response->type(), ['application/json', 'application/xml'])) {
			$this->set('_serialize', true);
		}
              
	}
}