<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Service $service
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Service'), ['action' => 'edit', $service->serviceId]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Service'), ['action' => 'delete', $service->serviceId], ['confirm' => __('Are you sure you want to delete # {0}?', $service->serviceId)]) ?> </li>
        <li><?= $this->Html->link(__('List Services'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Service'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="services view large-9 medium-8 columns content">
    <h3><?= h($service->serviceId) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('ServiceName') ?></th>
            <td><?= h($service->serviceName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ServiceType') ?></th>
            <td><?= h($service->serviceType) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ServiceId') ?></th>
            <td><?= $this->Number->format($service->serviceId) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($service->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($service->modified) ?></td>
        </tr>
    </table>
</div>
