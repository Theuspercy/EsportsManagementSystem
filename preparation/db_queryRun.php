<?php
    include ("serverconn.php");

    try
    {
     /*   Insert only one query
        $sql = "INSERT INTO MyGuests (firstname, lastname, email)
        VALUES ('John', 'Doe', 'john@example.com')";
        $conn->exec($sql); */


//----------------------------------------------------------------------------------------------------------
        /* Insert multiple Queries
        $conn->beginTransaction();

        $conn->exec("INSERT INTO myguests (firstname, lastname, email) VALUES ('Tim','Cuizon','timon@gmail.com')");
        $conn->exec("INSERT INTO myguests (firstname, lastname, email) VALUES ('Ivan','Cuizon','ivan@gmail.com')");
        $conn->exec("INSERT INTO myguests (firstname, lastname, email) VALUES ('Kiel','Cuizon','kiel@gmail.com')");
        $conn->commit(); */

//----------------------------------------------------------------------------------------------------
        /* PREPARED STATEMENTS
        / prepare sql and bind parameters
        $stmt = $conn->prepare("INSERT INTO myguests (firstname, lastname, email) VALUES (:firstname, :lastname, :email)");
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':email',$email);

        //Insert Row
        $firstname = "Jaymie";
        $lastname = "Tabunan";
        $email = "Jaymie@gmail.com";
        $stmt->execute();

        
        //Insert another Row
        $firstname = "Ralph";
        $lastname = "Barangay";
        $email = "Ralph@gmail.com";
        $stmt->execute(); */

//------------------------------------------------------------------------------------------------------
 //       echo "Inserted Multiple Prepared Statement Queries Succesfully";

 // =========================================     SELECTTT QUERIESSS   =========================================================
        
        // //SINGLE ROW = need mong mag output ng naka ASSOC ARRAY FORM since ang nafetch niya is buong row which is maraming data
        // $row = $conn->query('SELECT * FROM myguests') -> fetch();
        // echo $row[3];


        // SABAY SABAY NIYA MUNANG  IFE-FETCH LAHAT THEN OUTPUT 
        // $data = $conn->query("SELECT * FROM myguests")->fetchAll();
        // // and somewhere later:
        // foreach ($data as $row) {
        //     echo "ID Number: " . $row['id']."<br>";
        //     echo "First Name: " . $row['firstname']."<br>";
        //     echo "Last Name: " . $row['lastname']."<br>";
        //     echo "Email: " . $row['email']."<br>";
        //     echo "------------------------- <br> <br>";
        // }
        
        
        // THIS METHOD WILL IFEFETCH NIYA MUNA ISA-ISA HANGGANG MAUBOS
        // Database transactions ensure that a set of data changes will only be made permanent if every statement is successful.
        // Any query or code failure during a transaction can be caught and you then have the option to roll back the attempted changes.
        $conn->beginTransaction();
        $stmt = $conn->query("SELECT * FROM myguests WHERE firstname='Pierce'");
        while ($row = $stmt->fetch()) {
            echo "ID Number: " . $row['id']."<br>";
            echo "First Name: " . $row['firstname']."<br>";
            echo "Last Name: " . $row['lastname']."<br>";
            echo "Email: " . $row['email']."<br>";
            echo "------------------------- <br> <br>";;
        }



    }
    catch(PDOException $e) {
        // Exeception for Multiple Queries, roll back the transaction if something failed
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }

?>