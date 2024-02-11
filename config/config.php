<?php 
try{
//host
//      name   value
define("HOST",  "localhost"); // define initializes a constant variable

//dbname
define("DBNAME","hacklahoma24"); // database name

//user
define("USER", "root"); // user credentials 

//password
define("PASS", "1234"); // leaving password blank for the demo

// we instantiate a PDO connection object when dealing with php databases
// allows us to validate and manage the connection more securely

//        specify what database    concat dynamic host val   end
$conn = new PDO( "mysql:host=".HOST. ";dbname=".DBNAME."",USER,PASS); 
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// if($conn == true){
//     echo "db connection is a success";
// }
// else
//     echo "error";
}catch( PDOException $Exception ) {
    echo $Exception->getMessage();
}