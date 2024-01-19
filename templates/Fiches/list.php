<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Fich> $fiches
 */
?>
<div class="fiches index content">
    <?= $this->Html->link(__('New Fich'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Fiches') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nbJustificatif') ?></th>
                    <th><?= $this->Paginator->sort('montantValide') ?></th>
                    <th><?= $this->Paginator->sort('dateModif') ?></th>
                    <th><?= $this->Paginator->sort('mois') ?></th>
                    <th><?= $this->Paginator->sort('annee') ?></th>
                    <th><?= $this->Paginator->sort('etat_id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($fiches as $fich): ?>
                <tr>
                    <td><?= $this->Number->format($fich->id) ?></td>
                    <td><?= $this->Number->format($fich->nbJustificatif) ?></td>
                    <td><?= $this->Number->format($fich->montantValide) ?></td>
                    <td><?= h($fich->dateModif) ?></td>
                    <td><?= h($fich->mois) ?></td>
                    <td><?= $this->Number->format($fich->annee) ?></td>
                    <td><?= $fich->has('etat') ? $this->Html->link($fich->etat->libelle, ['controller' => 'Etat', 'action' => 'view', $fich->etat->id]) : '' ?></td>
                    <td><?= $fich->has('user') ? $this->Html->link($fich->user->username, ['controller' => 'Users', 'action' => 'view', $fich->user->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $fich->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fich->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fich->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fich->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>


<div>
    <h3>Mes Fiches</h3>
</div>