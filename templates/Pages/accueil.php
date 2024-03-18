<?= $this->Html->css('accueil') ?>
<h1><u>Espace Utilisateur de "<?= $username ?>"<u></h1>

<?php
if ($role == "user") {
    echo $this->Html->link(__('Voir mes Fiches'), ['controller'=>'Fiches', 'action' => 'index'], ['class' => 'lien']);
    echo $this->Html->link(__('Nouvelle Fiche'), ['controller'=>'Fiches', 'action' => 'add'], ['class' => 'lien']);
}
else {
    echo $this->Html->link(__('Voir Fiches Utilisateurs'), ['controller'=>'Fiches', 'action' => 'list'], ['class' => 'lien']);
}
