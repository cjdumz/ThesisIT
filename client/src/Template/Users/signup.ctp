<?php

?>
<?= $this->form->create($user) ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
	<ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Html->link(__('Login'), ['action' => 'login']) ?> </li>
	</ul>
</nav>
<!--<div class="users form large-9 medium-8 columns content">
		<fieldset>
		<legend><?= __('Add User') ?></legend>
	<?php
		echo $this->Form->control('email');
		echo $this->Form->control('password');
		echo $this->Form->control('phone');
	?>
	</fieldset>
	<?= $this->Form->button(__('Submit')) ?>
</div>-->
	<?= $this->form->create($user) ?>
  <form>
  <fieldset>
    <legend>Signup</legend>
    <div class="form-group row">
    </div>
    <div class="form-group">
      <!--<label for="inputEmail">Email address</label>-->
      <!--<input type="email" name='email' class="form-control" aria-describedby="emailHelp" placeholder="YourEmail@example.com">-->
      <?php echo $this->Form->control('email', ['placeholder'=>'Enter your Email', 'class' => 'form-control' ]); ?>
    </div>
    <div class="form-group">
      <!--<label for="inputPassword">Password</label>-->
      <!--<input type="password" name='password' class="form-control" id="inputPhone" placeholder="Password">-->

      <?php echo $this->Form->control('password', ['type'=>'password', 'placeholder'=>'Enter your password', 'class'=>'form-control']); ?>
    </div>
    <div class="form-group">
      <!--<label for="inputPhone">Phone</label>
      <input type="text" name='phone' class="form-control" id="inputPhone" placeholder="Phone">-->
      <?php echo $this->Form->control('phone', ['type'=>'number', 'placeholder'=>'Phone Number', 'class'=>'form-control']); ?>
   
    <!--<button type="submit" class="btn btn-primary">Submit</button>-->
    		<?= $this->Form->button(__('Signup'), ['class' => 'btn btn-primary']) ?>

    	
    </div>
</form>

<?= $this->Form->end() ?>

