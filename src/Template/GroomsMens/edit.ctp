<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $groomsMen->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $groomsMen->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Grooms Mens'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="groomsMens form large-9 medium-8 columns content">
    <?= $this->Form->create($groomsMen) ?>
    <fieldset>
        <legend><?= __('Edit Grooms Men') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('position');
            echo $this->Form->input('date');
            echo $this->Form->input('photo_url');
            echo $this->Form->input('description');
            echo $this->Form->input('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
