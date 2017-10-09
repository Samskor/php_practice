<!DOCTYPE html>
<html>

<head>    
    <title>Login Screen</title>
</head>
<body>
    <div id='login_form'>
        <form action='<?php echo base_url();?>login/process' method='post' name='process'>
            <h2>User Login</h2>
            <br />
            <?php if(! is_null($msg)) echo $msg;?>            
            <label for='username1'>Username</label>
            <input type='text' name='username1' id='username1' size='25' /><br />
            <label for='password'>Password</label>
            <input type='password' name='password' id='password' size='25' /><br />                            
            <input type='Submit' value='Login' />            
        </form>
    </div>
    <div id='signup_form'>
        <form action='<?php echo base_url();?>sign_up/process' method='post' name='process'>
            <br>
            <br>
            <br>
            <h2>Sign Up</h2>
            <br/>
            <?php if(! is_null($msg)) echo $msg;?>            
            <label for='f_name'>First Name</label>
            <input type='text' name='f_name' id='f_name' size='25' /><br />
            <label for='l_name'>Last Name</label>
            <input type='text' name='l_name' id='l_name' size='25' /><br />
            <label for='password'>Password</label>
            <input type='text' name='password1' id='password1' size='25' /><br />
            <label for='c_password'>Confirm Password</label>
            <input type='text' name='c_password' id='c_password' size='25' /><br />
            <label for='email'>Email ID</label>
            <input type='text' name='email1' id='email1' size='25' /><br />                            
            <label for='username'>Username</label>
            <input type='text' name='username' id='username' size='25' /><br />                            
            <input type='Submit' value='Sign Up' />            
        </form>
    </div>
</body>
</html>