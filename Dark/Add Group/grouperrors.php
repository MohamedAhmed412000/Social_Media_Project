<?php  if (count($grouperrors) > 0) : ?>
  <div class="error">
  	<?php foreach ($grouperrors as $grouperror) : ?>
  	  <p><?php echo $grouperror ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>