<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vehicle[]|\Cake\Collection\CollectionInterface $vehicles
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Vehicle'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vehicles index large-9 medium-8 columns content">
    <h3><?= __('Vehicles') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('userId') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('plateNumber') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bodyType') ?></th>
                <th scope="col"><?= $this->Paginator->sort('yearModel') ?></th>
                <th scope="col"><?= $this->Paginator->sort('chasisNumber') ?></th>
                <th scope="col"><?= $this->Paginator->sort('engineClassification') ?></th>
                <th scope="col"><?= $this->Paginator->sort('numberOfCylinders') ?></th>
                <th scope="col"><?= $this->Paginator->sort('typeOfDriveTrain') ?></th>
                <th scope="col"><?= $this->Paginator->sort('make') ?></th>
                <th scope="col"><?= $this->Paginator->sort('series') ?></th>
                <th scope="col"><?= $this->Paginator->sort('color') ?></th>
                <th scope="col"><?= $this->Paginator->sort('engineNumber') ?></th>
                <th scope="col"><?= $this->Paginator->sort('typeOfEngine') ?></th>
                <th scope="col"><?= $this->Paginator->sort('engineDisplacement') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vehicles as $vehicle): ?>
            <tr>
                <td><?= $this->Number->format($vehicle->id) ?></td>
                <td><?= $this->Number->format($vehicle->userId) ?></td>
                <td><?= h($vehicle->modified) ?></td>
                <td><?= h($vehicle->plateNumber) ?></td>
                <td><?= h($vehicle->bodyType) ?></td>
                <td><?= h($vehicle->yearModel) ?></td>
                <td><?= h($vehicle->chasisNumber) ?></td>
                <td><?= h($vehicle->engineClassification) ?></td>
                <td><?= h($vehicle->numberOfCylinders) ?></td>
                <td><?= h($vehicle->typeOfDriveTrain) ?></td>
                <td><?= h($vehicle->make) ?></td>
                <td><?= h($vehicle->series) ?></td>
                <td><?= h($vehicle->color) ?></td>
                <td><?= h($vehicle->engineNumber) ?></td>
                <td><?= h($vehicle->typeOfEngine) ?></td>
                <td><?= h($vehicle->engineDisplacement) ?></td>
                <td><?= h($vehicle->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $vehicle->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vehicle->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vehicle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehicle->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
