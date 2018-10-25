<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Chats Controller
 *
 * @property \App\Model\Table\ChatsTable $Chats
 * @property \Alaxos\Controller\Component\FilterComponent $Filter
 */
class ChatsController extends AppController
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
            'contain' => ['Messages']
        ];
        $this->set('chats', $this->paginate($this->Filter->getFilterQuery()));
        $this->set('_serialize', ['chats']);
        
        $messages = $this->Chats->Messages->find('list', ['limit' => 200]);
        $this->set(compact('messages'));
    }

    /**
     * View method
     *
     * @param string|null $id Chat id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $chat = $this->Chats->get($id, [
            'contain' => ['Messages']
        ]);
        $this->set('chat', $chat);
        $this->set('_serialize', ['chat']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $chat = $this->Chats->newEntity();
        if ($this->request->is('post')) {
            $chat = $this->Chats->patchEntity($chat, $this->request->data);
            if ($this->Chats->save($chat)) {
                $this->Flash->success(___('the chat has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $chat->id]);
            } else {
                $this->Flash->error(___('the chat could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $messages = $this->Chats->Messages->find('list', ['limit' => 200]);
        $this->set(compact('chat', 'messages'));
        $this->set('_serialize', ['chat']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Chat id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $chat = $this->Chats->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $chat = $this->Chats->patchEntity($chat, $this->request->data);
            if ($this->Chats->save($chat)) {
                $this->Flash->success(___('the chat has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $chat->id]);
            } else {
                $this->Flash->error(___('the chat could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $messages = $this->Chats->Messages->find('list', ['limit' => 200]);
        $this->set(compact('chat', 'messages'));
        $this->set('_serialize', ['chat']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Chat id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $chat = $this->Chats->get($id);
        
        try
        {
            if ($this->Chats->delete($chat)) {
                $this->Flash->success(___('the chat has been deleted'), ['plugin' => 'Alaxos']);
            } else {
                $this->Flash->error(___('the chat could not be deleted. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        catch(\Exception $ex)
        {
            if($ex->getCode() == 23000)
            {
                $this->Flash->error(___('the chat could not be deleted as it is still used in the database'), ['plugin' => 'Alaxos']);
            }
            else
            {
                $this->Flash->error(sprintf(__('The chat could not be deleted: %s'), $ex->getMessage()), ['plugin' => 'Alaxos']);
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
            
            $query = $this->Chats->query();
            $query->delete()->where(['id IN' => $this->request->data['checked_ids']]);
            
            try{
                if ($statement = $query->execute()) {
                    $deleted_total = $statement->rowCount();
                    if($deleted_total == 1){
                        $this->Flash->set(___('the selected chat has been deleted.'), ['element' => 'Alaxos.success']);
                    }
                    elseif($deleted_total > 1){
                        $this->Flash->set(sprintf(__('The %s selected chats have been deleted.'), $deleted_total), ['element' => 'Alaxos.success']);
                    }
                } else {
                    $this->Flash->set(___('the selected chats could not be deleted. Please, try again.'), ['element' => 'Alaxos.error']);
                }
            }
            catch(\Exception $ex){
                $this->Flash->set(___('the selected chats could not be deleted. Please, try again.'), ['element' => 'Alaxos.error', 'params' => ['exception_message' => $ex->getMessage()]]);
            }
        } else {
            $this->Flash->set(___('there was no chat to delete'), ['element' => 'Alaxos.error']);
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Copy method
     *
     * @param string|null $id Chat id.
     * @return void Redirects on successful copy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function copy($id = null)
    {
        $chat = $this->Chats->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $chat = $this->Chats->newEntity();
            $chat = $this->Chats->patchEntity($chat, $this->request->data);
            if ($this->Chats->save($chat)) {
                $this->Flash->success(___('the chat has been saved'), ['plugin' => 'Alaxos']);
                return $this->redirect(['action' => 'view', $chat->id]);
            } else {
                $this->Flash->error(___('the chat could not be saved. Please, try again.'), ['plugin' => 'Alaxos']);
            }
        }
        $messages = $this->Chats->Messages->find('list', ['limit' => 200]);
        
        $chat->id = $id;
        $this->set(compact('chat', 'messages'));
        $this->set('_serialize', ['chat']);
    }
}
