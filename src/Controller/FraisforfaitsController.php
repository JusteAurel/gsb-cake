<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Fraisforfaits Controller
 *
 * @property \App\Model\Table\FraisforfaitsTable $Fraisforfaits
 * @method \App\Model\Entity\Fraisforfait[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FraisforfaitsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->set('showHeader', true);
        $fraisforfaits = $this->paginate($this->Fraisforfaits);

        $this->set(compact('fraisforfaits'));
    }

    /**
     * View method
     *
     * @param string|null $id Fraisforfait id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->set('showHeader', true);
        $fraisforfait = $this->Fraisforfaits->get($id, [
            'contain' => ['Lignefraisforfaits'],
        ]);

        $this->set(compact('fraisforfait'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fraisforfait = $this->Fraisforfaits->newEmptyEntity();
        if ($this->request->is('post')) {
            $fraisforfait = $this->Fraisforfaits->patchEntity($fraisforfait, $this->request->getData());
            if ($this->Fraisforfaits->save($fraisforfait)) {
                $this->Flash->success(__('The fraisforfait has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fraisforfait could not be saved. Please, try again.'));
        }
        $this->set(compact('fraisforfait'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Fraisforfait id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fraisforfait = $this->Fraisforfaits->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fraisforfait = $this->Fraisforfaits->patchEntity($fraisforfait, $this->request->getData());
            if ($this->Fraisforfaits->save($fraisforfait)) {
                $this->Flash->success(__('The fraisforfait has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fraisforfait could not be saved. Please, try again.'));
        }
        $this->set(compact('fraisforfait'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Fraisforfait id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fraisforfait = $this->Fraisforfaits->get($id);
        if ($this->Fraisforfaits->delete($fraisforfait)) {
            $this->Flash->success(__('The fraisforfait has been deleted.'));
        } else {
            $this->Flash->error(__('The fraisforfait could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
