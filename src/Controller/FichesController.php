<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Mailer\Email;
use Cake\Mailer\Mailer;
use Cake\Mailer\TransportFactory;
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
        $identity = $this->getRequest()->getAttribute('identity');
        $identity = $identity ?? [];
        $role = $identity['role'];

        $this->set('showHeader', true);
        $fich = $this->Fiches->get($id, [
        'contain' => ['Users', 'Etats', 'Lignefraisforfaits', 'Lignefraishfs', 'Lignefraisforfaits.Fraisforfaits'],
        ]);
        
        //Récupérer toutes les informations de la table FraisForfait et les mettre dans la variable $fraisforfait
        $fraisforfait = $this->Fiches->Lignefraisforfaits->Fraisforfaits->find('All');
        $this->set(compact('fich', 'fraisforfait', 'role'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {        
        $identity = $this->getRequest()->getAttribute('identity');
        $identity = $identity ?? [];
        $iduser = $identity["id"];

        $fich = $this->Fiches->newEmptyEntity();
        if ($this->request->is('post')) {
            $fich = $this->Fiches->patchEntity($fich, $this->request->getData());

            $fich->user_id = $iduser;
            $fich->etat_id = 1;

            if ($this->Fiches->save($fich)) {
                $this->Flash->success(__('Votre fiche a été ajoutée'));
                $idfiche = $fich->id;

                return $this->redirect(['controller'=>'Lignefraisforfaits', 'action'=>'create', $idfiche]);
            }
            $this->Flash->error(__('La fiche ne peut être ajoutée. Veuillez réessayer !'));
        }

        $users = $this->Fiches->Users->find('list', ['limit' => 200])->all();
        $etats = $this->Fiches->Etats->find('list', ['limit' => 200])->all();
        $lignefraisforfaits = $this->Fiches->Lignefraisforfaits->Fraisforfaits->find('list', ['limit' => 200])->all();
        $lignefraishfs = $this->Fiches->Lignefraishfs->find('list', ['limit' => 200])->all();


        $this->set(compact('fich', 'users', 'etats', 'lignefraisforfaits', 'lignefraishfs', 'iduser'));
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
            $this->Flash->success(__('La fiche a été correctement supprimé'));
        } else {
            $this->Flash->error(__("La Fiche n'a pas pu être supprimée"));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function list()
    {
        $identity = $this->getRequest()->getAttribute('identity');
        $identity = $identity ?? [];
        $iduser = $identity["id"];
        $role = $identity['role'];

        $this->set('showHeader', true);

        $this->paginate = [
            'contain' => ['Etats', 'Users'],
        ];
        $fiches = $this->paginate($this->Fiches);

        $this->set(compact('fiches', 'role'));
    }

    //Permet à l'utilisateur de cloturer sa fiche
    public function cloturefich($id = null, $idetat = null)
    {
        if ($idetat == 1) {
            $fich = $this->Fiches;
            $query=$fich->query();
            $query->update()
            ->set(['etat_id' => 2])
            ->where(['id' => $id])
            ->execute();
            $this->Flash->success(__('Fiche Cloturée !'));
        }
        else {
            $this->Flash->error(__("La Fiche n'a pas pu être cloturée. Si la fiche a déjà été cloturée ou qu'elle a été validée, vous ne pouvez plus la cloturer."));
        }
        return $this->redirect(['action' => 'view', $id]);
    }

    //Une fois cloturée, le comptable peut voir la fiche et la valider.
    public function validatefich($id = null, $idetat = null)
    {
        if ($idetat == 2) {
            $fich = $this->Fiches;
            $query=$fich->query();
            $query->update()
            ->set(['etat_id' => 3])
            ->where(['id' => $id])
            ->execute();
            $this->Flash->success(__('Fiche Validée !'));
            return $this->redirect(['action' => 'view', $id]);
        }
        else{
            $this->Flash->error(__("La Fiche n'a pas pu être validée. La fiche n'a peut être pas encore été cloturée, ou a déjà été validée."));
            return $this->redirect(['action' => 'view', $id]);
        }
    }

    //Envoie de mail de confirmation
    // public function infomail($id = null, $nfiche = null)
    // {
    //     $identity = $this->getRequest()->getAttribute('identity');
    //     $identity = $identity ?? [];
    //     $nom = $identity['last_name'];

    //     // Mailer::deliver('aurelienwiart154@gmail.com');

    //     // // $mailer = new Mailer();
    //     // // $mailer->setProfile('default');

    //     $mailer = new Mailer('default');
    //     $mailer->setFrom(['aurelienwiart24@gmail.com' => 'Mon Site'])
    //     ->setTo('aurelienwiart154@gmail.com')
    //     ->setSubject('Informations Validation Fiche')
    //     ->setViewVars("Fiche Validée")
    //     ->deliver();

    //     return $this->redirect(['action' => 'view', $nfiche]);
        
    // }
}
