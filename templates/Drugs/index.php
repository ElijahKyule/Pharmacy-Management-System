<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Drug[]|\Cake\Collection\CollectionInterface $drugs
 */
?>
<div class="drugs index content">
    <?= $this->Html->link(__('New Drug'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Drugs') ?></h3>
    <div class="table-responsive">
        <table class="table" id="example" class="display table table-striped" cellspacing="0" style="font-size: 12px;" width="100%;" >
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('measure') ?></th>
                    <th><?= $this->Paginator->sort('price') ?></th>
                    <th><?= $this->Paginator->sort('manufacturing_date') ?></th>
                    <th><?= $this->Paginator->sort('expiry_date') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($drugs as $drug): ?>
                <tr>
                    <td><?= $this->Number->format($drug->id) ?></td>
                    <td><?= h($drug->name) ?></td>
                    <td><?= $drug->has('measure') ? $this->Html->link($drug->measure->name, ['controller' => 'Measures', 'action' => 'view', $drug->measure->id]) : '' ?></td>
                    <td><?= h($drug->price) ?></td>
                    <td><?= h($drug->manufacturing_date) ?></td>
                    <td><?= h($drug->expiry_date) ?></td>
                    <td><?= h($drug->created) ?></td>
                    <td><?= h($drug->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $drug->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $drug->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $drug->id], ['confirm' => __('Are you sure you want to delete # {0}?', $drug->id)]) ?>
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
