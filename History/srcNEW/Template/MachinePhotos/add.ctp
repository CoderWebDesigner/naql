<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Machine Photos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Machine Owners'), ['controller' => 'MachineOwners', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Machine Owner'), ['controller' => 'MachineOwners', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="machinePhotos form large-9 medium-8 columns content">
    <?= $this->Form->create($machinePhoto) ?>
    <fieldset>
        <legend><?= __('Add Machine Photo') ?></legend>
        <?php
            echo $this->Form->input('machine_owner_id', ['options' => $machineOwners]);
            echo $this->Form->input('photo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
