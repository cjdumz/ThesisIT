<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vehicle $vehicle
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Vehicle'), ['action' => 'edit', $vehicle->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Vehicle'), ['action' => 'delete', $vehicle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehicle->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Vehicles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicle'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="vehicles view large-9 medium-8 columns content">
    <h3><?= h($vehicle->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('PlateNumber') ?></th>
            <td><?= h($vehicle->plateNumber) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('BodyType') ?></th>
            <td><?= h($vehicle->bodyType) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('YearModel') ?></th>
            <td><?= h($vehicle->yearModel) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ChasisNumber') ?></th>
            <td><?= h($vehicle->chasisNumber) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('EngineClassification') ?></th>
            <td><?= h($vehicle->engineClassification) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('NumberOfCylinders') ?></th>
            <td><?= h($vehicle->numberOfCylinders) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('TypeOfDriveTrain') ?></th>
            <td><?= h($vehicle->typeOfDriveTrain) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Make') ?></th>
            <td><?= h($vehicle->make) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Series') ?></th>
            <td><?= h($vehicle->series) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Color') ?></th>
            <td><?= h($vehicle->color) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('EngineNumber') ?></th>
            <td><?= h($vehicle->engineNumber) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('TypeOfEngine') ?></th>
            <td><?= h($vehicle->typeOfEngine) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('EngineDisplacement') ?></th>
            <td><?= h($vehicle->engineDisplacement) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($vehicle->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('UserId') ?></th>
            <td><?= $this->Number->format($vehicle->userId) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($vehicle->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($vehicle->created) ?></td>
        </tr>
    </table>
</div>
