<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lignefraishf $lignefraishf
 * @var \Cake\Collection\CollectionInterface|string[] $fiches
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Lignefraishfs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="lignefraishfs form content">
            <?= $this->Form->create($lignefraishf) ?>
            <fieldset>
                <legend><?= __('Add Lignefraishf') ?></legend>
                <?php
                    echo $this->Form->control('date');
                    echo $this->Form->control('montant');
                    echo $this->Form->control('fraishf');
                    echo $this->Form->control('fiches._ids', ['options' => $fiches]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
