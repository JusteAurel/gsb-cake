<?php
    /**
     * @var \App\View\AppView $this
     * @var \App\Model\Entity\Fich $fich
     */


$idfiche= $fich->id;   
$totalff = 0;
$totalhf = 0;

//Variable prenant l'id de l'état
$idetat = $fich->etat_id;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Fiche <?= h($fich->date)?> </title>
</head>
<body>
    <div class="row">
        <?php
            if ($role == "user") { ?>
                <aside class="column">
                <div class="side-nav">
                    <h4 class="heading"><?= __('Actions') ?></h4>
                    <?php
                    if ($idetat == 1) { ?>
                        <?= $this->Html->link(__('Modifier Fiche'), ['action' => 'edit', $fich->id], ['class' => 'side-nav-item']) ?>
                        <?= $this->Form->postLink(__('Supprimer Fiche'), ['action' => 'delete', $fich->id, $fich->etat_id], ['confirm' => __('Voulez vous réellement supprimer la fiche n°{0}?', $fich->id), 'class' => 'side-nav-item']) ?>
                    <?php             } ?>
                    <?= $this->Html->link(__('Liste Fiches'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('Nouvelle Fiche'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
                </div>
                </aside>
        <?php
            } 
        ?>
        <div class="column-responsive column-80">
            <div class="fiches view content">
                <h3><?= h($fich->date) ?></h3>
                <?php
                //Si il s'agit d'un comptable et que la fiche est en état "cloturée", alors le bouton de validation est visible 
                if ($role == "comptable" && $idetat == 2) { 
                    //Envoie sur la méthode validatefich() du controller Fiches, avec deux parametres, l'id de fiche et l'id de l'état. 
                    echo $this->Html->link('Valider Fiche', ['plugin' => NULL, 'controller' => 'Fiches', 'action' => 'validatefich', $fich->id, $fich->etat_id], ['class' => 'button float-right']);
                }
                //Si il s'agit d'un utilisateut et que la fiche est en état "créée", alors le bouton de cloture est visible 
                else if ($role == "user" && $idetat == 1) {
                    //Envoie sur la méthode cloturefich() du controller Fiches, avec deux parametres, l'id de fiche et l'id de l'état.
                    echo $this->Html->link('Cloturer Fiche', ['plugin' => NULL, 'controller' => 'Fiches', 'action' => 'cloturefich', $fich->id, $fich->etat_id], ['class' => 'button float-right']); 
                }
                ?>
                <table>
                    <tr>
                        <th><?= __('Utilisateur') ?></th>
                        <td><?= $fich->has('user') ? $this->Html->link($fich->user->username, ['controller' => 'Users', 'action' => 'view', $fich->user->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Etat de la fiche') ?></th>
                        <td><?= $fich->has('etat') ? $this->Html->link($fich->etat->etat, ['controller' => 'Etats', 'action' => 'view', $fich->etat->id]) : '' ?></td>
                    </tr>
                </table>
                <div class="related">
                    <h4><?= __('Ligne Frais Forfaits') ?></h4>
                    <?php
                    if ($role == "user" && $idetat == 1) { ?>
                            <?= $this->Html->link('Ajouter un frais forfait', ['plugin' => NULL, 'controller' => 'Lignefraisforfaits', 'action' => 'create', $fich->id], ['class' => 'button float-right']); ?>
                    <?php
                    } 
                    ?>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('Id') ?></th>
                                <th><?= __('Nom') ?></th>
                                <th><?= __('Quantité') ?></th>
                                <th><?= __('Montant Unitaire') ?></th>
                                <th><?= __('Total') ?></th>
                                <?php
                                if ($role == "user" && $idetat == 1) { ?>
                                    <th class="actions"><?= __('Actions') ?></th>
                                <?php
                                } 
                                ?>
                            </tr>

                            <?php foreach ($fich->lignefraisforfaits as $fraisf) : ?>
                            <tr>
                                <td><?= h($fraisf->id) ?></td>
                                <td><?= h($fraisf->fraisforfait->label) ?></td>
                                <td><?= h($fraisf->quantite) ?></td>
                                <td><?= h($fraisf->fraisforfait->montant) ?></td>
                                <td><?= ($this->Number->format($fraisf->quantite)*h($fraisf->fraisforfait->montant)) ?></td>
                                <?php
                                //Si c'est un utilisateur et que la fiche n'est pas cloturée, alors on peut modifier
                                if ($role == "user" && $idetat == 1) { ?>
                                    <td class="actions">
                                    <?= $this->Html->link(__('Modifier'), ['controller' => 'Lignefraisforfaits','action' => 'edit', $fraisf->id, $idfiche, $idetat]) ?>
                                    <?= $this->Html->link(__('Supprimer'), ['controller' => 'Lignefraisforfaits','action' => 'delete', $fraisf->id, $idfiche, $idetat]) ?>
                                    </td>
                                <?php
                                } 
                                ?>
                                
                            </tr>
                            <?php $totalff += ($this->Number->format($fraisf->quantite)*h($fraisf->fraisforfait->montant)) ?>
                            <?php endforeach;?>
                        </table>
                    </div>
                    <?= 'Total Frais Forfait : '.$totalff ?>
                </div>
                <div class="related">
                    <h4><?= __('Ligne Frais Hors Forfaits',) ?></h4>
                    <?php
                                if ($role == "user" && $idetat == 1) { ?>
                                    <?= $this->Html->link('Ajouter un frais Hors forfait', ['plugin' => NULL, 'controller' => 'Lignefraishfs', 'action' => 'create', $idfiche], ['class' => 'button float-right']); ?>
                                <?php
                                } 
                                ?>
                    <?php if (!empty($fich->lignefraishfs)) : ?>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('Id') ?></th>
                                <th><?= __('Date') ?></th>
                                <th><?= __('Montant') ?></th>
                                <th><?= __('Libellé') ?></th>
                                <?php
                                if ($role == "user" && $idetat == 1) { ?>
                                    <th class="actions"><?= __('Actions') ?></th>
                                <?php
                                } 
                                ?>
                            </tr>
                            <?php foreach ($fich->lignefraishfs as $lignefraishfs) : ?>
                            <tr>
                                <td><?= h($lignefraishfs->id) ?></td>
                                <td><?= h($lignefraishfs->date) ?></td>
                                <td><?= h($lignefraishfs->montant) ?></td>
                                <td><?= h($lignefraishfs->label) ?></td>
                                <?php
                                if ($role == "user" && $idetat == 1) { ?>
                                    <td class="actions">
                                        <?= $this->Html->link(__('Modifier'), ['controller' => 'Lignefraishfs', 'action' => 'edit', $lignefraishfs->id, $idfiche, $idetat]) ?>
                                        <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Lignefraishfs', 'action' => 'delete', $lignefraishfs->id, $idfiche, $idetat], ['confirm' => __('Êtes vous sûr de vouloir supprimer ce frais ?', $lignefraishfs->id)]) ?>
                                    </td>
                                <?php
                                } 
                                ?>
                            </tr>
                            <?php $totalhf+=h($lignefraishfs->montant); ?>
                            <?php endforeach; ?>
                        </table>
                    </div>
                    <?php endif; ?>
                    <?= "Total Frais Hors Forfait : ".$totalhf?><br/>
                    <?= "Total : ".$totalhf + $totalff ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>