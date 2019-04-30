<?php
require_once 'core/init.php';

if(Input::exists()) {
    $validate = new Validate();
    $validation = $validate->check($_POST, array(
        'username' => array( 'required' => true),
        'password' => array( 'required' => true)
    ));

    if($validation->passed()) {
        $user = new User();
        $login = $user->login(Input::get('username'), Input::get('password'));

        if($login) {
            echo 'Success';
        } else {
            echo '<p>Sorry, login failed</p>';
        }
        
    } else {
        foreach($validation->errors() as $error) {
            echo $error, '<br>';
        }
    }

}
?>
<h2>Login</h2>
<form action="" method="post">
    <div class="field">
        <label for="username">Username</label>
        <input type="text" name= 'username' id= 'username' autocomplete='off'>
    </div>
    <div class="field">
        <label for="password">Password</label>
        <input type="password" name= 'password' id= 'password' autocomplete='off'>
    </div>
    <input type="submit" value= "Log In">

</form>