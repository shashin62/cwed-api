<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Grooms Men'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="groomsMens index large-9 medium-8 columns content">
    <h3><?= __('Grooms Mens') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('position') ?></th>
                <th><?= $this->Paginator->sort('date') ?></th>
                <th><?= $this->Paginator->sort('photo_url') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('active') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($groomsMens as $groomsMen): ?>
            <tr>
                <td><?= $this->Number->format($groomsMen->id) ?></td>
                <td><?= h($groomsMen->name) ?></td>
                <td><?= h($groomsMen->position) ?></td>
                <td><?= h($groomsMen->date) ?></td>
                <td><?= h($groomsMen->photo_url) ?></td>
                <td><?= h($groomsMen->description) ?></td>
                <td><?= h($groomsMen->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $groomsMen->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $groomsMen->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $groomsMen->id], ['confirm' => __('Are you sure you want to delete # {0}?', $groomsMen->id)]) ?>
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
