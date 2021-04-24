<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Drug $drug
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Drug'), ['action' => 'edit', $drug->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Drug'), ['action' => 'delete', $drug->id], ['confirm' => __('Are you sure you want to delete # {0}?', $drug->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Drugs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Drug'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="drugs view content">
            <h3><?= h($drug->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($drug->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price/Item') ?></th>
                    <td><?= h($drug->price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Measure') ?></th>
                    <td><?= h($drug->measure_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($drug->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($drug->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Manufacturing Date') ?></th>
                    <td><?= h($drug->manufacturing_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Expiry Date') ?></th>
                    <td><?= h($drug->expiry_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($drug->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($drug->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Stocks') ?></h4>
                <?php if (!empty($drug->stocks)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Drug Supplier Id') ?></th>
                            <th><?= __('Drug Id') ?></th>
                            <th><?= __('Purchase Date') ?></th>
                            <th><?= __('Expiry Date') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($drug->stocks as $stocks) : ?>
                        <tr>
                            <td><?= h($stocks->id) ?></td>
                            <td><?= h($stocks->drug_supplier_id) ?></td>
                            <td><?= h($stocks->drug_id) ?></td>
                            <td><?= h($stocks->purchase_date) ?></td>
                            <td><?= h($stocks->expiry_date) ?></td>
                            <td><?= h($stocks->created) ?></td>
                            <td><?= h($stocks->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Stocks', 'action' => 'view', $stocks->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Stocks', 'action' => 'edit', $stocks->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Stocks', 'action' => 'delete', $stocks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stocks->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
