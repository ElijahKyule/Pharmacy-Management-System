<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Order'), ['action' => 'edit', $order->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Order'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Orders'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Order'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="orders view content">
            <h3><?= h($order->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Client') ?></th>
                    <td><?= $order->has('client') ? $this->Html->link($order->client->name, ['controller' => 'Clients', 'action' => 'view', $order->client->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Administrator') ?></th>
                    <td><?= $order->has('administrator') ? $this->Html->link($order->administrator->name, ['controller' => 'Administrators', 'action' => 'view', $order->administrator->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($order->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Order Date') ?></th>
                    <td><?= h($order->order_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($order->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($order->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Order Items') ?></h4>
                <?= $this->Html->link(__('Add Item'), ['controller'=>'OrderItems', 'action' => 'add', 
                $order->id]) ?>
                <?php if (!empty($order->order_items)) : ?>
                <div class="table-responsive">
                    <table>
                      <thead>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Drug') ?></th>
                            <th><?= __('Quantity') ?></th>
                            <th><?= __('Price') ?></th>
                            <th><?= __('Subtotal') ?></th>
                            <th><?= __('Measure') ?></th>
                            <th><?= __('Administrator') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $quantityTotal = 0;
                        $priceTotal = 0;
                        $generalTotal = 0;
                        foreach ($order->order_items as $orderItems) : ?>
                        <tr>
                            <td><?= h($orderItems->id) ?></td>
                            <td><?= h($orderItems->drug->name) ?></td>
                            <td><?= h($orderItems->quantity) ?></td>
                            <td><?= h($orderItems->drug->price) ?></td>
                            <td><?= h($orderItems->drug->price*$orderItems->quantity) ?></td>
                            <td><?= h($orderItems->measure->name) ?></td>
                            <td><?= h($orderItems->administrator->name) ?></td>
                            <td><?= h($orderItems->created) ?></td>
                            <td><?= h($orderItems->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'OrderItems', 'action' => 'view', $orderItems->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'OrderItems', 'action' => 'edit', $orderItems->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'OrderItems', 'action' => 'delete', $orderItems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderItems->id)]) ?>
                            </td>
                            <?php
                            $quantityTotal = $quantityTotal + ($orderItems->quantity);
                            $priceTotal = $priceTotal + ($orderItems->drug->price);
                            $generalTotal = $generalTotal + ($orderItems->drug->price*$orderItems->quantity);
                            ?>
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                      <tfoot>
                        <tr>
                            <th><?= __('Totals:') ?></th>
                            <th><?= __('') ?></th>
                            <th><?= __($quantityTotal) ?></th>
                            <th><?= __('Kshs '.$priceTotal) ?></th>
                            <th><?= __('Kshs '.$generalTotal) ?></th>
                            <th><?= __('') ?></th>
                            <th><?= __('') ?></th>
                            <th><?= __('') ?></th>
                            <th><?= __('') ?></th>
                            <th ><?= __('') ?></th>
                        </tr>
                      </tfoot>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
