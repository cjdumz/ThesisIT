<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Service $service
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $service->serviceId],
                ['confirm' => __('Are you sure you want to delete # {0}?', $service->serviceId)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Services'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="services form large-9 medium-8 columns content">
    <?= $this->Form->create($service) ?>
    <fieldset>
        <legend><?= __('Edit Service') ?></legend>
        <?php
            echo $this->Form->control('serviceName');
            echo $this->Form->control('serviceType');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
