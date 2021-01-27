<!DOCTYPE html>
<head> </head>
<body>
<?php

    include ("serverconn.php");

    if (isset($_POST['firstname']) & isset($_POST['email'])) {
        $firstname = $_POST['firstname'];
        $email=$_POST['email'];

        try {
            $conn->beginTransaction();
            // Prepared Statement
            // query to get the number of rows
            $stmt = $conn->prepare("SELECT count(*) FROM myguests WHERE firstname = :first_name AND email = :e_mail ");
            $stmt->bindParam(":first_name", $firstname);
            $stmt->bindParam(":e_mail", $email);
            $stmt->execute();
            $row_cnt = $stmt->fetchColumn();
            if ($row_cnt > 0)
            {   
                $stmt_1 = $conn->prepare("SELECT * FROM myguests WHERE firstname = :first_name AND email = :e_mail ");
                $stmt_1->bindParam(":first_name", $firstname);
                $stmt_1->bindParam(":e_mail", $email);
                $stmt_1->execute();
        
                while ($row = $stmt_1->fetch()) {
                    echo "ID Number: " . $row['id']."<br>";
                    echo "First Name: " . $row['firstname']."<br>";
                    echo "Last Name: " . $row['lastname']."<br>";
                    echo "Email: " . $row['email']."<br>";
                    echo "------------------------- <br> <br>";
                } 

                echo "<br>end";
            } else {
                echo "No user account found. <br>";
            }
            $conn->commit();
        } catch (PDOException $e){
            $conn->rollback();
            echo "Error: " . $e->getMessage();
        }
    }
?>

    <a href="db_SelectwithUI.php"><u>Search</u></a> <br>
    <a href="index.php"><u>Home</u></a>
</body>

</html>

