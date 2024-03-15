<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'GSB';

//Récupération des informations de l'utilisateur + récupération du role
$identity = $this->getRequest()->getAttribute('identity');
$identity = $identity ?? [];
if (!empty($identity)) {
    $role = $identity["role"];
}


?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/') ?>"><span>G</span>S<span>B</span></a>
        </div>
        <div class="top-nav-links">
        <?php
            if (isset($role)) {
                echo $this->Html->Link('Accueil', ['plugin' => NULL, 'controller' => 'Pages', 'action' => 'accueil']);
                if ($role == "comptable") {
                    if (isset($showHeader) && $showHeader):
                        echo $this->Html->Link('Fiches Utilisateurs', ['plugin' => null, 'controller' => 'Fiches', 'action' => 'list']);
                    endif;
                }
                else if ($role == "user") {
                    if (isset($showHeader) && $showHeader):
                        echo $this->Html->Link('Mes fiches', ['plugin' => null, 'controller' => 'Fiches', 'action' => 'index']);
                    endif;
                }
                echo $this->Html->Link('Profil', ['plugin' => 'CakeDC/Users', 'controller' => 'Users', 'action' => 'profile']);
                echo $this->Html->Link('Se déconnecter' , ['plugin' => 'CakeDC/Users', 'controller' => 'Users', 'action' => 'logout'], ['onclick' => "  return confirm('Etes-vous sûr de vouloir vous déconnecter ?')"]);
            }           
        ?>

        </div>
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>
