<?php

namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * GroomsMens Controller
 *
 * @property \App\Model\Table\GroomsMensTable $GroomsMens
 */
class GroomsMensController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->Auth->allow();
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $this->set('groomsMens', $this->paginate($this->GroomsMens));
        $this->set('_serialize', ['groomsMens']);
    }

    /**
     * View method
     *
     * @param string|null $id Grooms Men id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $groomsMen = $this->GroomsMens->get($id, [
            'contain' => []
        ]);
        $this->set('groomsMen', $groomsMen);
        $this->set('_serialize', ['groomsMen']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $groomsMen = $this->GroomsMens->newEntity();
        if ($this->request->is('post')) {
            $groomsMen = $this->GroomsMens->patchEntity($groomsMen, $this->request->data);
            if ($this->GroomsMens->save($groomsMen)) {
                $this->Flash->success(__('The grooms men has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The grooms men could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('groomsMen'));
        $this->set('_serialize', ['groomsMen']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Grooms Men id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $groomsMen = $this->GroomsMens->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $groomsMen = $this->GroomsMens->patchEntity($groomsMen, $this->request->data);
            if ($this->GroomsMens->save($groomsMen)) {
                $this->Flash->success(__('The grooms men has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The grooms men could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('groomsMen'));
        $this->set('_serialize', ['groomsMen']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Grooms Men id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $groomsMen = $this->GroomsMens->get($id);
        if ($this->GroomsMens->delete($groomsMen)) {

            $this->set([
                'success' => true,
                'data' => [
                    'message' => 'The grooms men has been deleted.'
                ],
                '_serialize' => ['success', 'data']
            ]);
        } else {
            $this->set([
                'success' => false,
                'data' => [
                    'message' => 'The grooms men could not be deleted. Please, try again.'
                ],
                '_serialize' => ['success', 'data']
            ]);
        }
    }

}
