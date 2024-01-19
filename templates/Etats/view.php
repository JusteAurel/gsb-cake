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
            <?= $this->Html->link(__('Edit Etat'), ['action' => 'edit', $etat->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Etat'), ['action' => 'delete', $etat->id], ['confirm' => __('Are you sure you want to delete # {0}?', $etat->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Etats'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Etat'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="etats view content">
            <h3><?= h($etat->etat) ?></h3>
            <table>
                <tr>
                    <th><?= __('Etat') ?></th>
                    <td><?= h($etat->etat) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($etat->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Fiches') ?></h4>
                <?php if (!empty($etat->fiches)) : ?>
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
                        <?php foreach ($etat->fiches as $fiches) : ?>
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
