<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Appointment $appointment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $appointment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $appointment->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Appointments'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="appointments form large-9 medium-8 columns content">
    <?= $this->Form->create($appointment) ?>
    <fieldset>
        <legend><?= __('Edit Appointment') ?></legend>
        <?php
            echo $this->Form->control('serviceId');
            echo $this->Form->control('vehicleId');
            echo $this->Form->control('serviceType');
            echo $this->Form->control('vehicleProblem');
            echo $this->Form->control('status');
            echo $this->Form->control('specialOffer');
            echo $this->Form->control('date');
            echo $this->Form->control('time');
            echo $this->Form->control('plateNumber');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
