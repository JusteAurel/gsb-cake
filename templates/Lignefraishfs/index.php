<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Lignefraishf> $lignefraishfs
 */
?>
<div class="lignefraishfs index content">
    <?= $this->Html->link(__('New Lignefraishf'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Lignefraishfs') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('date') ?></th>
                    <th><?= $this->Paginator->sort('montant') ?></th>
                    <th><?= $this->Paginator->sort('fraishf') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lignefraishfs as $lignefraishf): ?>
                <tr>
                    <td><?= $this->Number->format($lignefraishf->id) ?></td>
                    <td><?= h($lignefraishf->date) ?></td>
                    <td><?= h($lignefraishf->montant) ?></td>
                    <td><?= h($lignefraishf->fraishf) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $lignefraishf->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $lignefraishf->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $lignefraishf->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lignefraishf->id)]) ?>
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
