<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fraisforfait $fraisforfait
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Fraisforfait'), ['action' => 'edit', $fraisforfait->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Fraisforfait'), ['action' => 'delete', $fraisforfait->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fraisforfait->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Fraisforfaits'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Fraisforfait'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="fraisforfaits view content">
            <h3><?= h($fraisforfait->montant) ?></h3>
            <table>
                <tr>
                    <th><?= __('Montant') ?></th>
                    <td><?= h($fraisforfait->montant) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fraisforfait') ?></th>
                    <td><?= h($fraisforfait->fraisforfait) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($fraisforfait->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Lignefraisforfaits') ?></h4>
                <?php if (!empty($fraisforfait->lignefraisforfaits)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Fraisforfait Id') ?></th>
                            <th><?= __('Quantite') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($fraisforfait->lignefraisforfaits as $lignefraisforfaits) : ?>
                        <tr>
                            <td><?= h($lignefraisforfaits->id) ?></td>
                            <td><?= h($lignefraisforfaits->fraisforfait_id) ?></td>
                            <td><?= h($lignefraisforfaits->quantite) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Lignefraisforfaits', 'action' => 'view', $lignefraisforfaits->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Lignefraisforfaits', 'action' => 'edit', $lignefraisforfaits->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Lignefraisforfaits', 'action' => 'delete', $lignefraisforfaits->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lignefraisforfaits->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
