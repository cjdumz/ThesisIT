<?php
/**
 * 	@var \App\View\AppView $this
 */
?>
<div class="users form large-9 medium-8 columns content">
	<!--<?= $this->form->create($user) ?>-->
	<?= $this->form->create() ?>
	<fieldset>
		<legend><?= __('Login') ?></legend>
	<?php
		echo $this->Form->control('username');
		echo $this->Form->control('password');
	?>
	</fieldset>
	<?= $this->Form->button(__('Submit')) ?>
	<?= $this->Form->end() ?>
</div>

