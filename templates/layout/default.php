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
    <?= $this->Html->css(['normalize.min', 'milligram.min','cake', 'dashboard']) ?>
    <?= $this->Html->script(['bootstrap/bootstrap', 'jquery-3.5.1.min']) ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    
    
    
</head>
<body>
    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/') ?>"><span>Pharmacy</span>MED</a>
        </div>
        <div class="top-nav-links">
            <?= $this->Html->link(__('Dashboard'), ['controller'=>'Pages', 'action' => 'home']) ?>
            <?= $this->Html->link(__('Items'), ['controller'=>'Drugs', 'action' => 'index']) ?>
            <?= $this->Html->link(__('Clients'), ['controller'=>'Clients', 'action' => 'index']) ?>
            <?= $this->Html->link(__('Suppliers'), ['controller'=>'Suppliers', 'action' => 'index']) ?>
            <?= $this->Html->link(__('Orders'), ['controller'=>'Orders', 'action' => 'index']) ?>
            <?= $this->Html->link(__('Stocks'), ['controller'=>'Stocks', 'action' => 'index']) ?>
            <?= $this->Html->link(__('Measures'), ['controller'=>'Measures', 'action' => 'index']) ?>
            <?= $this->Html->link(__('Logout'), ['controller'=>'Administrators', 'action' => 'logout']) ?>
        </div>
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
            <br><br>
        </div>
    </main>
    <footer>
        <div class="text-center">
            <span >
                Copyright &copy; 2021. <b class="text-secondary">PharmacyMED.</b>
                Powered by: <b class="text-secondary">TheeSoftwares</b>
            </span>  
        </div>     
    </footer>
</body>
</html>
<script>
  $(function($) {
    $('#example1').DataTable();
  });
</script>
