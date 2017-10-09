<html>
<head>
<title>Sign In!</title>
</head>
<body>
<?php echo validation_errors(); ?>
<?php echo form_open('form'); ?>
    
    <h5>E-mail:</h5>
    <input type="text" name="mail" value="" size="50" />
    <?php echo set_value('mail'); ?>
    <h5>Password</h5>
    <input type="text" name="password" value="" size="50" />
    <div><input type="submit" name='sign_in' value="Sign In" /></div>
    <div><input type="submit" name="sign_up" value="Sign up"></div>
    
</form>
</body>
</html>