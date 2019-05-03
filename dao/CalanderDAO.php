<?php

require_once( __DIR__ . '/DAO.php');

class CalanderDAO extends DAO {

  public function selectAllWithTitle(){
    $sql = "SELECT * FROM `bookings` WHERE `id` != '' ORDER BY `id` DESC";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectAllUsers(){
    $sql = "SELECT `userName` FROM `users` WHERE `id` != '' ORDER BY `userName` DESC";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectBookingById($id){
    $sql = "SELECT * FROM `bookings` WHERE `id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function selectUserById($id){
    $sql = "SELECT * FROM `users` WHERE `id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function selectRoomById($id){
    $sql = "SELECT * FROM `rooms` WHERE `id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function selectUserByName($name){
    $sql = "SELECT * FROM `users` WHERE `userName` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $name);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function postBooking($_chalange,$_chalanged,$_date_time,$_id){
    $sql = "INSERT INTO bookings(chalange,chalenged_user,booking_time,users_id) VALUES('$_chalange','$_chalanged','$_date_time','$_id')";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function removeBooking($_id){
    $sql = "DELETE FROM `bookings` WHERE `id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $_id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function removeAllBooking(){
    $sql = "DELETE FROM `bookings`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

}
