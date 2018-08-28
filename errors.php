<?php if(count($errorss) > 0): ?>


	<div class="error">

	   <?php foreach ($errorss as $error): ?>
	   	<h4 style="color: red;"><li><p><?php echo $error; ?></p></li></h4>

	   	 <?php endforeach ?>
	</div>
<?php endif ?>	







