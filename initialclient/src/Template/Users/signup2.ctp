<?php

?>
<?= $this->form->create($user) ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
	<ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Html->link(__('Login'), ['action' => 'login']) ?> </li>
	</ul>
</nav>
	<?= $this->form->create() ?>
  <form>
  <fieldset>
    <legend>Signup</legend>
    <div class="form-group row">
    </div>
    <div class="form-group">
      <?php echo $this->Form->control('Username:', ['placeholder'=>'Username', 'class' => 'form-control' ]); ?>
      <!--<label for="inputEmail">Email address</label>-->
      <!--<input type="email" name='email' class="form-control" aria-describedby="emailHelp" placeholder="YourEmail@example.com"> Ignore this please , possible to be used-->
      <?php echo $this->Form->control('First Name:', ['placeholder'=>'First name', 'class' => 'form-control' ]); ?>
      <?php echo $this->Form->control('Last Name:', ['placeholder'=>'Last name', 'class' => 'form-control' ]); ?>
      <?php echo $this->Form->control('Middle Name:', ['placeholder'=>'Middle Name', 'class' => 'form-control' ]); ?>
      <!--<label for="inputEmail">Email address</label>-->
      <!--<input type="email" name='email' class="form-control" aria-describedby="emailHelp" placeholder="YourEmail@example.com"> Ignore this please , possible to be used-->
      <?php echo $this->Form->control('email:', ['placeholder'=>'Enter your Email', 'class' => 'form-control' ]); ?>
   
  
      <!--<label for="inputPassword">Password</label>-->
      <!--<input type="password" name='password' class="form-control" id="inputPhone" placeholder="Password">-->

      <?php echo $this->Form->control('password:', ['type'=>'password', 'placeholder'=>'Enter your password', 'class'=>'form-control']); ?>
    
      <!--<label for="inputPhone">Phone</label>
      <input type="text" name='phone' class="form-control" id="inputPhone" placeholder="Phone">-->
      <?php echo $this->Form->control('phone:', ['type'=>'number', 'placeholder'=>'Phone Number', 'class'=>'form-control']); ?>  
       <?php echo $this->Form->control('Plate Number:', ['type'=>'text', 'placeholder'=>'Plate Number', 'class'=>'form-control']); ?>    
    <!--<button type="submit" class="btn btn-primary">Submit</button>-->
    		<?= $this->Form->button(__('Signup'), ['class' => 'btn btn-primary']) ?>

    	
    </div>
</form>

<?= $this->Form->end() ?>

