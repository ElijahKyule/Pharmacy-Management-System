<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Measure[]|\Cake\Collection\CollectionInterface $measures
 */
?>
<div class="measures index content">
    <?= $this->Html->link(__('New Measure'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Measures') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($measures as $measure): ?>
                <tr>
                    <td><?= $this->Number->format($measure->id) ?></td>
                    <td><?= h($measure->name) ?></td>
                    <td><?= h($measure->created) ?></td>
                    <td><?= h($measure->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $measure->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $measure->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $measure->id], ['confirm' => __('Are you sure you want to delete # {0}?', $measure->id)]) ?>
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
