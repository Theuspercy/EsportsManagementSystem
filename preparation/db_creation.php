<?php
   $servername = "localhost";
   $username = "root";
   
   try 
   {
     $conn = new PDO("mysql:host=$servername", $username);
     // set the PDO error mode to exception
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     $sql = "CREATE DATABASE esports_management";
     // use exec() because no results are returned
     $conn->exec($sql);

     echo "Database created successfully<br>";
   } 
   catch(PDOException $e)
   {
     echo $sql . "<br>" . $e->getMessage();
   }

?> 
