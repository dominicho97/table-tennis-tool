<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/UserDAO.php';

class UsersController extends Controller {

  public function login() {
    $this->set('title', 'Login');

    if(isset($_POST['submitLI'])){
      $_username = $_POST['username'];
      $_password = $_POST['password'];

      $userDAO = new UserDAO();
      $users = $userDAO->logInUser($_username);
      $this->set('users', $users);

      if ($_password == $users['password']) {

        session_start();

        $_SESSION['name'] = $users;

        header('Location: calander.php');
      } else {
        echo "ERROR!!! ERROR!!!";
      }

    }

    if(isset($_POST['submitR'])){

      $_errors = [];

      // check email
      if(empty($_POST['emailR'])){
  			$_errors['emailR'] = 'An email is required';
  		} else{
  			if(!filter_var($_POST['emailR'], FILTER_VALIDATE_EMAIL)){
  				$_errors['emailR'] = 'Email must be a valid email address';
  			}
  		}

      // check title
  		if(empty($_POST['usernameR'])){
  			$_errors['loginR'] = 'A name is required';
  		}

      // check title
  		if(empty($_POST['passwordR'])){
  			$_errors['passwordR'] = 'A password is required';
  		} else{
  			if($_POST['passwordR'] != $_POST['passwordR2']){
  				$_errors['passwordR'] = 'passords sould match';
  			}
  		}

      if(array_filter($_errors)){
      print_r($_errors);
    } else {

      $_usernameR = $_POST['usernameR'];
      $_passwordR = $_POST['passwordR'];
      $_emailR = $_POST['emailR'];
      $_roomR = $_POST['roomR'];

      $userDAO = new UserDAO();
      $users = $userDAO->createNewUser($_usernameR,$_passwordR,$_emailR,$_roomR);
      $this->set('users', $users);

      $userLI = $userDAO->logInUser($_usernameR);

      $_SESSION['name'] = $userLI;

      header('Location: calander.php');

      }

    }

  }

}
