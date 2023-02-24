<!--This document is making connection to the MySQL Database.-->
<?php

$username = 'root'; //To access database in "myadmin", we have to use the default username which is "root".
$password = '';
$dsn = 'mysql:host=localhost; dbname=mydb'; //To connect to the databse, we need to specify the "host" name as well as "database" name.

try {
  //$conn variable used to access the database.
  $conn = new PDO($dsn, $username, $password); //PDO class is used when we want to establish connections. If there are any connection errors, a PDOException object will be thrown.

  //"setAttribute()" is a functionan that set attribute "PDO::ATTR_ERRMODE" on the database handle, value in given: "ERRMODE_EXCEPTION: Throw exceptions if there is an error in SQL & PDO".
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

  //Returning the exception message using "Exception:getMessage()"
  //"->": Object Operator.
  echo "Connection to database was failed ".$e->getMessage();

}

?>