<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Fich> $fiches
 */
?>
<div class="fiches index content">
    <?php
    if ($role == 'user') {
        echo $this->Html->link(__('New Fich'), ['action' => 'add'], ['class' => 'button float-right']);
    }
    ?>
    <h3><?= __('Fiches') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('Utilisateur') ?></th>
                    <th><?= $this->Paginator->sort('Etat') ?></th>
                    <th><?= $this->Paginator->sort('Mois Année') ?></th>
                    <th><?= $this->Paginator->sort('Montant Valide') ?></th>
                    <th><?= $this->Paginator->sort('Date Modif') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($fiches as $fich): ?>
                    <!-- Tant que les fiches des utilisateurs ne sont pas cloturées, alors le comptable ne peut pas voir les fiches. -->
                    <?php 
                        if (h($fich->etat_id) != 1) { ?>
                            <tr>
                                <td><?= $this->Number->format($fich->id) ?></td>
                                <td><?= $fich->has('user') ? $this->Html->link($fich->user->username, ['controller' => 'Users', 'action' => 'view', $fich->user->id]) : '' ?></td>
                                <td><?= $fich->has('etat') ? $this->Html->link($fich->etat->etat, ['controller' => 'Etats', 'action' => 'view', $fich->etat->id]) : '' ?></td>
                                <td><?= h($fich->moisannee) ?></td>
                                <td><?= h($fich->montantvalide) ?></td>
                                <td><?= h($fich->datemodif) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('Voir'), ['action' => 'view', $fich->id]) ?>
                                </td>
                            </tr>
                    <?php
                        }
                    ?>
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
