<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fich $fich
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $etats
 * @var string[]|\Cake\Collection\CollectionInterface $lignefraisforfaits
 * @var string[]|\Cake\Collection\CollectionInterface $lignefraishfs
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Supprimer'),
                ['action' => 'delete', $fich->id],
                ['confirm' => __('Êtes vous sûr de vouloir supprimer cette fiche ?', $fich->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Liste Fiches'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="fiches form content">
            <?= $this->Form->create($fich) ?>
            <fieldset>
                <legend><?= __('Editer une fiche') ?></legend>
                <?php
                    echo $this->Form->hidden('user_id', ['label'=>'Utilisateur', 'options' => $users]);
                    echo $this->Form->hidden('etat_id', ['options' => $etats]);
                    echo $this->Form->control('moisannee', ['label'=>'Mois Année']);
                    echo $this->Form->control('montantvalide', ['label'=>'Montant Valide']);
                    echo $this->Form->control('datemodif', ['label'=>'Date de modification']);
                    //echo $this->Form->control('lignefraisforfaits._ids', ['options' => $lignefraisforfaits]);
                    //echo $this->Form->control('lignefraishfs._ids', ['options' => $lignefraishfs]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Valider')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
