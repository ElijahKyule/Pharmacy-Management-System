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
            <?= $this->Html->link(__('List Drugs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="drugs form content">
            <?= $this->Form->create($drug) ?>
            <fieldset>
                <legend><?= __('Add Drug') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('description');
                    echo $this->Form->control('measure_id', ['options'=>$measures]);
                    echo $this->Form->control('price');
                    echo $this->Form->control('manufacturing_date');
                    echo $this->Form->control('expiry_date');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
