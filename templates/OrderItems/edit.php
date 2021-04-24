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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $orderItem->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $orderItem->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Order Items'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="orderItems form content">
            <?= $this->Form->create($orderItem) ?>
            <fieldset>
                <legend><?= __('Edit Order Item') ?></legend>
                <?php
                    echo $this->Form->control('order_id', ['type'=>'hidden','options' => $orders]);
                    // echo $orderItem->drug->name;
                    echo $this->Form->control('drug_id', ['options' => $stocks, 'disabled'=> true]);
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
