<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lignefraishf $lignefraishf
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Lignefraishf'), ['action' => 'edit', $lignefraishf->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Lignefraishf'), ['action' => 'delete', $lignefraishf->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lignefraishf->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Lignefraishfs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Lignefraishf'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="lignefraishfs view content">
            <h3><?= h($lignefraishf->montant) ?></h3>
            <table>
                <tr>
                    <th><?= __('Montant') ?></th>
                    <td><?= h($lignefraishf->montant) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fraishf') ?></th>
                    <td><?= h($lignefraishf->fraishf) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($lignefraishf->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($lignefraishf->date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Fiches') ?></h4>
                <?php if (!empty($lignefraishf->fiches)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Etat Id') ?></th>
                            <th><?= __('Moisannee') ?></th>
                            <th><?= __('Nbjustificatifs') ?></th>
                            <th><?= __('Montantvalide') ?></th>
                            <th><?= __('Datemodif') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($lignefraishf->fiches as $fiches) : ?>
                        <tr>
                            <td><?= h($fiches->id) ?></td>
                            <td><?= h($fiches->user_id) ?></td>
                            <td><?= h($fiches->etat_id) ?></td>
                            <td><?= h($fiches->moisannee) ?></td>
                            <td><?= h($fiches->nbjustificatifs) ?></td>
                            <td><?= h($fiches->montantvalide) ?></td>
                            <td><?= h($fiches->datemodif) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Fiches', 'action' => 'view', $fiches->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Fiches', 'action' => 'edit', $fiches->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Fiches', 'action' => 'delete', $fiches->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fiches->id)]) ?>
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
