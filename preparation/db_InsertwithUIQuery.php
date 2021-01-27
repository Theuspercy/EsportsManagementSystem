<?php 
        include ("serverconn.php"); 

        if(isset($_POST['firstname']) & isset($_POST['lastname']) & isset($_POST['email'])) {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];

            try {
                $stmt = $conn->prepare("SELECT count(*) FROM myguests WHERE email = :e_mail");
                $stmt->bindParam(":e_mail", $email);
                $stmt->execute();
                $row = $stmt->fetchColumn();
                if ($row > 0)
                {
                    echo "Error: Email already Exist.";
                } else {
                    $sql = "INSERT INTO myguests (firstname, lastname, email) VALUES (?,?,?)";
                    $stmt= $conn->prepare($sql);
                    $stmt->execute([$firstname, $lastname, $email]);
                    echo "Account Created";
                }        
            } catch (PDOException $e) {    
            echo "Error: " . $e->getMessage();
            }
            
        }
        // Go to something Page
        include ("db_InsertwithUI.php");
    
    ?>