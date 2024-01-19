<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Lignefraisforfait> $lignefraisforfaits
 */
?>
<div class="lignefraisforfaits index content">
    <?= $this->Html->link(__('New Lignefraisforfait'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Lignefraisforfaits') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('fraisforfait_id') ?></th>
                    <th><?= $this->Paginator->sort('quantite') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lignefraisforfaits as $lignefraisforfait): ?>
                <tr>
                    <td><?= $this->Number->format($lignefraisforfait->id) ?></td>
                    <td><?= $lignefraisforfait->has('fraisforfait') ? $this->Html->link($lignefraisforfait->fraisforfait->montant, ['controller' => 'Fraisforfaits', 'action' => 'view', $lignefraisforfait->fraisforfait->id]) : '' ?></td>
                    <td><?= h($lignefraisforfait->quantite) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $lignefraisforfait->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $lignefraisforfait->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $lignefraisforfait->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lignefraisforfait->id)]) ?>
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
