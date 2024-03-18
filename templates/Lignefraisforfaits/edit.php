<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lignefraisforfait $lignefraisforfait
 * @var string[]|\Cake\Collection\CollectionInterface $fraisforfaits
 * @var string[]|\Cake\Collection\CollectionInterface $fiches
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="lignefraisforfaits form content">
            <?= $this->Form->create($lignefraisforfait) ?>
            <fieldset>
                <legend><?= __('Modifier Ligne frais forfait') ?></legend>
                <?php
                    echo $this->Form->control('fraisforfait_id', ['options' => $fraisforfaits]);
                    echo $this->Form->control('quantite');
                    //Affiche tout en bloquant la possibilité de changer de fiche
                    $this->Form->fieldset('fiches_ids', ['options' => $fiches, 'value'=>$id]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Valider')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
