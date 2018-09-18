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
            echo $this->Form->input('oldpassword', ['label' => 'Old password:', 'type' => 'password']);
            echo $this->Form->input('newpassword', ['label' => 'New password:', 'type' => 'password']);
            echo $confirmpassword = $this->Form->control('confirmpassword', ['label' => 'Confirm password:', 'type' => 'password']);
        endforeach;
        ?>

    </fieldset>

    <?= $this->Form->button(__('Save')) ?>
    
    <?= $this->Form->end() ?>
</div>
