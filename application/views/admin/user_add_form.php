<?php if (isset($error)) echo '<p class="error">'.$error.'</p><br />'; ?>
<?php echo validation_errors(); ?>
<?php echo form_open(isset($action) ? $action : 'index'); ?>

     <label for="username">Kullanıcı Adı:</label>
     <input type="text" size="25" id="username" name="username"/>
     <br/>
     <label for="name">Ad:</label>
     <input type="text" size="25" id="subtitle" name="name"/>
     <br/>
     <label for="surname">Soyad:</label>
     <input type="text" size="25" id="subtitle" name="surname"/>
     <br/>
     <label for="password">Şifre:</label>
     <input type="password" size="25" id="subtitle" name="password"/>
     <br/>
     <label for="passwordr">Şifre(Tekrar):</label>
     <input type="password" size="25" id="subtitle" name="passwordr"/>
     <br/>
     <input type="submit" value="Gönder"/>

<?php form_close(); ?>