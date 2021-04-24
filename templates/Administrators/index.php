<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Administrator[]|\Cake\Collection\CollectionInterface $administrators
 */
?>
<div class="administrators index content">
    <?= $this->Html->link(__('New Administrator'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Administrators') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('phone_number') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($administrators as $administrator): ?>
                <tr>
                    <td><?= $this->Number->format($administrator->id) ?></td>
                    <td><?= h($administrator->name) ?></td>
                    <td><?= h($administrator->phone_number) ?></td>
                    <td><?= h($administrator->email) ?></td>
                    <td><?= h($administrator->created) ?></td>
                    <td><?= h($administrator->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $administrator->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $administrator->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $administrator->id], ['confirm' => __('Are you sure you want to delete # {0}?', $administrator->id)]) ?>
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
