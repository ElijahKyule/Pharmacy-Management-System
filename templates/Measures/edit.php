<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Measure $measure
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $measure->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $measure->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Measures'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="measures form content">
            <?= $this->Form->create($measure) ?>
            <fieldset>
                <legend><?= __('Edit Measure') ?></legend>
                <?php
                    echo $this->Form->control('name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
