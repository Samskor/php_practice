<html>
<head>
<title>Sign In!</title>
</head>
<body>
<?php echo validation_errors(); ?>
<?php echo form_open('form'); ?>
    
    <h5>First Name:</h5>
    <input type="text" name="first_name" value="" size="50" />
    <h5>Last Name:</h5>
    <input type="text" name="last_name" value="" size="50" />
    <h5>E-mail:</h5>
    <input type="text" name="mail" value="" size="50" />
    <?php echo set_value('mail'); ?>
    <h5>Password</h5>
    <input type="text" name="password" value="" size="50" />
    <h5>Confirm Password</h5>
    <input type="text" name="c_password" value="" size="50" />
    <div><input type="submit" value="Submit" /></div>
    
</form>
</body>
</html>