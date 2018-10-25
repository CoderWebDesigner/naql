<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Machine Photo'), ['action' => 'edit', $machinePhoto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Machine Photo'), ['action' => 'delete', $machinePhoto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $machinePhoto->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Machine Photos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Machine Photo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Machine Owners'), ['controller' => 'MachineOwners', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Machine Owner'), ['controller' => 'MachineOwners', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="machinePhotos view large-9 medium-8 columns content">
    <h3><?= h($machinePhoto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Machine Owner') ?></th>
            <td><?= $machinePhoto->has('machine_owner') ? $this->Html->link($machinePhoto->machine_owner->id, ['controller' => 'MachineOwners', 'action' => 'view', $machinePhoto->machine_owner->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Photo') ?></th>
            <td><?= h($machinePhoto->photo) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($machinePhoto->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($machinePhoto->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($machinePhoto->modified) ?></td>
        </tr>
    </table>
</div>
