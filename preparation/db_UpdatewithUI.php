<!DOCTYPE html>
<head>
</head>

<body>
    <!-- Action = Dun niya ibabato lahat ng mga data from form-->
    <form method="POST" action="db_UpdatewithUIQuery.php">
        <h3> Old Account </h3>
        <label for="fname">First name:</label><br>
        <input type="text" id="firstname" name="firstname" placeholder="firstname"><br><br>
        
        <label for="fname">Email:</label><br>
        <input type="text" id="email" name="email" placeholder="email"><br><br>

        <h3> New Account </h3>
        <label for="fname">First name:</label><br>
        <input type="text" id="firstname" name="new_firstname" placeholder="firstname"><br><br>

        
        <label for="fname">Last name:</label><br>
        <input type="text" id="firstname" name="new_lastname" placeholder="firstname"><br><br>
        
        <label for="fname">Email:</label><br>
        <input type="text" id="email" name="new_email" placeholder="email"><br><br>

        <input type="submit" value="Submit">
    </form>
    <br>
    <a href="index.php"><u>Back<u></a>
    
</body>
</html>