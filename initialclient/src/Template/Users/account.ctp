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
        <legend><?= __('Account Information') ?></legend>
        <?php

        foreach ($results as $row):
            echo "<div class='form-group'>";
            echo "<label for='Name'><b>Complete Name:</b></label>";
            echo $row->firstName." ".$row->middleName.".".$row->lastName;
            echo "<label for='Email'><b>Email:</b></label>";
            echo $row->email;
            echo "<label for='phone'><b>Phone Number:</b></label>";
            echo $row->phone;
            echo "<label for='platenumber'><b>Plate Number:</b></label>";
            echo $row->plateNumber;
            echo "<label for='dateregistered'><b>Date Registered:</b></label>";
            echo $row->created; 
            echo "<label for='datemodified'><b>Date Modified:</b></label>";
            echo $row->modified; 
            echo "</div>";
             echo $this->Html->link("Edit Personal Information", array('controller' => 'Users','action'=> 'accountset'), array( 'class' => 'btn btn-primary right'));
        endforeach;
        ?>

    </fieldset>  
    <?= $this->Form->end() ?>
</div>
