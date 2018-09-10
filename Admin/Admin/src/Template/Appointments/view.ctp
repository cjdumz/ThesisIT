<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Appointment $appointment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Appointment'), ['action' => 'edit', $appointment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Appointment'), ['action' => 'delete', $appointment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appointment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Appointments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Appointment'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="appointments view large-9 medium-8 columns content">
    <h3><?= h($appointment->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('ServiceType') ?></th>
            <td><?= h($appointment->serviceType) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('VehicleProblem') ?></th>
            <td><?= h($appointment->vehicleProblem) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($appointment->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('SpecialOffer') ?></th>
            <td><?= h($appointment->specialOffer) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PlateNumber') ?></th>
            <td><?= h($appointment->plateNumber) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($appointment->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ServiceId') ?></th>
            <td><?= $this->Number->format($appointment->serviceId) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('VehicleId') ?></th>
            <td><?= $this->Number->format($appointment->vehicleId) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($appointment->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($appointment->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($appointment->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Time') ?></th>
            <td><?= h($appointment->time) ?></td>
        </tr>
    </table>
</div>
