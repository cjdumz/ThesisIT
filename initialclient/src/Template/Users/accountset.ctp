<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="users form large-9 medium-8 columns content">
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Account Information'), ['action' => 'account']) ?></li>
        <li><?= $this->Html->link(__('Vehicles'), ['action' => 'vehicleinfo']) ?></li>
         <li><?= $this->Html->link(__('Change Password'), ['action' => 'changepass']) ?></li>
    </ul>
</nav>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Account Settings') ?></legend>
        <?php

        foreach ($results as $row):
            echo $this->Form->control('username', ['label' => 'Username:', 'type' => 'text',  'value' => $row->username]);
            echo $this->Form->control('firstName', ['label' => 'First Name:', 'type' => 'text',  'value' => $row->firstName]);
            echo $this->Form->control('lastName', ['label' => 'Last Name:',' type' => 'text',  'value' => $row->lastName]);
            echo $this->Form->control('middleName', ['label' => 'Middle Name:', 'type' => 'text',  'value' => $row->middleName]);
            echo $this->Form->control('plateNumber', ['label' => 'Plate Number:', 'type' => 'text',  'value' => $row->plateNumber]);
            echo $this->Form->control('userEmail', ['label' => 'Email:', 'type' => 'text',  'value' => $row->userEmail]);
            echo $this->Form->input('phone', ['label' => 'Phone Number:', 'type' => 'number' , 'value' => $row->phone]);
        endforeach;
        ?>

    </fieldset>

    <?= $this->Form->button(__('Save')) ?>
    
    <?= $this->Form->end() ?>
</div>
