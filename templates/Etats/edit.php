<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Etat $etat
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $etat->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $etat->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Etats'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="etats form content">
            <?= $this->Form->create($etat) ?>
            <fieldset>
                <legend><?= __('Edit Etat') ?></legend>
                <?php
                    echo $this->Form->control('etat');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
