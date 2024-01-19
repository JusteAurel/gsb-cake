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
                __('Delete'),
                ['action' => 'delete', $fich->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $fich->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Fiches'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="fiches form content">
            <?= $this->Form->create($fich) ?>
            <fieldset>
                <legend><?= __('Edit Fich') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('etat_id', ['options' => $etats]);
                    echo $this->Form->control('moisannee');
                    echo $this->Form->control('nbjustificatifs');
                    echo $this->Form->control('montantvalide');
                    echo $this->Form->control('datemodif');
                    echo $this->Form->control('lignefraisforfaits._ids', ['options' => $lignefraisforfaits]);
                    echo $this->Form->control('lignefraishfs._ids', ['options' => $lignefraishfs]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
