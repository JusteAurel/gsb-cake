<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fich $fich
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Fich'), ['action' => 'edit', $fich->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Fich'), ['action' => 'delete', $fich->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fich->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Fiches'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Fich'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="fiches view content">
            <h3><?= h($fich->moisannee) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $fich->has('user') ? $this->Html->link($fich->user->username, ['controller' => 'Users', 'action' => 'view', $fich->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Etat') ?></th>
                    <td><?= $fich->has('etat') ? $this->Html->link($fich->etat->etat, ['controller' => 'Etats', 'action' => 'view', $fich->etat->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Moisannee') ?></th>
                    <td><?= h($fich->moisannee) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nbjustificatifs') ?></th>
                    <td><?= h($fich->nbjustificatifs) ?></td>
                </tr>
                <tr>
                    <th><?= __('Montantvalide') ?></th>
                    <td><?= h($fich->montantvalide) ?></td>
                </tr>
                <tr>
                    <th><?= __('Datemodif') ?></th>
                    <td><?= h($fich->datemodif) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($fich->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Lignefraisforfaits') ?></h4>
                <?php if (!empty($fich->lignefraisforfaits)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Fraisforfait Id') ?></th>
                            <th><?= __('Quantite') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($fich->lignefraisforfaits as $lignefraisforfaits) : ?>
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
            <div class="related">
                <h4><?= __('Related Lignefraishfs') ?></h4>
                <?php if (!empty($fich->lignefraishfs)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Date') ?></th>
                            <th><?= __('Montant') ?></th>
                            <th><?= __('Fraishf') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($fich->lignefraishfs as $lignefraishfs) : ?>
                        <tr>
                            <td><?= h($lignefraishfs->id) ?></td>
                            <td><?= h($lignefraishfs->date) ?></td>
                            <td><?= h($lignefraishfs->montant) ?></td>
                            <td><?= h($lignefraishfs->fraishf) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Lignefraishfs', 'action' => 'view', $lignefraishfs->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Lignefraishfs', 'action' => 'edit', $lignefraishfs->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Lignefraishfs', 'action' => 'delete', $lignefraishfs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lignefraishfs->id)]) ?>
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
