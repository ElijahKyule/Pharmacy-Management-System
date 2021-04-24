<div class="administrators form" style="width: 50%; background-color: white; border-radius: 10px; margin: auto;">
    <div style="margin: 30px;">
        <?= $this->Flash->render() ?>
        <h3>Admin Login</h3>
        <?= $this->Form->create() ?>
        <fieldset>
           <?= $this->Form->control('email', ['required' => true]) ?>
           <?= $this->Form->control('password', ['required' => true]) ?>
        </fieldset>
        <?= $this->Form->submit(__('Login')); ?>
        <?= $this->Form->end() ?>
        <?= $this->Html->link(__('New Admin?'), ['controller'=>'Administrators', 'action' => 'add']) ?>
    </div>
</div>