<!DOCTYPE html>
<html>

<head>    
    <title>Sign Up screen</title>
</head>
<body>
    <div id='signup_form'>
        <form action='<?php echo base_url();?>signup/process' method='post' name='process'>
            <h2>User Login</h2>
            <br/>
            <?php if(! is_null($msg)) echo $msg;?>            
            <label for='f_name'>First Name</label>
            <input type='text' name='f_name' id='f_name' size='25' /><br />
            <label for='l_name'>Last Name</label>
            <input type='text' name='l_name' id='l_name' size='25' /><br />
            <label for='password'>Password</label>
            <input type='text' name='password' id='email' size='25' /><br />
            <label for='c_password'>Confirm Password</label>
            <input type='text' name='c_password' id='c_password' size='25' /><br />
            <label for='email'>Email ID</label>
            <input type='text' name='email' id='email' size='25' /><br />                            
            <input type='Submit' value='Sign Up' />            
            <?php echo validation_errors(); ?>
        </form>
    </div>
</body>
</html>