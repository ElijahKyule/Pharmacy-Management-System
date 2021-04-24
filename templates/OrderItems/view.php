<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrderItem $orderItem
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Order Item'), ['action' => 'edit', $orderItem->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Order Item'), ['action' => 'delete', $orderItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderItem->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Order Items'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Order Item'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="orderItems view content">
            <h3><?= h($orderItem->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Order') ?></th>
                    <td><?= $orderItem->has('order') ? $this->Html->link($orderItem->order->id, ['controller' => 'Orders', 'action' => 'view', $orderItem->order->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Drug') ?></th>
                    <td><?= $orderItem->has('drug') ? $this->Html->link($orderItem->drug->name, ['controller' => 'Drugs', 'action' => 'view', $orderItem->drug->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Measure') ?></th>
                    <td><?= $orderItem->has('measure') ? $this->Html->link($orderItem->measure->name, ['controller' => 'Measures', 'action' => 'view', $orderItem->measure->id]) : '' ?></td>
                </tr>
                
                <tr>
                    <th><?= __('Quantity') ?></th>
                    <td><?= $this->Number->format($orderItem->quantity) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price/Item') ?></th>
                    <td><?= $orderItem->has('drug') ? $this->Html->link($orderItem->drug->price, ['controller' => 'Drugs', 'action' => 'view', $orderItem->drug->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Total') ?></th>
                    <td><?= $this->Number->format($orderItem->quantity * $orderItem->drug->price) ?></td>
                </tr>
                <tr>
                <tr>
                    <th><?= __('Administrator') ?></th>
                    <td><?= $orderItem->has('administrator') ? $this->Html->link($orderItem->administrator->name, ['controller' => 'Administrators', 'action' => 'view', $orderItem->administrator->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($orderItem->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($orderItem->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
