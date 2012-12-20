<?php if (isset($error)) echo '<p class="error">'.$error.'</p><br />'; ?>
<?php echo validation_errors(); ?>
<?php echo form_open(isset($action) ? $action : 'index'); ?>

<?php foreach ($users as $user) { ?>

<label for="user<?php echo $user->ID; ?>"><?php echo $user->Name . ' ' . $user->Surname; ?></label>
<input type="checkbox" name="user<?php echo $user->ID; ?>" value="<?php echo $user->ID; ?>" />
<br />
<?php }?>

<?php if (isset($submit) and $submit == true) { ?>
<input type="submit" value="Gönder" />
<?php } ?>

<?php form_close(); ?>