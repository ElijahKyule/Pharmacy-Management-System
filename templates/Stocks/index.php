<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stock[]|\Cake\Collection\CollectionInterface $stocks
 */
?>
<div class="stocks index content">
    <?= $this->Html->link(__('New Stock'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Stocks') ?></h3>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('item') ?></th>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('quantity') ?></th>
                    <th><?= $this->Paginator->sort('measure') ?></th>
                    <th><?= $this->Paginator->sort('supplier') ?></th>
                    <th><?= $this->Paginator->sort('purchase_date') ?></th>
                    <th><?= $this->Paginator->sort('expiry_date') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($stocks as $stock): ?>
                <tr>
                    <td><?= $stock->has('drug') ? $this->Html->link($stock->drug->name, ['controller' => 'Drugs', 'action' => 'view', $stock->drug->id]) : '' ?></td>
                    <td><?= $this->Number->format($stock->id) ?></td>
                    <td><?= $this->Number->format($stock->quantity) ?></td>
                    <td><?= $stock->has('measure') ? $this->Html->link($stock->measure->name, ['controller' => 'Measures', 'action' => 'view', $stock->measure->id]) : '' ?></td>
                    <td><?= $stock->has('supplier') ? $this->Html->link($stock->supplier->name, ['controller' => 'Suppliers', 'action' => 'view', $stock->supplier->id]) : '' ?></td>
                    <td><?= h($stock->purchase_date) ?></td>
                    <td><?= h($stock->expiry_date) ?></td>
                    <td><?= h($stock->created) ?></td>
                    <td><?= h($stock->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $stock->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $stock->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $stock->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stock->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
<br>
<br>
