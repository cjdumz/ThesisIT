<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('login'), ['action' => 'Login']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Login') ?></legend>
        <?php
            echo $this->Form->control('username', ['pattern' => '.{6,}', 'title' => 'must contain 6 or more characters']);
            echo $this->Form->control('password', ['pattern' => '(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}','title' => ' must contain 8 or more characters that are of at least one number, and one uppercase and lowercase letter']);
            echo $this->Form->control('firstName');
            echo $this->Form->control('lastName');
            echo $this->Form->control('middleName');
            echo $this->Form->control('userEmail',['type' => 'email']);
            echo $this->Form->control('phone', ['minlength'=>'11']);
            echo $this->Form->control('plateNumber');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
