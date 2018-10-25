<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserSettings Controller
 *
 * @property \App\Model\Table\UserSettingsTable $UserSettings
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class UserSettingsController extends AppController
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
        $this->set('userSettings', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['userSettings']);
    }

    /**
     * View method
     *
     * @param string|null $id User Setting id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userSetting = $this->UserSettings->get($id, [
            'contain' => ['UserSettingOptions']
        ]);
        $this->set('userSetting', $userSetting);
        $this->set('_serialize', ['userSetting']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userSetting = $this->UserSettings->newEntity();
        if ($this->request->is('post')) {
            $userSetting = $this->UserSettings->patchEntity($userSetting, $this->request->data);
            if ($this->UserSettings->save($userSetting)) {
                $this->Flash->success(___('the user setting has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $userSetting->id]);
            } else {
                $this->Flash->error(___('the user setting could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $this->set(compact('userSetting'));
        $this->set('_serialize', ['userSetting']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User Setting id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userSetting = $this->UserSettings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userSetting = $this->UserSettings->patchEntity($userSetting, $this->request->data);
            if ($this->UserSettings->save($userSetting)) {
                $this->Flash->success(___('the user setting has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $userSetting->id]);
            } else {
                $this->Flash->error(___('the user setting could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $this->set(compact('userSetting'));
        $this->set('_serialize', ['userSetting']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User Setting id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userSetting = $this->UserSettings->get($id);
        
        try
        {
            if ($this->UserSettings->delete($userSetting)) {
                $this->Flash->success(___('the user setting has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the user setting could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the user setting could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The user setting could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->UserSettings->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected user setting has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected usersettings have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected usersettings could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected usersettings could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no user setting to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id User Setting id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $userSetting = $this->UserSettings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userSetting = $this->UserSettings->newEntity();
            $userSetting = $this->UserSettings->patchEntity($userSetting, $this->request->data);
            if ($this->UserSettings->save($userSetting)) {
                $this->Flash->success(___('the user setting has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $userSetting->id]);
            } else {
                $this->Flash->error(___('the user setting could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        
        $userSetting->id = $id;
        $this->set(compact('userSetting'));
        $this->set('_serialize', ['userSetting']);
    }
}
