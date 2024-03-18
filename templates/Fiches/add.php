<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fich $fich
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $etats
 * @var \Cake\Collection\CollectionInterface|string[] $lignefraisforfaits
 * @var \Cake\Collection\CollectionInterface|string[] $lignefraishfs
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Liste Fiches'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="fiches form content">
            <?= $this->Form->create($fich) ?>
            <fieldset>
                <legend><?= __('Ajouter une Fiche') ?></legend>
                <?php
                //Ne prends pas en compte Utilisateur et etat --> Field "user_id" not default value
                    $this->Form->control('user_id', ['options' => $users, 'value'=> $iduser]);
                    $this->Form->control('etat_id', ['options' => $etats, 'value' => 1]);
                    echo $this->Form->control('date', ['label'=>'Date de Fiche']);
                    echo $this->Form->control('montantvalide', ['label'=>'Montant Valide']);
                    $this->Form->control('datemodif', ['label'=>'Date de Modif', 'value'=>$date]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Envoyer')) ?>
            <?= $this->Form->end() ?>
            
        </div>
    </div>
</div>
