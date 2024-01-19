<?php
declare(strict_types=1);

namespace App\Controller;
use CakeDC\Auth\Plugin;

/**
 * Fiches Controller
 *
 * @property \App\Model\Table\FichesTable $Fiches
 * @method \App\Model\Entity\Fich[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FichesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index($id=null){
        $identity = $this->getRequest()->getAttribute('identity');
        $identity = $identity ?? [];
        $iduser = $identity["id"];
        $username = $identity["username"];
        $list = $this->Fiches->find('all', ['conditions' => ['user_id' => $iduser]])->contain(['Etats', 'Users']); //Le contain permet de charger le nom d'user et l'etat


        $this->set('list', $list);

        $this->set('showHeader', true);

        $this->paginate = [
            'contain' => ['Etats', 'Users'],
        ];
        $fiches = $this->paginate($this->Fiches);

        $this->set(compact('fiches'));
    }

    /**
     * View method
     *
     * @param string|null $id Fich id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->set('showHeader', true);
        $fich = $this->Fiches->get($id, [
            'contain' => ['Users', 'Etats', 'Lignefraisforfaits', 'Lignefraishfs'],
        ]);

        $this->set(compact('fich'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fich = $this->Fiches->newEmptyEntity();
        if ($this->request->is('post')) {
            $fich = $this->Fiches->patchEntity($fich, $this->request->getData());
            if ($this->Fiches->save($fich)) {
                $this->Flash->success(__('The fich has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fich could not be saved. Please, try again.'));
        }
        $users = $this->Fiches->Users->find('list', ['limit' => 200])->all();
        $etats = $this->Fiches->Etats->find('list', ['limit' => 200])->all();
        $lignefraisforfaits = $this->Fiches->Lignefraisforfaits->find('list', ['limit' => 200])->all();
        $lignefraishfs = $this->Fiches->Lignefraishfs->find('list', ['limit' => 200])->all();
        $this->set(compact('fich', 'users', 'etats', 'lignefraisforfaits', 'lignefraishfs'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Fich id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fich = $this->Fiches->get($id, [
            'contain' => ['Lignefraisforfaits', 'Lignefraishfs'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fich = $this->Fiches->patchEntity($fich, $this->request->getData());
            if ($this->Fiches->save($fich)) {
                $this->Flash->success(__('The fich has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fich could not be saved. Please, try again.'));
        }
        $users = $this->Fiches->Users->find('list', ['limit' => 200])->all();
        $etats = $this->Fiches->Etats->find('list', ['limit' => 200])->all();
        $lignefraisforfaits = $this->Fiches->Lignefraisforfaits->find('list', ['limit' => 200])->all();
        $lignefraishfs = $this->Fiches->Lignefraishfs->find('list', ['limit' => 200])->all();
        $this->set(compact('fich', 'users', 'etats', 'lignefraisforfaits', 'lignefraishfs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Fich id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fich = $this->Fiches->get($id);
        if ($this->Fiches->delete($fich)) {
            $this->Flash->success(__('The fich has been deleted.'));
        } else {
            $this->Flash->error(__('The fich could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function list()
    {
        $identity = $this->getRequest()->getAttribute('identity');
        $identity = $identity ?? [];
        $iduser = $identity["id"];

        $this->set('showHeader', true);

        $this->paginate = [
            'contain' => ['Etat', 'Users'],
        ];
        $fiches = $this->paginate($this->Fiches);

        $this->set(compact('fiches'));
    }
}
