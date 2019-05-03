<?php

require_once( __DIR__ . '/DAO.php');

class UserDAO extends DAO {

  public function selectById($id){
    $sql = "SELECT * FROM `users` WHERE `id`=:id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function createNewUser($_usernameR,$_passwordR,$_emailR,$_roomR){
    $sql = "INSERT INTO users(userName,password,email,room) VALUES('$_usernameR','$_passwordR','$_emailR','$_roomR')";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function logInUser($_username){
    $_sql = "SELECT * FROM users WHERE username = '$_username'";
    $stmt = $this->pdo->prepare($_sql);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

}
