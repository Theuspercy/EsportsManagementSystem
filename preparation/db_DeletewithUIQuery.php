<!DOCTYPE html>
<head></head>
<body>
<?php 
    include ("serverconn.php");

    if(isset($_POST['firstname']) & isset($_POST['email']))
    {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
    try {

        $conn->beginTransaction();
        $stmt = $conn->prepare("SELECT count(*) FROM myguests WHERE firstname = :old_fname AND email = :old_email AND lastname = :l_name");
        $stmt->bindParam(":old_fname", $firstname);
        $stmt->bindParam(":old_email", $email);
        $stmt->bindParam(":l_name", $lastname);
        $stmt->execute();
        $row = $stmt->fetchColumn();

        if ($row > 0) {
            $stmt = $conn->prepare("DELETE FROM myguests WHERE firstname = :old_fname AND email = :old_email AND lastname = :l_name");
            $stmt->bindParam(":old_fname", $firstname);
            $stmt->bindParam(":old_email", $email);
            $stmt->bindParam(":l_name", $lastname);
            $stmt->execute();
            echo "Deleted Account Successfully <br>";
            $conn->commit();
        }else {
            echo "No User Account Found. <br>";
        }
    } catch (PDOException $e) {
            $conn->rollback();
            echo "Error: " . $e->getMessage();
    }
    }
?>

    <a href="db_DeletewithUI.php"><u>Delete Account</u></a> <br>
    <a href="index.php"><u>Home</u></a>
</body>
</html>