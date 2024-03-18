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
                    <th><?= $this->Paginator->sort('Etat') ?></th>
                    <th><?= $this->Paginator->sort('Date') ?></th>
                    <th><?= $this->Paginator->sort('Montant Valide') ?></th>
                    <th><?= $this->Paginator->sort('Date Modif') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($list as $fich): ?>
                <tr>
                    <td><?= $this->Number->format($fich->id) ?></td>
                    <td><?= $fich->has('etat') ? $this->Html->link($fich->etat->etat, ['controller' => 'Etats', 'action' => 'view', $fich->etat->id]) : '' ?></td>
                    <td><?= h($fich->date) ?></td>
                    <td><?= h($fich->montantvalide) ?></td>
                    <td><?= h($fich->datemodif) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Voir'), ['action' => 'view', $fich->id]) ?>
                    <?php
                        if ($fich->etat_id == 1) {
                            echo $this->Html->link(__('Modifier'), ['action' => 'edit', $fich->id, $fich->etat_id]);
                            echo $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $fich->id, $fich->etat_id], ['confirm' => __('Êtes vous sûr de vouloir supprimer cette fiche ?', $fich->id)]);
                        }
                    ?>
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
