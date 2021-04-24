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

$cakeDescription = 'PharmacyMED';
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

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    
    <?= $this->Html->css(['bootstrap', 'data' ]) ?>
    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake', 'dashboard', 'fontawesome/css/all.min']) ?>
    <?= $this->Html->script(['bootstrap/bootstrap', 'jquery-3.5.1.min']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    
    
    
</head>
<body>
    <main class="main">
        <div class="container">
          <div style="margin-top: 30px; margin-bottom: 30px"> 
            <div class="top-nav-title float-left">
               <a href="<?= $this->Url->build('/') ?>"><span>Pharmacy</span>MED</a> / 
               <span style="size: 14px;">Dashboard</span>
            </div>
            <div class="top-nav-links float-right"> 
                <span class="float-left">
                    <?= $this->Html->link(__('Logout'), ['controller'=>'Administrators', 'action' => 'logout']) ?>
                </span>
                <span class="float-right">
                    <span>
                        <?php $name = $this->Identity->get('name'); ?>
                     &nbsp;  / &nbsp; <?= $name; ?>
                    </span>
                    
                </span>
            </div>
          </div>  
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
            <hr>
        </div>
    </main>
    <footer>
        <div class="text-center">
            <span>
                Copyright &copy; 2021. <b class="text-secondary">PharmacyMED.</b>
                Powered by: <b class="text-secondary">TheeSoftwares</b>
            </span>  
        </div>     
    </footer>
</body>
</html>
