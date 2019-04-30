<?php
require_once 'core/init.php';


if(Input::exists()){
        
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'username' => array(
                'required' => true,
                'min' => 2,
                'max' => 20,
                'unique' => 'users'
            ),
            'email' => array(
                'required' => true

            ),
            'password' => array(
                'required' => true,
                'min' => 6
            ),
            'password_again' => array(
                'required' => true,
                'matches' => 'password'
            ),
            'room' => array(
                'required' => true
            ),
        ));

        if($validation->passed()) {
            $user = new User();

            try{

                $user->create(array(
                    'username' => Input::get('username'),
                    'email' => Input::get('email'),
                    'password' => Hash::make(Input::get('password')),
                    'room' => Input::get('room')
                ));

                Session::flash('home', 'You have been registered and can now log in!');
                Redirect::to('index.php');

            } catch(Exception $e){
                die ($e->getMessage());
            }
        }else{
            foreach($validation->errors() as $error){
                echo $error, '<br>';
            }
        }
    }


?>

<h2>Register Form</h2>

<form action="" method="post">

    <div class="field">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="<?php echo escape(Input::get("username"))?>" autocomplete="off">
    </div>
    <div class="field">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?php echo escape(Input::get("email"))?>">
    </div>
    <div class="field">
        <label for="password">Choose your Password</label>
        <input type="password" name="password" id="password" value="">
    </div>
    <div class="field">
        <label for="password_again">Confirm your Password</label>
        <input type="password" name="password_again" id="password_again" value="">
    </div>
    <div class="field">
        <label for="name">Room</label>
        <input type="number" name="room" id="room" value="<?php echo escape(Input::get("room"))?>">
    </div>

    <input type="submit" value="Register">

    

    
    
    
</form>