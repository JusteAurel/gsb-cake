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

$cakeDescription = 'CakePHP: the rapid development php framework';
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
            <a href="<?= $this->Url->build('/') ?>"><span>Cake</span>PHP</a>
        </div>
        <div class="top-nav-links">
        <?php
            if (isset($showHeader) && $showHeader):
                echo $this->Html->Link('Accueil', ['plugin' => NULL, 'controller' => 'Pages', 'action' => 'accueil']);
                echo $this->Html->Link('Users', ['plugin' => 'CakeDC/Users','controller' => 'Users', 'action' => 'index']);
                echo $this->Html->Link('Mes fiches', ['plugin' => null, 'controller' => 'Fiches', 'action' => 'index']);
                echo $this->Html->Link('Lignes de Frais', ['plugin' => NULL, 'controller' => 'Lignefraisforfaits', 'action' => 'index']);
                echo $this->Html->Link('Lignes de Frais HF', ['plugin' => NULL, 'controller' => 'Lignefraishfs', 'action' => 'index']);
                echo $this->Html->Link('Se déconnecter' , ['plugin' => 'CakeDC/Users', 'controller' => 'Users', 'action' => 'logout'], ['onclick' => "  return confirm('Etes-vous sûr de vouloir vous déconnecter ?')"]);
            endif;
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
