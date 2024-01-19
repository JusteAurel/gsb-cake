<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Etat> $etats
 */
?>
<div class="etats index content">
    <?= $this->Html->link(__('New Etat'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Etats') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('etat') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($etats as $etat): ?>
                <tr>
                    <td><?= $this->Number->format($etat->id) ?></td>
                    <td><?= h($etat->etat) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $etat->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $etat->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $etat->id], ['confirm' => __('Are you sure you want to delete # {0}?', $etat->id)]) ?>
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
