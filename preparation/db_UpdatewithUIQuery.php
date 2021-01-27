<!DOCTYPE html>
<head></head>
<body>

<?php
    include ("serverconn.php");

    if(isset($_POST['firstname']) & isset($_POST['email']))
    {
        $firstname = $_POST['firstname'];
        $email = $_POST['email'];
        $new_firstname = $_POST['new_firstname'];
        $new_lastname = $_POST['new_lastname'];
        $new_email = $_POST['new_email'];
    }

    try {

        $conn->beginTransaction();
        
        $stmt = $conn->prepare("SELECT count(*) FROM myguests  WHERE firstname = :old_fname AND email = :old_email");
        $stmt->bindParam(":old_fname", $firstname);
        $stmt->bindParam(":old_email", $email);
        $stmt->execute();
        $row = $stmt->fetchColumn(); 
        //================  NOTE  ===============================
        // Use the count(*) to return the number of row affected, then use the PDOStatement::fetchColumn(); 
        // If you will not use the Prepared statement, this is the code: 
        // $nRows = $pdo->query('select count(*) from blah')->fetchColumn(); 
        // echo $nRows;
        //=========================================================

        if ($row > 0) {
            $stmt = $conn->prepare("UPDATE myguests SET firstname = :f_name, lastname = :last_name , email = :e_mail WHERE firstname = :old_fname AND email = :old_email");
            $stmt->bindParam(":old_fname", $firstname);
            $stmt->bindParam(":old_email", $email);
            $stmt->bindParam(":f_name", $new_firstname);
            $stmt->bindParam(":last_name", $new_lastname);
            $stmt->bindParam(":e_mail", $new_email);
            $stmt->execute();
            
            echo "Updated Successfully <br>";
            $conn->commit();
        } else {
            echo "No User Account Found <br>";
        }

       
    } catch (PDOException $e) {
            $conn->rollback();
            echo "Error: " . $e->getMessage();
    }
?>

    <a href="db_UpdatewithUI.php"><u>Update Account</u></a> <br>
    <a href="db_SelectwithUI.php"><u>Search</u></a> <br>
    <a href="index.php"><u>Home</u></a>

</body>
</html>