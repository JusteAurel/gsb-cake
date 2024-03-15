<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Fich> $fiches
 */
?>
<div class="fiches index content">
    <?= $this->Html->link(__('Nouvelle Fiche'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Fiches') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('etat_id') ?></th>
                    <th><?= $this->Paginator->sort('moisannee') ?></th>
                    <th><?= $this->Paginator->sort('montantvalide') ?></th>
                    <th><?= $this->Paginator->sort('datemodif') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($list as $fich): ?>
                <tr>
                    <td><?= $this->Number->format($fich->id) ?></td>
                    <td><?= $fich->has('etat') ? $this->Html->link($fich->etat->etat, ['controller' => 'Etats', 'action' => 'view', $fich->etat->id]) : '' ?></td>
                    <td><?= h($fich->moisannee) ?></td>
                    <td><?= h($fich->montantvalide) ?></td>
                    <td><?= h($fich->datemodif) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Voir'), ['action' => 'view', $fich->id]) ?>
                        <?= $this->Html->link(__('Modifier'), ['action' => 'edit', $fich->id]) ?>
                        <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $fich->id], ['confirm' => __('Êtes vous sûr de vouloir supprimer cette fiche ?', $fich->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('précédent')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('suivant') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} sur {{pages}}')) ?></p>
    </div>
</div>
