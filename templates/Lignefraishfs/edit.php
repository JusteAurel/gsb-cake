<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lignefraishf $lignefraishf
 * @var string[]|\Cake\Collection\CollectionInterface $fiches
 */
?>
<div class="row">
    <!-- <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Supprimer'),
                ['action' => 'delete', $lignefraishf->id],
                ['confirm' => __('Êtes vous sûr de vouloir supprimer ce frais ?', $lignefraishf->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Liste Ligne frais Hors Forfaits'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside> -->
    <div class="column-responsive column-80">
        <div class="lignefraishfs form content">
            <?= $this->Form->create($lignefraishf) ?>
            <fieldset>
                <legend><?= __('Modifier Ligne de Frais Hors forfait') ?></legend>
                <?php
                    echo $this->Form->control('date');
                    echo $this->Form->control('montant');
                    echo $this->Form->control('label', ['label'=>'Libellé']);
                    echo $this->Form->hidden('fiches._ids', ['name'=>'fiches[_ids][]', 'value'=>$idfiche]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Valider')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
