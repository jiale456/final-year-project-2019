<?php

require_once 'source/db_connect.php';


if(isset($_POST['register-btn'])) {

    $firstName = $_POST['user-firstname'];
    $lastName = $_POST['user-lastname'];
    $email = $_POST['user-email'];
    $phoneNumber = $_POST['user-phone'];
    $address = $_POST['user-address'];


  try {

    $SQLInsert = "INSERT INTO participants (firstName, lastName, email, phoneNumber, address, registerTime)
                 VALUES (:firstName, :lastName, :email, :phoneNumber, :address, now())";

    $statement = $conn->prepare($SQLInsert);
    $statement->execute(array(':firstName' => $firstName, ':lastName' => $lastName, ':email' => $email, ':phoneNumber' => $phoneNumber, ':address' => $address));


    if($statement->rowCount() == 1) { 
      header('location: mainpage.php');
    }
  }
  catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }

}

?>