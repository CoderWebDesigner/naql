<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserSettingOptions Controller
 *
 * @property \App\Model\Table\UserSettingOptionsTable $UserSettingOptions
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class UserSettingOptionsController extends AppController
{

    /**
     * Helpers
     *
     * @var array
     */
    public $helpers = ['Alaxos.AlaxosHtml', 'Alaxos.AlaxosForm', 'Alaxos.Navbars'];

    /**
     * Components
     *
     * @var array
     */
    public $components = ['Alaxos.Filter'];

    /**
    * Index method
    *
    * @return void
    */
    public function index()
    {
        $this->paginate = [
            'contain' => ['UserSettings', 'SettingOptions']
        ];
        $this->set('userSettingOptions', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['userSettingOptions']);
        
        $userSettings = $this->UserSettingOptions->UserSettings->find('list', ['limit' => 200]);
        $settingOptions = $this->UserSettingOptions->SettingOptions->find('list', ['limit' => 200]);
        $this->set(compact('userSettings', 'settingOptions'));
    }

    /**
     * View method
     *
     * @param string|null $id User Setting Option id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userSettingOption = $this->UserSettingOptions->get($id, [
            'contain' => ['UserSettings', 'SettingOptions']
        ]);
        $this->set('userSettingOption', $userSettingOption);
        $this->set('_serialize', ['userSettingOption']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userSettingOption = $this->UserSettingOptions->newEntity();
        if ($this->request->is('post')) {
            $userSettingOption = $this->UserSettingOptions->patchEntity($userSettingOption, $this->request->data);
            if ($this->UserSettingOptions->save($userSettingOption)) {
                $this->Flash->success(___('the user setting option has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $userSettingOption->id]);
            } else {
                $this->Flash->error(___('the user setting option could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $userSettings = $this->UserSettingOptions->UserSettings->find('list', ['limit' => 200]);
        $settingOptions = $this->UserSettingOptions->SettingOptions->find('list', ['limit' => 200]);
        $this->set(compact('userSettingOption', 'userSettings', 'settingOptions'));
        $this->set('_serialize', ['userSettingOption']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User Setting Option id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userSettingOption = $this->UserSettingOptions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userSettingOption = $this->UserSettingOptions->patchEntity($userSettingOption, $this->request->data);
            if ($this->UserSettingOptions->save($userSettingOption)) {
                $this->Flash->success(___('the user setting option has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $userSettingOption->id]);
            } else {
                $this->Flash->error(___('the user setting option could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $userSettings = $this->UserSettingOptions->UserSettings->find('list', ['limit' => 200]);
        $settingOptions = $this->UserSettingOptions->SettingOptions->find('list', ['limit' => 200]);
        $this->set(compact('userSettingOption', 'userSettings', 'settingOptions'));
        $this->set('_serialize', ['userSettingOption']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User Setting Option id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userSettingOption = $this->UserSettingOptions->get($id);
        
        try
        {
            if ($this->UserSettingOptions->delete($userSettingOption)) {
                $this->Flash->success(___('the user setting option has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the user setting option could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the user setting option could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The user setting option could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
            }
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Delete all method
     */
    public function delete_all() {
        $this->request->allowMethod('post', 'delete');
        
        if(isset($this->request->data['checked_ids']) && !empty($this->request->data['checked_ids'])){
            
            $query = $this->UserSettingOptions->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected user setting option has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected usersettingoptions have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected usersettingoptions could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected usersettingoptions could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no user setting option to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id User Setting Option id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $userSettingOption = $this->UserSettingOptions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userSettingOption = $this->UserSettingOptions->newEntity();
            $userSettingOption = $this->UserSettingOptions->patchEntity($userSettingOption, $this->request->data);
            if ($this->UserSettingOptions->save($userSettingOption)) {
                $this->Flash->success(___('the user setting option has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $userSettingOption->id]);
            } else {
                $this->Flash->error(___('the user setting option could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $userSettings = $this->UserSettingOptions->UserSettings->find('list', ['limit' => 200]);
        $settingOptions = $this->UserSettingOptions->SettingOptions->find('list', ['limit' => 200]);
        
        $userSettingOption->id = $id;
        $this->set(compact('userSettingOption', 'userSettings', 'settingOptions'));
        $this->set('_serialize', ['userSettingOption']);
    }
}
