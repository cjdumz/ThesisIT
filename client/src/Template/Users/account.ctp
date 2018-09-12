<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Account Settings') ?></legend>
        <?php

        foreach ($results as $row):
            echo $this->Form->control('email', ['value' => $row->email]);
            echo $this->Form->input('password', ['type' => 'password', 'value' => $row->password]);
            echo $this->Form->input('phone', ['type' => 'number' , 'value' => $row->phone]);
        endforeach;
        ?>

    </fieldset>
    <?= $this->Form->button(__('Cancel', ['controller' => 'Users', 'action' => 'users'])) ?>
    <?= $this->Form->button(__('Save')) ?>
    
    <?= $this->Form->end() ?>

    
    <table>
    <tr>
    <td>ID</td>
    <td>Email</td>
    <td>Passwod</td>
    <td>Phone</td>
    </tr>
    <?php
    foreach ($results as $row):
    echo "<tr><td>".$row->id."</td>";
    echo "<td>".$row->email."</td>";
    echo "<td>".$row->phone."</td>";
    echo "<td>".$row->password."</td>";

    endforeach;
    ?>
    </table>


</div>
