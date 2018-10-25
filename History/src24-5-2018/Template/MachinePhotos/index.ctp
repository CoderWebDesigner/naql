<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Machine Photo'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Machine Owners'), ['controller' => 'MachineOwners', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Machine Owner'), ['controller' => 'MachineOwners', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="machinePhotos index large-9 medium-8 columns content">
    <h3><?= __('Machine Photos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('machine_owner_id') ?></th>
                <th><?= $this->Paginator->sort('photo') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($machinePhotos as $machinePhoto): ?>
            <tr>
                <td><?= $this->Number->format($machinePhoto->id) ?></td>
                <td><?= $machinePhoto->has('machine_owner') ? $this->Html->link($machinePhoto->machine_owner->id, ['controller' => 'MachineOwners', 'action' => 'view', $machinePhoto->machine_owner->id]) : '' ?></td>
                <td><?= h($machinePhoto->photo) ?></td>
                <td><?= h($machinePhoto->created) ?></td>
                <td><?= h($machinePhoto->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $machinePhoto->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $machinePhoto->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $machinePhoto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $machinePhoto->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
