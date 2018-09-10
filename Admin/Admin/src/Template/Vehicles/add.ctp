<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vehicle $vehicle
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Vehicles'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="vehicles form large-9 medium-8 columns content">
    <?= $this->Form->create($vehicle) ?>
    <fieldset>
        <legend><?= __('Add Vehicle') ?></legend>
        <?php
            echo $this->Form->control('userId');
            echo $this->Form->control('plateNumber');
            echo $this->Form->control('bodyType');
            echo $this->Form->control('yearModel');
            echo $this->Form->control('chasisNumber');
            echo $this->Form->control('engineClassification');
            echo $this->Form->control('numberOfCylinders');
            echo $this->Form->control('typeOfDriveTrain');
            echo $this->Form->control('make');
            echo $this->Form->control('series');
            echo $this->Form->control('color');
            echo $this->Form->control('engineNumber');
            echo $this->Form->control('typeOfEngine');
            echo $this->Form->control('engineDisplacement');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
