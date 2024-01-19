<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Lignefraisforfaits Controller
 *
 * @property \App\Model\Table\LignefraisforfaitsTable $Lignefraisforfaits
 * @method \App\Model\Entity\Lignefraisforfait[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LignefraisforfaitsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->set('showHeader', true);
        $this->paginate = [
            'contain' => ['Fraisforfaits'],
        ];
        $lignefraisforfaits = $this->paginate($this->Lignefraisforfaits);

        $this->set(compact('lignefraisforfaits'));
    }

    /**
     * View method
     *
     * @param string|null $id Lignefraisforfait id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->set('showHeader', true);
        $lignefraisforfait = $this->Lignefraisforfaits->get($id, [
            'contain' => ['Fraisforfaits', 'Fiches'],
        ]);

        $this->set(compact('lignefraisforfait'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $lignefraisforfait = $this->Lignefraisforfaits->newEmptyEntity();
        if ($this->request->is('post')) {
            $lignefraisforfait = $this->Lignefraisforfaits->patchEntity($lignefraisforfait, $this->request->getData());
            if ($this->Lignefraisforfaits->save($lignefraisforfait)) {
                $this->Flash->success(__('The lignefraisforfait has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lignefraisforfait could not be saved. Please, try again.'));
        }
        $fraisforfaits = $this->Lignefraisforfaits->Fraisforfaits->find('list', ['limit' => 200])->all();
        $fiches = $this->Lignefraisforfaits->Fiches->find('list', ['limit' => 200])->all();
        $this->set(compact('lignefraisforfait', 'fraisforfaits', 'fiches'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Lignefraisforfait id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $lignefraisforfait = $this->Lignefraisforfaits->get($id, [
            'contain' => ['Fiches'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lignefraisforfait = $this->Lignefraisforfaits->patchEntity($lignefraisforfait, $this->request->getData());
            if ($this->Lignefraisforfaits->save($lignefraisforfait)) {
                $this->Flash->success(__('The lignefraisforfait has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lignefraisforfait could not be saved. Please, try again.'));
        }
        $fraisforfaits = $this->Lignefraisforfaits->Fraisforfaits->find('list', ['limit' => 200])->all();
        $fiches = $this->Lignefraisforfaits->Fiches->find('list', ['limit' => 200])->all();
        $this->set(compact('lignefraisforfait', 'fraisforfaits', 'fiches'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Lignefraisforfait id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $lignefraisforfait = $this->Lignefraisforfaits->get($id);
        if ($this->Lignefraisforfaits->delete($lignefraisforfait)) {
            $this->Flash->success(__('The lignefraisforfait has been deleted.'));
        } else {
            $this->Flash->error(__('The lignefraisforfait could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
