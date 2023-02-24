<!--
  What does this document do?:
  (i)Check if the user has submitted the form. If true > go (ii), else send an error message.
  (ii)Get the data from the html form and insert it into the SQL query.
  (iii)If the query is successfullly inserted into the database, redirect the user to the index page. Else, send an error message.

<?php
/*
The require_once keyword is used to embed PHP code from another file. If the file is not found, a fatal error is thrown and the program stops. If the file was already included previously, this statement will not include it again.
*/
require_once 'source/db_connect.php';

/*
"PHP isset(): The isset() function checks whether a variable is set, which means that it has to be declared and is not NULL. "
PHP $_POST: is a PHP super global variable which is used to collect form data after submitting an HTML form with method="post".
*/
if(isset($_POST['signup-btn'])) {

    //Storing the form data into variables.
      $username = $_POST['user-name'];
      $email = $_POST['user-email'];
      $password = $_POST['user-pass'];

    //password_hash() creates a new password hash using a strong one-way hashing algorithm "PASSWORD_DEFAULT".
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {

      //Inserting the SQL query into the "SQLInsert" variable.
      //VALUES(:"placeHolder"); => All the "placeHolder", as a reference, will be assigned a value before the execution of the prepared statement.
      $SQLInsert = "INSERT INTO users (username, password, email, to_date)
                   VALUES (:username, :password, :email, now())";

      /*
      Prepared Statement: A prepared statement is a feature used to execute the same (or similar) SQL statements repeatedly with high efficiency. 
      Return Value: A statement object on success. FALSE on failure.
      */
      $statement = $conn->prepare($SQLInsert);
      //Execute: The database executes the statement.
      $statement->execute(array(':username' => $username, ':password' => $hashed_password, ':email' => $email));


      //Check if the query is performed:
      if($statement->rowCount() == 1) { //PDOStatement::rowCount — Returns the number of rows affected by the last SQL statement.

        /*
        If "rowCount() == 1", means that our query is successfully added into the database. Then, we will redirect the user back to the "index.html" page for him/her to log in.
        */ 
        header('location: index.html');
      }
    }
    catch (PDOException $e) {
      //Print out whatever the error is if the query is failed to insert into the databse.
      echo "Error: " . $e->getMessage();
    }

}

?>