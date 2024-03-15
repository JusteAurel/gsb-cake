<?php
    /**
     * @var \App\View\AppView $this
     * @var \App\Model\Entity\Lignefraisforfait $lignefraisforfait
     * @var \Cake\Collection\CollectionInterface|string[] $fraisforfaits
     * @var \Cake\Collection\CollectionInterface|string[] $fiches
     */

$idfiche = $_GET['titrefiche'];

?>

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Liste Lignefraisforfaits'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="lignefraisforfaits form content">
            <?php
                    echo $this->Form->create($lignefraisforfait) ?>
                <fieldset>
                    <legend><?= __('Add Lignefraisforfait') ?></legend>
                    <?php
                        echo $this->Form->control('fraisforfait_id', ['options' => $fraisforfaits]);
                        echo $this->Form->control('quantite');
                        echo $this->Form->control('Titre Fiche', ['options' => $fiches]);                    
                    ?>
                </fieldset>
                <?= $this->Form->button(__('Submit')) ?>
                <?= $this->Form->end()?>
            
        </div>
    </div>
</div>
