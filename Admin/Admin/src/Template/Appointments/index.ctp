<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Appointment[]|\Cake\Collection\CollectionInterface $appointments
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Appointment'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="appointments index large-9 medium-8 columns content">
    <h3><?= __('Appointments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('serviceId') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vehicleId') ?></th>
                <th scope="col"><?= $this->Paginator->sort('serviceType') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vehicleProblem') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('specialOffer') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('plateNumber') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appointments as $appointment): ?>
            <tr>
                <td><?= $this->Number->format($appointment->id) ?></td>
                <td><?= $this->Number->format($appointment->serviceId) ?></td>
                <td><?= $this->Number->format($appointment->vehicleId) ?></td>
                <td><?= h($appointment->serviceType) ?></td>
                <td><?= h($appointment->vehicleProblem) ?></td>
                <td><?= h($appointment->created) ?></td>
                <td><?= h($appointment->modified) ?></td>
                <td><?= h($appointment->status) ?></td>
                <td><?= h($appointment->specialOffer) ?></td>
                <td><?= h($appointment->date) ?></td>
                <td><?= h($appointment->time) ?></td>
                <td><?= h($appointment->plateNumber) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $appointment->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $appointment->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $appointment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appointment->id)]) ?>
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
