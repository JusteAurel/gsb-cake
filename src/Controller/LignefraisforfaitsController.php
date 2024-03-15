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
                $this->Flash->success(__('Fiche de frais correctement créée'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__("La fiche de frais n'a pas pu être créée. Veuillez recommencer"));
        }
        $fraisforfaits = $this->Lignefraisforfaits->Fraisforfaits->find('list', ['limit' => 200])->all();
        $fiches = $this->Lignefraisforfaits->Fiches->find('list', ['limit' => 200])->all();
        $this->set(compact('lignefraisforfait', 'fraisforfaits', 'fiches'));
    }

    public function create($id =null)
    {
        $lignefraisforfait = $this->Lignefraisforfaits->newEmptyEntity();
        if ($this->request->is('post')) {
            $lignefraisforfait = $this->Lignefraisforfaits->patchEntity($lignefraisforfait, $this->request->getData());
            if ($this->Lignefraisforfaits->save($lignefraisforfait)) {
                $this->Flash->success(__('Fiche de frais correctement créée'));

                return $this->redirect(['controller'=>'Fiches','action' => 'view', $id]);
            }
            $this->Flash->error(__("La fiche de frais n'a pas pu être créée. Veuillez recommencer"));
        }
        $fraisforfaits = $this->Lignefraisforfaits->Fraisforfaits->find('list', ['limit' => 200])->all();
        $fiches = $this->Lignefraisforfaits->Fiches->find('list', ['limit' => 200])->all();
        $this->set(compact('lignefraisforfait', 'fraisforfaits', 'fiches','id'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Lignefraisforfait id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null, $idfiche = null, $idetat = null)
    {
        //Verifie l'etat de la fiche, si la fiche est cloturée, alors, impossible de modifier la fiche donc redirection sur autre page
        if ($idetat == 1) {
            $lignefraisforfait = $this->Lignefraisforfaits->get($id, [
                'contain' => ['Fiches'],
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $lignefraisforfait = $this->Lignefraisforfaits->patchEntity($lignefraisforfait, $this->request->getData());
                if ($this->Lignefraisforfaits->save($lignefraisforfait)) {
                    $this->Flash->success(__('Frais correctement enregistré'));
    
                    return $this->redirect(['controller'=>'Fiches','action' => 'view', $idfiche]);
                }
                $this->Flash->error(__("Le frais n'a pas pu être correctement enregistré. Veuillez recommencer"));
            }
            $fraisforfaits = $this->Lignefraisforfaits->Fraisforfaits->find('list', ['limit' => 200])->all();
            $fiches = $this->Lignefraisforfaits->Fiches->find('list', ['limit' => 200])->all();
            $this->set(compact('lignefraisforfait', 'fraisforfaits', 'fiches', 'id'));
        }
        else {
            $this->Flash->error(__("Vous ne pouvez pas modifier une fiche cloturée."));
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
     * @param string|null $id Lignefraisforfait id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null, $idfiche=null, $idetat = null)
    {
        if ($idetat == 1) {
            $this->request->allowMethod(['get', 'delete']);
            $lignefraisforfait = $this->Lignefraisforfaits->get($id);
            if ($this->Lignefraisforfaits->delete($lignefraisforfait)) {
                $this->Flash->success(__('Frais correctement supprimé'));
            } else {
                $this->Flash->error(__("Le frais n'a pas pu être correctement supprimé. Veuillez réessayer !"));
            }

            return $this->redirect(['controller'=>'Fiches', 'action' => 'view', $idfiche]);
        }
        else {
            $this->Flash->error(__("Impossible de supprimer une fiche cloturée !"));
            if ($idfiche == null) {
                return $this->redirect(['controller'=>'Fiches','action' => 'index']);
            }
            else {
                return $this->redirect(['controller'=>'Fiches','action' => 'view', $idfiche]);
            }
        }
    }
}
