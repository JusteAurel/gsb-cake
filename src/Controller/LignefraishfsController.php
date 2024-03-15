<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Lignefraishfs Controller
 *
 * @property \App\Model\Table\LignefraishfsTable $Lignefraishfs
 * @method \App\Model\Entity\Lignefraishf[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LignefraishfsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->set('showHeader', true);
        $lignefraishfs = $this->paginate($this->Lignefraishfs);

        $this->set(compact('lignefraishfs'));
    }

    /**
     * View method
     *
     * @param string|null $id Lignefraishf id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->set('showHeader', true);
        $lignefraishf = $this->Lignefraishfs->get($id, [
            'contain' => ['Fiches'],
        ]);

        $this->set(compact('lignefraishf'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $lignefraishf = $this->Lignefraishfs->newEmptyEntity();
        if ($this->request->is('post')) {
            $lignefraishf = $this->Lignefraishfs->patchEntity($lignefraishf, $this->request->getData());
            if ($this->Lignefraishfs->save($lignefraishf)) {
                $this->Flash->success(__('Fiche de frais correctement créée'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__("La fiche de frais n'a pas pu être créée. Veuillez réessayer !"));
        }
        $fiches = $this->Lignefraishfs->Fiches->find('list', ['limit' => 200])->all();
        $this->set(compact('lignefraishf', 'fiches'));
    }

    public function create($id=null, $idfiche = null)
    {
        $lignefraishf = $this->Lignefraishfs->newEmptyEntity();
        if ($this->request->is('post')) {
            $lignefraishf = $this->Lignefraishfs->patchEntity($lignefraishf, $this->request->getData());
            if ($this->Lignefraishfs->save($lignefraishf)) {
                $this->Flash->success(__('Fiche de frais correctement créée'));

                return $this->redirect(['controller'=>'Fiches','action' => 'view', $idfiche]);
            }
            $this->Flash->error(__("La fiche de frais n'a pas pu être créée. Veuillez réessayer !"));
        }
        $fiches = $this->Lignefraishfs->Fiches->find('list', ['limit' => 200])->all();
        $this->set(compact('lignefraishf', 'fiches', 'id'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Lignefraishf id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null, $idfiche = null,$idetat = null)
    {   
        if ($idetat == 1) {
            $lignefraishf = $this->Lignefraishfs->get($id, [
                'contain' => ['Fiches'],
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $lignefraishf = $this->Lignefraishfs->patchEntity($lignefraishf, $this->request->getData());
                if ($this->Lignefraishfs->save($lignefraishf)) {
                    $this->Flash->success(__('Fiche de frais correctement enregistrée'));
    
                    return $this->redirect(['controller'=>'Fiches','action' => 'view', $idfiche]);
                }
                $this->Flash->error(__("La fiche de frais n'a pas pu être enregistrée. Veuillez réessayer !"));
            }
            $fiches = $this->Lignefraishfs->Fiches->find('list', ['limit' => 200])->all();
            $this->set(compact('lignefraishf', 'fiches', 'idfiche'));
        }
        else {
            $this->Flash->error(__("Impossible de modifier une fiche cloturée !"));
            if ($idfiche == null) {
                return $this->redirect(['controller'=>'Fiches','action' => 'index']);
            }
            else {
                return $this->redirect(['controller'=>'Fiches','action' => 'view', $idfiche]);
            }
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Lignefraishf id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null, $idfiche = null, $idetat = null)
    {
        if ($idetat == 1) {
            $this->request->allowMethod(['post', 'delete']);
            $lignefraishf = $this->Lignefraishfs->get($id);
            if ($this->Lignefraishfs->delete($lignefraishf)) {
                $this->Flash->success(__('Fiche de frais supprimée'));
            } else {
                $this->Flash->error(__("La fiche de frais n'a pas pu être supprimée. Veuillez réessayer !"));
            }

            return $this->redirect(['controller'=>'Fiches', 'action' => 'view', $idfiche]);
        }
        else {
            $this->Flash->error(__("Impossible de supprimer des frais sur une fiche cloturée !"));
            if ($idfiche == null) {
                return $this->redirect(['controller'=>'Fiches','action' => 'index']);
            }
            else {
                return $this->redirect(['controller'=>'Fiches','action' => 'view', $idfiche]);
            }
        }
    }
}
