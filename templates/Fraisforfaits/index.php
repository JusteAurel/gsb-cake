<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Fraisforfait> $fraisforfaits
 */
?>
<div class="fraisforfaits index content">
    <?= $this->Html->link(__('New Fraisforfait'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Fraisforfaits') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('montant') ?></th>
                    <th><?= $this->Paginator->sort('fraisforfait') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($fraisforfaits as $fraisforfait): ?>
                <tr>
                    <td><?= $this->Number->format($fraisforfait->id) ?></td>
                    <td><?= h($fraisforfait->montant) ?></td>
                    <td><?= h($fraisforfait->fraisforfait) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $fraisforfait->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fraisforfait->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fraisforfait->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fraisforfait->id)]) ?>
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
