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
            <?= $this->Html->link(__('List Order Items'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive  column-80">
        <div class="orderItems form content">
            <?= $this->Form->create($orderItem) ?>
            <fieldset>
                <legend><?= __('Add Order Item') ?></legend>
                <?php
                    echo $this->Form->control('order_id', ['type'=>'hidden', 'options' => $orders, 'default' => $id]);
                    echo $this->Form->control('drug_id', ['options' => $stocks]);
                    echo $this->Form->control('quantity');
                    echo $this->Form->control('measure_id', ['options' => $measures]);
                    echo $this->Form->control('administrator_id', ['options' => $administrators]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
