<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SettingOptions Controller
 *
 * @property \App\Model\Table\SettingOptionsTable $SettingOptions
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class SettingOptionsController extends AppController
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
        $this->set('settingOptions', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['settingOptions']);
    }

    /**
     * View method
     *
     * @param string|null $id Setting Option id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $settingOption = $this->SettingOptions->get($id, [
            'contain' => ['UserSettingOptions']
        ]);
        $this->set('settingOption', $settingOption);
        $this->set('_serialize', ['settingOption']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $settingOption = $this->SettingOptions->newEntity();
        if ($this->request->is('post')) {
            $settingOption = $this->SettingOptions->patchEntity($settingOption, $this->request->data);
            if ($this->SettingOptions->save($settingOption)) {
                $this->Flash->success(___('the setting option has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $settingOption->id]);
            } else {
                $this->Flash->error(___('the setting option could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $this->set(compact('settingOption'));
        $this->set('_serialize', ['settingOption']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Setting Option id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $settingOption = $this->SettingOptions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $settingOption = $this->SettingOptions->patchEntity($settingOption, $this->request->data);
            if ($this->SettingOptions->save($settingOption)) {
                $this->Flash->success(___('the setting option has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $settingOption->id]);
            } else {
                $this->Flash->error(___('the setting option could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $this->set(compact('settingOption'));
        $this->set('_serialize', ['settingOption']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Setting Option id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $settingOption = $this->SettingOptions->get($id);
        
        try
        {
            if ($this->SettingOptions->delete($settingOption)) {
                $this->Flash->success(___('the setting option has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the setting option could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the setting option could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The setting option could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->SettingOptions->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected setting option has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected settingoptions have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected settingoptions could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected settingoptions could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no setting option to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Setting Option id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $settingOption = $this->SettingOptions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $settingOption = $this->SettingOptions->newEntity();
            $settingOption = $this->SettingOptions->patchEntity($settingOption, $this->request->data);
            if ($this->SettingOptions->save($settingOption)) {
                $this->Flash->success(___('the setting option has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $settingOption->id]);
            } else {
                $this->Flash->error(___('the setting option could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        
        $settingOption->id = $id;
        $this->set(compact('settingOption'));
        $this->set('_serialize', ['settingOption']);
    }
}
