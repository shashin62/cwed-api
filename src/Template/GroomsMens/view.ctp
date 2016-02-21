<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Grooms Men'), ['action' => 'edit', $groomsMen->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Grooms Men'), ['action' => 'delete', $groomsMen->id], ['confirm' => __('Are you sure you want to delete # {0}?', $groomsMen->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Grooms Mens'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Grooms Men'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="groomsMens view large-9 medium-8 columns content">
    <h3><?= h($groomsMen->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($groomsMen->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Position') ?></th>
            <td><?= h($groomsMen->position) ?></td>
        </tr>
        <tr>
            <th><?= __('Date') ?></th>
            <td><?= h($groomsMen->date) ?></td>
        </tr>
        <tr>
            <th><?= __('Photo Url') ?></th>
            <td><?= h($groomsMen->photo_url) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($groomsMen->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($groomsMen->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($groomsMen->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($groomsMen->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Active') ?></th>
            <td><?= $groomsMen->active ? __('Yes') : __('No'); ?></td>
         </tr>
    </table>
</div>
