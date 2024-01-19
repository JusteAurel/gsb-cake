<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lignefraisforfait $lignefraisforfait
 * @var string[]|\Cake\Collection\CollectionInterface $fraisforfaits
 * @var string[]|\Cake\Collection\CollectionInterface $fiches
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $lignefraisforfait->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $lignefraisforfait->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Lignefraisforfaits'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="lignefraisforfaits form content">
            <?= $this->Form->create($lignefraisforfait) ?>
            <fieldset>
                <legend><?= __('Edit Lignefraisforfait') ?></legend>
                <?php
                    echo $this->Form->control('fraisforfait_id', ['options' => $fraisforfaits]);
                    echo $this->Form->control('quantite');
                    echo $this->Form->control('fiches._ids', ['options' => $fiches]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
